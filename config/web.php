<?php

$config = [
    'id' => 'basic',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'Dk8KV7XN4w5Z16pC7lmIaLX1N9hqhn2S',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
    ],
    'modules' => [
        'site' => [
            'class' => 'app\modules\site\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'catalog' => [
            'class' => 'app\modules\catalog\Module',
        ],
        'cpanel' => [
            'class' => 'app\modules\cpanel\Module',
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
