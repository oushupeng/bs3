<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = '订单编号：' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => '订单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <!--    <p>-->
    <!--        --><? //= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <!--        --><? //= Html::a('删除', ['delete', 'id' => $model->id], [
    //            'class' => 'btn btn-danger',
    //            'data' => [
    //                'confirm' => 'Are you sure you want to delete this item?',
    //                'method' => 'post',
    //            ],
    //        ]) ?>
    <!--    </p>-->

    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>
        <?php if ($model->status === '代发货') {?>
            <?= Html::a('填写快递单号', ['index'], ['class' => 'btn btn-primary']) ?>
        <?php }?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'order_id',
            'consignee',
            'telephone',
            'address',
            'remarks',
            'payment',
            'delivery',
//            'express_id',
            'courier_number',
//            'user_name',
            'created_at:datetime',
            'created_by',
            [
                'attribute' => '删除时间',
                'format' => ['raw',],
                'value' => static function ($model) {
                    if ($model->deleted_at !== 0) {
                        return date('Y-m-d H:i:s', $model->deleted_at);
                    }
                    return 0;
                }
            ],
        ],
    ]) ?>



    <table class="table table-hover">
        <thead>
        <tr><th colspan="5" class="text-center">商品详情信息</th></tr>
        <tr>
            <th scope="col">宠物猫类别</th>
            <th scope="col">单价</th>
            <th scope="col">数量</th>
            <th scope="col">总价</th>
            <th scope="col">状态</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $pet->category ?></td>
            <td><?= $pet->price ?></td>
            <td><?= $orderDetails->pets_num ?></td>
            <td><?= $model->amount ?></td>
            <td><?= $model->status ?></td>
        </tr>
        </tbody>
    </table>
</div>
