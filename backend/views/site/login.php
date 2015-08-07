<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

?>
	<div class="login-box">
      <div class="login-logo">
       <b>Admin</b> 50ForACause
      </div><!-- /.login-logo -->
	  <div class="login-box-body" id="login_wrapper">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group has-feedback">
			<?= $form->field($model, 'username',['inputOptions'=>['placeholder'=>'UserName']])->textInput()->label(false) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
			<?= $form->field($model, 'password',['inputOptions'=>['placeholder'=>'Password']])->passwordInput()->label(false) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
				 <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
        <?php ActiveForm::end(); ?>
		<?= Html::a('I forgot my password', "javascript:void(0);", ['id' => 'paswrd']) ?>
	   
      </div><!-- /.login-box-body end-->
	  
	  <!-- /.Forget Box Start -->
	   <div class="login-box-body" style="display:none;" id="forgot_wrapper">
        <p class="login-box-msg">Please send us your email and we'll reset your password</p>
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
		 <div class="form-group has-feedback">
                <?= $form->field($passResetModel, 'email',['inputOptions'=>['placeholder'=>'Email Id']])->textInput()->label(false) ?>
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		 </div>
		 <div class="row">
            <div class="col-xs-8">    
             <?= Html::a('Back to Login', "javascript:void(0);", ['id' => 'back']) ?>                       
            </div><!-- /.col -->
            <div class="col-xs-4">
				  <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block btn-flat']) ?>
            </div><!-- /.col -->
          </div>
            <?php ActiveForm::end(); ?>
		  
       
      </div><!-- /.Forget Box Body End-->
	  
    </div><!-- /.login-box -->
