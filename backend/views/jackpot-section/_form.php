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
    <?php 
     
     $continentData = ArrayHelper::map($continents,'code','name'); 
     
     $countryData = Countries::find()
        ->select('countries.name as name, countries.code as code, countries.currency_code as currency')
	->innerJoinWith('countryListCode', false)
        ->filterWhere(['continent_code' => ($model->continent == '')?'-':$model->continent])
        ->asArray()->all();
     
     $currency = Countries::find()
        ->select('countries.currency_code as currency')
        ->filterWhere(['code' => ($model->countryid == '')?'-':$model->countryid])
        ->asArray()->all();
     
     
   //  echo Yii::$app->customFun->prx($currency);
        
        $countryData= ArrayHelper::map($countryData ,'code','name');
  
   
    echo $form->field($model, 'continent')->dropDownList($continentData,['code'=>'name', 'prompt'=>'Select Continent','onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["jackpot-section/continent_country"]).'&code="+$(this).val(), function( data ) {
            var json = $.parseJSON(data);
             $( "#jackpotdetails-countryid" ).html( json.country );
             $( ".currency_code" ).html( json.currency );
           });
      '])->label('Continent');?>
    
   

    <?php echo $form->field($model, 'countryid')->dropDownList($countryData, ['prompt'=>'Select Country','onchange' => '$.post("'.Yii::$app->urlManager->createUrl(["jackpot-section/country_currency"]).'&code="+$(this).val(), function( data ) {
                $( ".currency_code" ).html( data );
           });
      ']);  ?>
    <?= $form->field($model, 'jackpot_price', ["template" => "<label> Jackpot Price </label><span class='currency_code' style='padding-left:10px;color:#999;'>".$currency[0]["currency"]."</span>\n{input}\n{hint}\n{error}"])->textInput() ?>
  
    
    
    
    <?= $form->field($model, 'ticket_price', ["template" => "<label> Ticket Price </label><span class='currency_code' style='padding-left:10px;color:#999;'>".$currency[0]["currency"]."</span>\n{input}\n{hint}\n{error}"])->textInput() ?>
    <?= $form->field($model, 'average_person')->textInput() ?>
   
    <?= $form->field($model, 'jackpot_section_image')->fileInput()->hint('Extensions: jpg, jpeg, png.') ?>
    
    <div class="form-group">
    <?php if(isset($model->jackpot_section_image) && ($model->jackpot_section_image != "")){
        if(file_exists(Yii::getAlias('@upload_DIR')."/".$model->jackpot_section_image)){?>
    <img src="<?= Yii::getAlias('@SERVER')."/".$model->jackpot_section_image ?>" height="50" width="50" />     <br><br>
    <?php }else{ ?>
        <img src="<?= Yii::getAlias('@SERVER')."/no_image.png" ?>" height="50" title="No Image" width="50" /> 
    <?php }}else{ ?>
        <img src="<?= Yii::getAlias('@SERVER')."/no_image.png" ?>" height="50" title="No Image" width="50" /> 
        
    <?php } ?>
        <div class="help-block"></div>
   </div>
     <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tandc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->textInput(); ?>

    <?= $form->field($model, 'end_date')->textInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Html::Button('Cancel', ['class' => 'btn btn-primary']), Yii::$app->request->referrer) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>