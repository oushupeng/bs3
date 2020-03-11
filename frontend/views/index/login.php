<?php declare(strict_types=1);

use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '登录页面';

?>


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
                <h4 class="modal-title">登录页面</h4>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <p>请输入用户名、密码和验证码！</p>
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
<!--                <div class="form-group row">-->
<!--                    <div class="col-md-10 offset-md-2">-->
<!--                        <div class="form-check">-->
<!--                            <input type="checkbox" name="remember" id="remember" class="form-check-input">-->
<!--                            <label for="remember" class="form-check-label">记住我</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ])->label('验证码') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 offset-md-1">
                        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        <?= Html::a('注册', ['/site/signup'], ['class' => 'btn btn-primary']) ?>
                        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                        <?= Html::a('忘记密码', ['site/request-password-reset'], ['class' => 'btn btn-primary']) ?>

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
