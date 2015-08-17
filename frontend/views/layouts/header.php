<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\components\HelloWidget;
?>

<header>
      <div class="container">
        <div class="row">
          <div class="col-xs-8">
            <nav class="navbar navbar-default">
              <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/logo.png', ['class' => 'logo-image img-responsive','alt' => 'Logo Image']), Yii::$app->homeUrl, ['class' => 'navbar-brand']) ?>
              </div>
              <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right navbarTop">
                  <li><?= Html::a('Home', Yii::$app->homeUrl, ['class' => 'current-class']) ?></li>
                  <li><?= Html::a('Latest Results', Yii::$app->homeUrl, ['class' => '']) ?></li>
                  <li><?= Html::a('Tickets', Yii::$app->homeUrl, ['class' => '']) ?></li>
                </ul>
              </div>
            </nav>
              </div>
              <div class="col-xs-4">
               <button aria-controls="navbar" class="menu-link dspl" type="button">
                <?= Html::img(Yii::$app->request->baseUrl.'/images/flag.jpg', ['class' => '','alt' => 'Flag Image']) ?>
                </button>              
          
              <div class="dspl-hidn navbarTop" id="navbar navigation">
                  <?php
                        $country = HelloWidget::widget();
                        $countryList = json_decode($country,true);
                        
                  ?>
                <ul class="nav flags">
                  <?php
                  $ListCount = 1;
                    $listArray = array();
                  foreach($countryList as $listCountry) {
                        if($ListCount<=4) {
                        ?>
                    <li>
                        <?= Html::a(Html::img(Yii::getAlias('@BackendEndUrl').'/img/flags/'.$listCountry['countries_code'].'.png', ['class' => '','alt' => $listCountry['countries']['name'],'title' => $listCountry['countries']['name']]), Yii::$app->homeUrl) ?>
                    </li>
                    <?php } else {
                      
                        $listArray[]=$listCountry;
                     } $ListCount++; }
                  
                     echo '<li><select>';
                     foreach($listArray as $listArrayVal)
                     {
                         echo '<option>'.$listArrayVal['countries']['name'].'</option>';
                     }
                     echo '</select></li>';
                     ?>
                </ul>
              </div>
     
          </div>
        </div>
      </div>
    </header>