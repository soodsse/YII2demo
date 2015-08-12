<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticket Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'first_name',
            'last_name',
            'email_id:email',
            'transaction_id',
             'status',
             'transaction_date',

            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this Ticket Details?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
        ],
    ]); ?>

</div>
