<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketSummary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-summary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jackpot_id')->dropDownList([''=>'Select Jackpot']); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tandc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_on')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_on')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
