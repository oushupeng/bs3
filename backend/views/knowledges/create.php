<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Knowledges */

$this->title = '添加资讯';
$this->params['breadcrumbs'][] = ['label' => '宠物猫知识', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="knowledges-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
