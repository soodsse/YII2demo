<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
 <!-- slider-sect -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="slider-content">
            <ul class="bxslider">
              <li>
                <?= Html::img(Yii::$app->request->baseUrl.'/images/slider.png', ['class' => '','alt' => 'Slider Image']) ?>
                <div class="slider-text">
                  <h1>Lorem ipsum dolor sit amet,</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</p>
                 <?= Html::a('PLAY NOW', Yii::$app->homeUrl, ['class' => 'play-bttn']) ?>
                </div>
              </li>
              <li>
                <?= Html::img(Yii::$app->request->baseUrl.'/images/slider.png', ['class' => '','alt' => 'Slider Image']) ?>
                <div class="slider-text">
                  <h1>Lorem ipsum dolor sit amet,</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</p>
                 <?= Html::a('PLAY NOW', Yii::$app->homeUrl, ['class' => 'play-bttn']) ?>
                </div>
              </li>
              <li>
                <?= Html::img(Yii::$app->request->baseUrl.'/images/slider.png', ['class' => '','alt' => 'Slider Image']) ?>
                <div class="slider-text">
                  <h1>Lorem ipsum dolor sit amet,</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</p>
                 <?= Html::a('PLAY NOW', Yii::$app->homeUrl, ['class' => 'play-bttn']) ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- slider section ends here-->