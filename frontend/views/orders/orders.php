<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$num = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>


<div class="container-fluid pt">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <h2>订单中心 </h2>
                    <p>查看自己的订单。。。</p>
                </div>
                <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>
            </div>
        </div>
    </div>

    <?php if (!$model) { ?>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" text-center" style="margin-top: 1%">
                        <h4>你的订单看看如也，赶快去购买吧！！！</h4>
                        <p>。。。。。。</p>
                    </div>
                </div>
            </div>
        </div>


    <?php } else { ?>




        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <ul class="nav nav-tabs nav-pills mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">全部订单</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pay-tab" data-toggle="tab" href="#pay" role="tab" aria-controls="pay" aria-selected="false">待付款</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="deliver-tab" data-toggle="tab" href="#deliver" role="tab" aria-controls="deliver" aria-selected="false">待发货</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="receive-tab" data-toggle="tab" href="#receive" role="tab" aria-controls="receive" aria-selected="false">待收货</a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="evaluate-tab" data-toggle="tab" href="#evaluate" role="tab" aria-controls="evaluate" aria-selected="false">待评价</a>-->
<!--                        </li>-->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="text-center" style="margin-top: 1%">
                                <table class="table table-striped text-left">
                                    <thead>
                                    <tr>
                                        <th scope="col">订单号</th>
                                        <th scope="col">商品信息</th>
                                        <th scope="col">单价</th>
                                        <th scope="col">数量</th>
                                        <th scope="col">金额</th>
                                        <th scope="col">状态</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody class="hctitle">
                                    <?php
                                    $order_id=array();

                                    foreach ($model as $a => $m) {
                                        $order = $m->order;
                                        $pet = $m->name;
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?php
                                                if (!in_array($m->order_id, $order_id, true)) {
                                                    $order_id[] = $m->order_id;
                                                    echo $m->order_id;
                                                }?>
                                            </th>
                                            <td>
                                                <?= Html::img($pet->picture, ['class' => '', 'height' => '100', 'width' => '100']) ?>
                                                <?= Html::a($pet['category'], ['/pets/details', 'id' => $pet->id]) ?>
                                            </td>
                                            <td>
                                                <?= $m['pets_price'] ?>
                                            </td>
                                            <td><?= $m['pets_num'] ?></td>
                                            <td><?= $m['pets_price'] * $m['pets_num'] ?></td>
                                            <td><?= $order['status'] ?></td>
                                            <td>
                                                <?= Html::a('详情', ['orders-details2', 'id' => $order->id]) ?>


                                                <?php if ($order->status === '待付款') { ?>
                                                    <?= Html::a('取消', ['delete2', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>

                                                <?php } else { ?>
                                                    <?= Html::a('删除', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要删除吗，删除后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>
                                                <?php } ?>


                                            </td>
                                        </tr>

                                    <? } ?>

                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <?= LinkPager::widget([
                                    'firstPageLabel' => '第一页',
                                    'prevPageLabel' => '<<',
                                    'nextPageLabel' => '>>',
                                    'lastPageLabel' => '尾页',
                                    'maxButtonCount' => 5,
                                    'pagination' => $pagination,
                                    'options' => ['class' => 'pagination justify-content-center'],
                                ]) ?>
                            </nav>

                        </div>
                        <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay-tab">

                            <div class="text-center" style="margin-top: 1%">
                                <table class="table table-striped text-left">
                                    <thead>
                                    <tr>
                                        <th scope="col">订单号</th>
                                        <th scope="col">商品信息</th>
                                        <th scope="col">单价</th>
                                        <th scope="col">数量</th>
                                        <th scope="col">金额</th>
                                        <th scope="col">状态</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $order_id=array();
                                    foreach ($model1 as $m) {
                                        $order = $m->order;
                                        $pet = $m->name;
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?php
                                                if (!in_array($m->order_id, $order_id, true)) {
                                                    $order_id[] = $m->order_id;
                                                    echo $m->order_id;
                                                }?>
                                            </th>
                                            <td>
                                                <?= Html::img($pet->picture, ['class' => '', 'height' => '100', 'width' => '100']) ?>
                                                <?= Html::a($pet['category'], ['/pets/details', 'id' => $pet->id]) ?>
                                            </td>
                                            <td>
                                                <?= $m['pets_price'] ?>
                                            </td>
                                            <td><?= $m['pets_num'] ?></td>
                                            <td><?= $m['pets_price'] * $m['pets_num'] ?></td>
                                            <td><?= $order['status'] ?></td>
                                            <td>
                                                <?= Html::a('详情', ['orders-details2', 'id' => $order->id]) ?>


                                                <?php if ($order->status === '待付款') { ?>
                                                    <?= Html::a('取消', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>

                                                <?php } else { ?>
                                                    <?= Html::a('删除', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要删除吗，删除后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>
                                                <?php } ?>


                                            </td>
                                        </tr>

                                    <? } ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="tab-pane fade" id="deliver" role="tabpanel" aria-labelledby="deliver-tab">

                            <div class="text-center" style="margin-top: 1%">
                                <table class="table table-striped text-left">
                                    <thead>
                                    <tr>
                                        <th scope="col">订单号</th>
                                        <th scope="col">商品信息</th>
                                        <th scope="col">单价</th>
                                        <th scope="col">数量</th>
                                        <th scope="col">金额</th>
                                        <th scope="col">状态</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $order_id=array();
                                    foreach ($model2 as $m) {
                                        $order = $m->order;
                                        $pet = $m->name;
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?php
                                                if (!in_array($m->order_id, $order_id, true)) {
                                                    $order_id[] = $m->order_id;
                                                    echo $m->order_id;
                                                }?>
                                            </th>
                                            <td>
                                                <?= Html::img($pet->picture, ['class' => '', 'height' => '100', 'width' => '100']) ?>
                                                <?= Html::a($pet['category'], ['/pets/details', 'id' => $pet->id]) ?>
                                            </td>
                                            <td>
                                                <?= $m['pets_price'] ?>
                                            </td>
                                            <td><?= $m['pets_num'] ?></td>
                                            <td><?= $m['pets_price'] * $m['pets_num'] ?></td>
                                            <td><?= $order['status'] ?></td>
                                            <td>
                                                <?= Html::a('详情', ['orders-details2', 'id' => $order->id]) ?>


                                                <?php if ($order->status === '待付款') { ?>
                                                    <?= Html::a('取消', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>

                                                <?php } else { ?>
                                                    <?= Html::a('删除', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要删除吗，删除后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>
                                                <?php } ?>


                                            </td>
                                        </tr>

                                    <? } ?>

                                    </tbody>
                                </table>

                            </div>


                        </div>
                        <div class="tab-pane fade" id="receive" role="tabpanel" aria-labelledby="receive-tab">

                            <div class="text-center" style="margin-top: 1%">
                                <table class="table table-striped text-left">
                                    <thead>
                                    <tr>
                                        <th scope="col">订单号</th>
                                        <th scope="col">商品信息</th>
                                        <th scope="col">单价</th>
                                        <th scope="col">数量</th>
                                        <th scope="col">金额</th>
                                        <th scope="col">状态</th>
                                        <th scope="col">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $order_id=array();
                                    foreach ($model3 as $m) {
                                        $order = $m->order;
                                        $pet = $m->name;
                                        ?>

                                        <tr>
                                            <th scope="row">
                                                <?php
                                                if (!in_array($m->order_id, $order_id, true)) {
                                                    $order_id[] = $m->order_id;
                                                    echo $m->order_id;
                                                }?>
                                            </th>
                                            <td>
                                                <?= Html::img($pet->picture, ['class' => '', 'height' => '100', 'width' => '100']) ?>
                                                <?= Html::a($pet['category'], ['/pets/details', 'id' => $pet->id]) ?>
                                            </td>
                                            <td>
                                                <?= $m['pets_price'] ?>
                                            </td>
                                            <td><?= $m['pets_num'] ?></td>
                                            <td><?= $m['pets_price'] * $m['pets_num'] ?></td>
                                            <td><?= $order['status'] ?></td>
                                            <td>
                                                <?= Html::a('详情', ['orders-details2', 'id' => $order->id]) ?>


                                                <?php if ($order->status === '待付款') { ?>
                                                    <?= Html::a('取消', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>

                                                <?php } else { ?>
                                                    <?= Html::a('删除', ['delete', 'id' => $order->id], [
                                                        'data' => [
                                                            'confirm' => '您确定要删除吗，删除后不能恢复哦?',
                                                            'method' => 'post',
                                                            'params' => [
                                                                'params_key' => 'params_val'
                                                            ]
                                                        ],
                                                    ]) ?>
                                                <?php } ?>


                                            </td>
                                        </tr>

                                    <? } ?>

                                    </tbody>
                                </table>

                            </div>


                        </div>
<!--                        <div class="tab-pane fade" id="evaluate" role="tabpanel" aria-labelledby="evaluate-tab">-->
<!---->
<!--                            5-->
<!---->
<!--                        </div>-->
                    </div>

<!--                    <div class="text-center" style="margin-top: 1%">-->
<!--                        <table class="table table-striped text-left">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th scope="col">订单号</th>-->
<!--                                <th scope="col">商品信息</th>-->
<!--                                <th scope="col">单价</th>-->
<!--                                <th scope="col">数量</th>-->
<!--                                <th scope="col">金额</th>-->
<!--                                <th scope="col">状态</th>-->
<!--                                <th scope="col">操作</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            --><?php //foreach ($model as $m) {
//                                $order = $m->order;
//                                $pet = $m->name;
//                                ?>
<!---->
<!--                                <tr>-->
<!--                                    <th scope="row">--><?//= $m['order_id'] ?><!--</th>-->
<!--                                    <td>-->
<!--                                        --><?//= Html::img($pet->picture, ['class' => '', 'height' => '100']) ?>
<!--                                        --><?//= Html::a($pet['category'], ['/pets/details', 'id' => $pet->id]) ?>
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        --><?//= $m['pets_price'] ?>
<!--                                    </td>-->
<!--                                    <td>--><?//= $m['pets_num'] ?><!--</td>-->
<!--                                    <td>--><?//= $m['pets_price'] * $m['pets_num'] ?><!--</td>-->
<!--                                    <td>--><?//= $order['status'] ?><!--</td>-->
<!--                                    <td>-->
<!--                                        --><?//= Html::a('详情', ['orders-details2', 'id' => $order->id]) ?>
<!---->
<!---->
<!--                                        --><?php //if ($order->status === '待付款') { ?>
<!--                                            --><?//= Html::a('取消', ['delete', 'id' => $m->id], [
//                                                'data' => [
//                                                    'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
//                                                    'method' => 'post',
//                                                    'params' => [
//                                                        'params_key' => 'params_val'
//                                                    ]
//                                                ],
//                                            ]) ?>
<!---->
<!--                                        --><?php //} else { ?>
<!--                                            --><?//= Html::a('删除', ['delete', 'id' => $m->id], [
//                                                'data' => [
//                                                    'confirm' => '您确定要删除吗，删除后不能恢复哦?',
//                                                    'method' => 'post',
//                                                    'params' => [
//                                                        'params_key' => 'params_val'
//                                                    ]
//                                                ],
//                                            ]) ?>
<!--                                        --><?php //} ?>
<!---->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!---->
<!--                            --><?// } ?>
<!---->
<!--                            </tbody>-->
<!--                        </table>-->
<!---->
<!--                    </div>-->
                </div>
            </div>


<!--            <nav aria-label="Page navigation example">-->
<!--                --><?//= LinkPager::widget([
//                    'firstPageLabel' => '首页',
//                    'prevPageLabel' => '<<',
//                    'nextPageLabel' => '>>',
//                    'lastPageLabel' => '尾页',
//                    'maxButtonCount' => 5,
//                    'pagination' => $pagination,
//                    'options' => ['class' => 'pagination justify-content-center'],
//                ]) ?>
<!--            </nav>-->

        </div>


    <?php } ?>

</div>
</body>

</html>
