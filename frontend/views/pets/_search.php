<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachPet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pet-search">


    <?php $form = ActiveForm::begin([
        'action' => ['result'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category') ?>

<!--    --><?//= $form->field($model, 'price') ?>
<!---->
<!--    --><?//= $form->field($model, 'sales') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'deleted_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
