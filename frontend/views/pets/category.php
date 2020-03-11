<?php declare(strict_types=1); ?>
<?php

use backend\models\Pets;
use yii\grid\GridView;
use yii\helpers\Html;
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

<div class="container-fluid aa">
    <div class="row">


        <div class="col-md-10">

<!--            --><?php //foreach ($model1 as $ma) : ?>

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
                                &nbsp;&nbsp;
                                <span class=""><?= $num++ ?>F</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span style="">宠物猫类别</span>
                                <span style="">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                <span style="">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                            </h4>
                        </div>
                        <div class="title1"
                             style="margin-bottom: 0;padding: 15px;float: right">
                            <h5 style="margin-bottom: 0">
                                    <span style="">
                                        <?= Html::a('更多 >>', ['/pets/search', 'category' => $ma->category], ['class' => 'more1']) ?>
                                    </span>
                            </h5>
                        </div>

                    </div>
                </div>
                <hr style="margin-top: 0;background-color: #64c9b9;height: 1px;"/>

<!--                --><?php
//                $aa = Pets::find()->where(['category' => $ma->category])->andWhere(['>', 'stock', '0'])->limit(8)->all();
//                ?>
                <div class="row">
                    <?php foreach ($model as $m) : ?>
                        <div class="col-md-3 col-12">
                            <div class="card mb-3 text-center">
                                <img src="<?= $m->picture ?>" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                    </h5>
                                        <div class="card-text kapian">
                                            <!--                                        --><? //= Html::a($m['name'], ['/pets/details', 'id' => $m->id]) ?>
<!--                                            --><?//= Html::a($m['category'], ['/pets/details', 'id' => $m->id]) ?>
                                            ￥<?= $m['price'] ?>
                                        </div>
                                        <small class="text-muted card-text float-right">销售数量：<?= $m['sales'] ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
<!--            --><?php //endforeach; ?>
        </div>










        <div class="col-md-2">
            <div class="col-md-12">
                <div class="title1" style="">
                    <h4>掌柜推荐</h4>
                    <p>人气热买！！！</p>
                </div>
            </div>

            <div class="row">

                <?php foreach ($model as $m) : ?>
                    <div class="col-md-12 col-12">
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
        </div>


    </div>
</div>

</body>

</html>
