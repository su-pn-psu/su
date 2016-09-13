<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;


class UniversalAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@themes';

    public $css = [
        'css/animate.css',
        'css/style.default.css',
        'css/custom.css',
        'css/owl.carousel.css',
        'css/owl.theme.css',
    ];

    public $js = [
        //'js/jquery-1.11.0.min.js',
        'js/jquery.cookie.js',
        'js/waypoints.min.js',
        'js/jquery.counterup.min.js',
        'js/jquery.parallax-1.1.3.js',
        'js/front.js',
        'js/owl.carousel.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
