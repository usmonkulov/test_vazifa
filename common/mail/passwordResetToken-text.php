<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Salom <?= $user->username ?>,

Parolni qayta tiklash uchun quyidagi havoladan o'ting:

<?= $resetLink ?>
