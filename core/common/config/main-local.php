<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;dbname=vinacms',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.mailtrap.io',
//                'username' => 'fa95e5e158f7cf',
//                'password' => 'a78e240422a79e',
//                'port' => '2525',
//                'encryption' => null,
                'host' => 'smtp.mailgun.org',
                'username' => 'postmaster@ideasvn.com',
                'password' => '88da22b8b8b473d4d4b25057786e3488',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
        ],
    ],
];
