<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Ariza yuboring';
?>
<div class="site-index">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- START ALERTS AND CALLOUTS -->
                <?php if(Yii::$app->session->hasFlash('success') ): ?>
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo Yii::$app->session->getFlash('success'); ?>
                    </div>
                <?php endif;?>
                <!-- END ALERTS AND CALLOUTS -->

                <!-- START ALERTS AND CALLOUTS -->
                <?php if(Yii::$app->session->hasFlash('error') ): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo Yii::$app->session->getFlash('error'); ?>
                    </div>
                <?php endif;?>
                <!-- END ALERTS AND CALLOUTS -->
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(
                        [
                            'maxlength' => true,
                            'placeholder' => 'Ali'
                        ]
                ) ?>

                <?= $form->field($model, 'family_name')->textInput(
                        [
                            'maxlength' => true,
                            'placeholder' => 'Asqarov'
                        ]
                ) ?>

                <?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), [
                    'mask' => '+999999999999',
                ])->textInput(
                    [
                        'placeholder' => '+998999999999'
                    ]
                ) ?>

                <?= $form->field($model, 'email_adress')->textInput(
                        [
                            'maxlength' => true,
                            'placeholder' => 'example@mail.uz'
                        ]
                ) ?>

                <?= $form->field($model, 'age')->textInput(
                        [
                            'type' => 'number',
                            'min' => '0',
                            'placeholder' => '20'
                        ]
                ) ?>

                <?= $form->field($model, 'country_of_origin')->textInput(
                        [
                            'maxlength' => true,
                            'placeholder' => 'O\'zbekiston'
                        ]
                ) ?>

                <?= $form->field($model, 'address')->textarea(
                        [
                            'rows' => 6,
                            'placeholder' => 'Viloyat Tuman Mahalla fuqorolar yig\'ini (Ko\'cha, Ovul, Qishloq, Uy)'
                        ]
                ) ?>

                <div class="form-group">
                    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
</div>
