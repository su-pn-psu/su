<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
    'rbac' => [
        'class' => 'mdm\admin\Module',
        'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
        'mainLayout' => '@app/views/layouts/main.php',
        'controllerMap' => [
            'assignment' => [
                'class' => 'mdm\admin\controllers\AssignmentController',
                'userClassName' => 'common\models\User',
                'idField' => 'id',
            //'extraColumns' => ['displayname']
            ]
        ],
    ],
    'user' => [//module id = 'user' only
        'class' => 'suPnPsu\user\Module',
        'loginBy' => 'db', //db or ldap (ldap not work)
        'userUploadDir' => '@uploads', //Base uploads Directory
        'userUploadUrl' => '/uploads', //Url of userUploadDir
        'userUploadPath' => 'user', //path after upload directory
        'admins' => ['admin', 'root'], //list of username for manage users
        'rbacUrl' => ['/rbac']
    ],
    'menu' => [
        //'class' => 'backend\modules\menu\Module',
        'class' => 'firdows\menu\Module',
    ],
    'material' => [
        //'class' => 'backend\modules\menu\Module',
        'class' => 'suPnPsu\material\Module',
    ],
    'basicfilemanager' => [
        'class' => 'mirage\basicfilemanager\Module',
        // Upload routes
        'routes' => [
            // Base absolute path to web directory
            'baseUrl' => '',
            // Base web directory url
            'basePath' => '@webroot',
            // Path for uploaded files in web directory
            'uploadPath' => 'uploads',
        ],
    ],
    'borrow-material' => [
        //'class' => 'backend\modules\menu\Module',
        'class' => 'suPnPsu\borrowMaterial\Module',
        //'siteend'=>'/backend/'
        'layout' => 'menu-left-backend',
    //'defaultRoute'=>['/borrow-material/staff/index']
    ],
    'gridview' => [
        'class' => '\kartik\grid\Module',
    ],
    'room' => [
        'class' => 'suPnPsu\room\Module',
        'layout' => 'menu-left-backend'
    ],
    'reserve-room' => [
        'class' => 'suPnPsu\reserveRoom\Module',
        'layout' => 'menu-left-backend'
    ],
    
    'vehicle' => [
        'class' => 'suPnPsu\vehicle\Module',
        'layout' => 'menu-left-backend'
    ],
    'borrow-vehicle' => [
        'class' => 'suPnPsu\borrowVehicle\Module',
        'layout' => 'menu-left-backend'
    ],
];
