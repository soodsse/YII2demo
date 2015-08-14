<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
 
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-sm-7">
              <div class="col-xs-5"><?= Html::img(Yii::$app->request->baseUrl.'/images/footer-logo.png', ['class' => 'img-responsive footer-img','alt' => 'Logo']) ?></div>
              <div class="col-xs-7"> <span class="footer-head">About 50 for a cause</span> Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit
                <?= Html::a('Read more >>', Yii::$app->homeUrl, ['class' => 'read-more']) ?>
              </div>
            </div> 
            <div class="col-sm-5">
              <div class="brder-both-side"> 
              <ul class="nav pull-left">
                <li><?= Html::a('Home', Yii::$app->homeUrl) ?></li>  
                <li><?= Html::a('Latest Results', Yii::$app->homeUrl) ?></li>    
                <li><?= Html::a('Tickets', Yii::$app->homeUrl) ?></li>
              </ul>
              <ul class="nav pull-left">
                <li><?= Html::a('Home', Yii::$app->homeUrl) ?></li>  
                <li><?= Html::a('Latest Results', Yii::$app->homeUrl) ?></li>    
                <li><?= Html::a('Tickets', Yii::$app->homeUrl) ?></li>
              </ul>
              </div>
            </div>
          </div> 
        </div>
        <div class="col-md-3">
          <div class="pull-rigth">
            <span>Languages Known</span>
            <div class="flags ">
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/england.png', ['alt' => 'England']), Yii::$app->homeUrl) ?>
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/frane.png', ['alt' => 'France']), Yii::$app->homeUrl) ?>
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/dutch.png', ['alt' => 'Dutch']), Yii::$app->homeUrl) ?>
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/pu.png', ['alt' => 'PU']), Yii::$app->homeUrl) ?>
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/svenska.png', ['alt' => 'Svenska']), Yii::$app->homeUrl) ?>
            </div>
            <div class="social-icons">
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/fb.jpg', ['alt' => 'Facebook']), Yii::$app->homeUrl) ?>
                  <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/twitter.jpg', ['alt' => 'Twitter']), Yii::$app->homeUrl) ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
 