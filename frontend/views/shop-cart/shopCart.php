<?php declare(strict_types=1); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$num = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
<style>
.gw_num{border: 1px solid #dbdbdb;width: 110px;line-height: 26px;overflow: hidden;}
.gw_num em{display: block;height: 26px;width: 26px;float: left;color: #7A7979;border-right: 1px solid #dbdbdb;text-align: center;cursor: pointer;}
.gw_num .num{display: block;float: left;text-align: center;width: 52px;font-style: normal;font-size: 14px;line-height: 24px;border: 0;}
.gw_num em.add{float: right;border-right: 0;border-left: 1px solid #dbdbdb;}
.details{border: none}

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

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="text-center title" style="">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">名称</th>
                            <th scope="col">单价</th>
                            <th scope="col">数量</th>
                            <th scope="col">金额</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($model as $m) {?>

                        <tr>
                            <th scope="row">
                                <?= $num++ ?>
                            </th>
                            <th scope="row">
<!--                                --><?//= Html::textInput('ShopCart[pets_id]',$m->pets_name,['class' => 'details', 'onfocus'=>'this.blur()' ])?>
                                <?= Html::a($m['pets_name'], ['/pets/details', 'id' => $m->pets_id]) ?>

                            </th>
                            <td>
                                <?= Html::textInput('ShopCart[pets_id]',$m->pets_price,['class' => 'details', 'onfocus'=>'this.blur()' ])?>
                            </td>
                            <td style="width: 120px;">
                                <?php  $form = ActiveForm::begin(['action' => ['/shop-cart/update2', 'id' => $m->id],'method' => 'post'])?>

                                <!--                                <div class="gw_num">-->
<!--                                    <em class="jian">-</em>-->
<!--                                        <input type="text" value="--><?//=$m->pets_num?><!--" class="num"/>-->
<!--                                     <em class="add">+</em>-->
<!--                                </div>-->
                                <div class="gw_num">
                                    <em class="min">
                                        <?= Html::submitButton('-', ['class' => 'min']) ?>
                                    </em>
                                    <?= Html::textInput('ShopCart[pets_num]',$m->pets_num,['class' => 'num'])?>
                                    <em class="add">
                                        <?= Html::submitButton('+', ['class' => 'add']) ?>
                                    </em>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </td>
                            <td>
                                <?= $m->sum = $m->pets_price * $m->pets_num?>
                            </td>
                            <td>
                                <?= Html::a('下单',['shop-cart/details','id' => $m->id])?>
                                &nbsp;&nbsp;
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




</body>

</html>
