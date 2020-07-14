<?php


namespace frontend\controllers;


use backend\models\Pets;
use backend\models\SerachPets;
use backend\models\ShopCart;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PetsController extends Controller
{

    /**
     * 类别
     * @return string
     */
    public function actionCategory()
    {

        $query = Pets::find();
        $model = $query->where(['>', 'stock', '0'])->andWhere(['deleted_at' => 0])->all();
        $model1 = $query->select('category')->where(['>', 'stock', '0'])->all();

        $searchModel = new SerachPets();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('category', ['model' => $model, 'model1' => $model1, 'dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    /**
     * 详情
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDetails($id)
    {
        $model = $this->findeModel($id);
        return $this->render('details', ['model' => $model]);
    }

    /**
     * 加入购物车
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $url = 'http://localhost/bs3/frontend/web/index.php?r=site/login';
        if (Yii::$app->user->isGuest) {
//            echo "<script> alert('请先登录');parent.location.href='$url'; </script>";
            Yii::$app->getSession()->setFlash('error', '请先登录');
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);

            return $this->goBack();
        } else {
            $model = new ShopCart();
            $model['created_at'] = time();
            $username = Yii::$app->user->identity->username;
            $id = Yii::$app->user->identity->id;
            $model->created_by = $username;
            $model->user_name = $username;
            $model->user_id = $id;

            $model->pets_num = 1;


            $stock = $_POST['stock'];
            if ($stock === '0')
            {
                Yii::$app->getSession()->setFlash('error', '对不起，该商品库存不足，不能加入购物车');
                Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
                return $this->goBack();
            }

            //获取id
            $aa = $_POST['id'];
            $query = ShopCart::find()->where(['pets_id' => $aa])->andWhere(['created_by' => $username])->one();
            if (!$query) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    Yii::$app->getSession()->setFlash('success', '加入购物车成功');
                    return $this->redirect(['pets/details', 'id' => $model->pets_id]);
                }

            } else {
                $query->updateCounters(['pets_num' => 1]);
                Yii::$app->getSession()->setFlash('success', '已经存在购物车中了');
                return $this->redirect(['pets/details', 'id' => $query->pets_id]);
            }

        }
    }

    public function actionCreate2()
    {

        if (Yii::$app->user->isGuest) {
            Yii::$app->getSession()->setFlash('error', '请先登录');
            Yii::$app->user->setReturnUrl(Yii::$app->request->referrer);
            return $this->goBack();

        } else {
            $model = new ShopCart();
            $model['created_at'] = time();
            $username = Yii::$app->user->identity->username;
            $id = Yii::$app->user->identity->id;
            $model->created_by = $username;
            $model->user_name = $username;
            $model->user_id = $id;
            $model->pets_num = 1;

            //获取id
            $aa = $_POST['id'];
            $query = ShopCart::find()->where(['pets_id' => $aa])->andWhere(['created_by' => $username])->one();

            if (!$query) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    Yii::$app->getSession()->setFlash('success', '加入购物车成功');
                    return $this->redirect(['pets/ranking']);
                }

            } else {
                $query->updateCounters(['pets_num' => 1]);
                Yii::$app->getSession()->setFlash('success', '已经存在购物车中了');
                return $this->redirect(['pets/ranking']);
            }

        }
    }


    /**
     * 搜索
     * @return string
     */
    public function actionSearch()
    {
        $query = Pets::find();

        //获取前端传来的name和category
//        $name = $_GET['name'];
        $category = $_GET['category'];

        $category2 = $_GET['category2'];

        $model = $query->andFilterWhere(['like', 'category', $category2])->andFilterWhere(['category' => $category])->all();

        return $this->render('searchResult', ['model' => $model]);
    }

    /**
     * 排行榜
     * @return string
     */
    public function actionRanking()
    {
        $query = Pets::find();
        $model = $query->limit(10)->orderBy(['sales' => SORT_DESC])->all();
        $modell = $query->limit(10)->orderBy(['sales' => SORT_DESC])->all();
        return $this->render('ranking', ['model' => $model, 'modell' => $modell]);
    }

    /**
     * 新品上架
     * @return string
     */
    public function actionNewsUpperShelf()
    {
        $query = Pets::find();
        $model = $query->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->limit(12)->all();
        return $this->render('newsUpperShelf', ['model' => $model]);
    }


    /**
     * 查询id
     * @param $id
     * @return Pets|null
     * @throws NotFoundHttpException
     */
    private function findeModel($id)
    {

        if (($model = Pets::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
