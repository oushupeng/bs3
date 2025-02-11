<?php

use dmstr\widgets\Menu;
use mdm\admin\components\MenuHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$username = Yii::$app->user->identity->username;
$head = Yii::$app->user->identity->head;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $head ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>你好，<?= $username ?>！</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!--        <form action="#" method="get" class="sidebar-form">-->
<!--        --><?php //$form = ActiveForm::begin(['action' => ['site/search'], 'method' => 'post',
//            'options' => [
//                'class' => 'sidebar-form'
//            ]
//        ]) ?>
<!---->
<!--        <div class="input-group">-->
<!--            <input type="text" name="q" class="form-control" placeholder="搜索菜单"/>-->
<!--            <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--        </div>-->
<!--        --><?php //ActiveForm::end() ?>
        <!--        </form>-->
        <!-- /.search form -->

        <!--        --><? //= dmstr\widgets\Menu::widget(
        //            [
        //                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
        //                'items' => [
        //                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
        //                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
        //                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
        //                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
        //                    [
        //                        'label' => 'Some tools',
        //                        'icon' => 'share',
        //                        'url' => '#',
        //                        'items' => [
        //                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
        //                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
        //                            [
        //                                'label' => 'Level One',
        //                                'icon' => 'circle-o',
        //                                'url' => '#',
        //                                'items' => [
        //                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
        //                                    [
        //                                        'label' => 'Level Two',
        //                                        'icon' => 'circle-o',
        //                                        'url' => '#',
        //                                        'items' => [
        //                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
        //                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
        //                                        ],
        //                                    ],
        //                                ],
        //                            ],
        //                        ],
        //                    ],
        //                ],
        //            ]
        //        ) ?>

        <?= Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id)
        ])
        ?>


    </section>

</aside>
