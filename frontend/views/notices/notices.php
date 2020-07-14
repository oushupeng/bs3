<?php declare(strict_types=1);

use yii\helpers\Html;

$num = 1;
?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>


<div class="container-fluid pt" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <h2>商城公告 </h2>
                    <p>最新十条公告信息。。。</p>
                </div>
                <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>
            </div>
            <div class="col-md-12">


                <?php foreach ($model as $m) : ?>

                    <div class="alert alert-warning" role="alert">
                        <h4 class="alert-heading hctitle">
                            <?= $num++ ?>、
                            <?= Html::a($m->title, ['notices-details', 'id' => $m->id], ['data' => ['method' => 'post']]) ?>
                        </h4>
                        <hr>
                        <p class="mb-0">
                            <?= $m->content ?>
                            <span style="float: right">发布时间：<?= date('Y-m-d H:i:s', $m->created_at)?></span>
                        </p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</div>


</body>

</html>
