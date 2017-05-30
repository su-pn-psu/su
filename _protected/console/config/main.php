<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'borrow-material*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@vendor/su-pn-psu/yii2-borrow-material/messages',
                ],
            ],
            'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation'],
        ],
    ],
    'params' => $params,
];