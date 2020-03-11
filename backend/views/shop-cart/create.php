<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ShopCart */

$this->title = '添加购物车';
$this->params['breadcrumbs'][] = ['购物车管理' => 'Shop Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-cart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
