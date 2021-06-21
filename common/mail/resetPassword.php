<?php

use yii\helpers\Html;

echo Yii::t('yii', 'Salom'), Html::encode($user->username).'.';

echo Html::a(Yii::t('yii', 'Parolni o\'zgartirish uchun ushbu havolani bosing.'),

	Yii::$app->urlManager->createAbsoluteUrl(
		[
			'/site/reset-password',
			'key' => $user->secret_key
		]
	));