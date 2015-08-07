<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CountryList */

$this->title = 'Create New Country';
$this->params['breadcrumbs'][] = ['label' => 'Country Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
