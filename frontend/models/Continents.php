<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "continents".
 *
 * @property integer $id
 * @property string $name
 */
class Continents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'continents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
        ];
    }
    
    /*
     *  Creating the relations.
    */
    public function getCountries() {
        return $this->hasMany(Countries::className(), ['continent_code' => 'code']);
    }
    
  /*  public function getCountriesList()
    {
        return $this->hasMany(Continents::className(), ['continent_code' => 'code']);
    }*/
        
    public function getCountryList() {
      return $this->hasMany(CountryList::className(), ['continents_code' => 'code']);
    }
    
     public function getJackpotDetails() {
        return $this->hasMany(JackpotDetails::className(), ['continent' => 'code']);
    }
}
