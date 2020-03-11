<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
$num=1;
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
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </a>
            </div>

        </div>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">订单号</th>
                            <th scope="col">商品名称</th>
                            <th scope="col">单价</th>
                            <th scope="col">数量</th>
                            <th scope="col">金额</th>
                            <th scope="col">状态</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($model as $m) {
                            $order = $m->order;
                            $pet = $m->name;
                            ?>

                            <tr>
                                <th scope="row"><?= $order['order_id'] ?></th>
                                <td><?= Html::a($pet['name'], ['/pets/details', 'id' => $pet->id]) ?></td>
                                <td><?= $m['pets_price'] ?></td>
                                <td><?=$m['pets_num'] ?></td>
                                <td><?=$order['amount'] ?></td>
                                <td><?=$order['status'] ?></td>
                                <td>
                                    <?= Html::a('详情',['orders-details','id' => $m->id])?>
                                    <?= Html::a('删除',['delete','id' => $m->id],[
                                        'data' => [
                                            'confirm' => '您确定要删除吗?',
                                            'method' => 'post',
                                            'params' => [
                                                'params_key' => 'params_val'
                                            ]
                                        ],
                                    ])?>
                                </td>
                            </tr>

                        <? }?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


<nav aria-label="Page navigation example">
    <?= LinkPager::widget([
        'firstPageLabel' => '首页',
        'prevPageLabel' => '<<',
        'nextPageLabel' => '>>',
        'lastPageLabel' => '尾页',
        'maxButtonCount' => 5,
        'pagination' => $pagination,
        'options' => ['class' => 'pagination justify-content-center'],
    ]) ?>
</nav>



</body>

</html>
