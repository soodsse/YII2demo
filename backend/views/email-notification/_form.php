<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
date_default_timezone_set('Asia/Kolkata');
/* @var $this yii\web\View */
/* @var $model app\models\EmailNotifications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-notifications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true])->hint('Note: Avoid spaces, special charaters in alias.') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'InActive' => 'InActive', ], ['prompt' => '']) ?>
<?php /*
    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'updated_on')->textInput() ?>
 * 
 */
?>
    <?php echo (Yii::$app->controller->action->id == 'create')? $form->field($model, 'created_on',['inputOptions'=>['value'=>date("Y-m-d H:i:s")]])->hiddenInput()->label(false):''; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
