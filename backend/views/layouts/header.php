<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<header class="main-header">
        <!-- Logo -->
        <?= Html::a('50 ForACause', Yii::$app->homeUrl, ['class' => 'logo']) ?>
       
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <?= Html::img(Yii::$app->request->baseUrl.'/img/user-dummy.png', ['class' => 'user-image','alt' => 'User Image']) ?>
                   
                  <span class="hidden-xs"><?php if (Yii::$app->user->isGuest) { echo "Super Admin"; } else { echo Yii::$app->user->identity->username; } ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?= Html::img(Yii::$app->request->baseUrl.'/img/user-dummy.png', ['class' => 'img-circle','alt' => 'User Image']) ?>
                   
                    <p><?php if (Yii::$app->user->isGuest) { echo "Super Admin"; } else { echo Yii::$app->user->identity->username; } ?>
                      <small><?php echo date("Y-m-d H:i:s a"); ?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                       
                        <?= Html::a('Profile', Yii::$app->urlManager->createUrl(['users-register/profile-update', 'id' => 1]), ['data-method' => 'post','class' => 'btn btn-default btn-flat']) ?>
                    </div>
                    <div class="pull-right">
                         <?= Html::a('Sign out', ['/site/logout'], ['data-method' => 'post','class' => 'btn btn-default btn-flat']) ?>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
</header>