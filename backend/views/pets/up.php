<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pets */
/* @var $form yii\widgets\ActiveForm */


$this->title = '上传图片';
$this->params['breadcrumbs'][] = ['label' => '宠物猫管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '类别：'.$model->category, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '上传';
?>

<div class="pets-form">

    <?php $form = ActiveForm::begin(['action' => ['update2', 'id' => $model->id], 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput(['onchange' => 'xmTanUploadImg(this)'])->label('上传新图片') ?>

    <?= Html::img($model->picture,['id' => 'input-id', 'height' => '200'])?>


    <p></p>
    <p></p>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

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
