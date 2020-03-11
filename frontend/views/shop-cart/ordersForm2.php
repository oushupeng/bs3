<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>

    </style>
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

<div class="container-fluid ph1">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class=" title" style="">

                    <div class="form-group">
                        <table class="table">
                            <thead>
                            <tr>
                                <td colspan="4"><h2>商品内容</h2></td>
                            </tr>
                            <tr>
                                <th scope="col">商品名称</th>
                                <th scope="col">商品价格</th>
                                <th scope="col">商品数量</th>
                                <th scope="col">商品总价</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr id="tab">

                                <td scope="row">
                                    <?= Html::textInput('shopCart[pets_name]', $model->name, ['class' => 'details', 'onfocus' => 'this.blur()']) ?>
                                </td>

                                <td scope="row">
                                    <?= Html::textInput('shopCart[pets_price]', $model->price, ['class' => 'details price', 'onfocus' => 'this.blur()']) ?>
                                </td>
                                <td scope="row">

                                    <div class="gw_num">
                                        <em class="min">
                                            <input class="price hidden" name="" type="button"
                                                   value="<?= $model->price ?>"/>
                                            <?= Html::submitButton('-', ['class' => 'min']) ?>
                                        </em>
                                        <em class="add">
                                            <?= Html::submitButton('+', ['class' => 'add']) ?>
                                        </em>
                                        <?php $form = ActiveForm::begin(['action' => ['orders/create2'], 'method' => 'post']) ?>

                                        <?= Html::textInput('OrdersDetails[pets_num]', 1, ['class' => 'num']) ?>

                                    </div>

                                </td>

                                <td>
                                    <?= Html::textInput('Orders[amount]',1,['class' => 'details ', 'id' => 'total', 'onfocus'=>'this.blur()'])?>
                                </td>

                            </tr>

                            <?= Html::textInput('id', $model->id, ['class' => 'hidden']) ?>
                            <?= Html::textInput('OrdersDetails[pets_id]', $model->id, ['class' => 'details price hidden', 'onfocus' => 'this.blur()']) ?>
                            <?= Html::textInput('OrdersDetails[pets_price]', $model->price, ['class' => 'details price hidden', 'onfocus' => 'this.blur()']) ?>

                            <tr>
                                <td colspan="4">
                                    <h2>订单信息</h2>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">收货人</td>
                                <td>
                                    <input type="text" class="form-control" name="Orders[consignee]" id="consignee">
                                </td>
                                <td scope="row">电话号码</td>
                                <td>
                                    <input type="number" class="form-control" name="Orders[telephone]" id="telephone">
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">收货地址</td>
                                <td>
                                    <input type="text" class="form-control" name="Orders[address]" id="address">
                                </td>
                                <td scope="row">送货方式</td>
                                <td>
                                    <select class="custom-select" name="Orders[delivery]">
                                        <option selected>邮寄</option>
                                        <option value="货到付款">货到付款</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">付款方式</td>
                                <td>
                                    <select class="custom-select" name="Orders[payment]">
                                        <option selected>微信</option>
                                        <option value="支付宝">支付宝</option>
                                        <option value="货到付款">货到付款</option>
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center more">
            <button type="submit" class="btn btn-primary" onclick="checkfun();">提交订单</button>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
<script language="javascript" type="text/javascript">
    function checkfun() {
        var consignee = document.getElementById("consignee").value;
        var telephone = document.getElementById("telephone").value;
        var address = document.getElementById("address").value;
        if (consignee === "") {
            alert('收货人不可以为空');
            return false;
        } else if (telephone === "") {
            alert('电话号码不可以为空');
            return false;
        } else if (address === "") {
            alert('收货地址不可以为空');
            return false;
        }

    }
</script>

</body>

</html>
