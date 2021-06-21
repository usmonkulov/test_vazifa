<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
$this->registerJsFile('@web/js/nuqta.js', ['depends' => 'yii\web\YiiAsset']);
$this->title = 'Kirish';
$this->params['breadcrumbs'][] = $this->title;
use yii\helpers\Url;
?>

<div class="container">
  <?php $form = ActiveForm::begin(['options' => ['class' => 'form-login']])?>
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
      <?php if ($model->scenario === 'lwe'): ?>
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
      <?php else: ?>
        <?= $form->field($model, 'username',
            ['options' => 
                [
                    'tag' => 'div',
                    'class' => 'has-feedback'
                ],
               'template' => '{input}<span style="padding-top:10px" class="fa fa-user form-control-feedback"></span>
                {error}{hint}'
            ]
        )->textInput(
            [
                'class' => 'form-control',
                'placeholder' => 'Foydalanuvchi nomi',
                'autofocus' => true,
            ]
        ) ?>
      <?php endif ?>
        <?= $form->field($model, 'password',
            ['options' => 
                [
                    'tag' => 'div',
                    'class' => 'has-feedback'
                ],
               'template' => '{input}<span style="padding-top:10px" class="fa fa-lock form-control-feedback"></span>
                {error}{hint}'
            ]
        )->passwordInput(
            [
                'class' => 'form-control',
                'placeholder' => 'Parol'
            ]
        ) ?>

       <?= $form->field($model, 'rememberMe',
            ['options' => 

                [
                    'tag' => 'div',
                    'class' => 'has-feedback'
                ],
               'template' => '{error}{hint}'
            ])->checkbox(
        [
          'template' => '
            <label class="checkbox">{input}{label}
            <span class="pull-right">
              <a href='.Url::to(['site/request-password-reset']).'>Parolni unutdingizmi?</a>
            </span></label>
          ',
        ]
        ) ?> 

      <?= Html::submitButton('<i class="fa fa-lock"></i> Kirish', ['class' => 'btn btn-theme btn-block']) ?>
      <hr>
      <div class="login-social-link centered">
        <p>Nomzodlarni ro'yxatga olish tizimiga xush kelibsiz</p>
      </div>
    </div>
  <?php ActiveForm::end(); ?>
</div>

<style>
.checkbox label {
    padding-left: 8px;
}
</style>

<script src="<?=Yii::getAlias('@web/')?>lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=Yii::getAlias('@web/')?>lib/jquery.backstretch.min.js"></script>
<script>
  $.backstretch("<?=Yii::getAlias('@web/')?>img/login-bg.jpg", {
    speed: 500
  });
</script>