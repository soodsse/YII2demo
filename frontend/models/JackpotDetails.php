<?php

namespace app\models;

use Yii;
use app\models\Continents;
use app\models\Countries;

/**
 * This is the model class for table "jackpot_details".
 *
 * @property integer $id
 * @property string $name
 * @property double $jackpot_price
 * @property double $ticket_price
 * @property string $jackpot_section_image
 * @property integer $average_person
 * @property string $continent
 * @property string $countryid
 * @property string $desc
 * @property string $tandc
 * @property string $start_date
 * @property string $end_date
 *
 * @property TicketJackpotSummary[] $ticketJackpotSummaries
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
            [['name', 'jackpot_price', 'ticket_price', 'jackpot_section_image', 'average_person', 'continent', 'countryid', 'desc', 'tandc', 'start_date', 'end_date'], 'required'],
            [['jackpot_price', 'ticket_price'], 'number'],
            [['average_person'], 'integer'],
            [['desc', 'tandc'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['jackpot_section_image'], 'string', 'max' => 500],
            [['continent', 'countryid'], 'string', 'max' => 10]
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
            'ticket_price' => 'Ticket Price',
            'jackpot_section_image' => 'Jackpot Section Image',
            'average_person' => 'Average Person',
            'continent' => 'Continent',
            'countryid' => 'Countryid',
            'desc' => 'Desc',
            'tandc' => 'Tandc',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketJackpotSummaries()
    {
        return $this->hasMany(TicketJackpotSummary::className(), ['jackpot_id' => 'id']);
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
