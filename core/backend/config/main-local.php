<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'l5Tf6vrd0Qg0iHvQhpmDDKvQPkFSSnVA',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'crud' => [
                'class' => \yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'vinacms' => '@vinacms/admin/gii/crud/default',
                ]
            ]
        ],
    ];
}

return $config;
