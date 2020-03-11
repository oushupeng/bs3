<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ShopCart */

$this->title = '更新购物车: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '购物车管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'id'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="shop-cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
