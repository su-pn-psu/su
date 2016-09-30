<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;
use suPnPsu\core\models\BackendNavigate;
use yii\bootstrap\Html;
use mdm\admin\components\Helper;

//$callback = function($menu){
//    $data = eval($menu['data']);
//    //print_r($data);
//    return [
//        'label' => $menu['name'].$data, 
//        'url' => [$menu['route']],
//        //'options' => $data,
//        'icon' => $data['icon'],
//        'items' => $menu['children'],
//        
//    ];
//};
//
//$items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
//print_r($items);
//echo "<pre>";
//print_r(Yii::$app->getAuthManager()->getPermissions());
//echo "</pre>";
?>


<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" >                
                <div class="circle user-left-img" >
                    <img src="<?= $user->avatar ?>" width="100%" alt="User Image"/>
                </div>
            </div>
            <div class="pull-left info">
                <p><?= $user->fullname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <?php
        /**
         * Bug ควรใช้ BackendNavigate();
         */
        //$nav = new suPnPsu\core\models\BackendNavigate();
        //$nav = new common\models\Navigate();
        $menuItems = [];
        $menuItems = [
            [
                'icon' => 'fa fa-play',
                'label' =>  Yii::t('borrow-material', 'ระบบยืมพัสดุ'),
                'url' => ['/borrow-material/default'],
                'items' =>[
                    [
                        'icon' => 'fa fa-file',
                        'label' => Yii::t('borrow-material', 'รายการรออนุมัติ'),
                        'url' => ['/borrow-material/brwretrn/submitedlist'],
                    ],
                    [
                        'icon' => 'fa fa-file',
                        'label' => Yii::t('borrow-material', 'รายการส่งมอบ&รับคืน'),
                        'url' => ['/borrow-material/brwretrn/approvedlist'],
                    ],
                ]
            ],
            [
                'icon' => 'fa fa-building',
                'label' => Yii::t('borrow-material', 'ระบบขอใช้ห้อง'),
                'url' => ['/reserve-room'],
//                'items' =>[
//                    [
//                        'icon' => 'fa fa-file',
//                        'label' => Yii::t('borrow-material', 'รายการรออนุมัติ'),
//                        'url' => ['/borrow-material/brwretrn/submitedlist'],
//                    ],
//                    [
//                        'icon' => 'fa fa-file',
//                        'label' => Yii::t('borrow-material', 'รายการส่งมอบ&รับคืน'),
//                        'url' => ['/borrow-material/brwretrn/approvedlist'],
//                    ],
//                ]
            ],
            [
                'icon' => 'fa fa-play',
                'label' => Yii::t('borrow-material', 'ระบบยืมรถ'),
                'url' => ['/borrow-material/default'],
                'items' =>[
                    [
                        'icon' => 'fa fa-file',
                        'label' => Yii::t('borrow-material', 'รายการรออนุมัติ'),
                        'url' => ['/borrow-material/brwretrn/submitedlist'],
                    ],
                    [
                        'icon' => 'fa fa-file',
                        'label' => Yii::t('borrow-material', 'รายการส่งมอบ&รับคืน'),
                        'url' => ['/borrow-material/brwretrn/approvedlist'],
                    ],
                ]
            ],
            
            [
                'icon' => 'fa fa-cubes',
                'label' =>  Yii::t('borrow-material', 'จัดการวัสดุ/ห้อง/สามล้อ'),
                'url' => ['#'],
                'items' =>[
                    [
                        'icon' => 'fa fa-cube',
                        'label' => Yii::t('borrow-material', 'วัสดุ/ครุภัณฑ์'),
                        'url' => ['/material/'],
                    ],
                    [
                        'icon' => 'fa fa-building',
                        'label' => Yii::t('borrow-material', 'ห้องประชุม'),
                        'url' => ['/borrow-material/default'],
                    ],
                    [
                        'icon' => 'fa fa-motorcycle',
                        'label' => Yii::t('borrow-material', 'รถจักรยานยนต์สามล้อ'),
                        'url' => ['/borrow-material/default'],
                    ],
                ]
            ],
            [
                'icon' => 'fa fa-sitemap',
                'label' =>  Yii::t('borrow-material', 'จัดการข้อมูลอื่นๆ'),
                'url' => ['#'],
                'items' =>[
                    [
                        'icon' => 'fa fa-university',
                        'label' => Yii::t('borrow-material', 'สังกัดองค์กร'),
                        'url' => ['/borrow-material/staff/org-index'],
                    ],
                    [
                        'icon' => 'fa fa-sitemap',
                        'label' => Yii::t('borrow-material', 'ตำแหน่งในองค์กร'),
                        'url' => ['/borrow-material/staff/orgpos-index'],
                    ],
                ]
            ],
            
            [
                'icon'=> 'fa fa-bar-chart',
                'label' => Yii::t('app', 'รายงานสรุป'),
                'url' => ['/summary'],
            ],
            
            
            [
                'icon'=> 'fa fa-users',
                'label' => Yii::t('app', 'จัดการผู้ใช้'),
                'url' => ['/user/admin'],
            ],
            
            
            [
                'icon'=> 'fa fa-users',
                'label' => Yii::t('app', 'จัดการสิทธิ์'),
                'url' => ['/rbac'],
            ],
            
        ];

        $menuItems = Helper::filter($menuItems);

        $menu = BackendNavigate::genCount($menuItems);
        //$menu = suPnPsu\user\components\AdminNavigate::genCount($menu);
        //$menu = suPnPsu\borrowMaterial\components\Navigate::genCount($menu);
        
        
        echo dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
            'items' => $menu,
            'encodeLabels' => false,
        ]);
        
        
        
        
        
$menuItems = [    
    ['label' => 'อื่นๆ', 'options'=>['class'=>'header']],
    ['label' => Html::Icon('question-sign').' '.Yii::t('app', 'คำแนะนำการใช้งาน'), 'url' => ['default/summary']],
    
];

echo dmstr\widgets\Menu::widget([
    'options' => ['class' => 'sidebar-menu'],
    'encodeLabels' => false,
    //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
    'items' => $menuItems,
])
?>
        
        
        
        
        ?>
    </section>

</aside>
