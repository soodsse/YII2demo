<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
date_default_timezone_set('Asia/Kolkata');
/* @var $this yii\web\View */
/* @var $model app\models\UsersRegister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-register-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailID')->textInput(['maxlength' => true]) ?>
    
    <?php if($model->isNewRecord) { ?>
    
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value' => '']) ?>

    <?= $form->field($model, 'con_password')->passwordInput(['maxlength' => true,'value' => '']) ?>
    
    <?php } ?>
    
    <?= $form->field($model, 'gender')->dropDownList(['male'=>'Male','female'=>'Female']) ?>
      
    <?= $form->field($model, 'date_of_birth')->textInput(); ?>
    
    <?= $form->field($model, 'user_pic')->fileInput()->hint('Extensions: jpg, jpeg, png.') ?>
    <?php if(isset($model->user_pic) && ($model->user_pic != "")){ ?>
    <img src="<?= Yii::getAlias('@SERVER')."/userPic/".$model->user_pic ?>" height="50" width="50" />     <br><br>
    <?php } ?>
   
    <?php echo (Yii::$app->controller->action->id == 'create')? $form->field($model, 'created_date',['inputOptions'=>['value'=>date("Y-m-d H:i:s")]])->hiddenInput()->label(false):''; ?>


    <div class="form-group">
       <?php //echo GridView::widget(['dataProvider' => $dataProvider,]); ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
