<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Emailga yuborish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <?php $form = ActiveForm::begin(['id' => 'reset-email-form','options' => ['class' => 'form-login']])?>

        <h2 class="form-login-heading"><?= Html::encode($this->title) ?></h2>
        <div class="login-wrap">

        <!-- START ALERTS AND CALLOUTS -->
        <?php if(Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
        <?php endif;?>     
        <!-- END ALERTS AND CALLOUTS -->

        <!-- START ALERTS AND CALLOUTS -->
        <?php if(Yii::$app->session->hasFlash('warning') ): ?>
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <?php echo Yii::$app->session->getFlash('warning'); ?>
        </div>
        <?php endif;?>     
        <!-- END ALERTS AND CALLOUTS -->

         <?= $form->field($model, 'email',
            ['options' => 
                [
                    'tag' => 'div',
                    'class' => 'has-feedback'
                ],
               'template' => '{input}<span style="padding-top:10px" class="fa fa-envelope form-control-feedback"></span>
                {error}{hint}'
            ]
        )->textInput(
            [
                'class' => 'form-control',
                'placeholder' => 'Elektron pochta',
                'autofocus' => true,
            ]
        ) ?>

        <?= Html::submitButton('<i class="fa fa-envelope"></i> Yuborish', ['class' => 'btn btn-theme btn-block']) ?>
        <hr>
        <div class="login-social-link centered">
            <p>Login parolingiz esingizga tushgan bo'lsa qayting</p>
        </div>
        <div class="registration">
            <a href="<?=Url::to(['site/login'])?>">Kirishga qaytish</a>
          </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<script src="<?=Yii::getAlias('@web/')?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=Yii::getAlias('@web/')?>lib/jquery.backstretch.min.js"></script>
<script>
  $.backstretch("<?=Yii::getAlias('@web/')?>img/login-bg.jpg", {
    speed: 500
  });
</script>


