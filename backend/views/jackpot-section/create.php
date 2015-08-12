<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JackpotDetails */

$this->title = 'Add New Jackpot';
$this->params['breadcrumbs'][] = ['label' => 'Jackpot Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jackpot-details-create">

    <h1><?= Html::encode($this->title) ?></h1>
  <?php  /*<div style="color:#ff0000;"><?php echo Yii::$app->getSession()->getFlash("error"); ?></div>*/ ?>
    <?= $this->render('_form', [
        'model' => $model,
        'continents' => $continents,
        'country' => array()
    ]) ?>

</div>
