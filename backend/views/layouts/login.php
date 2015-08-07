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
        /* Theme style */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/AdminLTE.min.css');
        /* AdminLTE Skins. Choose a skin from the css/skins 
           folder instead of downloading all of them to reduce the load. */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/css/skins/_all-skins.min.css');
        /* iCheck */
        $this->registerCssFile(Yii::$app->request->baseUrl.'/plugins/iCheck/flat/blue.css');
       
       /*********** Include CSS End *********/
            
    ?>
</head>
<body class="login-page">
    <?php $this->beginBody() ?>
     <?= Alert::widget() ?>
    <?= $content ?>


    <?php $this->endBody() ?>
    
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   
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
         /* Bootstrap 3.3.2 JS */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/bootstrap/js/bootstrap.min.js');
        /* icheck.js */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/plugins/iCheck/icheck.min.js');
        /* Custom JS */
        $this->registerJsFile(Yii::$app->request->baseUrl.'/js/custom.js');
        
        /*********** Include Script End *********/
        
    ?>
<script>
     $('#paswrd').click(function() {
        $('#login_wrapper').fadeOut(100);
        $('#forgot_wrapper').fadeIn(500);
    });
    $('#back').click(function() {
        $('#forgot_wrapper').fadeOut(100);
        $('#login_wrapper').fadeIn(500);
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
