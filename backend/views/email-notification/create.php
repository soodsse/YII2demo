<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmailNotifications */

$this->title = 'Create Email Notifications';
$this->params['breadcrumbs'][] = ['label' => 'Email Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-notifications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
