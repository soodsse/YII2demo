<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home';
?>
<?php

   
      // Get current time
   
      $date1 = time();
     
      // Get the timestamp of 2006 October 20
   
      $date2 = mktime(22,34,0,07,11,2015);

#
$dateDiff = $date1 - $date2;
#
$fullDays = floor($dateDiff/(60*60*24));
#
$fullHours = floor(($dateDiff-($fullDays*60*60*24))/(60*60));
#
$fullMinutes = floor(($dateDiff-($fullDays*60*60*24)-($fullHours*60*60))/60);
#
$fullSec = floor(($dateDiff-($fullDays*60*60*24)-($fullHours*60*60)-($fullMinutes*60)));
?>
 
<h1>There are <span class="green"> <?php echo $fullDays?></span> days and <span class="green"> <?php echo $fullHours?></span> hours left <span class="green"> <?php echo $fullMinutes;?></span> min left <span class="green"> <?php echo $fullSec;?></span> sec left</h1>
<div class="jackpot-details-index">
<h2 class="heading"><?= Html::encode('Jackpot Listing') ?></h2> <script type="text/javascript">
      /*function display_c(start,id)
      {
       alert(id);
        window.start = parseFloat(start);
        var end = 0 // change this to stop the counter at a higher value
        var refresh=1000; // Refresh rate in milli seconds
        if(window.start >= end )
        {
           mytime=setTimeout(function(){ display_ct(id);},refresh)
        }
        else
        {
          //alert("Time Over ");
          document.getElementById(id).innerHTML = "Time Over";
        }
      }
      
      function display_ct(id)
      {
     //    alert(id);
        // Calculate the number of days left
        var days=Math.floor(window.start / 86400);
        // After deducting the days calculate the number of hours left
        var hours = Math.floor((window.start - (days * 86400 ))/3600)
        // After days and hours , how many minutes are left
        var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)
        // Finally how many seconds left after removing days, hours and minutes.
        var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))
        
        var x = window.start + "(" + days + " Days " + hours + " Hours " + minutes + " Minutes and " + secs + " Secondes " + ")";
       
        document.getElementById(id).innerHTML = x;
        window.start= window.start- 1;
        
        tt=display_c(window.start);
      }*/
    </script>
<div class='middle-section'>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
          $time = strtotime($model->end_date)-time();
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
                      <span id="ct_'.$model->id.'"></span>
                        <ul class="nav">
                          <li class="timr-img">05</li>
                          <li class="timr-img hrs">15</li>
                          <li class="timr-img mins">40</li>
                          <li class="timr-img secs">25</li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-3">'.Html::a(Html::img(Yii::$app->request->baseUrl.'/images/buy-btn.png', ['class' => 'img-responsive','alt' => 'Buy Now']), ['jackpot-details/view', 'id' => $model->id]).'</div>
                  </div>
               </div><script>display_c_'.$model->id.'('.$time.');
                function display_c_'.$model->id.'(start)
      {
      
        window.start = parseFloat(start);
        var end = 0 // change this to stop the counter at a higher value
        var refresh=1000; // Refresh rate in milli seconds
        if(window.start >= end )
        {
       
           mytime=setTimeout(function(){ display_ct_'.$model->id.'();},refresh)
        }
        else
        {
          //alert("Time Over ");
          document.getElementById("ct_'.$model->id.'").innerHTML = "Time Over";
        }
      }
      
      function display_ct_'.$model->id.'()
      {
     //    alert(id);
        // Calculate the number of days left
        var days=Math.floor(window.start / 86400);
        // After deducting the days calculate the number of hours left
        var hours = Math.floor((window.start - (days * 86400 ))/3600)
        // After days and hours , how many minutes are left
        var minutes = Math.floor((window.start - (days * 86400 ) - (hours *3600 ))/60)
        // Finally how many seconds left after removing days, hours and minutes.
        var secs = Math.floor((window.start - (days * 86400 ) - (hours *3600 ) - (minutes*60)))
        var ff = '.$model->id.';
        var x = ff +"asdasd"+ window.start + "(" + days + " Days " + hours + " Hours " + minutes + " Minutes and " + secs + " Secondes " + ")";
       
        document.getElementById("ct_'.$model->id.'").innerHTML = x;
        window.start= window.start- 1;
        
        display_c_'.$model->id.'(window.start);
      }</script>';
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
