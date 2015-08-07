<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsersRegister */

$this->title = 'Update User: ' . ' ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Users Listing', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
