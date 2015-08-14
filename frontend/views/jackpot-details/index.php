<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jackpot Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jackpot-details-index">
<h2 class="heading"><?= Html::encode($this->title) ?></h2>
<div class='middle-section'>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            $data = '
                <div class="col-sm-12 lottery-list">
                  <div class="lottery-block">
                    <div class="col-md-5">
                    <div class="col-sm-5">'.Html::img(Yii::getAlias('@SERVER').'/'.$model->jackpot_section_image, ['class' => 'img-responsive jackpot-image','alt' => $model->name]).'</div>
                    <div class="col-sm-7">'.$model->jackpot_price.'</div>
                    </div>
                    <div class="col-md-4">
                      <p>Time left to buy tickets</p>
                      <div class="timer">
                        <ul class="nav">
                          <li class="timr-img">05</li>
                          <li class="timr-img hrs">15</li>
                          <li class="timr-img mins">40</li>
                          <li class="timr-img secs">25</li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-3">'.Html::a(Html::img(Yii::$app->request->baseUrl.'/images/buy-btn.png', ['class' => 'img-responsive','alt' => 'Buy Now']), ['view', 'id' => $model->id]).'</div>
                  </div>
               </div>';
              return $data;
        },
                'layout' => "{items}\n{pager}{summary}",
        //'summary'=>'',//'Result {start} - {end} of {count} results'
        'pager' => array(
        'prevPageLabel' => 'Previous',
        'nextPageLabel' => 'Next',
        'firstPageLabel'=>'First',
        'lastPageLabel'=>'Last',
        'maxButtonCount'=>4 // defalut 10                    
        ),
    ]) ?>

</div>
</div>
