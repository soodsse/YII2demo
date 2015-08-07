<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketSummary */

$this->title = 'Create Ticket Summary';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-summary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
