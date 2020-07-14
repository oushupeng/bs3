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
use yii\web\UploadedFile;

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

        $model = Pets::find()->where(['deleted_at' => 0])->orderBy('rand()')->limit(3)->all();
        $model1 = Pets::find()->where(['deleted_at' => 0])->orderBy(['sales' => SORT_DESC])->limit(8)->all();
        $model2 = Pets::find()->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
        $model3 = Notices::find()->where(['deleted_at' => 0])->orderBy(['created_at' => SORT_DESC])->limit(3)->all();
        $model4 = Pets::find()->where(['deleted_at' => 0])->limit(10)->all();

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

    public function actionUp($id)
    {
        $model = User::findOne($id);
        return $this->render('up', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = User::findOne($id);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->head = UploadedFile::getInstance($model, 'head');
            $file_path = $model->upload();

            if ($file_path !== false) {
                $model->head = '/bs3/frontend/web/' . $file_path;
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash('success', '上传头像成功');
                    return $this->redirect(['personal', 'id' => $model->id]);
                }
            }
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


}
