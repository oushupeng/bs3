<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SerachNotices */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '公告管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notices-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'options' => [
            'class' => 'grid-view',
            'style'=>'overflow:auto',
            'id' => 'grid',
        ],
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class'=>'yii\grid\CheckboxColumn',
                'name'=>'id',  //设置每行数据的复选框属性
                'headerOptions' => ['width'=>'30'],
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'content',
            'created_by',
            'created_at:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    // 下面代码来自于 yii\grid\ActionColumn 简单修改了下
                    'view' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '查看'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-primary btn-xs',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '编辑'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'class' => 'btn btn-success btn-xs',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('yii', '删除'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', '确实要删除此条数据吗？'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class' => 'btn btn-danger btn-xs',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
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
<script src="/bs3/frontend/web/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">

    $(".gridview").on("click", function () {

        if(confirm('您确定要删除这些数据吗？')){

            var keys = $("#grid").yiiGridView("getSelectedRows");

            //post提交
            $.post('<?=Url::to(['delete-all']);?>',
                {
                    arr_id:keys,
                },

                //返回数据
                function(data,status){
                    if (status === "success") {
                        alert("成功删除数据"+data+"条");
                        window.location.reload();//刷新当前页面.
                    }else{
                        alert("删除失败");
                        window.location.reload();//刷新当前页面.
                    }
                });
        }});
</script>
