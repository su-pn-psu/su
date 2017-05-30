<?php

use yii\bootstrap\Nav;
use yii\bootstrap\Html;
use yii\helpers\Url;

//NavBar::begin([
//    'brandLabel' => Yii::t('app', Yii::$app->name),
//    'brandUrl' => Yii::$app->homeUrl,
//    'options' => [
//        'class' => 'navbar-fixed-top',
//        'data-spy'=>'affix',
//        'data-offset-top'=>'200'
//    ],
//]);
?>

<!--<div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">-->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">

        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="<?=Url::to(['/'])?>">
                    <img src="<?= $path ?>/img/logo.png" alt="Universal logo" class="hidden-xs hidden-sm">
                    <img src="<?= $path ?>/img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">
                <?php
// everyone can see Home page
                $menuItems[] = ['label' => Html::icon('home') . ' ' . Yii::t('app', 'หน้าแรก'), 'url' => ['/site/index']];

// we do not need to display Article/index, About and Contact pages to editor+ roles
                //if (!Yii::$app->user->can('user')) {
                                
                
/*
                $menuItems[] = [
                    'label' => Yii::t('app', 'ระบบยืมคืน'),
                    'url' => ['#'],
                    'items' => [
                            [
                            'label' => Html::icon('scissors') . ' ' . Yii::t('app', 'พัสด/ครุภัณฑ์ุ'),
                            'url' => ['/borrow-material']
                        ],
                            [
                            'label' => Html::icon('map-marker') . ' ' . Yii::t('app', 'ห้องประชุม'),
                            'url' => ['/reserve-room']
                        ],
                            [
                            'label' => Html::icon('transfer') . ' ' . Yii::t('app', 'จักรยานยนต์สามล้อ'),
                            'url' => ['/borrow-vehicle']
                        ],
                    ]
                ];
 */
                  $menuItems[] = [
                  'label' => '<i class="fa fa-cube"></i> ' . Yii::t('app', 'ยืมคืนพัสดุ/ครุภัณฑ์'),
                  'url' => ['/borrow-material']
                  ];
                  $menuItems[] = [
                  'label' => '<i class="fa fa-building"></i> ' . Yii::t('app', 'ขอใช้ห้องประชุม'),
                  'url' => ['/reserve-room']
                  ];
                  $menuItems[] = [
                  'label' => '<i class="fa fa-motorcycle"></i> ' . Yii::t('app', 'ขอใช้รถจักรยานยนต์'),
                  'url' => ['/borrow-vehicle']
                  ];
                 
                 


                //$menuItems[] = ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']];
                // }

                $menuItems[] = ['label' => Html::icon('question-sign') . ' ' . Yii::t('app', 'คำแนะนำการใช้งาน'), 'url' => ['/site/docs']];

// display Logout to logged in users
//if (!Yii::$app->user->isGuest) {
//    $menuItems[] = [
//        'label' => Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
//        'url' => ['/site/logout'],
//        'linkOptions' => ['data-method' => 'post']
//    ];
//}
//// display Signup and Login pages to guests of the site
//if (Yii::$app->user->isGuest) {    
//    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
//}
//                echo Nav::widget([
//                    'options' => ['class' => 'nav navbar-nav navbar-right'],
//                    'items' => $menuItems,
//                    'encodeLabels' => false,
//                ]);
                $menuItems = suPnPsu\core\models\FrontendNavigate::genCount($menuItems);
                
                echo dmstr\widgets\Menu::widget([
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'encodeLabels' => false,
                    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                    'items' => $menuItems,
                ]);

