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
            [['countries_code'], 'required'],
            [['countries_code'], 'string', 'max' => 10]
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
        ];
    }
}
