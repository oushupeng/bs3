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
                    <img class="d-block w-100 picture" src="/bs3/frontend/views/public/image/c9.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>提交订单</h5>
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

                        <div class="form-group">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td colspan="4"><h2>商品内容</h2></td>
                                </tr>
                                <tr>
                                    <th scope="col">宠物猫类别</th>
                                    <th scope="col">宠物猫价格</th>
                                    <th scope="col">宠物猫数量</th>
                                    <th scope="col">金额</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($model as $m): ?>
                                    <tr id="tab">

                                        <td scope="row">
                                            <?= Html::textInput('shopCart[pets_category]', $m->pets_category, ['class' => 'details', 'onfocus' => 'this.blur()']) ?>
                                        </td>

                                        <td scope="row">
                                            <?= Html::textInput('shopCart[pets_price]', $m->pets_price, ['class' => 'details price', 'onfocus' => 'this.blur()']) ?>
                                        </td>


                                        <td scope="row">
                                            <?php $form = ActiveForm::begin(['action' => ['/shop-cart/update', 'id' => $m->id], 'method' => 'post']) ?>

                                            <div class="gw_num">
                                                <em class="min">
                                                    <?= Html::submitButton('-', ['class' => 'min']) ?>
                                                </em>
                                                <?= Html::textInput('ShopCart[pets_num]', $m->pets_num, ['class' => 'num']) ?>
                                                <em class="add">
                                                    <?= Html::submitButton('+', ['class' => 'add']) ?>
                                                </em>
                                            </div>

                                            <!--                                            <span>单价:</span><span class="price">-->
                                            <? //= $model->pets_price?><!--</span>-->
                                            <!--                                            <input class="min" name="" type="button" value="-" />-->
                                            <!--                                            <input class="num" name="" type="text" value="1" />-->
                                            <!--                                            <input class="add" name="" type="button" value="+" />-->
                                            <!---->
                                            <!--                                            <p>总价：<label id="total"></label></p>-->
                                            <?php ActiveForm::end(); ?>

                                        </td>

                                        <td>
                                            <?= Html::textInput('Orders[amount]', $m->pets_price * $m->pets_num, ['class' => 'details total ', 'onfocus' => 'this.blur()']) ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <label>总价：</label>
                                        <?= $sum?>
                                    </td>
                                </tr>

                                <?php $form = ActiveForm::begin(['action' => ['orders/create'], 'method' => 'post']) ?>

                                <!--                                    --><? //= Html::textInput('shopCart[pets_name]',$model->pets_name,['class' => 'details hidden', 'onfocus'=>'this.blur()' ])?>


                                <?= Html::textInput('id', $m->id, ['class' => 'hidden']) ?>
                                <?= Html::textInput('OrdersDetails[pets_id]', $m->pets_id, ['class' => 'details price hidden', 'onfocus' => 'this.blur()']) ?>
                                <?= Html::textInput('OrdersDetails[pets_price]', $m->pets_price, ['class' => 'details price hidden', 'onfocus' => 'this.blur()']) ?>
                                <?= Html::textInput('OrdersDetails[pets_num]', $m->pets_num, ['class' => 'details price hidden', 'onfocus' => 'this.blur()']) ?>

                                <?= Html::textInput('Orders[amount]', $sum, ['class hidden' => 'details total ', 'onfocus' => 'this.blur()']) ?>


                                <tr>
                                    <td colspan="4">
                                        <h2>订单信息</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">收货人</td>
                                    <td>
                                        <!--                                            --><? //= Html::textInput('Orders[pets_name]',['require' => 'true'])?>
                                        <input type="text" class="form-control" name="Orders[consignee]" id="consignee">
                                    </td>
                                    <td scope="row">电话号码</td>
                                    <td>
                                        <input type="number" class="form-control" name="Orders[telephone]"
                                               id="telephone">
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
                                    <td scope="row">备注</td>
                                    <td>
                                        <!--                                            --><? //= Html::textInput('Orders[pets_name]',['require' => 'true'])?>
                                        <input type="text" class="form-control" name="Orders[remarks]" id="remarks">
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
