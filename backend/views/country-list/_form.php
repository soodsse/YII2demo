<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Continents;
use app\models\Countries;

/* @var $this yii\web\View */
/* @var $model app\models\CountryList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-list-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?php $listData=ArrayHelper::map(Continents::find()->asArray()->all(),'code','name');

       $countryData= ArrayHelper::map(Countries::find()
	->innerJoinWith('continentCode', false)
        ->filterWhere(['name' => null, 'continents.code' => $model->continents_code])->asArray()           ->all() ,'code','name');

       echo $form->field($model, 'continents_code')->dropDownList($listData,['code'=>'name','onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["country-list/continent_country"]).'&code="+$(this).val(), function( data ) {
                $( "#countrylist-countries_code" ).html( data );
           });
      '])->label('Continent');?>
     <?php /**/echo $form->field($model, 'countries_code')->dropDownList($countryData, [''=>'Select Country']);  ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
