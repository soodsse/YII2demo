<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-register-form">
    <?php if( Yii::$app->getSession()->hasFlash('error')):?>
    <div class="info">
        <?php echo  Yii::$app->getSession()->getFlash('error'); ?>
    </div>
<?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly' => true]) ?>
   
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true,'value' => '']); ?>
    
    <?php echo Html::beginTag("div",["class" => "form-group field-user-password_hash required"]); ?>    
    <?php echo Html::label("New Password", "password", array('class' => 'control-label')); ?>
     
<?php echo Html::input("password", "repeat_password", "", array('id' => 'hiddenInput','class' => 'form-control')); ?>
   <?php echo Html::endTag("div"); ?>
     <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
       <?php //echo GridView::widget(['dataProvider' => $dataProvider,]); ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
