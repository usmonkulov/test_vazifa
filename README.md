Nomzodlar uchun test dasturi
-------------------
```
git init

git clone https://github.com/usmonkulov/test_vazifa.git

composer install

php init

Shu joyga kirib bazani sozlang
common\config\main-local.php

<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=test_vazifa',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => frue,
             'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.com',
                'username' => '@yandex.com',
                'password' => '7225/',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
    ],
];

MYSQL ga kirib baza yarating
test_vazifa

php yii migrate
php yii rbac/init
php yii migrate/up --migrationPath=@vendor/costa-rico/yii2-images/migrations
php yii admin/init
```
Quyidagi linkka kiring
<br>
http://test-vazifa/admin
<br>
Login: superadmin
<br>
Parol: 123456
