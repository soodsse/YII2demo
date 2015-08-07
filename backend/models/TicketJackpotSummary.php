<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_jackpot_summary".
 *
 * @property integer $id
 * @property integer $jackpot_id
 * @property string $ticket_number
 * @property string $created_on
 * @property string $updated_on
 *
 * @property JackpotDetails $jackpot
 */
class TicketJackpotSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_jackpot_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jackpot_id', 'ticket_number', 'created_on'], 'required'],
            [['jackpot_id'], 'integer'],
            [['updated_on'], 'safe'],
            [['ticket_number'], 'string', 'max' => 40],
            [['created_on'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jackpot_id' => 'Jackpot ID',
            'ticket_number' => 'Ticket Number',
            'desc'          => 'Description',
            'user_id'       => 'User ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJackpot()
    {
        return $this->hasOne(JackpotDetails::className(), ['id' => 'jackpot_id']);
    }
    
    public function getUserDetails()
    {
        return $this->hasOne(UsersRegister::className(), ['id' => 'user_id']);
    }
    
   /**/ public function getCountries()
    {
        return $this->hasMany(Countries::className(), ['code' => jackpotDetails::className().'countryid']);
    }
    
}
