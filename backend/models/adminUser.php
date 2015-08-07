<?php

namespace app\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class adminUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const ROLE_ADMIN = 10;
    
    private $_user = false;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash','email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            /*['email', 'match', 'pattern' => '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{2,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', 'message' => 'Please enter valid email ID.'],*/
            ['emailID','email'],
            [['password_hash'],'string','min'=>6,'max'=>20],
            [['auth_key'], 'string', 'max' => 32],
            // password is validated by validatePassword()
            ['password_hash', 'validatePassword'],
            ['role', 'default', 'value' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Old Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password_hash)) {
                $this->addError($attribute, 'Incorrect Password. Please try again.');
            }
        }
    }
    
     /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function validatePasswordRes()
    {
        if ($this->validate()) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
    public static function isUserAdmin($username)
    {
      if (static::findOne(['username' => $username, 'role' => self::ROLE_ADMIN])){
             return true;
      } else {
            return false;
      }
 
    }
}
