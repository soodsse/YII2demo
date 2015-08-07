<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lottery_details".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $currency_id
 * @property string $lottery_name
 * @property string $lottery_number
 * @property string $lottery_image
 * @property string $start_date
 * @property string $end_date
 */
class LotteryDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lottery_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'currency_id', 'lottery_name', 'lottery_number', 'lottery_image', 'start_date', 'end_date'], 'required'],
            [['id', 'country_id', 'currency_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['lottery_name', 'lottery_number', 'lottery_image'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'currency_id' => 'Currency ID',
            'lottery_name' => 'Lottery Name',
            'lottery_number' => 'Lottery Number',
            'lottery_image' => 'Lottery Image',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }
}
