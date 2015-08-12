<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CountryList */

$this->title = $model->id;
$this->title = 'View Country: ' . ' ' . $model->countries_code;
$this->params['breadcrumbs'][] = ['label' => 'Country Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->countries_code;
?>
<div class="country-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you wantsadas to delete this Country?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'countries_code',
        ],
    ]) ?>

</div>
