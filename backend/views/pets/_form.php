<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pets */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pets-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'pets_id')->textInput(['maxlength' => true])->label('宠物编号')?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('名称') ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true])->label('类别') ?>

    <?= $form->field($model, 'price')->textInput()->label('价格') ?>

    <?= $form->field($model, 'stock')->textInput()->label('库存') ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 9])->label('简介') ?>

    <?= $form->field($model, 'imageFile')->fileInput(['onchange' => 'xmTanUploadImg(this)'])->label('上传图片') ?>

    <?= Html::img('',['id' => 'input-id', 'height' => '200'])?>

    <p></p>
    <p></p>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function xmTanUploadImg(obj) {
        var file = obj.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (e) {    //成功读取文件
            var img = document.getElementById("input-id");
            img.src = e.target.result;   //或 img.src = this.result / e.target == this
        };
    }
</script>
