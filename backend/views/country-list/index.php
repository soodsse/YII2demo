<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Continents;
use app\models\Countries;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Country Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
         'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'continents_code',
            //'countries_code',
            'countries.name',
            'continents.name',
            'countries.currency_code',
            ['label' => 'Country Icon',
             'format' => 'raw',
               'value' => function ($model) {                      
            return '<img src="'.Yii::$app->getUrlManager()->getBaseUrl().'/img/flags/'.$model->countries_code.'.png">';
    },
               
             ],
            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this Country?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
          
        ],
    ]); ?>

</div>
