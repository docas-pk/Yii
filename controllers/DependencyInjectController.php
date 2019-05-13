<?php
namespace app\controllers;

use yii\di\Container;
use yii\di\ServiceLocator;
use yii\web\Controller;
use Yii;

class DependencyInjectController extends Controller
{

    public function actionIndex()
    {
        //以容器的方式使用依赖注入
        $container = new Container();
        $container->set('app\controllers\Dirver', 'app\controllers\ManDriver');
        $car = $container->get('app\controllers\Car');
        $car->run();
    }

    public function actionService()
    {
        //以服务器定位的方式使用依赖注入
        Yii::$container->set('app\controllers\Dirver', 'app\controllers\ManDriver');
        Yii::$app->car->run();
    }
}

interface Dirver{
    public function driver();
}

class ManDriver implements Dirver
{

    public function driver()
    {
        echo 'i am an old man!';
    }
}

class Car
{
    private $driver = null;

    public function __construct(Dirver $driver)
    {
        $this->driver = $driver;
    }

    public function run()
    {
        $this->driver->driver();
    }
}

