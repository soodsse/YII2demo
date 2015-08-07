<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserListing */

$this->title = 'Create User Listing';
$this->params['breadcrumbs'][] = ['label' => 'User Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-listing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
