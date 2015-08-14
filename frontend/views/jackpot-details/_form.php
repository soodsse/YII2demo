<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JackpotDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jackpot-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jackpot_price')->textInput() ?>

    <?= $form->field($model, 'ticket_price')->textInput() ?>

    <?= $form->field($model, 'jackpot_section_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'average_person')->textInput() ?>

    <?= $form->field($model, 'continent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countryid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tandc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
