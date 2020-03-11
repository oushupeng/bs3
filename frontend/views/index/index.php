<?php declare(strict_types=1);

use yii\helpers\Html;
use yii\web\View;

/* @var $this View */

//$this->render('../public/header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>猫猫网</title>
</head>

<body>


<div class="content">

    <div id="mycarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <a href="">
                    <img class="d-block w-100 content" src="/bs3/frontend/views/public/image/c1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <img class="d-block w-100 content" src="/bs3/frontend/views/public/image/c10.jpg"
                         alt="Second slide">
                </a>
            </div>
            <div class="carousel-item">
                <a href="">
                    <img class="d-block w-100 content" src="/bs3/frontend/views/public/image/c8.jpg" alt="Third slide">
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12" style="background-color: #fcfcfc;margin-bottom: 30px;">
            <div class="aa">

                <div class="row">
                    <div class="col-md-2" style="border: 1px solid rgba(0, 0, 0, 0.125);margin-top: 30px;margin-right: 4%;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="title1 lefta" style="">
                                    <h4>商品分类</h4>
                                    <P></P>
                                    <hr>

                                </div>
                                <div class="title1"
                                     style="margin-bottom: 0;padding: 5px;float: right">
                                    <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/pets/search', 'category' => $ma->category], ['class' => 'more2']) ?>
                                    </span>
                                    </h5>
                                </div>

                            </div>
                                <div class="col-md-12 col-12">
<!--                                    <div class="card mb-3">-->
                                        <div class="card-body" style="height: 40%;">
                                            <div class="row">

                                            <?php foreach ($model4 as $m): ?>

                                            <div class="col-md-6">
<!--                                            <h5 class="card-title">--><?//= $m['category'] ?><!--</h5>-->
                                            <p class="card-text kapian">
                                                <small class="text-muted">
                                                    •
                                                    <?= Html::a($m['category'], ['/pets/search', 'category' => $m->category]) ?>
                                                </small>
                                            </p>
                                            </div>

                                            <?php endforeach; ?>
                                            </div>

                                        </div>
<!--                                    </div>-->
                                </div>
                        </div>


                    </div>

                    <div class="col-md-7" style="border: 1px solid rgba(0, 0, 0, 0.125);margin-top: 30px;margin-right: 4%;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="title1 lefta" style="">
                                    <h4>热销推荐</h4>
                                    <P></P>
                                </div>
                                <div class="title1"
                                     style="margin-bottom: 0;padding: 5px;float: right">
                                    <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/pets/search', 'category' => $ma->category], ['class' => 'more2']) ?>
                                    </span>
                                    </h5>
                                </div>
                            </div>
                            <?php foreach ($model as $m): ?>
                                <div class="col-md-4 col-12">
                                    <div class="card mb-3">
                                        <img src="<?= $m['picture'] ?>" alt="" class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title">￥<?= $m['price'] ?></h5>
                                            <p class="card-text kapian">
                                                <small>
                                                    <?= Html::a($m['name'], ['/pets/details', 'id' => $m->id]) ?>
                                                </small>
                                            </p>
                                            <p class="card-text float-right">
                                                <small class="text-muted">销售数量：<?= $m['sales'] ?></small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
<!--                        <div class="col-12 text-center more">-->
<!--                            --><?//= Html::a('查看更多>>', ['pets/category'], ['class' => 'btn btn-info']) ?>
<!--                        </div>-->
                    </div>

                    <div class="col-md-2" style="border: 1px solid rgba(0, 0, 0, 0.125);margin-top: 30px;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="title1 lefta" style="">
                                    <h4>商城公告</h4>
                                    <P></P>
                                    <hr>

                                </div>
                                <div class="title1"
                                     style="margin-bottom: 0;padding: 5px;float: right">
                                    <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/notices/notices'], ['class' => 'more2']) ?>
                                    </span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
<!--                                <div class="card mb-3">-->
                                    <div class="card-body">
                                        <?php foreach ($model3 as $m): ?>
<!--                                        <div class="col-12 text-center more">-->

                                        <p class="card-text kapian">
                                                <small class="text-muted">
                                                    <?= Html::a($m['content'], ['/pets/details', 'id' => $m->id]) ?>999
                                                </small>
                                            </p>
<!--                                        </div>-->

                                        <?php endforeach; ?>
                                    </div>
<!--                                </div>-->
                            </div>





                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12" style="background-color: #ecf5ff;">
            <div class="aa">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title text-center" style="">
                            <h4>新品上架</h4>
                            <p>最新上架，新宠物。。。</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($model2 as $m) : ?>
                            <div class="col-md-3 col-12">
                                <div class="card mb-3">
                                    <img src="<?= $m['picture'] ?>" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">￥<?= $m['price'] ?></h5>
                                        <p class="card-text kapian">
                                            <small>
                                                <?= Html::a($m['name'], ['/pets/details', 'id' => $m->id]) ?>
                                            </small>
                                        </p>
                                        <p class="card-text float-right">
                                            <small class="text-muted">销售数量：<?= $m['sales'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-12 text-center more">
                        <?= Html::a('查看更多>>', ['pets/news-upper-shelf'], ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12" style="background-color: #efefef;">
            <div class="aa">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title text-center" style="">
                            <h4>销售排行</h4>
                            <p>销售推荐，热买的宠物猫。。。</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($model1 as $m) : ?>
                            <div class="col-md-3 col-12">
                                <div class="card mb-3">
                                    <img src="<?= $m['picture'] ?>" alt="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">￥<?= $m['price'] ?></h5>
                                        <p class="card-text kapian">
                                            <small>
                                                <?= Html::a($m['name'], ['/pets/details', 'id' => $m->id]) ?>
                                            </small>
                                        </p>
                                        <p class="card-text float-right">
                                            <small class="text-muted">销售数量：<?= $m['sales'] ?></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-12 text-center more">
                        <?= Html::a('查看更多>>', ['pets/ranking'], ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
            </div>
        </div>



    </div>


</div>


<script src="../public/js/jquery-3.3.1.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
</body>

</html>
