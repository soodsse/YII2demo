<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="row">
      <h2 class="heading">Menu</h2>
      <ul class="nav side_menu">
            <li><?= Html::a('Current / Upcoming Jackpot', Yii::$app->homeUrl, ['class' => '']) ?></li>
            <li><?= Html::a('Recent Jackpot', ['jackpot-details/past'], ['class' => '']) ?></li>
            <li><?= Html::a('Jackpot Winner', Yii::$app->homeUrl, ['class' => '']) ?></li>
      </ul>
</div>
<div class="row">
      <h2 class="text-center">Free Mobile App</h2>
      <?= Html::img(Yii::$app->request->baseUrl.'/images/img.png', ['class' => 'img-responsive','alt' => 'Mobile']) ?>
      <?= Html::a('Download', Yii::$app->homeUrl, ['class' => 'btn-download']) ?>
</div>