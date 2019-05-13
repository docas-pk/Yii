<?php
namespace app\controllers;

use app\behaviors\EatBehavior;
use yii\base\Component;
use yii\web\Controller;
use vendor\animal\Cat;
use vendor\animal\Mourse;
use vendor\animal\Dog;
use yii\base\Event;

class AnimalController extends Controller
{

    public function actionIndex()
    {
//        $cat = new Cat();
//        $cat2 = new Cat();
//        $mourse = new Mourse();
//        $dog = new Dog();
//
//        //类级别的绑定
//        Event::on(Cat::className(), 'miao', [$mourse, 'run']);
//
//        //对象级别的绑定
//        $cat->on('miao', [$mourse, 'run']);
//        $cat->on('miao', [$dog, 'look']);
//
//        $cat->off('miao', [$dog, 'look']);
//
//        //绑定匿名的函数
//        Event::on(Cat::className(), 'miao', function(){
//            echo "miao event has triggered<br >";
//        });
//        $cat->shout();
//        $cat2->shout();
    }

    public function actionBehavior()
    {
        $dog = new Dog();
        //对象混合
//        $eatBehavior = new EatBehavior();
//        $dog->attachBehavior('dog_eat', $eatBehavior);
        $dog->eat();
    }

}