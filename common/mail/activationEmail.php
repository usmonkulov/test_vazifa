<?php

use yii\helpers\Html;

echo Yii::t('yii', 'Salom'), Html::encode($user->username).'.';

echo Html::a(Yii::t('yii', 'Hisobingizni faollashtirish uchun ushbu havolaga o\'ting'),

	Yii::$app->urlManager->createAbsoluteUrl(
		[
			'/site/activate-account',
			'key' => $user->secret_key
		]
	));