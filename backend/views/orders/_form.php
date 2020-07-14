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

    <label>快递单号</label>
    <input placeholder="请填写订单号"  class="form-control" name="Orders[courier_number]" id="courier_number">
<!--    --><?//= $form->field($model, 'courier_number')->textInput(['placeholder' => '订单号', 'id' => 'courier_number']) ?>

    <p></p>
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
        <?= Html::submitButton('提交', ['class' => 'btn btn-success abc']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="/bs3/frontend/web/js/jquery-3.3.1.min.js"></script>
<script>
    $(".abc").on('click', function () {
        var courier = document.getElementById('courier_number').value;
        console.log(courier);
        if (courier === "0" || courier === "") {
            alert('请输入快递订单号');
            return false;
        }
        return true;
    })
</script>
