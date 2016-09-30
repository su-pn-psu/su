<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    //'language' => 'th',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => require(__DIR__ . '/modules.php'),
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:j M Y',
            'datetimeFormat' => 'php:j M Y H:i',
            'timeFormat' => 'php:H:i',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'defaultTimeZone' => 'Asia/Bangkok',
        //'timeZone' => 'UTC',
        //'timeZone' => 'UTC',
        //'currencyCode' => 'EUR',
        ],
        // you can set your theme here - template comes with: 'light' and 'dark'
        'view' => [
            'theme' => [
                'pathMap' => ['@app/views' => '@webroot/themes/universal/views'],
                'baseUrl' => '@web/themes/universal',
            ],
        ],
        // we are going to use bootstrap from out theme
//        'assetManager' => [
//            'bundles' => [
//                'yii\bootstrap\BootstrapAsset' => [
//                    'basePath' => '@webroot',
//                    'baseUrl' => '@themes',
//                    'css' => ['css/bootstrap.min.css']
//                ],
//            ],
//        ],
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
        'urlManager' => [
            'rules' => [
            //'/site/login' => '/user/auth/login',
            //'/site/signup' => '/user/regist/signup' 
            ]
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'site/login',
            'site/error',
            'site/index',
            'user/regist/signup',
            'reserve-room/default/present',
            'reserve-room/default/jsoncalendar',
        ]
    ],
    'params' => $params,
];
