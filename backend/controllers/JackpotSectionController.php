<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\adminUser;
use app\models\JackpotDetails;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Countries;
use app\models\CountryList;
use common\models\User as commonUser;


/**
 * JackpotSectionController implements the CRUD actions for JackpotDetails model.
 */
class JackpotSectionController extends Controller
{
    private $extensions = array('jpg','jpeg','png');
    public $ignoreAction = array('api-jackpot-recent-list','api-jackpot-upcoming-list');
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
     * Lists all JackpotDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => JackpotDetails::find(),
            'sort' => ['attributes' => [
                   'currencyJacpotPrice' => [
                        'asc' => ['jackpot_price' => SORT_ASC],
                        'desc' => ['jackpot_price' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
                   'currencyTicketPrice' => [
                        'asc' => ['ticket_price' => SORT_ASC],
                        'desc' => ['ticket_price' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
                   'name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                        'default' => SORT_DESC
                   ],
                   'average_person' => [
                        'asc' => ['average_person' => SORT_ASC],
                        'desc' => ['average_person' => SORT_DESC],
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
       
        $continent = \app\models\Continents::find()
	->innerJoinWith('countryList', false)
	->all();
        
        if (Yii::$app->request->isPost) { 
            
            // the following will retrieve the user 'CeBe' from the database
            $jackpotName = $model::find()->where(['name' => Yii::$app->request->post('JackpotDetails')["name"]])->count();
            
           if($jackpotName > 0){
               Yii::$app->getSession()->setFlash('error', 'Jackpot Name already exist. Please try other.');
               return $this->redirect(array('/jackpot-section/create'));
           } 
            
           $jackpot_section_image = time().'_'.$_FILES['JackpotDetails']['name']['jackpot_section_image']; 
            $file = UploadedFile::getInstance($model, 'jackpot_section_image');
             if (is_object($file) && ($file->size !== 0)){
		   $file->name = time().'_'.$file->name;
		}
            //Yii::$app->customFun->prx($file);
            
            
            $uploadDir =  Yii::getAlias('@upload_DIR');
            //$model->jackpot_section_image = $file;
            $start_date = Yii::$app->customFun->dateFormat(Yii::$app->request->post("JackpotDetails")["start_date"]);
            $end_date = Yii::$app->customFun->dateFormat(Yii::$app->request->post("JackpotDetails")["end_date"]);
          
        }
       
        //Yii::$app->customFun->prx($continent);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (is_object($file) && ($file->size !== 0)){
                $extensionFile = substr(strstr($file->name,"."),1);
                if(!in_array($extensionFile, $this->extensions)){
                     Yii::$app->getSession()->setFlash('error', 'Only jpg, jpeg and png files are allowed to upload.');
                   return $this->redirect(array('/jackpot-section/create'));
                }
                $model->UpdateJackpotSection($file, $uploadDir, $jackpot_section_image,$model);
                $model->UpdateJackpotImage($jackpot_section_image,$model);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'continents' => $continent
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
        
        $uploadDir =  Yii::getAlias('@upload_DIR');
        
        $continent = \app\models\Continents::find()
	->innerJoinWith('countryList', false)
	->all();
       
        /**/ $country = \app\models\Countries::find()
	->innerJoinWith('continentCode', false)
        ->filterWhere(['name' => null, 'continents.code' => $model->continent])->asArray()
            ->all(); 
            //  Yii::$app->customFun->prx($country);
        if (Yii::$app->request->isPost) { 
            
           $jackpot_section_image = time().'_'.$_FILES['JackpotDetails']['name']['jackpot_section_image']; 
           $file = UploadedFile::getInstance($model, 'jackpot_section_image');
            if (is_object($file) && ($file->size !== 0)){
		   $file->name = time().'_'.$file->name;
		}
           
            
           if (is_object($file) && ($file->size !== 0)){
            $extensionFile = substr(strstr($file->name,"."),1);
            if(!in_array($extensionFile, $this->extensions)){
                 Yii::$app->getSession()->setFlash('error', 'Only jpg, jpeg and png files are allowed to upload.');
                return $this->redirect(array('/jackpot-section/update','id'=>$id));
            }   
            $model->UpdateJackpotSection($file, $uploadDir, $jackpot_section_image,$model);
            $model->UpdateJackpotImage($jackpot_section_image, $model);
           }else{
            $jackpot_section_image = $model::findone($id)->jackpot_section_image;
           
           // $model->UpdateJackpotImage($file,$model);
           }
          // $model->jackpot_section_image = $file;
             
            
           
            
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          // if (!is_object($file)){
                $model->UpdateJackpotImage($jackpot_section_image,$model);
                
           // }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'continents' => $continent,
                'country' => $country
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
    
    public function actionContinent_country($param=''){
        $countriesStr = ''; 
        if($_REQUEST["code"] != ""){
            $contylist =  CountryList::find()->filterWhere(['country_list.continents_code' => $_REQUEST["code"]])->asArray()->all();
              
          if(count($contylist) > 0){
               $ctr = 0;
               foreach($contylist as $country){
                                  $countries = Countries::find()->filterWhere(['countries.code' => $country["countries_code"]])->asArray()->all();
                if($ctr == 0){
                   $currency = $countries[0]['currency_code'];
                }    
                $countriesStr .= "<option value='".$countries[0]['code']."'>".$countries[0]['name']."</option>";
                $ctr++;
            }
          }else{
              $countriesStr = "<option>-</option>";
          }
        }else{
             $countriesStr = "<option>Select Country</option>";
             $currency = '';
        }
        $data = array("country" => $countriesStr, "currency" => $currency);
        echo json_encode($data);
    }
	
    public function actionCountry_currency($param=''){
        if($_REQUEST["code"] != ""){
            $countries = Countries::find()->filterWhere(['countries.code' => $_REQUEST["code"]])->asArray()->all();
            return $countries[0]['currency_code'];
        }else{
            return '';
        }
    }
	  /*************************************** API Fucntion Start **************************************/

	
	  /**
     * Recent/current Jackpot list Web Service
     * @return mixed
     */
    public function actionApiJackpotRecentList()
    {
        $this->layout = false;
        $model = new JackpotDetails();
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['Jackpot'] = json_decode($json, true);
		//$data['Jackpot'] = Yii::$app->request->post();
		$limit = (empty($data['Jackpot']['limit'])) ? '20' : $data['Jackpot']['limit'];
		$start = (empty($data['Jackpot']['offset'])) ? '0' : $data['Jackpot']['offset'];
		if($start>0)
		{
		$start = $start * $limit;
		}
		$lastMonth = time() - (3600*24*30);
		$last_month = date("Y-m-d H:i:s",$lastMonth);
		$jackpotListCount= JackpotDetails::find()->where(['<', 'end_date', date("Y-m-d H:i:s",time() + 3600)])
        ->andWhere(['>=', 'end_date', $last_month])->asArray()->all();
		
        $jackpotList= JackpotDetails::find()->where(['<', 'end_date', date("Y-m-d H:i:s",time() + 3600)])
        ->andWhere(['>=', 'end_date', $last_month])->limit($limit)->offset($start)->asArray()->all();
		if(!empty($jackpotList))
		{
			$index = 0;
			foreach($jackpotList as $list)
			{
			$time = strtotime($list['end_date']) + 3600; // Add 1 hour
			$jackpotListNew[$index]['lotteryName'] = $list['name'];
			$jackpotListNew[$index]['lotteryDate'] = date("Y-m-d H:i:s",$time);
			$jackpotListNew[$index]['lotteryImage'] = $list['jackpot_section_image'];
			$jackpotListNew[$index]['countryIcon'] = $list['countryid'].'.png';
			$index++;
			}
			$return['status'] = 1;
            $return['data'] = $jackpotListNew;
			$return['totalRecords'] = count($jackpotListCount);
            $return['message'] = "Data Retrieved Successfully.";
            return json_encode($return);  
		}
		 else
        {
            $return['status'] = 0;
            $return['message'] = "There is no Recent Jackpot.";
            return json_encode($return);
        }
		
	}
	
		  /**
     * Upcoming Jackpot list Web Service
     * @return mixed
     */
    public function actionApiJackpotUpcomingList()
    {
        $this->layout = false;
        $model = new JackpotDetails();
        header('Content-type: application/json');    
        $json = file_get_contents('php://input');
       
        //convert the string of data to an array
        $data['Jackpot'] = json_decode($json, true);
		//$data['Jackpot'] = Yii::$app->request->post();
		$limit = (empty($data['Jackpot']['limit'])) ? '20' : $data['Jackpot']['limit'];
		$start = (empty($data['Jackpot']['offset'])) ? '0' : $data['Jackpot']['offset'];
		if($start>0)
		{
		$start = $start * $limit;
		}
		 $jackpotListCount = JackpotDetails::find()->where(['>', 'end_date', date("Y-m-d H:i:s")])
        ->asArray()->all();
        $jackpotList= JackpotDetails::find()->where(['>', 'end_date', date("Y-m-d H:i:s")])
        ->limit($limit)->offset($start)->asArray()->all();
		if(!empty($jackpotList))
		{
			$index = 0;
			foreach($jackpotList as $list)
			{
			$time = strtotime($list['end_date']) + 3600; // Add 1 hour
			$jackpotListNew[$index]['lotteryName'] = $list['name'];
			$jackpotListNew[$index]['lotteryStartDate'] = $list['start_date'];
			$jackpotListNew[$index]['drawDate'] = date("Y-m-d H:i:s",$time);
			$jackpotListNew[$index]['jackpotPrize'] = $list['jackpot_price'];
			$jackpotListNew[$index]['ticketPrize'] = $list['ticket_price'];
			$jackpotListNew[$index]['lotteryImage'] = $list['jackpot_section_image'];
			$jackpotListNew[$index]['countryIcon'] = $list['countryid'].'.png';
			$index++;
			}
			$return['status'] = 1;
            $return['data'] = $jackpotListNew;
			$return['totalRecords'] = count($jackpotListCount);
            $return['message'] = "Data Retrieved  Successfully.";
            return json_encode($return);  
		}
		 else
        {
            $return['status'] = 0;
            $return['message'] = "There is no Upcoming Jackpot.";
            return json_encode($return);
        }
		
	}
	
	  /*************************************** API Fucntion End **************************************/

}
