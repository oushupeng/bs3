<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
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

<div class="container-fluid ph1">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class=" title" style="">
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">用户名</label>
                            <input type="text" class="form-control" id="inputAddress"  value="<?= $username?>" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">邮箱</label>
                            <input type="text" class="form-control" id="inputAddress2"  value="<?= $email?>" disabled="disabled">
                        </div>
                        修改密码？<?= Html::a('点击这', ['site/update-password']) ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
