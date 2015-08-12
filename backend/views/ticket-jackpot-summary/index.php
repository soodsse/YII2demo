<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketJackpotSummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticket Jackpot Summaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-jackpot-summary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $dataProvider]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'layout'=>"{pager}\n{summary}\n{items}",
                'tableOptions' => ['class' => 'table  table-bordered table-hover'],*/
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ], 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           /* 'jackpot_id',*/
            'ticket_number',
            'jackpot_price',
            'ticket_price',
            'average_person',
            'continentName',
            'countryName',            
       /*     'created_on',
            'updated_on',
*/
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
