<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;
use yii\web\Cookie;

class HelloController extends Controller
{

    /**
     * request 请求组件
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $request->get('id', 20);

        $request->post('name', "docas");
    }


    /**
     * response 响应组件
     */
    public function actionResponse()
    {
        $response = Yii::$app->response;

        //$response->statusCode = 500;

//        $response->headers->add('pragma', 'no-cache');

//        $response->headers->set('pragma','max-age=5');

        //$response->headers->add('location', "http://www.baidu.com");

//        return $this->redirect('http://www.baidu.com');


        //文件下载
//        $response->headers->add('content-disposition', 'attachment; filename="a.jpg"');

//        $response->sendFile('./favicon.ico');
    }

    /**
     * session 组件
     */
    public function actionSession()
    {
        $session = Yii::$app->session;

        $session->open();

//        if($session->isActive){
//            echo "session is start";
//        }else{
//            echo "session is close";
//        }

          //使用对象访问
//        $session->set("user", "张三");
//
//        $session->get('user');

//        $session->remove('user');

        //使用数组访问
        $session['user'] = "张三";

        unset($session['user']);
       // echo $session['user'];

    }

    /**
     * cookie 组件
     */
    public function actionCookie()
    {
        //响应组件设置和删除cookie
//        $cookies = Yii::$app->response->cookies;

//        $cookie_data = [
//            "name" => "user",
//            "value"=> "zhangsan"
//        ];
//
//        $cookies->add(new Cookie($cookie_data));
//        $cookies->remove('_csrf');

        //请求组件获取cookie
        $cookies = Yii::$app->request->cookies;
        $cookies->get('user', "zhangwu");
    }



}