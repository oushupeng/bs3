<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachNotices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notices-search">
    <div class="col-md-2">
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-md-3">
        <?= $form->field($model, 'title')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘标题’关键字进行搜索查询']) ?>
    </div>
    <div class="col-md-3">
        <?php echo $form->field($model, 'created_by')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘创建人’关键字进行搜索查询']) ?>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
