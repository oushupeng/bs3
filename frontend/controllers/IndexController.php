<?php


namespace frontend\controllers;


use backend\models\Notices;
use backend\models\Orders;
use backend\models\OrdersDetails;
use backend\models\Pets;
use backend\models\SerachPets;
use backend\models\ShopCart;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\web\Controller;

class IndexController extends Controller
{

    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {

//        $model = new LoginForm();
//        $searchModel = new SerachPets();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = Pets::find()->limit(3)->all();
        $model1 = Pets::find()->orderBy(['sales' => SORT_DESC])->limit(8)->all();
        $model2 = Pets::find()->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        $model3 = Notices::find()->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        $model4 = Pets::find()->limit(26)->all();

        return $this->render('index',[
                'model' => $model,
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
            ]
        );
    }

    public function actionPersonal()
    {

        $model = new LoginForm();

        return $this->render('personal',['model' => $model]);
    }


}
