<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pets */

$this->title = '更新信息: ' ;
$this->params['breadcrumbs'][] = ['label' => '宠物猫管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '类别：'.$model->category, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="pets-update">

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
