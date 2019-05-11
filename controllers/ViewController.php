<?php


namespace app\controllers;


use yii\web\Controller;

class ViewController extends Controller
{

    public function actionIndex()
    {
        $data = [
            'user'=> 'docas <script>alert("hello")</script>',
            'age' => '28'
        ];

        return $this->render('index', [
            'data'=> $data
        ]);
    }
}