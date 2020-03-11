<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SerachKnowledges */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '宠物猫知识';
$this->params['breadcrumbs'][] = $this->title;
$num = 1;
?>
<div class="knowledges-index">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    --><?//= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'title',
                'views',
                'created_by',
                'created_at:datetime',
//                ['class' => 'yii\grid\ActionColumn'],

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
                            ];
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                        },
                        'update' => function ($url, $model, $key) {
                            $options = [
                                'title' => Yii::t('yii', '更新'),
                                'aria-label' => Yii::t('yii', 'Update'),
                                'data-pjax' => '0',
                            ];
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                        },
                        'delete' => function ($url, $model, $key) {
                            $options = [
                                'title' => Yii::t('yii', '删除'),
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data-confirm' => Yii::t('yii', '确实要删除此跳数据吗？'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
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

<!--    <table class="table table-responsive table-striped table-bordered ">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th colspan="2" class="">-->
<!--                --><?//= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
<!--            </th>-->
<!--            --><?php //$form = ActiveForm::begin(['action' => ['search'], 'method' => 'get']) ?>
<!--            <th>-->
<!--                --><?//= Html::textInput('title', '', ['class' => 'form-control ', 'style' => 'width:50%;display: inline;', 'placeholder' => '请输出标题关键字进行搜索查询']) ?>
<!---->
<!--                --><?//= Html::textInput('created_by', '', ['class' => 'form-control ', 'style' => 'width:40%;display: inline;', 'placeholder' => '请输出创建人关键字进行搜索查询']) ?>
<!--            </th>-->
<!--            <th colspan="2">-->
<!--                --><?//= Html::submitButton('搜索', ['class' => 'btn btn-success']) ?>
<!--            </th>-->
<!--            --><?php //ActiveForm::end() ?>
<!--        </tr>-->
<!--        <tr>-->
<!--            <th scope="col">#</th>-->
<!--            <th scope="col">标题</th>-->
<!--            <th scope="col">内容</th>-->
<!--            <th scope="col">创建人</th>-->
<!--            <th scope="col">创建时间</th>-->
<!--            <th scope="col">操作</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        --><?php //foreach ($model as $m): ?>
<!--            <tr>-->
<!--                <td>--><?//= $num++ ?><!--</td>-->
<!--                <td>--><?//= $m->title ?><!--</td>-->
<!--                <td>-->
<!--                    <textarea rows="9" cols="80">--><?//= $m->content ?><!--</textarea>-->
<!--                    --><?//=Html::textarea('area',$m->content,['class'=>'form-control','rows'=>'9', 'cols' => '80']);?>
<!--                </td>-->
<!--                <td>--><?//= $m->created_by ?><!--&nbsp;&nbsp;&nbsp;</td>-->
<!--                <td>--><?//= date('Y-m-d m:i:s', $m->created_at) ?>
<!--                </td>-->
<!--                <td>-->
<!--                    --><?//= Html::a('<i class="fa fa-eye pointer" aria-hidden="true"></i>', ['view', 'id' => $m->id]) ?>
<!--                    &nbsp;-->
<!--                    --><?//= Html::a('<i class="fa fa-pencil-square-o pointer" aria-hidden="true"></i>', ['update', 'id' => $m->id]) ?>
<!--                    &nbsp;-->
<!--                    --><?//= Html::a('<i class="fa fa-trash-o pointer" aria-hidden="true"></i>', ['delete', 'id' => $m->id], [
//                        'data' => [
//                            'confirm' => '确实要删除此数据吗？',
//                            'method' => 'post',
//                        ],
//                    ]) ?>
<!--                </td>-->
<!--            </tr>-->
<!--        --><?php //endforeach; ?>
<!--        </tbody>-->
<!--    </table>-->
<!--    --><?//= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
