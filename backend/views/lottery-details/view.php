<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LotteryDetails */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lottery Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lottery-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'country_id',
            'currency_id',
            'lottery_name',
            'lottery_number',
            'lottery_image',
            'start_date',
            'end_date',
        ],
    ]) ?>

</div>
