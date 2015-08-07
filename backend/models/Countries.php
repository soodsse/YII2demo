<?php
 
namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property string $code
 * @property string $name
 * @property string $full_name
 * @property string $iso3
 * @property integer $number
 * @property string $continent_code
 *
 * @property Continents $continentCode
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'full_name', 'iso3', 'number', 'continent_code'], 'required'],
            [['number'], 'integer'],
            [['code', 'continent_code'], 'string', 'max' => 2],
            [['name', 'full_name'], 'string', 'max' => 255],
            [['iso3'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Two-letter country code (ISO 3166-1 alpha-2)',
            'name' => 'English country name',
            'full_name' => 'Full English country name',
            'iso3' => 'Three-letter country code (ISO 3166-1 alpha-3)',
            'number' => 'Three-digit country number (ISO 3166-1 numeric)',
            'continent_code' => 'Continent Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContinentCode()
    {
        return $this->hasOne(Continents::className(), ['code' => 'continent_code']);
    }
    
     public function getCountryListCode()
    {
        return $this->hasOne(CountryList::className(), ['countries_code' => 'code']);
    }
}
