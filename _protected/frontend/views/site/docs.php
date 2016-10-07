<?php

use yii\web\View;
use yii\helpers\Markdown;
use yii\helpers\Url;

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;

/* @var $this View */

if (($pos = strrpos($page, '/')) === false) {
    $baseDir = '';
    //$this->title = substr($page, 0, strrpos($page, '.'));
} else {
    $baseDir = substr($page, 0, $pos) . '/';
    //$this->title = substr($page, $pos + 1, strrpos($page, '.') - $pos - 1);
}
//if ($page == 'README.md') {
//    $this->params['breadcrumbs'][] = 'Readme';
//    $menus = $this->context->module->getMenus();
//    $links = [];
//    foreach ($menus as $menu) {
//        $url = Url::to($menu['url'], true);
//        $links[] = "[**{$menu['label']}**]({$url})";
//    }
//    $body = $this->render("{$path}docs/guide/basic-usage.md");
//} else {
//    $body = $this->render($path . $page);
//}

if (@file_exists(Yii::getAlias($path . $page))) {
    $body = $this->render($path . $page);
} else {
    $body = $this->render($path . 'README.md');
}


$body = preg_replace_callback('/\]\((.*?)\)/', function($matches) use($baseDir, $ext) {
    $link = $matches[1];
    if (strpos($link, '://') === false) {
        if ($link[0] == '/') {
            $link = Url::current(['page' => ltrim($link, '/'), 'ext' => $ext], true);
        } else {
            $link = Url::current(['page' => $baseDir . $link, 'ext' => $ext], true);
        }
    }
    return "]($link)";
}, $body);

echo Markdown::process($body, 'extra');
