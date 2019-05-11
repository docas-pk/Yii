<?php


namespace app\controllers;


use app\models\Customer;
use yii\web\Controller;

class CustomerController extends Controller
{

    //获取某个客户下面所有订单
    public function actionIndex()
    {
//        $customer = Customer::find()->where(['name'=> "docas"])->one();
//        print_r($customer->orders);


        //关联查询的多次查询
        $customer = Customer::find()->with('orders')->asArray()->all();
        print_r($customer);
    }
}