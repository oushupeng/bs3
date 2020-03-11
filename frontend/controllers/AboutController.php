<?php


namespace frontend\controllers;


use yii\web\Controller;

class AboutController extends Controller
{

    /**
     * 关于我们
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

}
