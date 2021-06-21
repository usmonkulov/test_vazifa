<?php


namespace console\controllers;

use common\models\UserIdentity;
use common\rbac\models\Role;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Class CreatorController
 *  php yii creator/init
 * @package console\controllers
 * @author Bobur Usmonkulov <usmonkulov5@mail.com>
 */
class CreatorController extends Controller
{
    public function actionInit()
    {

        $user = new UserIdentity();
        $auth_assignment = new Role();

        $user->username = 'usmonkulov';
        $user->email = 'usmonkulov5@gmail.com';
        $user->password_hash = '$2y$13$2wPZK5bhqQFF//PDw5kG6.9a5zSUbGKGroVceNaSFHXVsqDd0qYQq';
        $user->status = 10;
        $user->auth_key = 'AYNj_K4Ef_HxsCbZfuCylh69h2iXOSVC';
        $user->created_at = time();
        $user->updated_at = time();
        $user->save();

        $auth_assignment->item_name = 'theCreator';
        $auth_assignment->user_id = $user->id;
        $auth_assignment->created_at = time();

        if ($auth_assignment->save()){
            Console::output("Sayt yaratuvchisi yaratildi");
        }else{
            Console::output("Saqlanmadi");
        }

    }
}