<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('yii', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">

    <?php $form = ActiveForm::begin(['id' => 'reset-password-form','options' => ['class' => 'form-login']])?>

        <h2 class="form-login-heading"><?= Html::encode($this->title) ?></h2>
        <div class="login-wrap">
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
                'placeholder' => Yii::t('yii', 'Enter new password')
            ]
        ) ?>

        <?= Html::submitButton('<i class="fa fa-lock"></i> '.Yii::t('yii', 'Save'), ['class' => 'btn btn-theme btn-block']) ?>
        <hr>
        <div class="login-social-link centered">
            <p><?= Yii::t('yii', 'If you forgot your password you can') ?></p>
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