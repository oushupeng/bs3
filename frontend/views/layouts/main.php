<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">

    <?php
    //键值为error的弹话框
    if(Yii::$app->getSession()->hasFlash('error')){
        echo Alert::widget([
            'options'=>[
                'class'=>'error',
            ],
            //'body'=>Yii::$app->getSession()->getFlash('success'),
        ]);
    }

    //键值为success的弹话框
    if(Yii::$app->getSession()->hasFlash('success')){
        echo Alert::widget([
            'options'=>[
                'class'=>'success',
            ],
            //'body'=>Yii::$app->getSession()->getFlash('success'),
        ]);
    }
    ?>

    <?= $this->render('header.php')?>


    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container text-center">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> 中国猫猫网 &nbsp;&nbsp;&nbsp;Copyright &copy;
            2019-<?= date('Y') ?></p>
    </div>
</footer>


<script src="/bs3/frontend/web/js/jquery-3.3.1.min.js"></script>
<script src="/bs3/frontend/web/js/bootstrap.min.js"></script>
<script src="/bs3/frontend/web/js/popper.min.js"></script>

<!--导航栏高亮-->
<script>
    //获取div下面所有的a标签（返回节点对象）
    var myNav = document.getElementById("tabs_nav").getElementsByTagName("a");
    //获取当前窗口的url
    var myURL = document.location.href;
    //循环div下面所有的链接，
    for (var i = 1; i < myNav.length; i++) {
        //获取每一个a标签的herf属性
        var links = myNav[i].getAttribute("href");
        var myURL = document.location.href;
        //查看div下的链接是否包含当前窗口，如果存在，则给其添加样式
        if (myURL.indexOf(links) != -1) {
            myNav[i].className = "nav-link  active";
            myNav[0].className = "";
        }
    }
</script>

<!--购物车、订单加减-->
<script>
    $(document).ready(function () {
        $('.fa-heart').on('click', function () {
            $(this).toggleClass('like')
        })
    })
</script>
<script>
    $(function () {
        $(".add").click(function () {
            var t = $(this).parent().find('input[class*=num]');
            t.val(parseInt(t.val()) + 1)
            setTotal();
        })
        $(".min").click(function () {
            var t = $(this).parent().find('input[class*=num]');
            t.val(parseInt(t.val()) - 1)
            if (parseInt(t.val()) < 0) {
                t.val(0);
            }
            setTotal();
        })


        function setTotal() {
            var s = 0;
            $("#tab").each(function () {
                s += parseInt($(this).find('input[class*=num]').val()) * parseFloat($(this).find('input[class*=price]').val());
            });
            $("#total").val(s.toFixed());
            // $("#total").html(s.toFixed(2));
        }

        setTotal();

    })
</script>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!--        //加的效果-->
<!--        $(".add").click(function(){-->
<!--            var n=$(this).prev().val();-->
<!--            var num=parseInt(n)+1;-->
<!--            if(num===0){ return;}-->
<!--            $(this).prev().val(num);-->
<!--        });-->
<!--        //减的效果-->
<!--        $(".min").click(function () {-->
<!--            var n=$(this).next().val();-->
<!--            var num=parseInt(n)-1;-->
<!--            if (num===0){return;}-->
<!--            $(this).next().val(num);-->
<!---->
<!--        })-->
<!--    });-->
<!--</script>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
