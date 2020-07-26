<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            //'dsn' => 'mysql:host=localhost;dbname=web_innova',
            'dsn' => 'sqlsrv:server=localhost\SQL2016;Database=AEALQUILER', // MS SQL Server, dblib driver
            'username' => 'sa',
            'password' => 'sql2008SA',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => gethostbyname('smtp.gmail.com'),
                'username' => 'avisosdecobropi@gmail.com',
                'password' => 'programa01',
                'port' => '465',
                'encryption' => 'ssl',
                'streamOptions' => [ 'ssl' =>
                        [ 'allow_self_signed' => true,
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ],
                    ]
            ]
        ],
    ],
];
