<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Listing';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-register-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           /* ['class' => 'yii\grid\CheckboxColumn'],*/
            'firstname',
            'lastname',
            'emailID:email',
            //'password',
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'created_date',
            ],
            // 'con_password',
            // 'created_date',
            // 'updated_date',
            ['class' => 'yii\grid\ActionColumn'],
        ],       
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
    ]); ?>

</div>
