<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

$num = 1;
$num1 = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!--<style>-->
    <!--.gw_num{border: 1px solid #dbdbdb;width: 110px;line-height: 26px;overflow: hidden;}-->
    <!--.gw_num em{display: block;height: 26px;width: 26px;float: left;color: #7A7979;border-right: 1px solid #dbdbdb;text-align: center;cursor: pointer;}-->
    <!--.gw_num .num{display: block;float: left;text-align: center;width: 52px;font-style: normal;font-size: 14px;line-height: 24px;border: 0;}-->
    <!--.gw_num em.add{float: right;border-right: 0;border-left: 1px solid #dbdbdb;}-->
    <!--.details{border: none}-->
    <!---->
    <!--</style>-->
</head>

<body>


<div class="container-fluid pt">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center title" style="">
                    <h2>购物车 </h2>
                    <p>看看自己的购物车都装了什么。。。</p>
                </div>
                <hr style="margin-top: 0;background-color: #adadad;height: 1px;"/>
            </div>
        </div>
    </div>

    <?php if (!$model2) { ?>


        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class=" text-center" style="margin-top: 1%">
                        <h4>购物车空空如也，赶快去加入商品到购物车吧！！</h4>
                        <p>。。。。。。</p>
                    </div>
                </div>
            </div>
        </div>


    <?php } else { ?>


        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if ($model) { ?>
                        <div class="text-center" style="margin-top: 1%;margin-bottom: 10%;">
                            <table class="table table-striped text-left">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <input id="checkAll" type="checkbox">
                                        &nbsp;&nbsp;#
                                    </th>
                                    <th scope="col">商品信息</th>
                                    <th scope="col">单价</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">金额</th>
                                    <th scope="col">操作</th>
                                </tr>
                                </thead>
                                <tbody class="hctitle">
                                <?php foreach ($model as $m) {
                                    $pet = $m->pet;

                                    ?>

                                    <tr data-id="<?= $m->id ?>">

                                        <th scope="row">
                                            <?php if ($pet->stock === 0) { ?>
                                                <input class="checkOne" type="checkbox" data-id="<?= $m->id ?>"
                                                       id="checko"
                                                       data-bb="<?= $m->pets_price * $m->pets_num ?>"
                                                       disabled="disabled">
                                                <?php
                                            } else { ?>
                                                <input class="checkOne" type="checkbox" data-id="<?= $m->id ?>"
                                                       id="checko"
                                                       data-bb="<?= $m->pets_price * $m->pets_num ?>">
                                            <?php } ?>
                                            <!--                                        <input class="checkOne" type="checkbox" data-id="-->
                                            <? //= $m->id ?><!--" id="checko"-->
                                            <!--                                               data-bb="-->
                                            <? //= $m->pets_price * $m->pets_num ?><!--">-->
                                            &nbsp;&nbsp;
                                            <?= $num++ ?>
                                        </th>
                                        <td>
                                            <?= Html::img($pet->picture, ['class' => '', 'height' => '100', 'width' => '100']) ?>
                                            <?= Html::a($m['pets_category'], ['/pets/details', 'id' => $m->pets_id]) ?>
                                            <input id="petsId" value="<?= $m->id?>" class="hidden">
                                        </td>
                                        <td>

                                            <?= Html::textInput('ShopCart[pets_id]', $m->pets_price, ['class' => 'details hidden', 'onfocus' => 'this.blur()']) ?>
                                            <?= $m->pets_price ?>
                                        </td>
                                        <td style="width: 120px;">
                                            <?php $form = ActiveForm::begin(['action' => ['/shop-cart/update2', 'id' => $m->id], 'method' => 'post']) ?>
                                            <div class="gw_num">
                                                <em class="min">
                                                    <?php if ($m->pets_num === 1) { ?>
                                                        <?= Html::submitButton('-', ['class' => 'min', 'disabled' => 'disabled']) ?>
                                                    <?php } else { ?>
                                                        <?= Html::submitButton('-', ['class' => 'min']) ?>
                                                    <?php } ?>
                                                </em>
                                                <?php if ($m->pets_num >= $pet->stock) { ?>
                                                    <?= Html::textInput('ShopCart[pets_num]', $pet->stock, ['class' => 'num']) ?>
                                                <?php } else { ?>
                                                    <?= Html::textInput('ShopCart[pets_num]', $m->pets_num, ['class' => 'num']) ?>
                                                <?php } ?>
                                                <em class="add">
                                                    <?php if ($m->pets_num < $pet->stock) { ?>
                                                        <?= Html::submitButton('+', ['class' => 'add']) ?>

                                                    <?php }else { ?>
                                                    <?= Html::submitButton('+', ['class' => 'add', 'disabled' => 'disabled']) ?>

                                                </em>
                                            </div>
                                            <small>
                                                最多购买<?= $pet->stock ?>只，<br>
                                                已达到最大购买数量了
                                            </small>

                                        <?php } ?>
                                            <?php ActiveForm::end(); ?>
                                        </td>
                                        <td>
                                            <?= $m->pets_price * $m->pets_num ?>
                                            <!--<input id="amount" type="text" value="-->
                                            <? //= $m->pets_price * $m->pets_num ?><!--" class="hidden" data-bb="-->
                                            <? //= $m->id ?><!--">-->
                                        </td>
                                        <td>
                                            <!--                                        --><? //= Html::a('下单', ['shop-cart/details', 'id' => $m->id]) ?>
                                            &nbsp;&nbsp;
<!--                                            --><?//= Html::a('删除', ['class' => 'deleteOne'], [
//                                                'data' => [
//                                                    'confirm' => '您确定要删除吗?',
//                                                    'method' => 'post',
//                                                    'params' => [
//                                                        'params_key' => 'params_val'
//                                                    ]
//                                                ],
//                                            ]) ?>

                                            <button type="button" class="btn btn-sm btn-danger btn-erbi-danger deleteOne"
                                                    style="">删除
                                            </button>
                                        </td>
                                    </tr>
                                <? } ?>

                                <tr style="background-color: white">
                                    <td colspan="2">
                                        <input id="checkAll2" type="checkbox">全选
                                    </td>
                                    <td colspan="2">
                                        <?php $form = ActiveForm::begin(['action' => ['settlement'], 'method' => 'post']) ?>
                                        <label>总价：</label>
                                        <input type="text" name="shopId" class="shopId hidden">
                                        <input type="text" class="sum details" onfocus='this.blur()' value="0"
                                               name="sum">
                                        <input type="text" class="sum1 details hidden" onfocus='this.blur()' value="0"
                                               name="sum1">
                                    </td>
                                    <td colspan="2" class="text-center">

                                        <!--                                    --><? //= Html::a('结算', ['settlement'], [
                                        //                                        'class' => 'btn btn-sm btn-primary',
                                        //                                        'data' => [
                                        //                                            'method' => 'post',
                                        //                                        ],
                                        //                                    ]) ?>
                                        <button type="submit" class="btn btn-sm btn-success btn-erbi-danger"
                                                id="settlement">结算
                                        </button>
                                        <!--                                    <button type="submit" class="btn btn-sm btn-danger btn-erbi-danger" id="settlement"-->
                                        <!--                                            style="">结算2-->
                                        <!--                                    </button>-->

                                        <?php $form = ActiveForm::end() ?>
                                        <!--                                    <button type="button" class="btn btn-sm btn-danger btn-erbi-danger" id="settlement"-->
                                        <!--                                            style="">结算2-->
                                        <!--                                    </button>-->


                                        <button type="button" class="btn btn-sm btn-danger btn-erbi-danger"
                                                id="batchDel"
                                                style="">删除
                                        </button>

                                        <?= Html::a('清空购物车', ['clear'], [
                                            'class' => 'btn btn-sm btn-primary',
                                            'data' => [
                                                'confirm' => '确定要清空购物车吗？',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </td>

                                </tr>
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
                    <?php } ?>

                    <?php if ($model1) { ?>
                        <div class="text-center">
                            <table class="table table-striped text-left">
                                <thead>
                                <h5>失效商品（库存不足或已下架）</h5>
                                <tr>
                                    <th scope="col">
                                        &nbsp;&nbsp;#
                                    </th>
                                    <th scope="col">商品信息</th>
                                    <th scope="col">单价</th>
                                    <th scope="col">数量</th>
                                    <th scope="col">金额</th>
                                </tr>
                                </thead>
                                <tbody class="hctitle">
                                <?php foreach ($model1 as $m) {
                                    $pet = $m->pet;
                                    ?>
                                    <tr data-id="<?= $m->id ?>">

                                        <th scope="row">

                                            <?= $num1++ ?>
                                        </th>
                                        <td>
                                            <?= Html::img($pet->picture, ['class' => '', 'height' => '100']) ?>
                                            <?= Html::a($m['pets_category'], ['/pets/details', 'id' => $m->pets_id]) ?>
                                        </td>
                                        <td>

                                            <?= Html::textInput('ShopCart[pets_id]', $m->pets_price, ['class' => 'details hidden', 'onfocus' => 'this.blur()']) ?>
                                            <?= $m->pets_price ?>
                                        </td>
                                        <td style="width: 120px;">
                                            <?php $form = ActiveForm::begin(['action' => ['/shop-cart/update2', 'id' => $m->id], 'method' => 'post']) ?>
                                            <div class="gw_num">
                                                <em class="min">
                                                    <?php if ($m->pets_num === 1) { ?>
                                                        <?= Html::submitButton('-', ['class' => 'min', 'disabled' => 'disabled']) ?>
                                                    <?php } else { ?>
                                                        <?= Html::submitButton('-', ['class' => 'min']) ?>
                                                    <?php } ?>
                                                </em>
                                                <?= Html::textInput('ShopCart[pets_num]', $m->pets_num, ['class' => 'num']) ?>
                                                <em class="add">
                                                    <?= Html::submitButton('+', ['class' => 'add']) ?>
                                                </em>
                                            </div>
                                            <?php ActiveForm::end(); ?>
                                        </td>
                                        <td>
                                            <?= $m->pets_price * $m->pets_num ?>
                                        </td>
                                    </tr>
                                <? } ?>

                                <tr style="background-color: white">
                                    <td colspan="3">
                                    </td>
                                    <td colspan="2" class="text-center">
                                        <?= Html::a('清空失效宝贝', ['clear2'], [
                                            'class' => 'btn btn-sm btn-danger',
                                            'data' => [
                                                'confirm' => '确定要清空失效商品吗？',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

    <?php } ?>

</div>
</body>

</html>
<script src="/bs3/frontend/web/js/jquery-3.3.1.min.js"></script>

<!--全选-->
<script>
    $("#checkAll").add("#checkAll2").on('change', function () {
        if ($(this).is(":checked")) { // 全选
            $(".checkOne").prop("checked", true);
            $("#checkAll").prop("checked", true);
            $("#checkAll2").prop("checked", true);
        } else { // 反选
            $(".checkOne").prop("checked", false);
            $("#checkAll").prop("checked", false);
            $("#checkAll2").prop("checked", false);
            $(".zong").val(0);
            $(".sum").val(0);
            $(".shopId").val([]);


        }
        var ids = [];
        var ids2 = [];
        // 获取选中的id
        $('tbody input.checkOne').each(function (index, el) {
            if ($(this).prop('checked')) {
                ids.push($(this).data('bb'));
                ids2.push($(this).data('id'));

                var s = 0;
                for (var i = ids.length - 1; i >= 0; i--) {
                    s += ids[i];
                }
                $(".sum").val(s);
                $(".sum1").val(ids);
                $(".shopId").val(ids2);
                return ids;
            }
        });
        console.log(ids);
    });

</script>
<!--单个选择-->
<script>
    $(".checkOne").on('change', function () {
        if ($(this).is(":checked")) { //不做操作

        } else { //取消全选
            $("#checkAll").prop("checked", false);
            $("#checkAll2").prop("checked", false);
        }

        var ids = [];
        var ids2 = [];
        // 获取选中的id
        $('tbody input.checkOne').each(function (index, el) {
            if ($(this).prop('checked')) {
                ids.push($(this).data('bb'));
                ids2.push($(this).data('id'));
            }
        });
        var s = 0;
        var len = ids.length;
        if (len === 0) {
            $(".sum").val(0);
        } else {
            for (var i = len - 1; i >= 0; i--) {
                s += ids[i];
            }
            // $(".zong").val(s);
            $(".sum").val(s);
            $(".sum1").val(ids);
            $(".shopId").val(ids2);
        }
        console.log(ids);

    });
</script>

<script>
    $(".deleteOne").on('click', function () {
        var ids = document.getElementById('petsId').value;
        if (confirm('您确定要删除吗？')) {
            $.post('<?=Url::to(['delete']);?>',
                {
                    arr_id: ids,
                },

                //返回数据
                function (data, status) {
                    if (status === "success") {
                        alert("成功删除数据" + data + "件商品");
                        window.location.reload();//刷新当前页面.
                    } else {
                        alert("删除失败");
                        window.location.reload();//刷新当前页面.
                    }
                });
        }
    })
</script>
<!--批量删除-->
<script>
    $("#batchDel").on('click', function () {
        var ids = [];

        // 获取选中的id
        $('tbody input.checkOne').each(function (index, el) {
            if ($(this).prop('checked')) {
                ids.push($(this).data('id'))
            }
        });

        // confirm('确认要删除吗？' + ids.toString(), function (index) {
        //     //捉到所有被选中的，发异步进行删除
        //     ajaxBatchDel(ids.toString());
        // });
        console.log(ids);
        if (ids.length === 0) {
            alert("请先选择要删除的商品");
        } else {
            if (confirm('您确定要删除吗？')) {
                $.post('<?=Url::to(['delete-all']);?>',
                    {
                        arr_id: ids,
                    },

                    //返回数据
                    function (data, status) {
                        if (status === "success") {
                            alert("成功删除数据" + data + "件商品");
                            window.location.reload();//刷新当前页面.
                        } else {
                            alert("删除失败");
                            window.location.reload();//刷新当前页面.
                        }
                    });
            }
        }
    });
</script>
<!--结算-->
<script>
    // var x = document.getElementById("amount").value;
    $("#settlement").on('click', function () {
        var ids = [];

        // 获取选中的id
        $('tbody input.checkOne').each(function (index, el) {
            if ($(this).prop('checked')) {
                ids.push($(this).data('id'))
            }
        });
        console.log(ids);
        if (ids.length === 0) {
            alert("请先选择要购买的商品");
            return false;
        }

    })

</script>

