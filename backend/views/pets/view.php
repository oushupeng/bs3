<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pets */

$this->title = '宠物编号：'.$model->pets_id;
$this->params['breadcrumbs'][] = ['label' => '宠物猫管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pets-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确实要删除此数据吗？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pets_id',
            'name',
            'category',
            'price',
            'stock',
            'sales',
            'content',
            'created_by',
            'created_at:datetime',
            [
                'attribute'=>'图片',
                'format' => ['raw',],
                'value' => function($model){
                    return Html::img($model->picture,['class' => '','height' => '200']);
                }
            ],
        ],
    ]) ?>

</div>
