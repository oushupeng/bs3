<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachPets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['dustbin'],
        'method' => 'get',
    ]); ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="info">
                <th scope="col">
                    宠物编号：
                    <?= Html::textInput('SerachPets[pets_id]', '', ['class' => 'form-control ', 'style' => 'width:70%;display: inline;']) ?>
                </th>
                <th scope="col">
                    类别：
                    <?= Html::textInput('SerachPets[category]', '', ['class' => 'form-control ', 'style' => 'width:70%;display: inline;']) ?>
                </th>
                <th scope="col">
                    创建人：
                    <?= Html::textInput('SerachPets[created_by]', '', ['class' => 'form-control ', 'style' => 'width:70%;display: inline;']) ?>
                </th>
                <th scope="col">
                    <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
                    <?= Html::a('批量删除', 'javascript:void(0);', ['class' => 'btn btn-danger gridview']) ?>
                    <?= Html::a('清空', ['clear'], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => '您确定要清空回收站吗，不可恢复哦，请谨慎操作?',
                        ],
                    ]) ?>
                    <?= Html::a('批量恢复', ['dustbin'], ['class' => 'btn btn-success gridview2']) ?>


                </th>
            </tr>
            </thead>
        </table>
    </div>

    <?php ActiveForm::end(); ?>


</div>
