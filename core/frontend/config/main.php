<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'vi-tri' => 'site/vi-tri',
                'mat-bang' => 'site/mat-bang',
                'tien-ich' => 'site/tien-ich',
                'can-ho-mau' => 'site/can-ho-mau',
                'can-ho-mau-2-phong-ngu' => 'site/can-ho-mau-2-phong-ngu',
                'can-ho-mau-3-phong-ngu' => 'site/can-ho-mau-3-phong-ngu',
                'tien-do' => 'site/tien-do',
                'thanh-toan-uu-dai' => 'site/thanh-toan-uu-dai',
            ],
        ],
    ],
    'params' => $params,
];
