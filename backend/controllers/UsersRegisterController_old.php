<?php

namespace backend\controllers;

use Yii;
use app\models\UsersRegister;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use common\models\User as commonUser;

/**
 * UsersRegisterController implements the CRUD actions for UsersRegister model.
 */
class UsersRegisterController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
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
        'pageSize' => 1,
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
        $model = new UsersRegister();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
       
        
       /**/
        if(ISSET($_POST["User"])){
         //   echo "<pre>";
            $data = Yii::$app->request->post('User');
            $commonUser = new commonUser(); 
            $connection = \Yii::$app->db;

            if($model->validatePassword($data['password_hash']) != 1){
                Yii::$app->getSession()->setFlash('error', 'Old password doesnot match.');
                return $this->redirect(['profile-update', 'id' => $model->id]);
            }else{
                $commonUser->setPassword(Yii::$app->request->post('repeat_password'));
                $command = $connection->createCommand('UPDATE user SET password_hash="'.$commonUser->password_hash.'" WHERE id=1');
                
                    if ($model->load(Yii::$app->request->post()) && $command->execute()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                        
                    }
            }
        } else {
            return $this->render('updateAdmin', [
                'model' => $model,
            ]);
        }
        
       
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('updateAdmin', [
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
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
