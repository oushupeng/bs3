<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ShopCart */

$this->title = '用户名：' . $model->created_by;
$this->params['breadcrumbs'][] = ['label' => '购物车管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shop-cart-view">

    <!--    <p>-->
    <!--        --><? //= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <!--        --><? //= Html::a('删除', ['delete', 'id' => $model->id], [
    //            'class' => 'btn btn-danger',
    //            'data' => [
    //                'confirm' => '确实要删除此数据吗？',
    //                'method' => 'post',
    //            ],
    //        ]) ?>
    <!--    </p>-->
    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'pets_id',
//            'user_id',
            'user_name',
            'pets_num',
            'pets_price',
            'created_by',
            'created_at:datetime',
//            'deleted_at',
        ],
    ]) ?>

</div>
