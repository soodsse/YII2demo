<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LotteryDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lottery-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'currency_id')->textInput() ?>

    <?= $form->field($model, 'lottery_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lottery_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lottery_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Html::Button('Cancel', ['class' => 'btn btn-primary']), Yii::$app->request->referrer) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
