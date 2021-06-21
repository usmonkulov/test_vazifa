<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$this->title = Yii::t('yii', 'Foydalanuvchini tahrirlash') . ': ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Foydalanuvchilar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->username, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = Yii::t('yii', 'Tahrirlash');
?>
<div class="user-update">

   <div class="row mt">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body minimal">
                	<h4 class="mb"><i class="fa fa-angle-right"></i> <?= Html::encode($this->title) ?></h4>
	      				<?= $this->render('_form', ['user' => $user]) ?>
                </div>
            </section>
        </div>
    </div>

</div>
