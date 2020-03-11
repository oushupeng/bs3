<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Knowledges */

$this->title = '更新知识';
$this->params['breadcrumbs'][] = ['label' => '宠物猫知识', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '标题：'.$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="knowledges-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
