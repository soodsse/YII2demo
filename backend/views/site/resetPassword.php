<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
      <div class="login-logo">
       <b><?= Html::encode($this->title) ?></b> 
      </div><!-- /.login-logo -->
	  <div class="login-box-body" id="login_wrapper">
        <p class="login-box-msg">Please choose your new password</p>
<?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>
<div class="form-group has-feedback">
<?= $form->field($model, 'password',['inputOptions'=>['placeholder'=>'Password']])->passwordInput()->label(false) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
 <div class="row">
            <div class="col-xs-8">    
              &nbsp;                     
            </div><!-- /.col -->
            <div class="col-xs-4">
				 <?= Html::submitButton('Reset', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
</div>
</div>
 <?php ActiveForm::end(); ?>
