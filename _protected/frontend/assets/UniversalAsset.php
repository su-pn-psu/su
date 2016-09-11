<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Nenad Zivkovic <nenad@freetuts.org>
 * 
 * @since 2.0
 */
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
        'js/jquery.js',
    ];

    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
