<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_details".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email_id
 * @property string $transaction_id
 * @property string $status
 * @property string $transaction_date
 */
class TicketDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email_id', 'transaction_id', 'status', 'transaction_date'], 'required'],
            [['transaction_date'], 'safe'],
            [['first_name', 'last_name', 'email_id', 'transaction_id', 'status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email_id' => 'Email ID',
            'transaction_id' => 'Transaction ID',
            'status' => 'Status',
            'transaction_date' => 'Transaction Date',
        ];
    }
}
