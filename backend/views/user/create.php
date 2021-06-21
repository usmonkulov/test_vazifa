<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$this->title = Yii::t('yii', 'Foydalanuvchi yaratish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Foydalanuvchilar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

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

