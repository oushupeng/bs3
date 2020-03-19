<?php declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$num = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<div class="container-fluid aa pt">

    <div class="row">

        <div class="col-md-12">
            <div class="text-center title" style="">
                <h2>宠物销售排行榜</h2>
                <p>宠物猫销售量的排行榜</p>
            </div>
        </div>

        <div class="col-md-3 ee"
             style="font-family: '华文细黑',sans-serif;border:5px #efefef solid;border-radius: 20px;margin-left: 3%;margin-right: 2%">

            <div class="">
                <p></p>
                <div class="nav flex-column nav-pills htitle" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <?php foreach ($model as $m) { ?>
                        <a class="nav-link" id="v-pills-bj-tab" data-toggle="pill" href="#<?= $m->category ?>"
                           role="tab" aria-controls="v-pills-bj" aria-selected="false">
                            <?= $num++ ?>、<?= $m->category ?>
                            <span style="float: right">
                                    销售量：<?= $m->sales ?>
                                </span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-8 tab-content" id="v-pills-tabContent"
             style="border:5px #efefef solid;border-radius: 20px;margin-right: 3%;">
            <div class="container">
                <div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade  show active" id="lz" role="tabpanel"
                             aria-labelledby="v-pills-lz-tab">
                            <h4 class="text-center">宠物销售排行榜</h4>
                            <p>美图欣赏</p>
                            <div class="row">

                                <?php foreach ($modell as $m) { ?>

                                    <div class="col-md-4" style="margin-bottom: 25px;">
                                        <img src="<?= $m->picture ?>" alt=""
                                             class="img-thumbnail ">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5><?= $m['category'] ?></h5>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <?php foreach ($model

                                       as $m) { ?>
                            <div class="tab-pane fade" id="<?= $m->category ?>" role="tabpanel"
                                 aria-labelledby="v-pills-bj-tab">

                                <div class="row" style="margin-top: 10px;border-top: 1px solid #efefef;">

                                    <div class="col-md-5">
                                        <img src="<?= $m->picture ?>" class="img-fluid detailsPicture"
                                             alt="Responsive image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="detailsTitle" style="">
                                            <?php $form = ActiveForm::begin(['action' => ['pets/create'], 'method' => 'post']) ?>

                                            <h5>
                                                <?= $m->category ?>
                                            </h5>
                                            <p></p>
                                            <table class="table table-striped ">
                                                <tbody>
                                                <tr>
                                                    <td>宠物猫编号</td>
                                                    <td>
                                                        <?= Html::textInput('id', $m->id, ['class' => 'hidden']) ?>

                                                        <?= Html::textInput('ShopCart[pets_id]', $m->id, ['class' => 'details hidden']) ?>

                                                        <?= $m->id ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>宠物猫类别</td>
                                                    <td>
                                                        <?= $m->category ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>单价</td>
                                                    <td>
                                                        <?= Html::textInput('ShopCart[pets_price]', $m->price, ['class' => 'details hidden']) ?>
                                                        <?= $m->price ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>销售数量</td>
                                                    <td>
                                                        <?= $m->sales ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>剩余库存</td>
                                                    <td>
                                                        <?= $m->stock ?>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>


                                            <?= Html::submitButton('加入购物车', ['class' => 'btn btn-primary']) ?>
                                            &nbsp;&nbsp;

                                            <?php if (Yii::$app->user->isGuest) { ?>

                                            <? } else { ?>
                                                <?= Html::a('立即购买', ['shop-cart/details2', 'id' => $m->id], ['class' => 'btn btn-primary ']) ?>

                                            <? } ?>

                                            <?php ActiveForm::end(); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="border-top: 1px solid #efefef;">
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
                                                            <td>驱虫情况：Larry</td>
                                                            <td>性别：Jacob</td>
                                                            <td>年龄：@fat</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>品种：<?= $m->category ?></td>
                                                            <td>上架时间：<?= date('Y-m-d', $m->created_at) ?></td>
                                                            <td>剩余数量：<?= $m->stock ?></td>
                                                            <td>销售数量：<?= $m->sales ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    <p>最新公告</p>
                                                    <hr/>
                                                    <p class="suojin">
                                                        所售猫咪均为自家猫舍繁殖，保证猫咪健康
                                                        血统纯正。出售的猫咪均已注射过疫苗，驱虫，请放心购买，我们一定做到让您买的放心，养得开心！！</p>

                                                    <p class="suojin">
                                                        售后服务保障与销售保证：
                                                    </p>

                                                    <p class="suojin">1.可以与您签订活体销售协议来保证购买宝宝的健康和纯种。</p>

                                                    <p class="suojin">2.出售的每只宝宝都有自己的健康证书，内容包括：生日、疫苗注射情况。</p>

                                                    <p class="suojin">3.24小时开通售后服务热线以解答您饲养中的不懂难题。</p>

                                                    <p class="suojin">
                                                        4.售出7日内发生任何疫苗范围内的传染性疾病可为您更换，保证宝宝在您身边健康快乐的成长。 </p>


                                                    <div style="margin: 40px;">
                                                        <img src="<?= $m->picture ?>" class="img-fluid"
                                                             style="height: 500px;">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
