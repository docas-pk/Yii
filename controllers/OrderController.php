<?php


namespace app\controllers;

use app\models\Order;
use yii\web\Controller;

class OrderController extends Controller
{

    //查询订单所属客户
    public function actionIndex()
    {
        $order = Order::find()->where(['order_id'=> 31186])->one();
        print_r($order->customer);
    }
}