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
            ['class' => 'yii\grid\ActionColumn','header'=>'Action',
             'buttons' => ['delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data-confirm'=>'Are you sure you want to delete this User?',
                                    'data-method'=>'POST'
                        ]);
                    }]],
        ],       
        'pager' => [
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
        ],
    ]); ?>

</div>
