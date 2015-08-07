<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <?= Html::img(Yii::$app->request->baseUrl.'/img/user-dummy.png', ['class' => 'user-image','alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
              <p><?php if (Yii::$app->user->isGuest) { echo "Super Admin"; } else { echo Yii::$app->user->identity->username; } ?></p>
              <?= Html::a('<i class="fa fa-circle text-success"></i> Online', "javascript:void(0)") ?>
            </div>
          </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo (Yii::$app->controller->id=='site'
                                   && Yii::$app->controller->action->id=='index'
                                  )?'active':'';?> treeview">
              <?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', Yii::$app->homeUrl) ?>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='users-register')
                                   && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                                )?'active':'';?> treeview">
               <?= Html::a('<i class="fa fa-user"></i> <span>Users Management</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                   <ul class="treeview-menu">
                        <li>
                           <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/users-register']) ?>
                        </li>
                        <li>
                        <?= Html::a('<i class="fa fa-circle-o"></i> <span>Add New</span>', ['/users-register/create']) ?>
                        </li>
                    </ul>
            </li>
             <li class="<?php echo ((Yii::$app->controller->id=='jackpot-section')
                                   && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                                )?'active':'';?> treeview">
               <?= Html::a('<i class="fa fa-cogs"></i> <span>Jackpot Management</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                   <ul class="treeview-menu">
                        <li>
                           <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/jackpot-section']) ?>
                        </li>
                        <li>
                        <?= Html::a('<i class="fa fa-circle-o"></i> <span>Add New</span>', ['/jackpot-section/create']) ?>
                        </li>
                    </ul>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='country-list')
                                  && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                                )?'active':'';?> treeview">
               <?= Html::a('<i class="fa fa-bars"></i> <span>Country Management</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                   <ul class="treeview-menu">
                        <li>
                           <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/country-list']) ?>
                        </li>
                        <li>
                        <?= Html::a('<i class="fa fa-circle-o"></i> <span>Add New</span>', ['/country-list/create']) ?>
                        </li>
                    </ul>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='ticket-details')
                                   && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                                )?'active':'';?> treeview">
               <?= Html::a('<i class="fa fa-ticket"></i> <span>Ticket Purchased</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                   <ul class="treeview-menu">
                        <li>
                           <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/ticket-details']) ?>
                        </li>
                    </ul>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='pages')
                                  && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                               )?'active':'';?> treeview">
              <?= Html::a('<i class="fa fa-newspaper-o"></i> <span>CMS Management</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                  <ul class="treeview-menu">
                       <li>
                          <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/pages']) ?>
                       </li>
                       <li>
                       <?= Html::a('<i class="fa fa-circle-o"></i> <span>Add New</span>', ['/pages/create']) ?>
                       </li>
                   </ul>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='email-notification')
                                  && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                               )?'active':'';?> treeview">
              <?= Html::a('<i class="fa fa-envelope-o"></i> <span>Notification Management</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                  <ul class="treeview-menu">
                       <li>
                          <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/email-notification']) ?>
                       </li>
                       <li>
                       <?= Html::a('<i class="fa fa-circle-o"></i> <span>Add New</span>', ['/email-notification/create']) ?>
                       </li>
                   </ul>
            </li>
            <li class="<?php echo ((Yii::$app->controller->id=='email-notification')
                                  && (Yii::$app->controller->action->id=='index'
                                   || Yii::$app->controller->action->id == 'create' || Yii::$app->controller->action->id == 'update')
                               )?'active':'';?> treeview">
              <?= Html::a('<i class="fa fa-archive"></i> <span>Ticket/Jackpot Summary</span> <i class="fa fa-angle-left pull-right"></i>', "javascript:void(0)") ?>
                  <ul class="treeview-menu">
                       <li>
                          <?= Html::a('<i class="fa fa-circle-o"></i> <span>List</span>', ['/ticket-jackpot-summary']) ?>
                       </li>
                   </ul>
            </li>
                        
        </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
   