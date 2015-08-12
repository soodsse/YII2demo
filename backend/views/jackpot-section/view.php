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
                'confirm' => 'Are you sure you want to delete this Jackpot?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            ['label'=>'Jackpot Price',
               'value'=> $model->countryCurrency." ".$model->jackpot_price,               
            ],
            ['label'=>'Ticket Price',
               'value'=> $model->countryCurrency." ".$model->ticket_price,               
            ],
            [
                'attribute'=>'photo',
                'value'=> ($model->jackpot_section_image != "")?file_exists(Yii::getAlias('@upload_DIR')."/".$model->jackpot_section_image)?Yii::getAlias('@SERVER')."/".$model->jackpot_section_image:Yii::getAlias('@SERVER')."/no_image.png":Yii::getAlias('@SERVER')."/no_image.png",
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            'average_person',
            ['label'=>'Country Name',
               'value'=> $model->countryName,               
            ],
            ['label'=>'Continent Name',
               'value'=> $model->continentName,               
            ],
            'start_date',
            'end_date',
        ],
    ]) ?>

</div>
