<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$username = Yii::$app->user->identity->username;
$date = Yii::$app->user->identity->last_login_time;
$head = Yii::$app->user->identity->head;
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini" style="font-family: 华文行楷;">CAT</span><span class="logo-lg">' .'<h3 style="font-family: 华文行楷;">CWCAT后台管理</h3>' .'</span>', Yii::$app->homeUrl, ['class' => 'logo', 'style' => 'background:#97cbff']) ?>

    <nav class="navbar navbar-static-top" role="navigation" style="background-color: #acd6ff">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $head ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">欢迎您：<?= $username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?= $head ?>" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= $username ?>
                                <small>最近登录时间：<?= date('Y-m-d H:i:s',$date)?></small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    '退出',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
