<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Knowledges */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '宠物猫知识管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '标题：'.$this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="knowledges-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('返回', ['index'],['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确实要删除此数据吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('标题') ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 9])->label('内容') ?>
    <?= $form->field($model, 'views')->textInput() ?>
    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>
    <p><label>创建时间</label><?= Html::textInput('', date('Y-m-d H:i:s', $model->created_at), ['class' => 'form-control']) ?></p>
    <p><label>图片</label><?= Html::img($model->image, ['class' => 'img-responsive', 'style' => 'height:300px;']) ?></p>
    <?php ActiveForm::end(); ?>

</div>
