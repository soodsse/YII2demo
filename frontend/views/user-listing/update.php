<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserListing */

$this->title = 'Update User Listing: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-listing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
