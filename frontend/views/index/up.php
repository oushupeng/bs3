<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$username = Yii::$app->user->identity->username;
$email = Yii::$app->user->identity->email;

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<div class="">

    <div id="mycarousel" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="">
                    <img class="d-block w-100 picture" src="/bs3/frontend/views/public/image/c9.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>

<div class="container-fluid ph1 pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class=" title" style="">
<!--                        --><?php //$form = ActiveForm::begin() ?>
                        <?php $form = ActiveForm::begin(['action' => ['update', 'id' => $model->id], 'method' => 'post', 'options' => ['enctype' => 'multipart/form-data']]); ?>


                        <div class="form-group">
                            <label for="inputAddress">上传头像</label>
                            <?= $form->field($model, 'head')->fileInput(['onchange' => 'xmTanUploadImg(this)'])->label(false) ?>

                            <?= Html::img($model->head,['class' => 'circle','id' => 'input-id', 'height' => '200', 'style' => 'border-radius:50%', 'alt' => '头像'])?>

                        </div>


                        <?= Html::submitButton('上传', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('返回', ['/index/personal'], ['class' => 'btn btn-primary']) ?>

                        <?php ActiveForm::end() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
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
