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
                <h4 class="modal-title">验证电子邮件</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>


                <p>请填写你的电子邮件。将在那里发送验证电子邮件。</p>
                <div class="form-group row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label(false) ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 offset-md-2">
                        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                        <?= Html::a('返回', ['/site/login'], ['class' => 'btn btn-primary']) ?>

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
