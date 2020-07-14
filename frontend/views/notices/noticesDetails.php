<?php declare(strict_types=1);
$num = 1;

use yii\helpers\Html; ?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>


<div class="container-fluid pt">
<div class="container">
    <div class="row" style="background-color: #f6f6f6;margin-top: 40px;padding: 80px">
        <div class="col-md-12 ">
            <h2 class="text-center"><?= $model->title ?></h2>

            <div class="text-center" style="background-color: #ffdcb9;margin-top: 30px;margin-bottom: 30px;padding: 10px">
                <small>发布时间：<?= date('Y-m-d', $model->created_at) ?></small>
                &nbsp;&nbsp;&nbsp;&nbsp;
<!--                <small>浏览：--><?//= $model->views ?><!--</small>-->
            </div>
            <p class=""><?= $model->content ?></p>

<!--            <img src="--><?//= $model->image ?><!--" alt="" class="rounded mx-auto d-block" style="height: 400px;margin-top: 20px;margin-bottom: 20px;">-->
<!--            <img src="--><?//= $model->image ?><!--" alt="" class="rounded mx-auto d-block" style="height: 400px;margin-top: 20px;margin-bottom: 20px;">-->


            <div class="" style="margin-top: 100px;">
                版权声明<br>
                本文来源于网络，并不代表本站真实立场。<br><hr>
                <?php if ($model->id === $model1->id)  {?>

                    下一篇：
                    <?= Html::a($model4->title, ['notices-details', 'id' => $model4->id], [
                        'style' => 'text-decoration: none;',
                        'class' => 'more1',
                        'data' => ['method' => 'post']
                    ])?>

                <?php } elseif ($model->id === $model2->id){?>

                    上一篇：
                    <?= Html::a($model3->title, ['notices-details', 'id' => $model3->id], [
                        'style' => 'text-decoration: none;',
                        'class' => 'more1',
                        'data' => ['method' => 'post']
                    ])?>

                <?php } else {?>

                    上一篇：
                    <?= Html::a($model3->title, ['notices-details', 'id' => $model3->id], [
                        'style' => 'text-decoration: none;',
                        'class' => 'more1',
                        'data' => ['method' => 'post']
                    ])?>
                    <br>

                    下一篇：
                    <?= Html::a($model4->title, ['notices-details', 'id' => $model4->id], [
                        'style' => 'text-decoration: none;',
                        'class' => 'more1',
                        'data' => ['method' => 'post']
                    ])?>

                <?php }?>
            </div>
        </div>


    </div>
</div>
</div>

</body>
</html>
