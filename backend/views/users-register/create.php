<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsersRegister */

$this->title = 'Add New User';
$this->params['breadcrumbs'][] = ['label' => 'User Listing', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
