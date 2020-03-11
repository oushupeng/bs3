<?php declare(strict_types=1);
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
                    <img class="d-block w-100 picture" src="../views/public/image/c9.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>商城公告</h5>
                        <p>最新十条公告信息。。。</p>
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>

<div class="container-fluid ph1 aa">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center title" style="">
                <h2>商城公告 </h2>
                <p>最新十条公告信息。。。</p>
            </div>
        </div>
        <div class="col-md-12">


            <?php foreach ($model as $m) : ?>

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><?= $num++ ?>、<?= $m->title ?></h4>
                <hr>
                <p class="mb-0"><?= $m->content ?></p>
            </div>
            <?php endforeach; ?>

        </div>
    </div>


</div>


</body>

</html>
