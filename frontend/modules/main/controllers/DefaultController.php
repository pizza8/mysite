<?php

namespace app\modules\main\controllers;


use frontend\components\Common;
use yii\web\Controller;


class DefaultController extends Controller
{
    
    public function actionIndex()
    {
        $this->layout = "bootstrap";
        return $this->render('index');
    }

    public function actionService()
    {
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;

        $cache->set('test', 166786);

        print $cache->get("test");


    }

    public function actionEvent()
    {
        $component = new Common();
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        $component->sendMail("test@domain.com","Test","Test text", "test");

    }

    public function actionLoginData()
    {
        print \Yii::$app->user->identity->username;
    }
}
