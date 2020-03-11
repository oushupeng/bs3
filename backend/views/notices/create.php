<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Notices */

$this->title = '添加公告';
$this->params['breadcrumbs'][] = ['label' => '公告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notices-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
