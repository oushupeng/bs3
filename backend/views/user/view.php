<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = '用户名：'.$model->username;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


    <p>
        <?= Html::a('返回', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            [
                'attribute'=>'头像',
                'format' => ['raw',],
                'value' => function($model){
                    return Html::img($model->head,['class' => 'img-circle','height' => '100']);
                }
            ],
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if ($model->status === User::STATUS_ACTIVE) {
                        return '已激活';
                    }

                    if ($model->status === User::STATUS_INACTIVE) {
                        return '未激活';
                    }

                    return '冻结';
                },
                'footerOptions' => ['class'=>'hide']
            ],
            'created_at:datetime',
//            'updated_at:datetime',
            'last_login_time:datetime',
        ],
    ]) ?>

</div>
