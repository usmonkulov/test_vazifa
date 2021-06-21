<?php
namespace console\controllers;

use common\rbac\models\Role;
use common\models\UserIdentity;
use yii\helpers\Console;
use yii\console\Controller;


/**
 * Class AdminController
 *
 * @package console\controllers
 * @author Bobur Usmonkulov <usmonkulov5@mail.com>
 */

class AdminController extends Controller
{

    public function actionInit()
    {
        $user = new UserIdentity();
        $auth_assignment = new Role();

        $user->username = 'superadmin';
        $user->email = 'superadmin@gmail.com';
        $user->password_hash = '$2y$13$2wPZK5bhqQFF//PDw5kG6.9a5zSUbGKGroVceNaSFHXVsqDd0qYQq';
        $user->status = 10;
        $user->auth_key = 'AYNj_K4Ef_HxsCbZfuCylh69h2iXOSVC';
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();

        $auth_assignment->item_name = 'admin';
        $auth_assignment->user_id = $user->id;
        $auth_assignment->created_at = time();

        if ($auth_assignment->save()){
            Console::output("Quyidagi linkka kiring");
            Console::output("http://test-vazifa/admin");
            Console::output("Login: superadmin");
            Console::output("Parol: 123456");
        }else{
            Console::output("Saqlanmadi");
        }

    }
}
