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
        <?= Html::a('Create Jackpot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'layout'=>"{pager}\n{summary}\n{items}",
                'tableOptions' => ['class' => 'table  table-bordered table-hover'],
         */
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'jackpot_price',
            'ticket_price',
            'average_person',
            // 'average_person',
            // 'continent',
            // 'countryid',
            // 'start_date',
            // 'end_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
    ]); ?>

</div>
