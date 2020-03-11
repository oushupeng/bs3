<?php declare(strict_types=1); ?>


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

<div class="container-fluid ph1 aa">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <h2>新品上架</h2>
                    <p>最新12种宠物猫</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <?php use yii\helpers\Html;

        foreach ($model as $m) : ?>
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
                            <small class="text-muted">库存数量：
                                <?php
                                if ($m['sales'] == 0) {  ?>
                                无货
                                <? } else {  ?>
                                    <?=$m['sales'];?>
                                <? } ?>
                            </small>
                            &nbsp;&nbsp;
                            <small class="text-muted">销售数量：<?= $m['sales'] ?></small>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>

    <div class="row">
        <div class="col-12 text-center more">
            <a href="#" class="btn btn-primary">更多</a>
        </div>
    </div>
</div>


</body>

</html>
