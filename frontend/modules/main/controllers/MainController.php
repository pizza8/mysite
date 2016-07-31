<?php


namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\web\Response;
use yii\widgets\ActiveForm;


class MainController extends \yii\web\Controller
{
    public $layout = "inner";

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],

        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionRegister ()
    {
        $model = new SignupForm;
        $model->scenario ='short_register';

        if(\Yii::$app->request->isAjax && \Yii::$app->request->isPost)
        {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
           print_r($model->getAttributes());
            die;
        }

        return $this->render('register', ['model' => $model]);
    }
    public function actionContact ()
    {
        $model = new ContactForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            print "send succes";
            die;
        }
        return $this->render('contact', ['model' => $model]);
    }
}
