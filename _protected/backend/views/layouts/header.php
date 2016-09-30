<?php

use yii\bootstrap\Html;
use yii\bootstrap\Dropdown;

use yii\helpers\Url;
use mdm\admin\components\Helper;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">' . Html::img($asset->baseUrl . "/images/icon.png") . '</span><span class="logo-lg">' . Html::img($asset->baseUrl . "/images/logo_banner.png") . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo Html::Icon('check').' '.Yii::t( 'app', 'approvingmenu')
                        .' '.(1 ? Html::tag('span', '3', ['class' => 'badge']) : false) ?><b class="caret"></b></a>
                    <?php
                    echo Dropdown::widget([
                        'items' => [
                            //['label' => Html::Icon('scissors').' '.Yii::t( 'app', 'equipment'), 'url' => ['wru/create']],
                            ['label' => Html::Icon('scissors').' '.Yii::t( 'app', 'equipment')],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'approving'), 'url' => ['/borrow-material/brwretrn/submitedlist']],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'delevering & returning'), 'url' => ['/borrow-material/brwretrn/approvedlist']],
                            '<li class="divider"></li>',
                            //['label' => Html::Icon('map-marker').' '.Yii::t( 'app', 'meetingroom'), 'url' => ['wru/create']],
                            ['label' => Html::Icon('scissors').' '.Yii::t( 'app', 'meetingroom')],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'approving'), 'url' => ['/borrowreturn/wru/create']],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'delevering & returning'), 'url' => ['/borrowreturn/wru']],
                            '<li class="divider"></li>',
                            //['label' => Html::Icon('transfer').' '.Yii::t( 'app', 'tricycle'), 'url' => ['wru/create']],
                            ['label' => Html::Icon('scissors').' '.Yii::t( 'app', 'tricycle')],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'approving'), 'url' => ['/borrowreturn/wru/create']],
                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'delevering & returning'), 'url' => ['/borrowreturn/wru']],
                            //'<li class="divider"></li>',
                        ],
                        'encodeLabels' => false,
                    ]);
                    ?>
                </li>
               <!-- <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo Html::Icon('tasks').' '.Yii::t('app', 'manage') ?><b class="caret"></b></a>
                    <?php
//                    echo Dropdown::widget([
//                        'items' => [
//                            ['label' => Html::Icon('user').' '.Yii::t( 'app', 'wasterecycleUser')],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'add'), 'url' => ['/borrowreturn/wru/create']],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'index'), 'url' => ['/borrowreturn/wru']],
//                            '<li class="divider"></li>',
//                            ['label' => Html::Icon('sort-by-alphabet').' '.Yii::t( 'app', 'wasterecycleType')],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'add'), 'url' => ['/borrowreturn/wrt/create']],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'index'), 'url' => ['/borrowreturn/wrt']],
//                            '<li class="divider"></li>',
//                            ['label' => Html::Icon('play').' '.Yii::t( 'app', 'wasterecycleEntry')],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'add'), 'url' => ['/borrowreturn/wre/create']],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'index'), 'url' => ['/borrowreturn/wre']],
//                            '<li class="divider"></li>',
//                            ['label' => Html::Icon('forward').' '.Yii::t( 'app', 'wasterecycleDetail')],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'add'), 'url' => ['/borrowreturn/wrd/create']],
//                            ['label' => Html::Icon('menu-right').' '.Yii::t( 'app', 'index'), 'url' => ['/borrowreturn/wrd']],
//
//                        ],
//                        'encodeLabels' => false,
//                    ]);
                    ?>
                </li> -->
<?php
$menuItems = [
    //['label' => Html::Icon('stats').' '.Yii::t('app', 'summery'), 'url' => ['default/summary']],
    ['label' => Html::Icon('question-sign').' '.Yii::t('app', 'คำแนะนำการใช้งาน'), 'url' => ['default/summary']],
];
$menuItems = Helper::filter($menuItems);
echo dmstr\widgets\Menu::widget([
    'options' => ['class' => 'nav navbar-nav'],
    'encodeLabels' => false,
    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
    'items' => $menuItems,
])
?>
               
               
               
               
                <?=$this->render('_notificationUserRegis')?>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?= Yii::$app->notification->count() ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (Yii::$app->notification->count()): ?>
                            <li class="header">You have <?= Yii::$app->notification->count() ?> notifications</li><?php endif; ?>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                <?php
                                // print_r(Yii::$app->notification->view());

                                foreach (Yii::$app->notification->view() as $model):
                                    ?>
                                    <li>
                                        <a href="<?= Url::to(['/site/notification', 'id' => $model->id]) ?>">
                                            <?php
                                            $str = Html::beginTag('div', ['class' => 'user-circle'])
                                                    . Html::beginTag('div', ['class' => 'circle', 'style' => ''])
                                                    . Html::img($model->sentedBy->img, ['class' => '', 'style' => ''])
                                                    . Html::endTag('div')
                                                    . Html::beginTag('span', ['class' => 'username', 'style' => ''])
                                                    . Html::tag('b', $model->sentedBy->displayname)
                                                    . Html::endTag('span')
                                                    . Html::beginTag('span', ['class' => '', 'style' => 'display: block;margin-left: 50px;'])
                                                    . $model->title
                                                    . Html::endTag('span')
                                                    . Html::beginTag('span', ['class' => 'description', 'style' => 'display: block;margin-left: 50px;'])
                                                    . '<i class="fa fa-clock-o"></i> ' . Yii::$app->formatter->asDatetime($model->sented_at)
                                                    . Html::endTag('span')
                                                    . Html::endTag('div');
                                            echo $str;
                                            ?>                                           

                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="footer"><a href="<?= Url::to(['/site/notification']) ?>">View all</a></li>
                    </ul>
                </li>

                <li>
                    <?=Html::a('<i class="fa fa-home"></i>',Yii::$app->urlManagerFrontend->createUrl(['/site']))?>
                   
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <div class="circle user-bar-img" >
                            <img src="<?= $user->avatar ?>" width="100%" alt="User Image"/>
                        </div>
                        <span class="hidden-xs"><?= $user->fullname ?></span>

                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background-image: url(<?= $user->cover ?>);background-size: cover;">

                            <div class="circle user-header-img">
                                <img src="<?= $user->avatar ?>" width="100%" alt="User Image"/>
                            </div>


                            <p style="background:#fff;color:#000;opacity: 0.6;padding: 10px 0 5px;"> 
                                <?= $user->fullname ?>
                                <small>Member since Nov. 2012</small>
                                
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= Url::to(['/user']) ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?=
                                Html::a(
                                        'Sign out', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                )
                                ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <!--                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>-->
            </ul>
        </div>
    </nav>
</header>
