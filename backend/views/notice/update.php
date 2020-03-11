<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notice */

$this->title = 'Update Notice: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'notices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
