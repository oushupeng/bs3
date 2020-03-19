<?php declare(strict_types=1); ?>
<?php

use backend\models\Pets;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $searchModel backend\models\SerachPet */

$num = 1;
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

<div class="container-fluid aa pt">
    <div class="row">


        <div class="col-md-12">


            <div class="row">
                <div class="col-md-12" style="margin-bottom: 0">
                    <div class="title1 lefta"
                         style="background-color: #64c9b9;margin-bottom: 0;padding: 10px;
                                 background:
                                 /*linear-gradient(-135deg,transparent 40px,#64c9b9 0) top right;*/
                                 linear-gradient(135deg,transparent 15px, #64c9b9 0) top left;
                                 /*linear-gradient(-45deg,transparent 15px, #64c9b9 0) bottom right;*/
                                 /*background-size: 50% 50%;background-repeat: no-repeat;*/
">
                        <h4>
                            <!--                                <span class="">--><? //= $num++ ?><!--F</span>-->
                            <span style="">&nbsp;&nbsp;&nbsp;&nbsp; </span>

                            <span style="">宠物猫类别</span>
                            <span style="">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                        </h4>
                    </div>

                </div>
            </div>
            <hr style="margin-top: 0;background-color: #64c9b9;height: 1px;"/>

            <div class="row">
                <?php foreach ($model as $m) : ?>
                    <div class="col-md-3 col-12 a_bk">
                        <div class="card mb-1 text-center">
<!--                            <img src="--><?//= $m->picture ?><!--" alt="" class="card-img-top">-->


                            <a href="<?= Url::to(['/pets/details', 'id' => $m->id])?>">
                                <img src="<?= $m['picture'] ?>" alt="" class="card-img-top">
                            </a>



                            <div class="card-body">
                                <h5 class="card-title hctitle">
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


<!--        <div class="col-md-2">-->
<!--            <div class="col-md-12">-->
<!--                <div class="title1" style="">-->
<!--                    <h4>掌柜推荐</h4>-->
<!--                    <p>人气热买！！！</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="row">-->
<!---->
<!--                --><?php //foreach ($model as $m) : ?>
<!--                    <div class="col-md-12 col-12">-->
<!--                        <div class="card mb-3">-->
<!--                            <img src="--><?//= $m['picture'] ?><!--" alt="" class="card-img-top">-->
<!--                            <div class="card-body">-->
<!--                                <h5 class="card-title hctitle">-->
<!--                                    --><?//= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
<!--                                </h5>-->
<!--                                <small class="card-text kapian ">-->
<!--                                    ￥--><?//= $m['price'] ?>
<!--                                </small>-->
<!--                                <small class="text-muted card-text float-right">销售数量：--><?//= $m['sales'] ?><!--</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->
<!--        </div>-->


    </div>
</div>

</body>

</html>
