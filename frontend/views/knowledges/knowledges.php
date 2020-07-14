<?php declare(strict_types=1);
$num = 1;

use yii\helpers\Html; ?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<!--<div class="">-->
<!---->
<!--    <div id="mycarousel" class="carousel slide" data-ride="carousel">-->
<!---->
<!--        <div class="carousel-inner" role="listbox">-->
<!--            <div class="carousel-item active">-->
<!--                <a href="">-->
<!--                    <img class="d-block w-100 picture" src="/bs3/frontend/views/public/image/c9.jpg" alt="First slide">-->
<!--                    <div class="carousel-caption d-none d-md-block">-->
<!--                        <h5>商城公告</h5>-->
<!--                        <p>最新十条公告信息。。。</p>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->

<div class="container-fluid pt">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center title" style="">
                <h2>猫咪知识 </h2>
                <p>介绍关于宠物猫的知识。。。</p>
            </div>
            <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>

        </div>

        <div class="col-md-12" style="border:5px #ffdcb9 solid;border-radius: 20px;padding: 2%;margin-top: 2%">
            <div class="row">
                <?php foreach ($model as $m) : ?>
                    <div class="col-md-3" >
                        <div class="card mb-3">
                            <img src="<?= $m->image ?>" alt="" class="card-img-top" style="height: 160px;">
                        </div>
                    </div>
                    <div class="col-md-9" style="height: 160px;">
                        <h3 class="kapian3 htitle">
                            <?= Html::a($m->title,['add', 'id' => $m->id], ['data' => ['method' => 'post']]) ?>
                        </h3>
                            <p class="kapian2"><?= $m->content ?></p>
                        <svg t="1583228820289" class="icon" viewBox="0 0 1024 1024" p-id="2290" width="16" height="16">
                            <path d="M512 128C300.256 128 128 300.256 128 512s172.256 384 384 384 384-172.256 384-384S723.744 128 512 128z m0 64c177.12 0 320 142.88
                        320 320s-142.88 320-320 320S192 689.12 192 512 334.88 192 512 192z m-32 64v288h224v-64h-160V256z"
                                  p-id="2291">
                            </path>
                        </svg>
                        <small><?= date('Y-m-d', $m->created_at) ?></small>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <svg t="1583228685030" class="icon" viewBox="0 0 1024 1024" p-id="1162" width="16" height="16">
                            <path d="M512 853.333c-298.667 0-426.667-256-426.667-341.333s128-341.333 426.667-341.333 426.667 256 426.667 341.333-128 341.333-426.667
                        341.333zM512 768c109.824 0 197.59-41.173 262.827-111.36 48.213-52.01 78.506-117.504 78.506-144.64s-30.293-92.672-78.506-144.64C709.547
                        297.216 621.78 256 512 256c-109.824 0-197.59 41.173-262.827 111.36-48.213 52.01-78.506 117.504-78.506 144.64s30.293 92.672 78.506
                        144.64C314.453 726.784 402.22 768 512 768z m0-106.667a149.333 149.333 0 1 1 0-298.666 149.333 149.333 0 0 1 0 298.666z m0-64a85.333
                        85.333 0 1 0 0-170.666 85.333 85.333 0 0 0 0 170.666z" p-id="1163">
                            </path>
                        </svg>
                        <small><?= $m->views ?></small>
                    </div>
                    <div class="col-md-12" style="margin-top: -1.5%">
                        <hr/>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
    </div>
</div>
</body>
</html>
