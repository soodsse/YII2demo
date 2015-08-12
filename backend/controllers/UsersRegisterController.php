<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\UsersRegister;
use app\models\adminUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\web\IdentityInterface;
use common\models\User as commonUser;

/**
 * UsersRegisterController implements the CRUD actions for UsersRegister model.
 */
class UsersRegisterController extends Controller
{
    private $extensions = array('jpg','jpeg','png');
    public $ignoreAction = array('api-user-create','api-user-list','api-user-login','api-user-change-password','api-user-logout','api-user-notification','api-user-profile-update');
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['view', 'create', 'update','index'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['@'],
                       /* 'matchCallback' => function ($rule, $action) {
            die();
                            return adminUser::isUserAdmin(Yii::$app->user->identity->username);
                        }*/
                        
                    ],
                ],
            ]
        ];
    }
    /*******
     *  Run the Code in all controller before any action loads. 
     * 
     */
    
   /* */public function beforeAction($action) {
            Yii::$app->getSession()->setFlash('section', 'Users');
            if(!in_array($action->id, $this->ignoreAction)){
                if(is_object(Yii::$app->user->identity)){
                    if(adminUser::isUserAdmin(Yii::$app->user->identity->username) == 1)
                    {
                        return $action;
                    }
                }else{
                   return $this->goHome();
                }
            }
            return $action;
        }
    /**
     * Lists all UsersRegister models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UsersRegister::find(),
            'pagination' => [
            'pageSize' => Yii::getAlias('@paging'),
    ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    /**
     * Lists all UsersRegister models.
     * @return mixed
     */
    public function actionDetail()
   {
       
       $query = UsersRegister::find();
            $pagination = new Pagination([
                'defaultPageSize' => 1,
                'totalCount' => $query->count(),
            ]);
            $countries = $query->orderBy('firstname')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
            return $this->render('detail', [
                        'countries' => $countries,
                        'pagination' => $pagination,
            ]);
        }

    /**
     * Displays a single UsersRegister model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    
    /**
     * Creates a new UsersRegister model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       //Yii::$app->customFun->prx(Yii::$app->user);
        $uploadDir =  Yii::getAlias('@upload_DIR');
        $model = new UsersRegister();
        $model->scenario = 'create';
        if (Yii::$app->request->isPost)
        {
          //  print_r($_POST); print_r($_FILES); die;
            $user_pic = time().'_'.$_FILES['UsersRegister']['name']['user_pic']; 
            $file = UploadedFile::getInstance($model, 'user_pic');
            
        }   
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             if (is_object($file) && ($file->size !== 0)){
                 $file->name = time().'_'.$file->name;            
                 $extensionFile = substr(strstr($file->name,"."),1);
                if(!in_array($extensionFile, $this->extensions)){
                 Yii::$app->getSession()->setFlash('error', 'Only jpg, jpeg and png files are allowed to upload.');
                 return $this->redirect(array('/users-register/create'));
                }
                $model->UpdateUserPic($file, $uploadDir, $user_pic,$model);
                $model->UpdateUserImage($user_pic,$model);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsersRegister model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadDir =  Yii::getAlias('@upload_DIR');
        $model->scenario = 'update';
        $commonUser = new commonUser(); 
        $connection = \Yii::$app->db;
        
         if (Yii::$app->request->isPost)
         { 
            $user_pic = time().'_'.$_FILES['UsersRegister']['name']['user_pic']; 
            $file = UploadedFile::getInstance($model, 'user_pic');
            
            
            if (is_object($file) && ($file->size !== 0))
            {
                $file->name = time().'_'.$file->name;
                $extensionFile = substr(strstr($file->name,"."),1);
            if(!in_array($extensionFile, $this->extensions)){
                 Yii::$app->getSession()->setFlash('error', 'Only jpg, jpeg and png files are allowed to upload.');
               return $this->redirect(array('/users-register/update','id'=>$id));
            }
                $model->UpdateUserPic($file, $uploadDir, $user_pic,$model);
                $model->UpdateUserImage($user_pic,$model);
            }
            else
            {
                $user_pic = $model::findone($id)->user_pic;
            }
         }
         $data = Yii::$app->request->post();
        unset($data['UsersRegister']['password']);
        unset($data['UsersRegister']['con_password']);
        if ($model->load($data) && $model->save()) {
              $model->UpdateUserImage($user_pic,$model);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

     /**
     * Updates an Admin Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
    
    public function actionProfileUpdate($id)
    {
        $model = $this->findAdminModel($id);
        $commonUser = new commonUser(); 
        $connection = \Yii::$app->db;
       /*
        echo $model->password_hash;
        die;*/
       // die($model->password_hash);
       if ($model->load(Yii::$app->request->post()) && $model->validatePasswordRes()) {
            $data = Yii::$app->request->post('adminUser');
            //Yii::$app->customFun->prx($data);
            
            $commonUser->setPassword(Yii::$app->request->post('repeat_password'));
            
            /**/$command = $connection->createCommand('UPDATE user SET password_hash="'.$commonUser->password_hash.'", email="'.$data["email"].'" WHERE id=1');
                
                    if ($model->load(Yii::$app->request->post()) && $command->execute()) {
                        $message = "Admin profile updated successfully.";
                        Yii::$app->getSession()->setFlash('success', $message); 
                        return $this->goBack();
                    }            
        }else {
            return $this->render('updateAdmin', [
                'model' => $model,
            ]);
        }
        
       
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('_adminUpdateForm', [
                'model' => $model,
            ]);
        }*/
    }
    
    /**
     * Deletes an existing UsersRegister model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsersRegister model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersRegister the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsersRegister::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /**
     * Finds the UsersRegister model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersRegister the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findAdminModel($id)
    {
        if (($model = adminUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*************************************** API Fucntion Start **************************************/
    
     /**
     * Lists all UsersRegister models.
     * @return mixed
     */
    public function actionApiUserList()
    {
        $this->layout = false;
       $userList['users'] = UsersRegister::find()->asArray()->all();
        return json_encode($userList);
    }
    
     /**
     * Create UsersRegister models.
     * @return mixed
     */
    public function actionApiUserCreate()
    {
        $this->layout = false;
        $model = new UsersRegister();
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);
        
        if(isset($data['UsersRegister']['emailID']))
        {
        $checkUser = UsersRegister::find()->filterWhere(['users_register.emailID' => $data['UsersRegister']['emailID']])->asArray()->all();;
      
        if(count($checkUser)==0)
        {
            $data['UsersRegister']['password'] = Yii::$app->security->generatePasswordHash($data['UsersRegister']['password']);
            $data['UsersRegister']['con_password']=$data['UsersRegister']['password'];
            $data['UsersRegister']['created_date']=date("Y-m-d H:i:s");
        if ($model->load($data) && $model->save() && isset($data['UsersRegister']['device_token']) && isset($data['UsersRegister']['device_type']) && isset($data['UsersRegister']['is_notification'])) {
            $return['status'] = 1;
            $return['data']['userId'] = $model->id;
            $return['data']['firstname'] = $model->firstname;
            $return['data']['lastname'] = $model->lastname;
            $return['data']['emailID'] = $model->emailID;
            $return['data']['created_date'] = $model->created_date;
            $return['data']['device_token'] = $model->device_token;
            $return['data']['device_type'] = $model->device_type;
            $return['data']['is_notification'] = $model->is_notification;
            $return['data']['gender'] = '';
            $return['data']['date_of_birth'] = '0000-00-00';
            $return['data']['user_pic'] = '';
            $return['message'] = "User Created Successfully";
            return json_encode($return);
        } else {
            $return['status'] = 0;
            $return['message'] = "Error! Please try again.";
            return json_encode($return);
        }
        }
        else
        {
            $return['status'] = -1;
            $return['message'] = "User Already Exist.";
            return json_encode($return);
        }
          }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
      
       
    }
    
     /**
     * User Login Web Service
     * @return mixed
     */
    public function actionApiUserLogin()
    {
        $this->layout = false;
       
        $commonUser = new commonUser();
        $model = new UsersRegister();
        $connection = \Yii::$app->db;
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);

        if(isset($data['UsersRegister']['emailID']) && isset($data['UsersRegister']['device_token']) && isset($data['UsersRegister']['device_type']))
        {
        $checkUser = UsersRegister::find()->filterWhere(['users_register.emailID' => $data['UsersRegister']['emailID']])->asArray()->all();;
    
        if(count($checkUser)>0)
        {
           $passwordCheck = Yii::$app->security->validatePassword($data['UsersRegister']['password'], $checkUser[0]['password']);
            
        if (isset($passwordCheck) && !empty($passwordCheck)) {
            if(!empty($data['UsersRegister']['device_token']))
            {
                $command = $connection->createCommand('UPDATE users_register SET device_token="'.$data['UsersRegister']['device_token'].'",device_type="'.$data['UsersRegister']['device_type'].'" WHERE id='.$checkUser[0]['id']);
                    
                $model->load($data);
                $command->execute();
                $return['data']['device_token'] = $data['UsersRegister']['device_token'];
                $return['data']['device_type'] = $data['UsersRegister']['device_type'];
               
            }
            else
            {
                $return['data']['device_token'] = $checkUser[0]['device_token'];
                $return['data']['device_type'] = $checkUser[0]['device_type'];
                
            }
            $return['status'] = 1;
            $return['data']['userId'] = $checkUser[0]['id'];
            $return['data']['firstname'] = $checkUser[0]['firstname'];
            $return['data']['lastname'] = $checkUser[0]['lastname'];
            $return['data']['emailID'] = $checkUser[0]['emailID'];
            $return['data']['created_date'] = $checkUser[0]['created_date'];
            $return['data']['gender'] = $checkUser[0]['gender'];
            $return['data']['date_of_birth'] = $checkUser[0]['date_of_birth'];
            $return['data']['user_pic'] = $checkUser[0]['user_pic'];
            $return['data']['is_notification'] = $checkUser[0]['is_notification'];
            $return['message'] = "User LogIn Successfully.";
            return json_encode($return);
        } else {
            $return['status'] = 0;
            $return['message'] = "Invalid Credentials.";
            return json_encode($return);
        }
        }
        else
        {
            $return['status'] = -1;
            $return['message'] = "User Doesn't Exist.";
            return json_encode($return);
        }
          }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
        
    }
    
      /**
     * User Change Password Web Service
     * @return mixed
     */
    public function actionApiUserChangePassword()
    {
        $this->layout = false;
        $commonUser = new commonUser();
        $model = new UsersRegister();
        $connection = \Yii::$app->db;
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);
        
        if(isset($data['UsersRegister']['userId']))
        {
            $data['UsersRegister']['id'] = $data['UsersRegister']['userId'];
            unset($data['UsersRegister']['userId']);

            $checkUser = UsersRegister::find()->filterWhere(['users_register.id' => $data['UsersRegister']['id']])->asArray()->all();;
    
            if(count($checkUser)>0)
            {
                $passwordCheck = Yii::$app->security->validatePassword($data['UsersRegister']['old_password'], $checkUser[0]['password']);
            
                if (isset($passwordCheck) && !empty($passwordCheck)) {
            
                $commonUser->setPassword($data['UsersRegister']['password']);
                
                $command = $connection->createCommand('UPDATE users_register SET password="'.$commonUser->password_hash.'",con_password="'.$commonUser->password_hash.'" WHERE id='.$data['UsersRegister']['id']);
                    
                if ($model->load($data) && $command->execute()) {
                    $return['status'] = 1;
                    $return['userId'] = $data['UsersRegister']['id'];
                    $return['message'] = "Password Changed Successfully.";
                    return json_encode($return);  
                        
                } else {
                    $return['status'] = 0;
                    $return['message'] = "Error! Please try again.";
                    return json_encode($return);
                }
                }
                 else {
                    $return['status'] = 0;
                    $return['message'] = "Incorrect Old Password. Please try again.";
                    return json_encode($return);
                }
            }
            else
            {
                $return['status'] = -1;
                $return['message'] = "User Doesn't Exist.";
                return json_encode($return);
            }
        }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
        
    }
    
     /**
     * User Logout Web Service
     * @return mixed
     */
    public function actionApiUserLogout()
    {
        $this->layout = false;
        $commonUser = new commonUser();
        $model = new UsersRegister();
        $connection = \Yii::$app->db;
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);
        //$data['UsersRegister'] = Yii::$app->request->post();
        
        if(isset($data['UsersRegister']['userId']))
        {
            $data['UsersRegister']['id'] = $data['UsersRegister']['userId'];
            unset($data['UsersRegister']['userId']);
            $command = $connection->createCommand('UPDATE users_register SET device_token="",device_type="" WHERE id='.$data['UsersRegister']['id']);
                    
                if ($model->load($data) && $command->execute()) {
                    $return['status'] = 1;
                    $return['userId'] = $data['UsersRegister']['id'];
                    $return['message'] = "User Logout Successfully.";
                    return json_encode($return);  
                        
                } else {
                    $return['status'] = 0;
                    $return['message'] = "Error! Please try again.";
                    return json_encode($return);
                }
        }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
    }
    
     /**
     * User notification enabled Web Service
     * @return mixed
     */
    public function actionApiUserNotification()
    {
        $this->layout = false;
        $commonUser = new commonUser();
        $model = new UsersRegister();
        $connection = \Yii::$app->db;
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);
        //$data['UsersRegister'] = Yii::$app->request->post();
        
        if(isset($data['UsersRegister']['userId']))
        {
            $data['UsersRegister']['id'] = $data['UsersRegister']['userId'];
            unset($data['UsersRegister']['userId']);
            $command = $connection->createCommand('UPDATE users_register SET is_notification="'.$data['UsersRegister']['is_notification'].'" WHERE id='.$data['UsersRegister']['id']);
                    
                if ($model->load($data) && $command->execute()) {
                    $return['status'] = 1;
                    $return['userId'] = $data['UsersRegister']['id'];
                    $return['message'] = "Notification Status Updated Successfully.";
                    return json_encode($return);  
                        
                } else {
                    $return['status'] = 0;
                    $return['message'] = "Error! Please try again.";
                    return json_encode($return);
                }
        }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
    }
    
     /**
     * User profile updated Web Service
     * @return mixed
     */
    public function actionApiUserProfileUpdate()
    {
        $this->layout = false;
        $commonUser = new commonUser();
        $model = new UsersRegister();
        $connection = \Yii::$app->db;
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['UsersRegister'] = json_decode($json, true);
        //$data['UsersRegister'] = Yii::$app->request->post();
     //   print_r($data);
      //  print_r($_FILES);
        
        if(isset($data['UsersRegister']['userId']))
        {
        
            $data['UsersRegister']['id'] = $data['UsersRegister']['userId'];
            unset($data['UsersRegister']['userId']);
            $checkUser = UsersRegister::find()->filterWhere(['users_register.id' => $data['UsersRegister']['id']])->asArray()->all();;
        
            if(empty($data['UsersRegister']['user_pic']))
            {
                $user_pic_name = $checkUser[0]['user_pic'];
            }
            else
            {
                //$user_pic = $_FILES['user_pic'];
                $user_pic_name= $data['UsersRegister']['id'].'_'.time().'.jpeg';
                //$file = UploadedFile::getInstance($model, 'user_pic');
                $uploadDir =  Yii::getAlias('@upload_DIR');
               
                //$data_pic = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['UsersRegister']['user_pic']));
                $this->base64_to_jpeg($data['UsersRegister']['user_pic'],$uploadDir.'/userPic/'.$user_pic_name);
            }  
          /**/ $command = $connection->createCommand('UPDATE users_register SET firstname="'.$data['UsersRegister']['firstname'].'",lastname="'.$data['UsersRegister']['lastname'].'",gender="'.$data['UsersRegister']['gender'].'",date_of_birth="'.$data['UsersRegister']['date_of_birth'].'",user_pic="'.$user_pic_name.'" WHERE id='.$data['UsersRegister']['id']);
        
                if ($model->load($data) && $command->execute()) {
                    $checkUserNew = UsersRegister::find()->filterWhere(['users_register.id' => $data['UsersRegister']['id']])->asArray()->all();;
        
                    $return['status'] = 1;
                    $return['data']['userId'] = $checkUserNew[0]['id'];
                    $return['data']['firstname'] = $checkUserNew[0]['firstname'];
                    $return['data']['lastname'] = $checkUserNew[0]['lastname'];
                    $return['data']['emailID'] = $checkUserNew[0]['emailID'];
                    $return['data']['created_date'] = $checkUserNew[0]['created_date'];
                    $return['data']['device_token'] = $checkUserNew[0]['device_token'];
                    $return['data']['device_type'] = $checkUserNew[0]['device_type'];
                    $return['data']['is_notification'] = $checkUserNew[0]['is_notification'];
                    $return['data']['gender'] = $checkUserNew[0]['gender'];
                    $return['data']['date_of_birth'] = $checkUserNew[0]['date_of_birth'];
                    $return['data']['user_pic'] = $checkUserNew[0]['user_pic'];
                    $return['message'] = "Profile Updated Successfully.";
                    return json_encode($return);  
                        
                } else {
                    $return['status'] = 0;
                    $return['message'] = "Error! Please try again.";
                    return json_encode($return);
                }
        }
        else
        {
            $return['status'] = 0;
            $return['message'] = "Missing Argument.";
            return json_encode($return);
        }
    }
    function base64_to_jpeg($base64_string, $output_file) {
                $ifp = fopen($output_file, "w+") or die('Cannot open file:  '.$output_file);
            
                $data = explode(',', $base64_string);
              
                fwrite($ifp, base64_decode($data[0])); 
                fclose($ifp); 
            
                return $output_file; 
    }
   
    
     /*************************************** API Fucntion End **************************************/
}
