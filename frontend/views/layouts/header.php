<?php

use yii\helpers\Html;
use yii\helpers\Url;

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
                <ul class="nav flags">
                    <li>
                        <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/england.png', ['class' => '','alt' => 'England']), Yii::$app->homeUrl) ?>
                    </li>
                    <li>
                        <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/frane.png', ['class' => '','alt' => 'France']), Yii::$app->homeUrl) ?>
                    </li>
                    <li>
                        <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/dutch.png', ['class' => '','alt' => 'Dutch']), Yii::$app->homeUrl) ?>
                    </li>
                    <li>
                        <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/pu.png', ['class' => '','alt' => 'Pu']), Yii::$app->homeUrl) ?>
                    </li>
                    <li>
                        <?= Html::a(Html::img(Yii::$app->request->baseUrl.'/images/svenska.png', ['class' => '','alt' => 'Svenska']), Yii::$app->homeUrl) ?>
                    </li>
                </ul>
              </div>
     
          </div>
        </div>
      </div>
    </header>