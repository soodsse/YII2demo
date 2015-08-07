<?php

namespace backend\controllers;

use Yii;
use app\models\TicketJackpotSummary;
use app\models\TicketJackpotSummarySearch;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use app\models\adminUser;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketJackpotSummaryController implements the CRUD actions for TicketJackpotSummary model.
 */
class TicketJackpotSummaryController extends Controller
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
     * Lists all TicketJackpotSummary models.
     * @return mixed
     */
    public function actionIndex()
    {
       /* if(isset($_POST)){
        Yii::$app->customFun->prx($_POST);
        }*/
        $searchModel = new TicketJackpotSummarySearch();
        $params = isset($_POST["PriceBreakdownSearch"])?$_POST["PriceBreakdownSearch"]:"";
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TicketJackpotSummary model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $data =  $finalData = array();
        
        $model = new TicketJackpotSummarySearch();
        $data = (new \yii\db\Query())
        ->select('tjs.id as summaryid,cn.name as continentName,c.name as countryName,tjs.*,j.*,ur.*')
        ->from('ticket_jackpot_summary as tjs')
        ->join('LEFT OUTER JOIN', 'jackpot_details as j','tjs.jackpot_id = j.id')	
        ->join('LEFT OUTER JOIN', 'users_register as ur', 'tjs.user_id = ur.id')
        ->join('LEFT OUTER JOIN', 'countries as c', 'j.countryid = c.code')
        ->join('LEFT OUTER JOIN', 'continents as cn', 'j.continent = cn.code')
        ->where(['tjs.id' => $id])
        ->all();
        foreach($model->summaryData($data) as $values){
            $finalData = $values;
            
        }
        $model = $finalData;
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new TicketJackpotSummary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TicketJackpotSummary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TicketJackpotSummary model.
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
     * Deletes an existing TicketJackpotSummary model.
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
     * Finds the TicketJackpotSummary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TicketJackpotSummary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TicketJackpotSummary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
