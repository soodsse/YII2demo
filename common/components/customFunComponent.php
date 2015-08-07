<?php
namespace common\components;
 
use Yii;
use yii\base\Component;
  
class customFunComponent extends Component {
    
    public static function prx($array = array()){
        echo "<pre>";
        print_r($array);
        die("=======Array ends here==========");
    }
    
    public static function pr($array = array()){
        echo "<pre>";
        print_r($array);
    }
    
    public function dateFormat($time){
        
        return date("Y-m-d H:i:s", strtotime($time));
        
    }
}