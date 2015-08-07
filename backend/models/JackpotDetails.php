<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
            [['name'], 'string', 'max' => 100]
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
    
    
    public function UpdateJackpotImage($jackpot_section_image, $model){
       $command = Yii::$app->db
    ->createCommand()
    ->update('jackpot_details', ['jackpot_section_image' => $jackpot_section_image], 'id ='.$model->id.'')->execute();
        
    }
}
