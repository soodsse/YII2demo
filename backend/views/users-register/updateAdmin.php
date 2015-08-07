<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsersRegister */

$this->title = 'Update Details: Admin';
$this->params['breadcrumbs'][] = ['label' => 'Users Registers', 'url' => ['index']];
/*$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];*/
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_adminUpdateForm', [
        'model' => $model,
    ]) ?>

</div>
