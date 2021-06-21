Nomzodlar uchun test dasturi
-------------------
```
git init

https://github.com/usmonkulov/test_vazifa.git

composer update

common\config\main-local.php Shu joyga kirib bazani sozlang

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=test_vazifa',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
    ],
];


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
