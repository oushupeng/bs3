<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;

$username = Yii::$app->user->identity->username;
$email = Yii::$app->user->identity->email;
$head = Yii::$app->user->identity->head;
$id = Yii::$app->user->identity->id;

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
                    <img class="d-block w-100 picture" src="/bs3/frontend/views/public/image/grzx.png" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>个人中心</h5>
                        <p>可以上传头像，查看购物车，查看订单，修改密码.</p>
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
                        <form>
                            <div class="form-group">
                                <label for="inputAddress">头像</label><br>
                                <?= Html::img($head, ['class' => 'circle','height' => '200', 'alt' => '头像','style' => 'border-radius:50%'])?>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">用户名</label>
                                <input type="text" class="form-control" id="inputAddress" value="<?= $username ?>"
                                       disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">邮箱</label>
                                <input type="text" class="form-control" id="inputAddress2" value="<?= $email ?>"
                                       disabled="disabled">
                            </div>
                            <?= Html::a('上传头像', ['up', 'id' => $id]) ?>
                            <br>
                            <?= Html::a('我的购物车', ['/shop-cart/shop-cart']) ?>
                            <br>
                            <?= Html::a('我的订单', ['/orders/orders']) ?>
                            <br>
                            修改密码？<?= Html::a('点击这', ['site/update-password']) ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
