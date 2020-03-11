<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Knowledges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="knowledges-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'knowledges_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 9])->label('内容') ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image') ->fileInput()->label('上传图片') ?>


<!--    --><?//= $form->field($model, 'views')->textInput() ?>
<!---->
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
