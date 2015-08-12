<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Jackpot Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jackpot-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Jackpot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'layout'=>"{pager}\n{summary}\n{items}",
                'tableOptions' => ['class' => 'table  table-bordered table-hover'],
         */
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'currencyJacpotPrice',
            'currencyTicketPrice', 
            'average_person',
            // 'average_person',
            // 'continent',
            // 'countryid',
            // 'start_date',
            // 'end_date',

           ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this Jackpot?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
        ],
    ]); ?>

</div>
