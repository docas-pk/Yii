<?php


namespace app\controllers;


use yii\web\Controller;

class XssController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}