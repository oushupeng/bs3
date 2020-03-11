<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ShopCart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pets_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pets_num')->textInput() ?>

    <?= $form->field($model, 'pets_price')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'deleted_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
