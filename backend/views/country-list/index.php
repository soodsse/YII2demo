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
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            ['class' => 'yii\grid\ActionColumn','header'=>'Action'],
        ],
    ]); ?>

</div>
