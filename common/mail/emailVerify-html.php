<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>按照下面的链接验证您的电子邮件（复制链接到新的页面打开）：</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>
</div>
