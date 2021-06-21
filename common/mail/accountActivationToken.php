<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/activate-account', 
    'token' => $user->account_activation_token]);
?>

Hello <?= Html::encode($user->username) ?>,

Follow this link to activate your account:

<?= Html::a('Iltimos, hisobingizni faollashtirish uchun shu erni bosing.', $resetLink) ?>