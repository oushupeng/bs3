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
                <div class=" title" style="">
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">订单号</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?= $model->order_id?>" onfocus='this.blur()'>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">收货人</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="<?= $order->consignee?>" onfocus='this.blur()'>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">收货地址</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="<?= $order->address?>" onfocus='this.blur()'>
                        </div>


                        <div class="form-group">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">商品名称</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">金额</th>
                                    <th scope="col">状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $pet->name?></td>
                                        <td><?= $model->pets_num?></td>
                                        <td><?= $order->amount?></td>
                                        <td><?= $order->status?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center more">
            <a href="#" class="btn btn-primary">更多</a>
        </div>
    </div>
</div>




</body>

</html>
