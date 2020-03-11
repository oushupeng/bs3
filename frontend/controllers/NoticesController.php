<?php


namespace frontend\controllers;


use backend\models\Notices;
use yii\web\Controller;

class NoticesController extends Controller
{
    public function actionNotices()
    {
        $model = Notices::find()->all();
        return $this->render('notices',['model' => $model]);
    }

}
