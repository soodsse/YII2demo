<?php
namespace frontend\models;

use yii\base\Model;

/**
 * Entry Form
 */
class EntryForm extends Model
{
    public $name;
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['name', 'email'], 'required'],
        ['email', 'email'],
        ];
    }
}
