<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recent Jackpots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jackpot-details-index">
<h2 class="heading"><?= Html::encode('Recent Jackpots') ?></h2> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?php Yii::getAlias('@FrontEndUrl'); ?>js/jquery.downCount.js"></script>
<div class='middle-section'>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
          $startTime = strtotime($model->start_date);
          $currentTime = time();
          $time = strtotime($model->end_date);
          $timeNew = date('m/d/Y H:i:s',$time);
          if($startTime>$currentTime)
          {
             $startTimeNew = date('m/d/Y H:i:s',$startTime);
              $data = '
                <div class="col-sm-12 lottery-list">
                  <div class="lottery-block">
                    <div class="col-md-5">
                    <div class="col-sm-5">'.Html::img(Yii::getAlias('@SERVER').'/'.$model->jackpot_section_image, ['class' => 'img-responsive jackpot-image','alt' => $model->name]).'</div>
                    <div class="col-sm-7">'.$model->countries->currency_code.' '.$model->jackpot_price.'</div>
                    </div>
                    <div class="col-md-4">
                    <div class="countdownExp_'.$model->id.'"></div>
                      
                      <div class="timer expHide_'.$model->id.'">
                      <p >Time left to start buy tickets</p>
                      <ul class="nav countdown_'.$model->id.'">
                        <li class="timr-img days">00</li>
                        <li class="timr-img hrs hours">00</li>
                        <li class="timr-img mins minutes">00</li>
                        <li class="timr-img secs seconds">00</li>
                       </ul>
                      </div>
                    </div>
                    <div class="col-md-3">'.Html::a(Html::img(Yii::$app->request->baseUrl.'/images/buy-btn.png', ['class' => 'img-responsive','alt' => 'Buy Now']), ['jackpot-details/view', 'id' => $model->id]).'</div>
                  </div>
               </div><script class="source" type="text/javascript">
        $(".countdown_'.$model->id.'").downCount({
            date: "'.$startTimeNew.'",
            offset: +10
        }, function () {
        $(".countdownExp_'.$model->id.'").html("<b>Time Over</b>");
        $(".expHide_'.$model->id.'").hide();  
        });
    </script>';
          }
          else{
            $data = '
                <div class="col-sm-12 lottery-list">
                  <div class="lottery-block">
                    <div class="col-md-5">
                    <div class="col-sm-5">'.Html::img(Yii::getAlias('@SERVER').'/'.$model->jackpot_section_image, ['class' => 'img-responsive jackpot-image','alt' => $model->name]).'</div>
                    <div class="col-sm-7">'.$model->countries->currency_code.' '.$model->jackpot_price.'</div>
                    </div>
                    <div class="col-md-4">
                    <div class="countdownExp_'.$model->id.'"></div>
                      
                      <div class="timer expHide_'.$model->id.'">
                      <p >Time left to buy tickets</p>
                      <ul class="nav countdown_'.$model->id.'">
                        <li class="timr-img days">00</li>
                        <li class="timr-img hrs hours">00</li>
                        <li class="timr-img mins minutes">00</li>
                        <li class="timr-img secs seconds">00</li>
                       </ul>
                      </div>
                    </div>
                    <div class="col-md-3">'.Html::a(Html::img(Yii::$app->request->baseUrl.'/images/buy-btn.png', ['class' => 'img-responsive','alt' => 'Buy Now']), ['jackpot-details/view', 'id' => $model->id]).'</div>
                  </div>
               </div><script class="source" type="text/javascript">
        $(".countdown_'.$model->id.'").downCount({
            date: "'.$timeNew.'",
            offset: +10
        }, function () {
        $(".countdownExp_'.$model->id.'").html("<b>Time Over</b>");
        $(".expHide_'.$model->id.'").hide();  
        });
    </script>';
          }
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
