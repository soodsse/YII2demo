<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use app\models\Continents;
use app\models\Countries;

/**
 * This is the model class for table "jackpot_details".
 *
 * @property integer $id
 * @property string $name
 * @property integer $jackpot_price
 * @property integer $ticket_price
 * @property string $jackpot_section_image
 * @property integer $average_person
 * @property integer $continent
 * @property integer $countryid
 * @property string $start_date
 * @property string $end_date
 */
class JackpotDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jackpot_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'jackpot_price', 'ticket_price', 'average_person', 'continent', 'countryid', 'start_date', 'end_date'],'required'],
           
            [[ 'average_person'], 'integer'],
            [[ 'desc','tandc'], 'string'],
            [['jackpot_price', 'ticket_price'], 'number'],
            [['jackpot_price'],'compare', 'compareAttribute'=>'ticket_price', 'operator' => '>', 'message'=>"Jackpot price should be greater than Ticket Price."],
            [['start_date'],'compare', 'compareAttribute'=>'end_date', 'operator' => '<', 'message'=>"Start Date should be less than End Date."],
            [['jackpot_section_image'], 'file', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'gif'], 'maxSize' => 1024*1024, 'on'=>'update', 'on'=>'create'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'jackpot_price' => 'Jackpot Price',
            'desc' => 'Description',
            'tandc' => 'Term and Conditions',
            'ticket_price' => 'Ticket Price',
            'jackpot_section_image' => 'Jackpot Section Image',
            'average_person' => 'Average Person',
            'continent' => 'Continent',
            'countryid' => 'Country',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'currencyJacpotPrice' => Yii::t('app', 'Jackpot Price'),
            'currencyTicketPrice' => Yii::t('app', 'Ticket Price')
        ];
    }
 /**
 * Creating By: Anirudh Sood
 * Created On : 13072015
 * Description: Uploading Image on server.
 * Parameters : $file Array,  $uploadDir upload directory where to save image, $jackpot_section_image Image to save, $model DB Object.
 */
    public function UpdateJackpotSection($file, $uploadDir, $jackpot_section_image, $model=''){
        $file->saveAs($uploadDir ."/". $file->baseName . '.' .$file->extension);
        
    }
    
    /**
         * Creating By: Anirudh Sood
         * Created On : 13072015
         * Description: Saving image name in DB
         * Parameters :  $jackpot_section_image Image to save, $model DB Object.
    */
    
    public function getCountryCurrency(){
         $currency = Countries::find()
        ->select('countries.currency_code as currency')
        ->filterWhere(['code' => ($this->countryid == '')?'-':$this->countryid])
        ->asArray()->all();
         return $currency[0]['currency'];
    }
    
    public function getJackpotPrice(){
         return $this->jackpot_price;
    }
    
    public function getCurrencyJacpotPrice(){
        return $this->getCountryCurrency()." ".$this->getJackpotPrice();
    }
    
    public function getCurrencyTicketPrice(){
        return $this->getCountryCurrency()." ".$this->getTicketPrice();
    }
    
    public function getCountryName(){
         $currency = Countries::find()
        ->select('name as country_name')
        ->filterWhere(['code' => ($this->countryid == '')?'-':$this->countryid])
        ->asArray()->all();
         return $currency[0]['country_name'];
    }
    
    public function getContinentName(){
         $currency = Continents::find()
        ->select('name as continent_name')
        ->filterWhere(['code' => ($this->continent == '')?'-':$this->continent])
        ->asArray()->all();
         return $currency[0]['continent_name'];
    }
    public function getTicketPrice(){
         return $this->ticket_price;
    }
    
    public function UpdateJackpotImage($jackpot_section_image, $model){
       $command = Yii::$app->db
    ->createCommand()
    ->update('jackpot_details', ['jackpot_section_image' => $jackpot_section_image], 'id ='.$model->id.'')->execute();
        
    }
    
     public function getCountries()
    {
        return $this->hasOne(Countries::className(), ['code' => 'countryid']);
    }
     public function getContinents()
    {
        return $this->hasOne(Continents::className(), ['code' => 'continent']);
    }
}
