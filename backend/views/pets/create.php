<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pets */

$this->title = '新增宠物';
$this->params['breadcrumbs'][] = ['label' => '宠物猫管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pets-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