//NavBar::end();
                ?>
                <?php /*
                  <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown active">
                  <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="index.html">Option 1: Default Page</a>
                  </li>
                  <li><a href="index2.html">Option 2: Application</a>
                  </li>
                  <li><a href="index3.html">Option 3: Startup</a>
                  </li>
                  <li><a href="index4.html">Option 4: Agency</a>
                  </li>
                  <li><a href="index5.html">Option 5: Portfolio</a>
                  </li>
                  </ul>
                  </li>
                  <li class="dropdown use-yamm yamm-fw">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Features<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li>
                  <div class="yamm-content">
                  <div class="row">
                  <div class="col-sm-6">
                  <img src="<?= $path ?>/img/template-easy-customize.png" class="img-responsive hidden-xs" alt="">
                  </div>
                  <div class="col-sm-3">
                  <h5>Shortcodes</h5>
                  <ul>
                  <li><a href="template-accordions.html">Accordions</a>
                  </li>
                  <li><a href="template-alerts.html">Alerts</a>
                  </li>
                  <li><a href="template-buttons.html">Buttons</a>
                  </li>
                  <li><a href="template-content-boxes.html">Content boxes</a>
                  </li>
                  <li><a href="template-blocks.html">Horizontal blocks</a>
                  </li>
                  <li><a href="template-pagination.html">Pagination</a>
                  </li>
                  <li><a href="template-tabs.html">Tabs</a>
                  </li>
                  <li><a href="template-typography.html">Typography</a>
                  </li>
                  </ul>
                  </div>
                  <div class="col-sm-3">
                  <h5>Header variations</h5>
                  <ul>
                  <li><a href="template-header-default.html">Default sticky header</a>
                  </li>
                  <li><a href="template-header-nosticky.html">No sticky header</a>
                  </li>
                  <li><a href="template-header-light.html">Light header</a>
                  </li>
                  </ul>
                  </div>
                  </div>
                  </div>
                  </li>
                  </ul>
                  </li>
                  <li class="dropdown use-yamm yamm-fw">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li>
                  <div class="yamm-content">
                  <div class="row">
                  <div class="col-sm-6">
                  <img src="<?= $path ?>/img/template-homepage.png" class="img-responsive hidden-xs" alt="">
                  </div>
                  <div class="col-sm-3">
                  <h5>Portfolio</h5>
                  <ul>
                  <li><a href="portfolio-2.html">2 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-2.html">2 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-3.html">3 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-3.html">3 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-4.html">4 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-4.html">4 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-detail.html">Portfolio - detail</a>
                  </li>
                  <li><a href="portfolio-detail-2.html">Portfolio - detail 2</a>
                  </li>
                  </ul>
                  </div>
                  <div class="col-sm-3">
                  <h5>About</h5>
                  <ul>
                  <li><a href="about.html">About us</a>
                  </li>
                  <li><a href="team.html">Our team</a>
                  </li>
                  <li><a href="team-member.html">Team member</a>
                  </li>
                  <li><a href="services.html">Services</a>
                  </li>
                  </ul>
                  <h5>Marketing</h5>
                  <ul>
                  <li><a href="packages.html">Packages</a>
                  </li>
                  </ul>
                  </div>
                  </div>
                  </div>
                  </li>
                  </ul>
                  </li>
                  <!-- ========== FULL WIDTH MEGAMENU ================ -->
                  <li class="dropdown use-yamm yamm-fw">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">All Pages <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li>
                  <div class="yamm-content">
                  <div class="row">
                  <div class="col-sm-3">
                  <h5>Home</h5>
                  <ul>
                  <li><a href="index.html">Option 1: Default Page</a>
                  </li>
                  <li><a href="index2.html">Option 2: Application</a>
                  </li>
                  <li><a href="index3.html">Option 3: Startup</a>
                  </li>
                  <li><a href="index4.html">Option 4: Agency</a>
                  </li>
                  <li><a href="index5.html">Option 5: Portfolio</a>
                  </li>
                  </ul>
                  <h5>About</h5>
                  <ul>
                  <li><a href="about.html">About us</a>
                  </li>
                  <li><a href="team.html">Our team</a>
                  </li>
                  <li><a href="team-member.html">Team member</a>
                  </li>
                  <li><a href="services.html">Services</a>
                  </li>
                  </ul>
                  <h5>Marketing</h5>
                  <ul>
                  <li><a href="packages.html">Packages</a>
                  </li>
                  </ul>
                  </div>
                  <div class="col-sm-3">
                  <h5>Portfolio</h5>
                  <ul>
                  <li><a href="portfolio-2.html">2 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-2.html">2 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-3.html">3 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-3.html">3 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-4.html">4 columns</a>
                  </li>
                  <li><a href="portfolio-no-space-4.html">4 columns with negative space</a>
                  </li>
                  <li><a href="portfolio-detail.html">Portfolio - detail</a>
                  </li>
                  <li><a href="portfolio-detail-2.html">Portfolio - detail 2</a>
                  </li>
                  </ul>
                  <h5>User pages</h5>
                  <ul>
                  <li><a href="customer-register.html">Register / login</a>
                  </li>
                  <li><a href="customer-orders.html">Orders history</a>
                  </li>
                  <li><a href="customer-order.html">Order history detail</a>
                  </li>
                  <li><a href="customer-wishlist.html">Wishlist</a>
                  </li>
                  <li><a href="customer-account.html">Customer account / change password</a>
                  </li>
                  </ul>
                  </div>
                  <div class="col-sm-3">
                  <h5>Shop</h5>
                  <ul>
                  <li><a href="shop-category.html">Category - sidebar right</a>
                  </li>
                  <li><a href="shop-category-left.html">Category - sidebar left</a>
                  </li>
                  <li><a href="shop-category-full.html">Category - full width</a>
                  </li>
                  <li><a href="shop-detail.html">Product detail</a>
                  </li>
                  </ul>
                  <h5>Shop - order process</h5>
                  <ul>
                  <li><a href="shop-basket.html">Shopping cart</a>
                  </li>
                  <li><a href="shop-checkout1.html">Checkout - step 1</a>
                  </li>
                  <li><a href="shop-checkout2.html">Checkout - step 2</a>
                  </li>
                  <li><a href="shop-checkout3.html">Checkout - step 3</a>
                  </li>
                  <li><a href="shop-checkout4.html">Checkout - step 4</a>
                  </li>
                  </ul>
                  </div>
                  <div class="col-sm-3">
                  <h5>Contact</h5>
                  <ul>
                  <li><a href="contact.html">Contact</a>
                  </li>
                  <li><a href="contact2.html">Contact - version 2</a>
                  </li>
                  <li><a href="contact3.html">Contact - version 3</a>
                  </li>
                  </ul>
                  <h5>Pages</h5>
                  <ul>
                  <li><a href="text.html">Text page</a>
                  </li>
                  <li><a href="text-left.html">Text page - left sidebar</a>
                  </li>
                  <li><a href="text-full.html">Text page - full width</a>
                  </li>
                  <li><a href="faq.html">FAQ</a>
                  </li>
                  <li><a href="404.html">404 page</a>
                  </li>
                  </ul>
                  <h5>Blog</h5>
                  <ul>
                  <li><a href="blog.html">Blog listing big</a>
                  </li>
                  <li><a href="blog-medium.html">Blog listing medium</a>
                  </li>
                  <li><a href="blog-small.html">Blog listing small</a>
                  </li>
                  <li><a href="blog-post.html">Blog Post</a>
                  </li>
                  </ul>
                  </div>
                  </div>
                  </div>
                  <!-- /.yamm-content -->
                  </li>
                  </ul>
                  </li>
                  <!-- ========== FULL WIDTH MEGAMENU END ============ -->
                  <li class="dropdown">
                  <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="contact.html">Contact option 1</a>
                  </li>
                  <li><a href="contact2.html">Contact option 2</a>
                  </li>
                  <li><a href="contact3.html">Contact option 3</a>
                  </li>

                  </ul>
                  </li>
                  </ul>
                 */ ?>
            </div>
            <!--/.nav-collapse -->



            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

                            <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                        </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>


    </div>
    <!-- /#navbar -->

<!--</div>-->
