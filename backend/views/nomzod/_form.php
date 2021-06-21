<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Nomzod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomzod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => '+999999999999',
    ]) ?>

    <?= $form->field($model, 'email_adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput(['type' => 'number','min' => '0']) ?>

    <?= $form->field($model, 'country_of_origin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hired')->dropDownList($model->hiredList) ?>

    <?= $form->field($model, 'status')->dropDownList($model->statusList) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Saqlash' : 'Tahrirlash', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Orqoga', ['nomzod/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
