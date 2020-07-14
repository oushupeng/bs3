<?php


namespace frontend\controllers;


use backend\models\Pets;
use backend\models\ShopCart;
use Throwable;
use Yii;
use yii\data\Pagination;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ShopCartController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['shop-cart','create', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'actions' => ['shop-cart', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['delete', 'error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * 购物车主页
     * @return string
     */
    public function actionShopCart()
    {
        $username = Yii::$app->user->identity->username;

        $query = ShopCart::find();
        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query
                ->innerJoinWith('pet')
                ->where(['shop_cart.deleted_at' => 0])
                ->andWhere(['!=', 'stock', '0'])
                ->andWhere(['user_name' => $username])
                ->count(),
        ]);

//        $model = ShopCart::find()->where(['user_name' => $username])->orderBy(['created_at' => SORT_DESC])->all();
        $model = ShopCart::find()
            ->innerJoinWith(['pet'])
            ->where(['user_name' => $username])
            ->andWhere(['and', ['!=', 'stock', 0], ['pets.deleted_at' => 0]])
            ->orderBy(['created_at' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $model1 = ShopCart::find()
            ->innerJoinWith(['pet'])
            ->where(['user_name' => $username])
            ->andWhere(['or', ['stock' => 0],['!=', 'pets.deleted_at' , 0]])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        $model2 = ShopCart::find()
            ->innerJoinWith(['pet'])
            ->where(['user_name' => $username])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();

        return $this->render('shopCart', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
            'pagination' => $pagination,
        ]);
    }

    /**
     * 删除购物车
     * @param $id
     * @return int
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionDelete()
    {
//        $this->findModel($id)->delete();
//        Yii::$app->getSession()->setFlash('success', '删除成功');
//        return $this->redirect(['shop-cart']);

        return ShopCart::deleteAll(['in', 'id', Yii::$app->request->post('arr_id')]);
    }

    /**
     * 清空购物车
     * @return Response
     */
    public function actionClear()
    {
        $username = Yii::$app->user->identity->username;
        ShopCart::deleteAll(['created_by' => $username]);
        Yii::$app->getSession()->setFlash('success', ' 清空购物车完成');
        return $this->redirect(['shop-cart']);
    }

    /**
     * 清空失效宝贝
     * @return Response
     */
    public function actionClear2()
    {
        $username = Yii::$app->user->identity->username;
        $clear2 = ShopCart::find()
            ->select('shop_cart.pets_id')
            ->innerJoinWith(['pet'])
            ->where(['shop_cart.created_by' => $username])
            ->andWhere(['stock' => 0])
            ->all();
        ShopCart::deleteAll(['pets_id' => $clear2]);
        Yii::$app->getSession()->setFlash('success', '清空失效商品完成');
        return $this->redirect(['shop-cart']);
    }


    /**
     * 批量删除
     * @return int
     */
    public function actionDeleteAll()
    {
        return ShopCart::deleteAll(['in', 'id', Yii::$app->request->post('arr_id')]);
    }

    /**
     * 总价结算
     * @return string
     */
    public function actionSettlement()
    {

        //获取单个总价
        $sum1 = $_POST['sum1'];
        //获取总价
        $sum = $_POST['sum'];
        //获取id
        $shopId = $_POST['shopId'];
        $aa = explode(',', $shopId);
        $query = ShopCart::find();

        //判断是否失效商品
        $qq = $query->select('*')->innerJoinWith('pet')->where(['shop_cart.id' => $aa])->andWhere(['stock' => 0])->all();
        if ($qq) {
            Yii::$app->getSession()->setFlash('error', '对不起，您选择的商品里面有失效的商品，请重新选择要购买的商品!!');
            return $this->redirect(['shop-cart']);
        }
        $model = ShopCart::find()
            ->innerJoinWith('pet')
            ->where(['shop_cart.id' => $aa])
            ->orderBy(['shop_cart.created_at' => SORT_DESC])
            ->all();

        return $this->render('ordersForm', [
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
        if ($model->stock === 0) {
            Yii::$app->getSession()->setFlash('error', '对不起，该商品库存不足，不能购买');
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
            return $this->goBack();
        }
        return $this->render('ordersForm2', ['model' => $model]);
    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        if ($model) {

            $aa = $this->findModelPet($model->pets_id);
            $bb = $_POST['ShopCart']['pets_num'];
//            $model->pets_num = (int)$bb;

            if ((int)$bb >= $aa->stock) {
                $model->pets_num = $aa->stock;
                if (Yii::$app->request->post() && $model->save()) {
                    return $this->redirect(['/shop-cart/shop-cart', 'id' => $model->id]);
                }
            } else {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['/shop-cart/shop-cart', 'id' => $model->id]);

                }
                return $this->redirect(['/shop-cart/shop-cart', 'id' => $model->id]);
            }
        }
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
