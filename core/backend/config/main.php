<?php
use common\models\User;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
                '/' => 'site/index'
            ],
        ],
    ],
    'as globalAccess' => [
        'class' => \vinacms\behaviors\GlobalAccessBehavior::class,
        'rules' => [
            [
                'controllers' => ['gii/default'],
                'allow' => true,
                'roles' => [User::ROLE_SUPER_ADMIN],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['login'],
                'roles' => ['?'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['logout'],
                'roles' => ['@'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'actions' => ['error'],
                'roles' => ['?', '@'],
            ],
            [
                'controllers' => ['site'],
                'allow' => true,
                'roles' => ['accessBackend'],
            ],
            [
                'controllers' => ['user'],
                'allow' => true,
                'roles' => [User::ROLE_ADMIN],
            ]
        ],
    ],
    'controllerMap' => [
        'elFinder' => [
            'class' => 'vinacms\tools\elfinder\PathController',
            'access' => ['@'],
            'disabledCommands' => ['preview', 'rm', 'duplicate', 'rename', 'extract', 'archive', 'help', 'netmount', 'info', 'cut', 'download', 'mkfile'],
            'connectOptions' => [
                'bind' => array(
                    'upload.pre mkdir.pre mkfile.pre rename.pre archive.pre ls.pre' => [
                        'Plugin.Normalizer.cmdPreprocess',
                        'Plugin.Sanitizer.cmdPreprocess',
                    ],
                    'ls' => [
                        'Plugin.Normalizer.cmdPostprocess',
                        'Plugin.Sanitizer.cmdPostprocess',
                    ],
                    'upload.presave' => [
                        'Plugin.Normalizer.onUpLoadPreSave',
                        'Plugin.Sanitizer.onUpLoadPreSave',
                    ],
                ),
                'plugin' => [
                    'Sanitizer' => [
                        'enable' => true,
                        'targets' => ['\\', '/', ':', '*', '?', '"', '<', '>', '|', '&'],
                        'replace' => '-'
                    ],
                    'Normalizer' => [
                        'enable' => true,
                        'nfc' => true,
                        'nfkc' => true,
                        'lowercase' => true,
                        'convmap' => [
                            ' ' => '-',
                            ',' => '-',
                            '^' => '-',
                            'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
                            'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
                            'â' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
                            'À' => 'a', 'Á' => 'a', 'Ả' => 'a', 'Ã' => 'a', 'Ạ' => 'a',
                            'Ă' => 'a', 'Ằ' => 'a', 'Ắ' => 'a', 'Ẳ' => 'a', 'Ẵ' => 'a', 'Ặ' => 'a',
                            'Â' => 'a', 'Ầ' => 'a', 'Ấ' => 'a', 'Ẩ' => 'a', 'Ẫ' => 'a', 'Ậ' => 'a',
                            'đ' => 'd', 'Đ' => 'd',
                            'è' => 'e', 'é' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
                            'ê' => 'e', 'ề' => 'e', 'ế' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
                            'È' => 'e', 'É' => 'e', 'Ẻ' => 'e', 'Ẽ' => 'e', 'Ẹ' => 'e',
                            'Ê' => 'e', 'Ề' => 'e', 'Ế' => 'e', 'Ể' => 'e', 'Ễ' => 'e', 'Ệ' => 'e',
                            'ì' => 'i', 'í' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
                            'Ì' => 'i', 'Í' => 'i', 'Ỉ' => 'i', 'Ĩ' => 'i', 'Ị' => 'i',
                            'ò' => 'o', 'ó' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
                            'ô' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
                            'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
                            'Ò' => 'o', 'Ó' => 'o', 'Ỏ' => 'o', 'Õ' => 'o', 'Ọ' => 'o',
                            'Ô' => 'o', 'Ồ' => 'o', 'Ố' => 'o', 'Ổ' => 'o', 'Ỗ' => 'o', 'Ộ' => 'o',
                            'Ơ' => 'o', 'Ờ' => 'o', 'Ớ' => 'o', 'Ở' => 'o', 'Ỡ' => 'o', 'Ợ' => 'o',
                            'ù' => 'u', 'ú' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
                            'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
                            'Ù' => 'u', 'Ú' => 'u', 'Ủ' => 'u', 'Ũ' => 'u', 'Ụ' => 'u',
                            'Ư' => 'u', 'Ừ' => 'u', 'Ứ' => 'u', 'Ử' => 'u', 'Ữ' => 'u', 'Ự' => 'u',
                            'ỳ' => 'y', 'ý' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
                            'Y' => 'y', 'Ỳ' => 'y', 'Ý' => 'y', 'Ỷ' => 'y', 'Ỹ' => 'y', 'Ỵ' => 'y'
                        ]
                    ],
                ],
                'onlyMimes' => ["image/png", "application/x-shockwave-flash"]
            ],
            'root' => [
                'baseUrl' => '',
                'basePath' => '@frontend/web',
                'path' => 'uploads',
                'name' => 'Uploads',
                'options' => [
                    'uploadOverwrite' => false,
                ],
            ]
        ],
    ],
    'params' => $params,
];
