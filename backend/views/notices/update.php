<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notices */

$this->title = '更新公告: ';
$this->params['breadcrumbs'][] = ['label' => '公告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '标题：'.$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="notices-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
