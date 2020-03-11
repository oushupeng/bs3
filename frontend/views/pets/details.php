<?php declare(strict_types=1); ?>
<?php

use backend\models\Pets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

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
                    <img class="d-block w-100 picture" src="../views/public/image/c9.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-10">
            <div class="row" style="border: 1px solid #efefef;margin-top: 10px;">
                <div class="col-md-6" style="background-color: ;">
                    <img src="<?= $model->picture ?>" class="img-fluid detailsPicture" alt="Responsive image">
                </div>
                <div class="col-md-6">
                    <div class="detailsTitle" style="">
                        <?php $form = ActiveForm::begin(['action' => ['pets/create'], 'method' => 'post']) ?>

                        <h5>
                            <?= $model->name ?>
                        </h5>
                        <p></p>
                        <table class="table table-striped ">
                            <tbody>
                            <tr>
                                <td>商品id</td>
                                <td>
                                    <?= Html::textInput('id', $model->id, ['class' => 'hidden']) ?>

                                    <?= Html::textInput('ShopCart[pets_id]', $model->id, ['class' => 'details hidden']) ?>

                                    <?= $model->id ?>
                                </td>
                            </tr>
                            <!--                            <tr>-->
                            <!--                                <td>商品名称</td>-->
                            <!--                                <td>-->
                            <!--                                    --><? //= Html::textInput('ShopCart[pets_name]', $model->name, ['class' => 'hidden']) ?>
                            <!--                                    --><? //= $model->name ?>
                            <!--                                </td>-->
                            <!--                            </tr>-->
                            <tr>
                                <td>商品类别</td>
                                <td>
                                    <?= $model->category ?>
                                </td>
                            </tr>
                            <tr>
                                <td>商品价格</td>
                                <td>
                                    <?= Html::textInput('ShopCart[pets_price]', $model->price, ['class' => 'details hidden']) ?>
                                    <?= $model->price ?>
                                </td>
                            </tr>
                            <tr>
                                <td>销售数量</td>
                                <td>
                                    <?= $model->sales ?>
                                </td>
                            </tr>
                            <tr>
                                <td>剩余库存</td>
                                <td>
                                    <?= $model->sales ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>


                        <?= Html::submitButton('加入购物车', ['class' => 'btn btn-primary', 'name' => 'btn btn-primary ']) ?>
                        &nbsp;&nbsp;

                        <?php if (Yii::$app->user->isGuest) { ?>

                        <? } else { ?>
                            <?= Html::a('立即购买', ['shop-cart/details2', 'id' => $model->id], ['class' => 'btn btn-primary ']) ?>

                        <? } ?>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>

            <div class="row" style="border: 1px solid #efefef;">
                <div class="col-md-12" style="">
                    <div>
                        <div class="col-md-12">
                            <div class="title1">
                                <h6>基本信息</h6>
                                <p>人气热买！！！</p>
                                <hr/>
                                <table class="table table-borderless" style="font-size: 15px;">
                                    <thead>
                                    <tr>
                                        <td>宠物毛长：First Name</td>
                                        <td>品种：Username</td>
                                        <td>性别：Jacob</td>
                                        <td>年龄：@fat</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>驱虫情况：Larry</td>
                                        <td>产地：twitter</td>
                                        <td>剩余数量：Mark</td>
                                        <td>销售数量：mdo</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <p>最新公告</p>
                                <hr/>
                                <p class="suojin">
                                    所售猫咪均为自家猫舍繁殖，保证猫咪健康 血统纯正。出售的猫咪均已注射过疫苗，驱虫，请放心购买，我们一定做到让您买的放心，养得开心！！</p>

                                <p class="suojin">
                                    售后服务保障与销售保证：
                                </p>

                                <p class="suojin">1.可以与您签订活体销售协议来保证购买宝宝的健康和纯种。</p>

                                <p class="suojin">2.出售的每只宝宝都有自己的健康证书，内容包括：生日、疫苗注射情况。</p>

                                <p class="suojin">3.24小时开通售后服务热线以解答您饲养中的不懂难题。</p>

                                <p class="suojin">4.售出7日内发生任何疫苗范围内的传染性疾病可为您更换，保证宝宝在您身边健康快乐的成长。 </p>


                                <div style="margin: 40px;">
                                    <img src="<?= $model->picture ?>" class="img-fluid" style="height: 500px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-2" style="border: 1px solid #efefef;margin-top: 10px;">
            <div class="col-md-12">
                <div class="title1" style="">
                    <h4>掌柜推荐</h4>
                    <p>人气热买！！！</p>
                </div>
            </div>

            <div class="row">
                <?php
                $aa = Pets::find()->where(['>', 'stock', '0'])->limit(8)->all();
                ?>
                <?php foreach ($aa as $m) : ?>
                    <div class="col-md-12 col-12">
                        <div class="card mb-3">
                            <a href="<?= Url::to(['/pets/details', 'id' => $m->id])?>">
                                <img src="<?= $m['picture'] ?>" alt="" class="card-img-top">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?= $m['category']?></h5>
                                    <p>&nbsp; </p>
                                </div>
                            </a>

                            <div class="card-body">
<!--                                <h5 class="card-title">￥--><?//= $m['price'] ?><!--</h5>-->
                                <p class="card-text kapian">
                                    <small>
                                        <?= Html::a($m['name'], ['/pets/details', 'id' => $m->id]) ?>
                                    </small>
                                </p>
<!--                                <p class="card-text float-right">-->
<!--                                    <small class="text-muted">销售数量：--><?//= $m['sales'] ?><!--</small>-->
<!--                                </p>-->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
</div>
<div class="container-fluid ph1">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <h2>关于我们</h2>
                    <p>我们提供早餐、午餐、晚餐、宵夜</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center more">
            <a href="#" class="btn btn-primary">更多</a>
        </div>
    </div>
</div>
</body>

</html>
