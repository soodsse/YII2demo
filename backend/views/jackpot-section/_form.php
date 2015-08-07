<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Continents;
use app\models\Countries;
use app\models\CountryList;

/* @var $this yii\web\View */
/* @var $model app\models\JackpotDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jackpot-details-form<?php echo $model->continent; ?>">

<?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
            ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jackpot_price')->textInput() ?>
    
    <?= $form->field($model, 'ticket_price')->textInput() ?>
   
    <?= $form->field($model, 'jackpot_section_image')->fileInput()->hint('Extensions: jpg, jpeg, png.') ?>
    <?php if(file_exists(Yii::getAlias('@upload_DIR')."/".$model->jackpot_section_image)){
    if(isset($model->jackpot_section_image) && ($model->jackpot_section_image != "")){ ?>
    <img src="<?= Yii::getAlias('@SERVER')."/".$model->jackpot_section_image ?>" title="<?php echo $model->jackpot_section_image; ?>" height="50" width="50" />    
    <?php }}else{ ?>
    <img src="<?= Yii::getAlias('@SERVER')."/no_image.png" ?>" height="50" title="No Image" width="50" />  
        
    <?php } ?>
    <?= $form->field($model, 'average_person')->textInput() ?>

    <?php 
     
     $continentData = ArrayHelper::map($continents,'code','name'); 
     
 
    /* $countryData= ArrayHelper::map(Countries::find()
	->innerJoinWith('continentCode', false)
        ->filterWhere(['name' => null, 'continents.code' => $model->continents_code])->asArray()           ->all() ,'code','name');
*/
   if($model->isNewRecord) { 
       $countryData= ArrayHelper::map(Countries::find()
        ->select('countries.name as name, countries.code as code')
	->innerJoinWith('countryListCode', false)
        ->filterWhere(['name' => null, 'continent_code' => 'AF'])
        ->asArray()->all() ,'code','name');
    }else{ 
    
        $countryData= ArrayHelper::map(Countries::find()
        ->select('countries.name as name, countries.code as code')
	->innerJoinWith('countryListCode', false)
        ->filterWhere(['name' => null, 'continent_code' => $model->continent])
        ->asArray()->all() ,'code','name');
    }        
    
    echo $form->field($model, 'continent')->dropDownList($continentData,['code'=>'name','onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["jackpot-section/continent_country"]).'&code="+$(this).val(), function( data ) {
        
                $( "#jackpotdetails-countryid" ).html( data );
           });
      '])->label('Continent');?>
    
   

    <?php echo $form->field($model, 'countryid')->dropDownList($countryData, [''=>'Select Country']);  ?>
     <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tandc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->textInput(); ?>

    <?= $form->field($model, 'end_date')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>