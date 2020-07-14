<?php declare(strict_types=1);

use yii\helpers\Html;
use yii\helpers\Url;
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
<!--                        <h5>First slide label</h5>-->
<!--                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>-->
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

        <div class="col-md-12" style="background-color: #fdffff;">
            <div class="aa" style="margin-bottom: 2%;margin-top: 2%;">
                <div class="row">
                    <div class="col-md-9"
                    >
                        <div  style="padding-left: 20px;padding-right: 20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title1 lefta" style="">
                                        <h5>宠物猫推荐</h5>
                                        <P></P>
                                    </div>
                                    <div class="title1 more2"
                                         style="margin-bottom: 0;padding: 5px;float: right">
                                        <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/pets/category']) ?>
                                    </span>
                                        </h5>
                                    </div>
                                </div>

                            </div>
                            <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>

                            <div class="row">
                                <?php foreach ($model as $m): ?>
                                    <div class="col-md-4 col-12">
                                        <div class="card mb-3">
                                            <a href="<?= Url::to(['/pets/details', 'id' => $m->id]) ?>">
                                                <img src="<?= $m['picture'] ?>" alt="" class="card-img-top" style="height: 300px;">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title htitle">
                                                    <?= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                                </h5>
                                                <div class="card-text kapian">
                                                    ￥<?= $m['price'] ?>
                                                </div>
                                                <small class="text-muted card-text float-right">销售数量：<?= $m['sales'] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3"
                         style="border:5px #ffdcb9 solid;border-radius: 20px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title1 lefta" style="">
                                    <h5>宠物猫分类</h5>
                                    <P></P>
                                </div>
                                <div class="title1 more2"
                                     style="margin-bottom: 0;float: right">
                                    <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/pets/category']) ?>
                                    </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="row">
                                    <?php foreach ($model4 as $m): ?>

                                        <div class="col-md-6">
                                            <p class="kapian htitle">
                                                <small class="text-muted">
                                                    <svg t="1584090593713" class="icon" viewBox="0 0 1024 1024"
                                                         version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="14004"
                                                         width="23" height="23">
                                                        <path d="M398.499 236.5l274.256 274.256-274.256 274.256z"
                                                              p-id="14005" fill="#ffc78e"></path>
                                                    </svg>
                                                    <?= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                                </small>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title1 lefta" style="">
                                    <h5>商城最新动态</h5>
                                    <P></P>
                                </div>
                                <div class="title1 more2"
                                     style="margin-bottom: 0;padding: 5px;float: right">
                                    <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/notices/notices']) ?>
                                    </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="">
                                    <?php foreach ($model3 as $m): ?>
                                        <p class="kapian htitle">
                                            <svg t="1584090593713" class="icon" viewBox="0 0 1024 1024" version="1.1"
                                                 xmlns="http://www.w3.org/2000/svg" p-id="14004" width="23" height="23">
                                                <path d="M398.499 236.5l274.256 274.256-274.256 274.256z" p-id="14005"
                                                      fill="#ffc78e"></path>
                                            </svg>
                                            <small class="text-muted">
                                                <?= Html::a($m['title'], ['/notices/notices-details', 'id' => $m->id]) ?>
                                            </small>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>




        <div class="col-md-12" style="background-color: #ecf5ff;">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="title text-center" style="">
                            <h4>新品上架</h4>
                            <p>最新上架的8种宠物，新宠物。。。</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($model2 as $m) : ?>
                            <div class="col-md-3 col-12 x_bk">
                                <div class="card mb-1">
                                    <a href="<?= Url::to(['/pets/details', 'id' => $m->id]) ?>">
                                        <img src="<?= $m['picture'] ?>" alt="" class="card-img-top kpimage">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title htitle">
                                            <?= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                        </h5>
                                        <div class="card-text kapian">
                                            ￥<?= $m['price'] ?>
                                        </div>
                                        <small class="text-muted card-text float-right">
                                            上架日期：
                                            <?= date('Y-m-d', $m->created_at)?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-12 text-center more">
                        <?= Html::a('查看更多>>', ['pets/news-upper-shelf'], ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-12" style="background-color: #efefef;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title text-center" style="">
                            <h4>销售排行</h4>
                            <p>销售量前8的宠物猫，热买的宠物猫。。。</p>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($model1 as $m) : ?>
                            <div class="col-md-3 col-12 x_bk2">
                                <div class="card mb-1">
                                    <a href="<?= Url::to(['/pets/details', 'id' => $m->id]) ?>">
                                        <img src="<?= $m['picture'] ?>" alt="" class="card-img-top kpimage">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title htitle">
                                            <?= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                        </h5>
                                        <div class="card-text kapian">
                                            ￥<?= $m['price'] ?>
                                        </div>
                                        <small class="text-muted card-text float-right">销售数量：<?= $m['sales'] ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-12 text-center more">
                        <?= Html::a('查看更多>>', ['pets/ranking'], ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>


<!--<script src="../public/js/jquery-3.3.1.min.js"></script>-->
<!--<script src="../public/js/bootstrap.min.js"></script>-->
</body>

</html>
