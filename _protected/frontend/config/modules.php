<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
    'user' => [//module id = 'user' only
        'class' => 'suPnPsu\user\Module',
        'loginBy' => 'db', //db or ldap (ldap not work)
        'userUploadDir' => '@uploads', //Base uploads Directory
        'userUploadUrl' => '/uploads', //Url of userUploadDir
        'userUploadPath' => 'user', //path after upload directory
        'admins' => ['admin', 'root'], //list of username for manage users
        'rbacUrl' => ['/rbac']
    ],
    'borrow-material' => [
        //'class' => 'backend\modules\menu\Module',
        'class' => 'suPnPsu\borrowMaterial\Module',
        'layout' => 'menu-left'
    ],
    'gridview' => [
        'class' => '\kartik\grid\Module',
    ],
    'reserve-room' => [
        'class' => 'suPnPsu\reserveRoom\Module',
        'layout' => 'menu-left'
    ],    
    'vehicle' => [
        'class' => 'suPnPsu\vehicle\Module',
        'layout' => 'menu-left'
    ],
    'borrow-vehicle' => [
        'class' => 'suPnPsu\borrowVehicle\Module',
        'layout' => 'menu-left'
    ],
];
