<?php

use yii\helpers\ArrayHelper;
use yii\symfonymailer\Mailer;

$params = ArrayHelper::merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''                                                          => 'site/default/index',
                '<_a:(about|error)>'                                        => 'site/default/<_a>',
                '<_a:(login|logout|password-reset-request|password-reset)>' => 'user/default/<_a>',

                '<_m:[\w\-]+>'                                    => '<_m>/default/index',
                '<_m:[\w\-]+>/<id:\d+>'                           => '<_m>/default/view',
                '<_m:[\w\-]+>/<id:\d+>/<_a:[\w-]+>'               => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>'                       => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>'              => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>'           => '<_m>/<_c>/<_a>',
            ],
        ],
        'mailer' => [
            'class' => Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
