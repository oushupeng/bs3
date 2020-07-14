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
                            <?php foreach ($order as $m) {
                                $detail = $m->orderDetails;
//                            $pet = $m->name;
                                ?>

                                <tr>
                                    <th scope="row"><?= $m['order_id'] ?></th>
                                    <td>
                                        <?php
                                        $aa = \backend\models\OrdersDetails::find()->where(['order_id' => $m['order_id']])->all();
                                        foreach ($aa as $a) :
                                            $bb = \backend\models\Pets::find()->orWhere(['id' => $a['pets_id']])->all();
                                            foreach ($bb as $b) :?>
                                                <?= Html::img($b->picture,['class' => '','height' => '100'])?>
                                                <?= Html::a($b['category'], ['/pets/details', 'id' => $pet->id]) ?>
                                            <?php endforeach;endforeach;?>
                                    </td>
                                    <td>
                                        <?php
                                        $aa = \backend\models\OrdersDetails::find()->where(['order_id' => $m['order_id']])->all();
                                        foreach ($aa as $d) :?>

                                            <?= $d['pets_price'] ?>

                                        <?php endforeach;?>
                                    </td>
                                    <td><?=$detail['pets_num'] ?></td>
                                    <td><?=$m['amount'] ?></td>
                                    <td><?=$m['status'] ?></td>
                                    <td>
                                        <?= Html::a('详情',['orders-details2','id' => $m->id])?>


                                        <?php if ($m->status === '待付款') { ?>
                                            <?= Html::a('取消',['delete','id' => $m->id],[
                                                'data' => [
                                                    'confirm' => '您确定要取消订单吗，取消后不能恢复哦?',
                                                    'method' => 'post',
                                                    'params' => [
                                                        'params_key' => 'params_val'
                                                    ]
                                                ],
                                            ])?>

                                        <?php } else { ?>
                                            <?= Html::a('删除',['delete','id' => $m->id],[
                                                'data' => [
                                                    'confirm' => '您确定要删除吗，删除后不能恢复哦?',
                                                    'method' => 'post',
                                                    'params' => [
                                                        'params_key' => 'params_val'
                                                    ]
                                                ],
                                            ])?>
                                        <?php } ?>



                                    </td>
                                </tr>

                            <? }?>

                            </tbody>
                        </table>

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

        </div>


    <?php } ?>

</div>
</body>

</html>
