<?php


namespace app\controllers;


use yii\web\Controller;
use Yii;

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

}