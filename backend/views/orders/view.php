<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = 'id：'.$model->id;
$this->params['breadcrumbs'][] = ['label' => '订单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

<!--    <p>-->
<!--        --><?//= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('删除', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'order_id',
            'amount',
            'consignee',
            'telephone',
            'address',
            'payment',
            'delivery',
            'status',
            'express_id',
            'courier_number',
            'user_id',
            'user_name',
            'created_time:datetime',
            'created_by',
            'created_at',
            'deleted_at',
        ],
    ]) ?>

</div>
