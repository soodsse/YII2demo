<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_notifications".
 *
 * @property integer $id
 * @property string $subject
 * @property string $alias
 * @property string $description
 * @property string $status
 * @property string $created_on
 * @property string $updated_on
 */
class EmailNotifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'alias', 'description', 'status'], 'required'],
            [['description', 'status', 'created_on'], 'string'],
           /* [['created_on', 'updated_on'], 'safe'],*/
            [['subject','alias'], 'unique', 'message' => '{attribute}:{value} already exists!'],
            [['subject', 'alias'], 'string', 'max' => 100],
            [['alias'], 'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_-]/',
            'message' => 'Invalid characters in Alias.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'alias' => 'Alias',
            'description' => 'Description',
            'status' => 'Status',
           /* 'created_on' => 'Created On',
            'updated_on' => 'Updated On',*/
        ];
    }
}
