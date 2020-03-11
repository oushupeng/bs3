<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>
<!---->
<!--    --><?//= $form->field($model, 'username') ?>
<!---->
<!--    --><?//= $form->field($model, 'auth_key') ?>
<!---->
<!--    --><?//= $form->field($model, 'password_hash') ?>
<!---->
<!--    --><?//= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'head') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'last_login_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'verification_token') ?>


    <div class="col-md-3">
        <?= $form->field($model, 'username')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘用户名’关键字']) ?>
    </div>
    <div class="col-md-3">
        <?php echo $form->field($model, 'email')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘邮箱’关键字']) ?>
    </div>
    <div class="col-md-3">
        <?php echo $form->field($model, 'status')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘账号状态’关键字']) ?>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
