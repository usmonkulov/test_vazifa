<?php
namespace frontend\controllers;
use common\models\Nomzod;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Nomzod();
        if($model->load(Yii::$app->request->post())){
            if($model->save()){
                Yii::$app->session->setFlash('success', 'Arizangiz yuborildi');
                 return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Arizangiz yuborilmadi. Xatolik yuz berdi');
            }
        }
        return $this->render('index', compact('session', 'model'));
    }

}
