<?php
/**
 * Created by PhpStorm.
 * User: Madone
 * Date: 9/16/2016 AD
 * Time: 16:52
 */

return [
    'languages' => [
        'US',
        'TH',
    ], /* Add languages to the array for the language files to be generated. */

    'except' => [
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '.svn',
        '/messages',
        '/vendor',
    ],/*  exclude file */
    'format' => 'php',
    'messagePath' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',
    'only' => ['*.php'],
    'overwrite' => true,
    'removeUnused' => false,
    'sort' => true,
    'sourcePath' => __DIR__. '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR,
    'translator' => 'Yii::t'
];
