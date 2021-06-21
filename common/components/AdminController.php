<?php

namespace common\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
// use yii\web\Response;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
// use common\models\LoginForm;
// use common\models\ContactForm;
class AdminController extends \yii\web\Controller{
    // public $layout = 'admin.php';
    public function __construct($id,$module,$config=[]){
        parent::__construct($id,$module,$config);
    }
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','admin','view','update','delete','index','admin/rukn/index'],
                'rules' => [
                    [
                        'actions' => ['logout','admin','view','update','delete','index','admin/rukn/index'],
                        'allow' => true,
                        'roles' => ['theCreator'],
                    ],
                    [
                        'actions' => ['logout','admin','view','update','delete','index','admin/rukn/index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            TimestampBehavior::className(),
        ];
    }
}
