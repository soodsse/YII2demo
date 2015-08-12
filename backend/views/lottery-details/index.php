<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lottery Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lottery-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Lottery Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'country_id',
            'currency_id',
            'lottery_name',
            'lottery_number',
            // 'lottery_image',
            // 'start_date',
            // 'end_date',

            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this Lottery?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
        ],
    ]); ?>

</div>
