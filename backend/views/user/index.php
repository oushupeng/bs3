<?php

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SerachUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'head',
                'format' => ['raw',],
                'value' => function($model){
                    return Html::img($model->head,['class' => 'img-circle','height' => '70']);
                }
            ],
            'username',
            'email:email',
            'last_login_time:datetime',
            'created_at:datetime',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if ($model->status === User::STATUS_ACTIVE){
                        return '已激活';
                    }
                    return '未激活';
                },
                'footerOptions' => ['class'=>'hide']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {frozen}',
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

                    'frozen' => function ($url, $model, $key) {
                        $options1 = [
                            'title' => Yii::t('yii', '冻结'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-danger btn-xs',
                        ];
                        $options2 = [
                            'title' => Yii::t('yii', '解冻'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-danger btn-xs',
                        ];

                        if ($model->status === User::STATUS_ACTIVE) {
                            return Html::a('冻结', $url, $options1);
                        }
                        return Html::a('解冻', $url, $options2);
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
