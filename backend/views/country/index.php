<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Continents;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
//Yii::$app->customFun->prx(app\models\Country::find()->with('Continents')->all());

?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'continents.name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
