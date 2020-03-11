<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersDetails */

$this->title = 'Create orders Details';
$this->params['breadcrumbs'][] = ['label' => 'orders Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
