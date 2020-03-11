<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdersDetails */

$this->title = 'Update orders Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'orders Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
