<?php


namespace restapi\controllers;

use restapi\models\LoginForm;
use yii\rest\Controller;

/**
 * Class SiteController
 *
 * @package restapi\controllers
 * @author Bobur Usmonkulov <usmonkulov5@mail.com>
 */
class SiteController extends Controller
{
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(), '') && ($token = $model->login())){
            return ['token' => $token];
        } else {
            return $model;
        }
    }

}