<?php

    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
    Created on : Jul 20, 2015, 3:25:42 PM
    Author     : anirudhsood
*/
    
namespace backend\components;

use Yii;
use yii\filters\AccessControl;
use app\models\UsersRegister;
use app\models\adminUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\IdentityInterface;
use yii\base\Component;


class MyGlobalComponent extends Component{
     public function init() {
        //echo "common code comes here.";
        parent::init();
    }
}

