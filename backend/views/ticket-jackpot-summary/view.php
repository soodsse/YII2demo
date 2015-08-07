<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TicketJackpotSummary */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ticket Jackpot Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// Yii::$app->customFun->prx($model);
?>
<div class="ticket-jackpot-summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?php /* <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>*/ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            // the owner name of the model
            'label' => 'ID',
            'value' => $model['summaryid'],
            ],
            [
            // the owner name of the model
            'label' => 'First Name',
            'value' => $model['firstname'],
            ],            
            [
            // the owner name of the model
            'label' => 'Last Name',
            'value' => $model['lastname'],
            ],                        
            [
            // the owner name of the model
            'label' => 'Email ID',
            'value' => $model['emailID'],
            ],                                    
            [
            // the owner name of the model
            'label' => 'Ticket Price',
            'value' => $model['ticket_price'],
            ],
            'ticket_number',           
            [
            // the owner name of the model
            'label' => 'Jackpot Price',
            'value' => $model['jackpot_price'],
            ],
            [
            'attribute' => 'photo',
            'label' => 'Section Image',
            'value' => Yii::getAlias('@SERVER')."/" . $model['jackpot_section_image'],
            'format' => ['image',['width'=>'100','height'=>'100']],
            ],
            [
            // the owner name of the model
            'label' => 'Country Name',
            'value' => $model['countryName'],
            ],           
            [
            // the owner name of the model
            'label' => 'Continent Name',
            'value' => $model['continentName'],
            ],
             [
            // the owner name of the model
            'label' => 'Description',
            'value' => $model['desc'],
            'format' => 'html',
            ],
            [
            // the owner name of the model
            'label' => 'Terms & Conditions',
            'value' => $model['tandc'],
                 'format' => 'html',
            ],
        ],
    ]) ?>

</div>
