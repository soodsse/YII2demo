<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JackpotDetails */

$this->title = 'View Jackpot: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Jackpot Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="jackpot-details-view">

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
            'name',
            'jackpot_price',
            'ticket_price',
            [
                'attribute'=>'photo',
                'value'=> file_exists(Yii::getAlias('@upload_DIR')."/".$model->jackpot_section_image)?Yii::getAlias('@SERVER')."/".$model->jackpot_section_image:Yii::getAlias('@SERVER')."/no_image.png",
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'average_person',
            'continent',
            'countryid',
            'start_date',
            'end_date',
        ],
    ]) ?>

</div>
