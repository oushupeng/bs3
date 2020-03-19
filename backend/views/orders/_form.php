<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'order_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'amount')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'telephone')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'payment')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'delivery')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'express_id')->textInput() ?>

    <?= $form->field($model, 'courier_number')->textInput() ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'created_time')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
