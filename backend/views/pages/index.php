<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Pages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

           // 'id',
            'title',
            'slug',
            //'description:ntext',
            'status',
            // 'meta_title',
            // 'meta_desc:ntext',
            // 'meta_keyword:ntext',

            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this Page?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
        ],
    ]); ?>

</div>
