<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

<div class="modal fade" id="mymodala">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">付款页面</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--                <form action="">-->
                <p>请进行支付！</p>
                <div class="form-group row">
                    <label for="num" class="col-md-2 col-form-label">金额</label>
                    <div class="col-md-10">
                        <input type="text" name="" id="num" class="form-control" value="<?= $order->amount ?>"
                               onfocus='this.blur()'>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 offset-md-2">
                        <?= Html::a('付款', ['pay', 'id' => $model->id], [
                            'class' => 'btn btn-primary',
                            'data' => [
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
                <!--                </form>-->
            </div>

        </div>
    </div>
</div>

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
                <div class="col-md-12">
                    <div class=" title" style="">
                        <form>
                            <div class="form-group">
                                <label for="inputAddress">订单号</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                       value="<?= $model->order_id ?>" onfocus='this.blur()'>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">订单日期</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                       value="<?= date('Y-m-d H:i:s', $model->created_at) ?>" onfocus='this.blur()'>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">收货人</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                       placeholder="Apartment, studio, or floor" value="<?= $order->consignee ?>"
                                       onfocus='this.blur()'>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">收货地址</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                       placeholder="Apartment, studio, or floor" value="<?= $order->address ?>"
                                       onfocus='this.blur()'>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">备注</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                       placeholder="Apartment, studio, or floor" value="<?= $order->remarks ?>"
                                       onfocus='this.blur()'>
                            </div>
                            <div class="form-group">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">宠物猫类别</th>
                                        <th scope="col">单价</th>
                                        <th scope="col">数量</th>
                                        <th scope="col">总价</th>
                                        <th scope="col">状态</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><?= $pet->category ?></td>
                                        <td><?= $pet->price ?></td>
                                        <td><?= $model->pets_num ?></td>
                                        <td><?= $order->amount ?></td>
                                        <td><?= $order->status ?></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!--                        <div class="form-group">-->
                            <!--                            <div class="form-check">-->
                            <!--                                <input class="form-check-input" type="checkbox" id="gridCheck">-->
                            <!--                                <label class="form-check-label" for="gridCheck">-->
                            <!--                                    Check me out-->
                            <!--                                </label>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                        <button type="submit" class="btn btn-primary">Sign in</button>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center more">
                <?php if ($order->status === '待付款') { ?>
                    <!--                    --><? //= Html::a('去付款', ['orders'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('去付款', ['orders'], ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#mymodala']) ?>

                    <?= Html::a('返回', ['orders'], ['class' => 'btn btn-primary']) ?>
                <?php } else { ?>
                    <?= Html::a('返回', ['orders'], ['class' => 'btn btn-primary']) ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


</body>

</html>
