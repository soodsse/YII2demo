<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketJackpotSummary */

$this->title = 'Create Ticket Jackpot Summary';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Jackpot Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-jackpot-summary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
