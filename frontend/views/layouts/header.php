<?php declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$username = Yii::$app->user->identity->username;

?>


<?php $form = ActiveForm::begin(['action' => ['site/login'], 'method' => 'post']); ?>
<div class="modal fade" id="mymodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">登录页面</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <p>请输入用户名和密码！</p>
                    <div class="form-group row">
                        <label for="num" class="col-md-2 col-form-label">学号</label>
                        <div class="col-md-10">
                            <input type="text" name="LoginForm[username]" id="num" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pwd" class="col-md-2 col-form-label">密码</label>
                        <div class="col-md-10">
                            <input type="password" name="LoginForm[password]" id="pwd" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">记住我</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 offset-md-1">
                            <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            <?= Html::a('注册', ['/site/signup'], ['class' => 'btn btn-primary']) ?>
                            <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
                            <?= Html::a('忘记密码', ['site/request-password-reset'], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light aa a1">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">首页 <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="navbar-collapse collapse" id="mynav1">
            <ul class="navbar-nav ml-auto">
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li class="nav-item">
                        <!--                            'data-target' => '#mymodal' , 'data-toggle' => 'modal'-->
                        <?= Html::a('登录', ['/site/login'],['class' => 'nav-link', ]) ?>
                    </li>
                    <!--                        <li class="nav-item"><a href="" class="nav-link " data-toggle="modal" data-target="#mymodal">登录</a></li>-->
                <? } else { ?>
                    <li class="nav-item">
                        <?= Html::a('退出登录(' . $username . ')', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('个人中心', ['/index/personal'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <!--                        <a href="" class="nav-link">购物车</a>-->
                        <?= Html::a('购物车', ['/shop-cart/shop-cart'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                    </li>
                    <li class="nav-item">
                        <?= Html::a('订单', ['/orders/orders'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
                    </li>
                <? } ?>

                <li class="nav-item"><a href="" class="nav-link">客服</a></li>

                <!--                    <li class="nav-item"><a href="" class="nav-link">客服</a></li>-->
            </ul>
        </div>
    </div>
</nav>

<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark aa sticky-top" style="height: 80px;">-->
<!--    <a class="navbar-brand" href="index.html">-->
<!--        <img src="/bs3/frontend/views/public/image/a1.jpg" width="30" height="30" class="d-inline-block align-top header"-->
<!--             alt="">-->
<!--    </a>-->
<!---->
<!---->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
<!--            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--        <div class="" style="margin: 0 auto;text-align: center;">-->
<!--            --><?php //$form = ActiveForm::begin(['action' => ['pets/search'], 'method' => 'get']) ?>
<!---->
<!--            --><?php
//            $aa=\backend\models\Pets::find()->all();
//            ?>
<!--            <select class="custom-select" name="category" style="width: 250px;float:left;margin-right: 10px;">-->
<!--                <option selected value="">请选择猫的类别</option>-->
<!--                --><?php //foreach ($aa as $a): ?>
<!--                    <option value="--><?//=$a->category?><!--">--><?//=$a->category?><!--</option>-->
<!--                --><?php //endforeach; ?>
<!--                                    <option value="布偶猫">布偶猫</option>-->
<!--                                    <option value="加菲猫">加菲猫</option>-->
<!--                                    <option value="折耳猫">折耳猫</option>-->
<!--                                    <option value="折耳猫">波斯猫</option>-->
<!--                                    <option value="折耳猫">暹罗猫</option>-->
<!--                                    <option value="折耳猫">孟买猫</option>-->
<!--                                    <option value="折耳猫">金吉拉猫</option>-->
<!--                                    <option value="折耳猫">美国短毛猫</option>-->
<!--                                    <option value="折耳猫">英国短毛猫</option>-->
<!--                                    <option value="折耳猫">挪威森林猫</option>-->
<!--                                    <option value="折耳猫">中国狸花猫</option>-->
<!--                                    <option value="折耳猫">加菲猫</option>-->
<!--            </select>-->
<!---->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"-->
<!--                   style="width: 400px;float: left" name="name">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!---->
<!--            --><?php //ActiveForm::end() ?>
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</nav>-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top aa">
<!--    <a class="navbar-brand" href="#">xxx</a>-->
    <a class="navbar-brand" href="index.html">
        <img src="/bs3/frontend/views/public/image/a1.jpg" width="30" height="30" class="d-inline-block align-top header"
             alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="tabs_nav" style="margin: 0 auto">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link" href="#" style="display: none"></a>

            <li class="nav-item">
                <?= Html::a('首页', ['/index/index'], ['class' => 'nav-link']) ?>
                <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <!--                    <a class="nav-link dropdown-toggle" href="category.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                    --><? //= Html::a('宠物猫品种', ['pets/category'], ['class' => 'nav-link dropdown-toggle']) ?>

                <?= Html::a('宠物猫品种', ['pets/category'], ['class' => 'nav-link']) ?>


                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">布偶猫</a>
                    <a class="dropdown-item" href="#">加菲猫</a>
                    <a class="dropdown-item" href="#">折耳猫</a>
                    <a class="dropdown-item" href="#">波斯猫</a>
                    <a class="dropdown-item" href="#">暹罗猫</a>
                    <a class="dropdown-item" href="#">孟买猫</a>
                    <a class="dropdown-item" href="#">金吉拉猫</a>
                    <a class="dropdown-item" href="#">美国短毛猫</a>
                    <a class="dropdown-item" href="#">英国短毛猫</a>
                    <a class="dropdown-item" href="#">挪威森林猫</a>
                    <a class="dropdown-item" href="#">中国狸花猫</a>
                    <a class="dropdown-item" href="#">加菲猫</a>

                    <!-- <div class="dropdown-divider"></div> -->
                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
            </li>
            <!--                <li class="nav-item">-->
            <!--                    <a class="nav-link" href="#">宠物猫价格</a>-->
            <!--                </li>-->
            <li class="nav-item">
                <?= Html::a('销售排行', ['pets/ranking'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= Html::a('新品上架', ['pets/news-upper-shelf'], ['class' => 'nav-link']) ?>

            </li>
            <li class="nav-item">
                <?= Html::a('商城公告', ['notices/notices'], ['class' => 'nav-link']) ?>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">养猫指南</a>
            </li>
            <li class="nav-item">
<!--                <a class="nav-link" href="#">猫咪知识</a>-->
                <?= Html::a('猫咪知识', ['knowledges/knowledges'], ['class' => 'nav-link']) ?>

            </li>
            <li class="nav-item">
                <!--                    <a class="nav-link disabled" href="Index/about">关于我们</a>-->
                <?= Html::a('关于我们', ['about/about'], ['class' => 'nav-link']) ?>

            </li>
        </ul>

        <?php $form = ActiveForm::begin(['action' => ['pets/search'], 'method' => 'get']) ?>

        <?php
        $aa=\backend\models\Pets::find()->all();
        ?>
        <select class="custom-select" name="category" style="width: 250px;float:left;margin-right: 10px;">
            <option selected value="">请选择猫的类别</option>
            <?php foreach ($aa as $a): ?>
                <option value="<?=$a->category?>"><?=$a->category?></option>
            <?php endforeach; ?>

        </select>

<!--        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"-->
<!--               style="width: 400px;float: left" name="name">-->
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

        <?php ActiveForm::end() ?>
    </div>
</nav>
