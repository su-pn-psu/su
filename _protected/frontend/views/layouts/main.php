<?php

use frontend\assets\UniversalAsset;
use frontend\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

$asset = UniversalAsset::register($this);
$path = $asset->baseUrl;
//exit();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>


        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="keywords" content="">


        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

        <!-- Bootstrap and Font Awesome css -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <?php $this->head() ?>
        <!-- Css animations  -->
        <!--<link href="<?= $path ?>/css/animate.css" rel="stylesheet">-->

        <!-- Theme stylesheet, if possible do not edit this stylesheet -->
        <!--<link href="<?= $path ?>/css/style.default.css" rel="stylesheet" id="theme-stylesheet">-->

        <!-- Custom stylesheet - for your changes -->
        <!--<link href="<?= $path ?>/css/custom.css" rel="stylesheet">-->

        <!-- Responsivity for older IE -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <!-- Favicon and apple touch icons-->
<!--        <link rel="shortcut icon" href="<?= $path ?>/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?= $path ?>/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?= $path ?>/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?= $path ?>/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $path ?>/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?= $path ?>/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?= $path ?>/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?= $path ?>/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?= $path ?>/img/apple-touch-icon-152x152.png" />-->
        <!-- owl carousel css -->

        <!--<link href="<?= $path ?>/css/owl.carousel.css" rel="stylesheet">-->
        <!--<link href="<?= $path ?>/css/owl.theme.css" rel="stylesheet">-->


    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="all">

            <?= $this->render('head', ['path' => $path]); ?>







            <?php if (Url::current() == (Url::home() . 'site/index')) { ?> 
                <!--#main-slider-->
                <?php /* =
                  $this->render(
                  'home', [
                  'asset' => $asset,
                  'content' => $content
                  ]
                  ) */
                ?>
                <?= $content ?>
                <!--/#main-slider-->
            <?php } elseif (Url::current() == (Url::home() . 'site/login')) { ?>  
                <?= $content ?>

            <?php } else { ?>

                <div id="heading-breadcrumbs" class="hidden-print">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h3><?= $this->title ?></h3>
                            </div>
                            <div class="col-md-5">
                                <?=
                                Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content">
                    <div class="container">
                        <?php if (Yii::$app->session->getAllFlashes()): ?>
                            <section  class="hidden-print">
                                <div class="row">
                                    <div class="col-md-12">                            
                                        <?= Alert::widget() ?>
                                    </div>
                                </div>
                            </section>
                        <?php endif; ?>

                        <?php /* =$this->render('left-menu',['content'=>$content]); */ ?>
                        <?= $this->render('contents', ['content' => $content]); ?>

                    </div>
                    <!-- /#contact.container -->
                </div> 
            <?php } ?>






            <!-- *** FOOTER ***
            
    _________________________________________________________ -->
            <?= $this->render('footer',['path'=>$path]); ?>

            <!-- /#footer -->

            

        </div>
        <!-- /#all -->





        <!-- #### JAVASCRIPT FILES ### -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="<?= $path ?>/js/jquery-1.11.0.min.js"><\/script>')
        </script>
        <?php $this->endBody() ?>      

    </body>
</html>
<?php $this->endPage() ?>
