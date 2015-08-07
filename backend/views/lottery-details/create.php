<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LotteryDetails */

$this->title = 'Create Lottery Details';
$this->params['breadcrumbs'][] = ['label' => 'Lottery Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lottery-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
