<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 
    'token' => $user->password_reset_token]);
?>

Hello <?= Html::encode($user->username) ?>,

Parolni qayta tiklash uchun ushbu havoladan o'ting:

<?= Html::a('Parolingizni tiklash uchun bu erni bosing.', $resetLink) ?>
