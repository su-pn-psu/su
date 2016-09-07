<?php

use mdm\admin\components\MenuHelper;
use yii\bootstrap\Nav;

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
        $nav = new suPnPsu\core\models\BackendNavigate();
        //$nav = new common\models\Navigate();
        
        $menu1= $nav->menu(1);
//        print_r($menu1);
//        exit();
        $menu1 = mdm\admin\components\Helper::filter($menu1);
        echo dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
            'items' => $menu1,
        ])
        ?>
    </section>

</aside>
