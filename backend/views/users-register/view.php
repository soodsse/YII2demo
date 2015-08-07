<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsersRegister */

$this->title = 'View User: ' . ' ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Users Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->firstname;
?>
<div class="users-register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'firstname',
            'lastname',
            'emailID:email',
	   //'user_pic',
            	[
		    'attribute'=>'user_pic',
		    'value'=> Yii::getAlias('@SERVER')."/userPic/".$model->user_pic,
		    'format' => ['image',['width'=>'100','height'=>'100']],
		],
	    'date_of_birth',
	    'gender',
           /* 'password',
            'con_password',*/
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>