<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        // you can set your theme here - template comes with: 'light' and 'dark'
        'view' => [
            'theme' => [
                'pathMap' => ['@backend/views' => '@backend/themes/adminlte/views'],
                'baseUrl' => '@web/themes/adminlte',
            ],
        ],
        'assetManager' => [
//            'bundles' => [
//                'yii\bootstrap\BootstrapAsset' => [
//                    'basePath' => '@webroot',
//                    'baseUrl' => '@themes',
//                    'css' => ['css/bootstrap.min.css']
//                ],
//            ],
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-purple',
                ]
            ]
        ],
        'user' => [
            'identityClass' => 'suPnPsu\user\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /**
         * Add
         */
        'notification' => [
            'class' => 'common\components\Notifications'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://su.andatech.net',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //module, controller, action ที่อนุญาตให้ทำงานโดยไม่ต้องผ่านการตรวจสอบสิทธิ์
            'site/logout',
            'site/login',
            'site/error',
        //'gii/*',
        'rbac/*',
            'user/regist/signup'
        //'debug/*',
        ]
    ],
    'params' => $params,
];
