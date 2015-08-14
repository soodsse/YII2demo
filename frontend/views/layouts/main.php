<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $this->head() ?>
     <?php
      /*********** Include CSS Start *********/
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/bootstrap.css');
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/jquery.bxslider.css');
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/custom.css');
      /*********** Include CSS End *********/
     ?>
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl;?>/css/style.css">
    
</head>
<body>
    <?php $this->beginBody() ?>
    <?php
       $controller = Yii::$app->controller;
       $default_controller = Yii::$app->defaultRoute;
       $isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;

       echo $this->render('header');
       if(isset($isHome) && $isHome==1)
       {
         echo $this->render('home-slider');
       }
     ?>
    <section class="main-section">
      <div class="container">
        <div class="row">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        
          <div class="col-sm-3 sidebar">
           <?= $this->render('left-panel'); ?>
          </div>
            <div class="col-sm-9">
            <div class="bg-block">
                 <?= $content ?>
            </div>
            </div>
        </div>
      </div>
    </section>
  <?php
     echo $this->render('footer');
     ?>

    <?php $this->endBody() ?>
    <?php
      /*********** Include Script Start *********/
      $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery-1.11.1.min.js');
      $this->registerJsFile(Yii::$app->request->baseUrl.'/js/bootstrap.min.js');
      $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.bxslider.min.js');
      $this->registerJsFile(Yii::$app->request->baseUrl.'/js/custom.js');
     
      /*********** Include Script End *********/
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.bxslider').bxSlider({
           auto: true,
             autoControls: true
        });  
        $('.menu-link').click(function(){
         $('#navigation').toggleClass('dspl-hidn');
         });

        });
    </script>
   
</body>
</html>
<?php $this->endPage() ?>
