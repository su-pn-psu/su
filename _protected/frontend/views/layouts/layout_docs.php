<?php

use yii\bootstrap\Html;

$module = $this->context->module->id;
$route = '/' . Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
$this->beginContent('@app/views/layouts/main.php');
?>


<?php
$css = ' 
    .md{}
    .md img{
        width:90%;
        margin:0 auto;
        display:block;
    }
';


$this->registerCss($css);
?>

<div class="row">
    <div class="col-md-3 hidden-print">

        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">คำแนะนำการใช้งาน</h3>

            </div>

            <div class="panel-body">  

                <?php
                $menuItems = [
                        [
                        'label' => Html::icon('cloud-upload') . ' ' . Yii::t('app', 'ระบบยืม-คืนพัสดุ'),
                        'url' => [
                            $route,
                            'page' => 'docs/guide/basic-usage.md',
                            'ext' => 'material'
                        ],
                    ],
                        [
                        'label' => Html::icon('cloud-upload') . ' ' . Yii::t('app', 'ระบบขอใช้ห้อง'),
                        'url' => [
                            $route,
                            'page' => 'docs/guide/basic-usage.md',
                            'ext' => 'room'
                        ],
                    ],
                        [
                        'label' => Html::icon('cloud-upload') . ' ' . Yii::t('app', 'ระบบขอใช้รถจักรยานยนต์'),
                        'url' => [
                            $route,
                            'page' => 'docs/guide/basic-usage.md',
                            'ext' => 'vehicle'
                        ],
                    ],
                ];

                //$menuItems = Helper::filter($menuItems);
                //$menuItems = suPnPsu\borrowMaterial\components\FrontendNavigate::genCount($menuItems);
                //$nav = new Navigate();
                echo dmstr\widgets\Menu::widget([
                    'options' => ['class' => 'nav nav-pills nav-stacked'],
                    'encodeLabels' => false,
                    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
                    'items' => $menuItems,
                ])
                ?>
            </div>
        </div>


    </div>
    <!-- /.col -->


    <div class="col-md-9 md">
        <?php
        $this->registerCss(".panbtn { float: right; margin: -5px 5px 0px 0px; }");
        ?>
        <?= $content ?>
        <!-- /. box -->
    </div>
    <!-- /.col -->


</div>


<?php $this->endContent(); ?>