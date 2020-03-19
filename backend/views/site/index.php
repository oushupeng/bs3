<?php

/* @var $this yii\web\View */

$this->title = '宠物猫后台管理系统';
$username = Yii::$app->user->identity->username;
$head = Yii::$app->user->identity->head;

?>
<div class="site-index">

    <div class="jumbotron">
        <p><img src="<?= $head ?>" alt="..." class="img-circle" style="height: 200px;"></p>

        <h1><?= $username ?></h1>


        <p class="lead">欢迎来到宠物猫后台管理系统</p>
        

    </div>
</div>
