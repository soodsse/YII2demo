<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
//use app\models\CountryList;
use app\models\Continents;
use app\models\Countries;

class HelloWidget extends Widget{
	public $message;
	
	public function init(){
		parent::init();
		 $query = \app\models\CountryList::find()->with('countries','continents')->asArray()->all();
		 
		if($this->message===null){
			$this->message= json_encode($query);
		}else{
			$this->message= 'Welcome dszfgsdf'.$this->message;
		}
	}
	
	public function run(){
		return $this->message;
	}
}
?>
