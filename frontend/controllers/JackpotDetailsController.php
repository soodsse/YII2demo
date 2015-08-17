<?php

namespace frontend\controllers;

use Yii;
use app\models\JackpotDetails;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Countries;
use app\models\Continent;
use app\models\CountryList;

/**
 * JackpotDetailsController implements the CRUD actions for JackpotDetails model.
 */
class JackpotDetailsController extends Controller
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
     * Lists all Current / Upcoming Jackpots models.
     * @return mixed
     */
    public function actionIndex()
    {
         $dataProvider = new ActiveDataProvider([
            'query' => JackpotDetails::find()->where(['>', 'jackpot_details.end_date', date("Y-m-d H:i:s")])->with('countries','continents'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JackpotDetails model.
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
     * Creates a new JackpotDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JackpotDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JackpotDetails model.
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
     * Deletes an existing JackpotDetails model.
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
     * Finds the JackpotDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JackpotDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JackpotDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     /**
     * Lists all Past Jackpots models.
     * @return mixed
     */
    public function actionPast()
    {
        $lastMonth = time() - (3600*24*30);
		$last_month = date("Y-m-d H:i:s",$lastMonth);
         $dataProvider = new ActiveDataProvider([
            'query' => JackpotDetails::find()->where(['<', 'end_date', date("Y-m-d H:i:s",time() + 3600)])
        ->andWhere(['>=', 'end_date', $last_month]),
        ]);

        return $this->render('past', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
