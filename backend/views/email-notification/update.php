<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmailNotifications */

$this->title = 'Update Email Notifications: ' . ' ' . $model->subject;
$this->params['breadcrumbs'][] = ['label' => 'Email Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="email-notifications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
