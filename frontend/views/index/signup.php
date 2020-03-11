<?php declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm; ?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<div class="" id="">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">注册页面</h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(); ?>

                <p>请输入用户名和密码和邮箱进行注册！</p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'username')->textInput()->label('用户名') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'email')->label('邮箱') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 offset-md-2">
                        <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                        <?= Html::a('登录', ['/site/login'], ['class' => 'btn btn-primary']) ?>

                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>
</div>



</body>

</html>
