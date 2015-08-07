<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-notifications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Email Notifications', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout'=>"{pager}\n{summary}\n{items}",
                'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ], 
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'subject',
            'alias',
            //'description:html',
            'status',
            // 'created_on',
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
