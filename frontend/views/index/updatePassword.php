<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$username = Yii::$app->user->identity->username;
$email = Yii::$app->user->identity->email;

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<div class="">

    <div id="mycarousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="">
                    <img class="d-block w-100 picture" src="/bs3/frontend/views/public/image/c9.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>

<div class="container-fluid ph1">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class=" title" style="">
                    <?php $form = ActiveForm::begin() ?>

                    <div class="form-group">
                        <label for="inputAddress">旧密码</label>
                        <?= $form->field($model, 'oldPassword')->passwordInput()->label('密码')->label(false) ?>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">新密码</label>
                        <?= $form->field($model, 'newPassword')->passwordInput()->label('密码')->label(false) ?>

                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">确认新密码</label>
                        <?= $form->field($model, 'repeatNewPassword')->passwordInput()->label('密码')->label(false) ?>

                    </div>

                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('重置', ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('返回', ['/index/personal'], ['class' => 'btn btn-primary']) ?>

                    <?php ActiveForm::end() ?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
