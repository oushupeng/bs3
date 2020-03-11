<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachOrders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>
<!---->
<!--    --><?//= $form->field($model, 'order_id') ?>
<!---->
<!--    --><?//= $form->field($model, 'amount') ?>
<!---->
<!--    --><?//= $form->field($model, 'consignee') ?>
<!---->
<!--    --><?//= $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'delivery') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'express_id') ?>

    <?php // echo $form->field($model, 'courier_number') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>


    <div class="col-md-2">
        <?= $form->field($model, 'order_id')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘订单号’关键字']) ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'status')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘订单状态’关键字']) ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'created_by')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘下单用户’关键字']) ?>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
