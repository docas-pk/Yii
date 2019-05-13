<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use yii\caching\FileDependency;

class FileCacheController extends Controller
{

    public function actionIndex()
    {
        $cache = Yii::$app->cache;

        $cache->add('name', 'docas', 5);

       // $cache->delete('name');

        $data =  $cache->get('name');

        var_dump($data);exit;

        $cache->flush();
    }

    public function actionDependency()
    {
        $cache = Yii::$app->cache;
        $dependency = new FileDependency(['fileName'=> 'aaaaa.txt']);
        $cache->add('file_key', 'hello world', 300, $dependency);
        $cache->delete('file_key');
        //var_dump($cache->get('file_key'));

    }
}