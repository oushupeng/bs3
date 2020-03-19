<?php


namespace frontend\controllers;


use backend\models\Pets;
use backend\models\ShopCart;
use Throwable;
use Yii;
use yii\db\StaleObjectException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ShopCartController extends Controller
{

    /**
     * 购物车主页
     * @return string
     */
    public function actionShopCart()
    {
        $username = Yii::$app->user->identity->username;
//        $model = ShopCart::find()->where(['user_name' => $username])->orderBy(['created_at' => SORT_DESC])->all();
        $model = ShopCart::find()->innerJoinWith(['pet'])->where(['user_name' => $username])->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('shopCart', ['model' => $model]);
    }

    /**
     * 删除购物车
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->getSession()->setFlash('success','删除成功');
        return $this->redirect(['shop-cart']);
    }

    /**
     * 清空购物车
     * @return Response
     */
    public function actionClear()
    {
        $username = Yii::$app->user->identity->username;
//        $clear = ShopCart::find()->where(['created_by' => $username])->all();
        ShopCart::deleteAll(['created_by' => $username]);
        Yii::$app->getSession()->setFlash('success',' 清空购物车完成');
        return $this->redirect(['shop-cart']);
    }

    /**
     * 批量删除
     * @return int
     */
    public function actionDeleteAll()
    {
//        return ShopCart::updateAll(['deleted_at' => time()], ['id' => Yii::$app->request->post('arr_id')]);
        var_dump(Yii::$app->request->post('arr_id'));die();
//        return ShopCart::deleteAll(['in','id',Yii::$app->request->post('arr_id')]);
    }

    public function actionSettlement()
    {

        //获取单个总价
        $sum1 = $_POST['sum1'];
        //获取总价
        $sum = $_POST['sum'];
        //获取id
        $shopId = $_POST['shopId'];
        $aa = explode(',',$shopId);
        $query = ShopCart::find();
        $model = $query->select('*')->where(['id' => $aa])->all();


        return $this->render('ordersForm',[
            'model' => $model,
            'sum' => $sum,
            'sum1' => $sum1,
        ]);

    }


    /**
     * 购物车下单
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetails($id)
    {
        $model = $this->findModel($id);
        return $this->render('ordersForm', ['model' => $model]);
    }

    /**
     * 立即购买
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetails2($id)
    {
        $model = $this->findModelPet($id);
        return $this->render('ordersForm2', ['model' => $model]);
    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['ordersForm', 'id' => $model->id]);
            return $this->render('ordersForm', ['model' => $model]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * 购物车更新数量
     * @param $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/shop-cart/shop-cart', 'id' => $model->id]);

        }

        return $this->redirect(['/shop-cart/shop-cart', 'id' => $model->id]);
    }


    /**
     * @param $id
     * @return ShopCart|null
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        if (($model = ShopCart::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('不存在');
    }

    /**
     * @param $id
     * @return Pets
     * @throws NotFoundHttpException
     */
    public function findModelPet($id)
    {
        if (($model = Pets::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('不存在');
    }
}
