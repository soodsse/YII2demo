<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Continents;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php 
    //use app\models\Country;
    $continents =  Continents::find()->all();    
    
   // Yii::$app->customFun->prx($continents);
    
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php $continentData = ArrayHelper::map($continents,'id','name'); ?>
    <?php echo $form->field($model, 'continents_id')->dropDownList($continentData,['prompt'=>'Select...']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
