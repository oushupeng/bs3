<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachPets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-search">
    <div class="col-md-1">
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-md-2">
        <?= $form->field($model, 'id')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘宠物编号’关键字']) ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'name')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘宠物名称’关键字']) ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'category')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘类别’关键字']) ?>
    </div>
    <div class="col-md-2">
        <?php echo $form->field($model, 'created_by')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘创建人’关键字']) ?>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
