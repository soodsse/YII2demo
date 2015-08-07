<?php

namespace app\models;

use Yii;
use app\models\adminUser;
use yii\web\UploadedFile;

/**
 * This is the model class for table "users_register".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $emailID
 * @property string $password
 * @property string $con_password

 */
class UsersRegister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'emailID', 'password', 'con_password'], 'required', 'on' => 'create'],
            [['firstname', 'lastname', 'emailID'], 'required', 'on' => 'update'],
            [['firstname', 'lastname', 'emailID','created_date','device_token','device_type','gender','date_of_birth','user_pic'], 'string', 'max' => 50],
            [['firstname', 'lastname'], 'match', 'pattern' => '/^[a-zA-Z]+$/', 'message' => 'Numbers and special characters are not allowed.'],
            [['is_notification'],'integer'],
            /*['emailID', 'match', 'pattern' => '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{2,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i', 'message' => 'Please enter valid email ID.'],*/
            ['emailID','email'],
            ['emailID','unique'],
            [['con_password'],'compare', 'compareAttribute'=>'password', 'message'=>"Password and Confirm Password don't match", 'on' => 'create'],
            [['password', 'con_password'],'string','min'=>6,'max'=>20, 'on' => 'create'],
            [['user_pic'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'emailID' => 'Email ID',
            'password' => 'Password',
            'con_password' => 'Confirm Password',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'user_pic' => 'User Image',
         
        ];
    }
        
    public function beforeSave($insert) {
        if(isset($this->password) && $this->scenario==="create"){ 
          $this->password = Yii::$app->security->generatePasswordHash($this->password);
          //$this->con_password = Yii::$app->security->generatePasswordHash($this->password);
          $this->con_password = $this->password;
        }  
        return parent::beforeSave($insert);
    }
    
     /**
    * Creating By: Arjun Dev
    * Created On : 27-07-2015
    * Description: Uploading Image on server.
    * Parameters : $file Array,  $uploadDir upload directory where to save image, $user_pic Image to save, $model DB Object.
    */
    public function UpdateUserPic($file, $uploadDir, $user_pic, $model=''){
        $file->saveAs($uploadDir ."/userPic/". $file->baseName . '.' .$file->extension);
        
    }
    
     /**
         * Creating By: Arjun Dev
         * Created On : 04-08-2015
         * Description: Saving image name in DB
         * Parameters :  $user_pic Image to save, $model DB Object.
    */
    
    
    public function UpdateUserImage($user_pic, $model){
       $command = Yii::$app->db
    ->createCommand()
    ->update('users_register', ['user_pic' => $user_pic], 'id ='.$model->id.'')->execute();
        
    }
}