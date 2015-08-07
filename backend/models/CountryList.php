<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_list".
 *
 * @property integer $id
 * @property string $countries_code
 * @property string $continents_code
 */
class CountryList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['countries_code', 'continents_code'], 'required'],
            [['countries_code'], 'string', 'max' => 10],
            [['continents_code'], 'string', 'max' => 11],
            [['countries_code'], 'unique', 'message' => '{attribute}:{value} already exists!']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countries_code' => 'Countries Code',
            'continents_code' => 'Continents Code',
            'countries.name' => 'Country',
            'continents.name' => 'Continent',
            'countries.currency_code' => 'Currency Code',
        ];
    }
    
    /*
     *  Creating the relations.
    *//**/
        
    public function getCountriesListCode()
    {
        return $this->hasOne(Countries::className(), ['code' => 'countries_code']);
    }

    public function getContinentListCode() 
    {
        return $this->hasOne(Continents::className(), ['code' => 'continents_code']);
    }
     public function getCountries()
    {
        return $this->hasOne(Countries::className(), ['code' => 'countries_code']);
    }
     public function getContinents()
    {
        return $this->hasOne(Continents::className(), ['code' => 'continents_code']);
    }
    /* Getter for country name */
   /* public function getCountriesName()
    {
        return $this->countries->name;
    }*/
}