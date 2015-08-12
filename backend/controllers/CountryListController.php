<?php

namespace backend\controllers;

use Yii;
use app\models\CountryList;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\adminUser;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Continents;
use app\models\Countries;
/**
 * CountryListController implements the CRUD actions for CountryList model.
 */
class CountryListController extends Controller
{
    public $ignoreAction = array();
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
    
  /*
     * To run Ajax call disable CsrfValidation. 
     * 
     * 
     */
    public function beforeAction($action) {
      if (!in_array($action->id, $this->ignoreAction)) {
          if (is_object(Yii::$app->user->identity)) {
              if (adminUser::isUserAdmin(Yii::$app->user->identity->username) == 1) {
                  return $action;
              }
          } else {
                  return $this->goHome();
          }
      }
          $this->enableCsrfValidation = false;
          return parent::beforeAction($action);
    }

    /**
     * Lists all CountryList models.
     * @return mixed
     */  

public function actionIndex()
{
    $query = \app\models\CountryList::find()->joinWith('countries','continents');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort' => ['attributes' => [
                   'countries.name',
                   'continents.name',
                   'currency_code',
                   //aggregated columns
                   'continents.name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
                   'countries.name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
                   'countries.currency_code' => [
                        'asc' => ['currency_code' => SORT_ASC],
                        'desc' => ['currency_code' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
              ],],

            'pagination' => [
                'pageSize' => Yii::getAlias('@paging'),
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

}

    /**
     * Displays a single CountryList model.
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
     * Creates a new CountryList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CountryList();
        //print_r(Yii::$app->request->post()); //die;
      
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CountryList model.
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
     * Deletes an existing CountryList model.
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
     * Finds the CountryList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CountryList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CountryList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     public function actionContinent_country($param=''){
      
          $countries = Countries::find()->filterWhere(['countries.continent_code' => $_REQUEST["code"]])->asArray()->all();
         
        if(count($countries) > 0){
             foreach($countries as $country){
               echo "<option value='".$country['code']."'>".$country['name']."</option>";
          }
        }else{
            echo "<option>-</option>";
        }
    }
}
