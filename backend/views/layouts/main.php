<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <?php $this->head() ?>
    <?php
        /*********** Include CSS Start *********/
        /* Bootstrap 3.3.2 */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/bootstrap/css/bootstrap.min.css');
        /* FontAwesome 4.3.0 */
        $this->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        /* Ionicons 2.0.0 */
        $this->registerCssFile('http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css');
        /* Theme style */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/AdminLTE.min.css');
        /* AdminLTE Skins. Choose a skin from the css/skins 
           folder instead of downloading all of them to reduce the load. */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/skins/_all-skins.min.css');
        /* iCheck */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/iCheck/flat/blue.css');
        /* Morris chart */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/morris/morris.css');
        /* jvectormap */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
        /* Date Picker */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/datepicker/datepicker3.css');
        /* Daterange picker */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/daterangepicker/daterangepicker-bs3.css');
        /* bootstrap wysihtml5 - text editor */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
       
        
        $this->registerCssFile('http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/jquery-ui-timepicker-addon.css');
        /************* Adding Custom CSS file to write own css. **************/
         $this->registerCssFile(Yii::$app->request->baseUrl.'/css/custom.css');
        
        /*********** Include CSS End *********/
            
    ?>
</head>
<body class="skin-blue">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        
      <?php
        echo $this->render('header');
        echo $this->render('left-panel');
      ?>
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <section class="content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
         <?= Alert::widget() ?>
        <?= $content ?>
         </section>
        </div>
       <!--Footer Wrapper Starts-->
       <?php
        echo $this->render('footer');
       ?>

    </div>


    <?php $this->endBody() ?>
    
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    
    <?php
         /*********** Include Script Start *********/
        /* HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
           WARNING: Respond.js doesn't work if you view the page via file: */
        ?>
        <!--[if lt IE 9]>
        <?php
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/html5shiv.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/respond.min.js');
        ?>
        <![endif]-->
        
        <?php
        /* jQuery Script */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery-ui-1.10.4.min.js');
        /* jQuery 2.1.3 */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/jQuery/jQuery-2.1.3.min.js');
        /* jQuery UI 1.11.2 */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery-ui.min.js');
        /* Bootstrap 3.3.2 JS */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/bootstrap/js/bootstrap.min.js');
        /* Morris.js charts */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/raphael-min.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/morris/morris.min.js');
        /* Sparkline */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/sparkline/jquery.sparkline.min.js');
        /* jvectormap */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
        /* jQuery Knob Chart */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/knob/jquery.knob.js');
        /* daterangepicker */
     
        /* Bootstrap WYSIHTML5 */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
        /* Slimscroll */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/slimScroll/jquery.slimscroll.min.js');
        /* FastClick */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/fastclick/fastclick.min.js');
       $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/jscripts/tiny_mce/tiny_mce.js');
        /* AdminLTE App */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/app.min.js');
        /* Date picker calendar */
        /*$this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.datetimepicker.js');*/
        /* Custom JS */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/custom.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/editor.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery-ui-timepicker-addon.js');
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery-ui-sliderAccess.js');
        
         
        /*********** Include Script End *********/
        
    ?>
</body>
</html>
<?php $this->endPage() ?>
