<?php


namespace backend\controllers;


use Yii;
use yii\base\Exception;
use yii\web\Controller;

class RbacController extends Controller
{

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //添加/*的权限
        $index = $auth->createPermission('/*');
        $index->description = '超级管理员';
        $auth->add($index);

        //创建一个角色，超级管理员
        $manage = $auth->createRole('超级管理员');
        $auth->add($manage);
        $auth->addChild($manage,$index);

        //为id为1的用户，赋予超级管理员角色
        $auth->assign($manage,1);
    }

}
