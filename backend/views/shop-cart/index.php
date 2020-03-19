<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SerachShopCart */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '购物车管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-cart-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pets_id',
            'pets_category',
            'pets_num',
            'pets_price',
            'user_name',
            'created_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '查看'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-primary btn-xs',
                        ];
                        return Html::a('查看', $url, $options);
                    },
                ]
            ],

        ],
        'layout'=>"{items}\n{summary}\n{pager}",
        'summary' => '<p class="summary">当前显示第{begin} - {end}条，共{totalCount}条。</p>',
        'pager' => [//自定义分页样式以及显示内容
            'activePageCssClass' => 'active',
            'options' => ['class' => 'pagination pagination-default'],
            'firstPageLabel' => '第一页',
            'lastPageLabel' => '最后一页',
        ],
        'emptyText'=>'当前没有数据。',
    ]); ?>


</div>
