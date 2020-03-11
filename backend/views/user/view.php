<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = '用户信息：'.$model->username;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '用户名：'.$this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


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
            'status',
            'last_login_time:datetime',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
