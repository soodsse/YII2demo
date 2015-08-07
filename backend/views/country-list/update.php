<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountryList */

$this->title = 'Update Country';
$this->params['breadcrumbs'][] = ['label' => 'Country Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="country-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
