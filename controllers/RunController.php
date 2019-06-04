<?php

namespace app\controllers;

class RunController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
