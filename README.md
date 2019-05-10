### Yii

## 启动和安装

    curl -sS https://getcomposer.org/installer | php
    mv composer.phar /usr/local/bin/composer
    composer create-project --prefer-dist yiisoft/yii2-app-basic basic
    php -S localhost:8000
    
## 请求 request

    $request = Yii::$app->request;
    $request->get('id', 20);
    $request->post('name', "docas");
    
## 响应 response

    $response = Yii::$app->response;
    $response->statusCode = 500;
    $response->headers->add('pragma', 'no-cache');
    $response->headers->set('pragma','max-age=5');
    //return $this->redirect('http://www.baidu.com');
    //文件下载
    //$response->headers->add('content-disposition', 'attachment; filename="a.jpg"'); 
    //$response->sendFile('./favicon.ico');
