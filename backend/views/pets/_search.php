<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SerachPets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-search">
    <!--    <div class="col-md-1">-->
    <!--        --><? //= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    <!--    </div>-->
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!--    <div class="col-md-2">-->
    <!--        --><? //= $form->field($model, 'pets_id')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘宠物编号’关键字']) ?>
    <!--    </div>-->
    <!--    <div class="col-md-2">-->
    <!--        --><?php //echo $form->field($model, 'name')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘宠物名称’关键字']) ?>
    <!--    </div>-->
    <!--    <div class="col-md-2">-->
    <!--        --><?php //echo $form->field($model, 'category')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘类别’关键字']) ?>
    <!--    </div>-->
    <!--    <div class="col-md-2">-->
    <!--        --><?php //echo $form->field($model, 'created_by')->label(false)->textInput(['class' => 'form-control ', 'style' => 'display: inline;', 'placeholder' => '请输出‘创建人’关键字']) ?>
    <!--    </div>-->
    <!--    <div class="col-md-3">-->
    <!--        <div class="form-group">-->
    <!--            --><? //= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
    <!--            --><? //= Html::resetButton('重置', ['class' => 'btn btn-outline-secondary']) ?>
    <!--        </div>-->
    <!--    </div>-->

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
                    <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('批量删除', 'javascript:void(0);', ['class' => 'btn btn-danger gridview']) ?>
                    <?= Html::a('
<svg t="1585642754327" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="867" width="16" height="16">
<path d="M385 156c-14.912 0-27-12.088-27-27L358 63c-0.004-5.065 1.164-22.021 15.808-37.166C388.458 10.683 410.899 3 440.507 3l152.162 0 1.179 0.104c1.565 0.138 15.714 1.511 30.324 7.289C649.483 20.402 664 39.212 664 62l0 66c0 14.912-12.088 27-27 27s-27-12.088-27-27L610 63.531c-3.27-2.581-12.425-5.604-19.969-6.531L440.507 57c-20.752 0-27.526 5.375-28.507 7.189L412 129C412 143.912 399.912 156 385 156z" p-id="868"></path>
<path d="M990 263 35 263c-17.673 0-32-14.327-32-32s14.327-32 32-32l955 0c17.673 0 32 14.327 32 32S1007.673 263 990 263z" p-id="869"></path>
<path d="M790 1024 230.048 1024l-1.938-0.237c-3.197-0.392-20.021-2.881-37.32-13.472C165.131 994.581 151 968.907 151 938L151 246c0-17.673 14.327-32 32-32s32 14.327 32 32l0 692c0 10.111 3.92 14.161 8.157 17.031 4.123 2.793 8.994 4.331 11.713 4.969L790 960c8.359 0 14.558-2.268 18.947-6.932 0.777-0.826 1.479-1.724 2.053-2.523L811 235c0-17.673 14.327-32 32-32s32 14.327 32 32l0 728.048-1.554 4.803c-0.829 2.562-5.588 16.006-17.894 29.081C843.931 1009.28 823.123 1024 790 1024z" p-id="870"></path>
<path d="M384 841c-14.912 0-27-12.088-27-27L357 414c0-14.912 12.088-27 27-27s27 12.088 27 27l0 400C411 828.912 398.912 841 384 841z" p-id="871"></path>
<path d="M639 841c-14.912 0-27-12.088-27-27L612 414c0-14.912 12.088-27 27-27s27 12.088 27 27l0 400C666 828.912 653.912 841 639 841z" p-id="872"></path>
</svg>', ['dustbin'],[
                        'class' => 'btn btn-danger',
                        'title' => Yii::t('yii', '回收站'),
                    ]) ?>


                </th>
            </tr>
            </thead>
        </table>
    </div>

    <?php ActiveForm::end(); ?>


</div>
