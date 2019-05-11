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
    
## session

    1.session是将用户的会话数据存储在服务端，支持多种数据格式，没有大小限制
    2.通过一个session_id进行用户识别，PHP默认情况下session id是通过cookie来保存的，因此从某种程度上来说，seesion依赖于cookie。但这不是绝对的，session id也可以通过参数来实现，只要能将session id传递到服务端进行识别的机制都可以使用session。
    
    $session = Yii::$app->session;
    $session->open();
    使用对象访问
    $session->set("user", "张三");
    $session->get('user');
    $session->remove('user');
    
## cookie
    
    1.Cookie是存储在客户端浏览器中的数据，我们通过Cookie来跟踪与存储用户数据,每个cookie不能超过4KB.
    2.一般情况下，Cookie通过HTTP headers从服务端返回到客户端。多数web程序都支持Cookie的操作.
    
    响应组件设置和删除cookie
    $cookies = Yii::$app->response->cookies;
    
    $cookie_data = [
          "name" => "user",
          "value"=> "zhangsan"
    ];
    $cookies->add(new Cookie($cookie_data));
    $cookies->remove('_csrf');
    
    //请求组件获取cookie
    $cookies = Yii::$app->request->cookies;
    $cookies->get('user', "zhangwu");
    
## 视图
   
    1.数据显示
    $data = [
        'user'=> 'docas',
        'age' => '28'
    ];

    return $this->render('index', [
        'data'=> $data
    ]);
    
    2.服务器显示html页面的安全问题
    <h1><?= Html::encode($data['user']). '--' . $data['age']; ?></h1>  框架底层使用 htmlspecialchars 将特殊字符转换为 HTML 实体
    
    3.布局文件
    $this->renderPartial('index'); //不使用布局文件
    $this->render('index'); //使用布局文件，可以在布局文件 layout 中，使用$content 变量来显示 index html的页面
    
    4.视图文件中显示另一个视图
    <?= $this->render('index', ['hello'=> 'php']); ?>
    
    5.视图块
    子视图文件：
    
    <?php $this->beginBlock('block_one'); ?>
    <p>hello world</p>
    <?php $this->endBlock(); ?> 
    
    父视图文件：
    
    <?= $this->blocks['block_one']; ?>
    
## 数据模型

    ActiveRecord 活动记录类操作数据库（底层已封装好占位符，等相关逻辑），避免sql注入，使用框架语法进行数据库的操作
    
    单表查询：
    Customer::find()->count();     此方法返回记录的数量；
    Customer::find()->average();   此方法返回指定列的平均值；
    Customer::find()->min();       此方法返回指定列的最小值
    Customer::find()->max();       此方法返回指定列的最大值 ；
    Customer::find()->scalar();    此方法返回值的第一行第一列的查询结果；
    Customer::find()->column();    此方法返回查询结果中的第一列的值；
    Customer::find()->exists();    此方法返回一个值指示是否包含查询结果的数据行；
    Customer::find()->where(['>', 'id', 1])->one();                        id >1的数据
    Customer::find()->where(['between', 'id', 1, 2])->one();               id >=1并<=2的数据
    Customer::find()->where(['like', 'title', 'title_one'])->one();        title like "%like%"
    Customer::find()->where($condition)->asArray()->all();    根据条件以数组形式返回所有数据；
    Customer::find()->where($condition)->asArray()->orderBy('id DESC')->all();根据条件以数组形式返回所有数据,并根据ID倒序；
    
    增加：
    $model = new Customer();
    $data = [
        'id'   => 1,
        'name' => 'docas' 
    ];
    $model->load(['Customer'=> $data]);
    $model->save();
    
    修改：
    
    //update customer set status = 1 where status = 2
    Customer::updateAll(['status' => 1], 'status = 2'); 
    
    删除：
    
    $model = Customer::findOne($id);
    $model->delete();
    $model->deleteAll(['id'=>1]);
    
    关联查询：
    hasMany 一对多的关系
    
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id'])->asArray();
    }
    $customer = Customer::find()->where(['name'=> "docas"])->one();
    print_r($customer->orders);

    hasOne  一对一的关系
    
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id'=> 'customer_id'])->asArray();
    }
    $order = Order::find()->where(['order_id'=> 31186])->one();
    print_r($order->customer);

    
    关联查询的多次查询
    
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'id'])->asArray();
    }
    $customer = Customer::find()->with('orders')->asArray()->all();
    print_r($customer);
    
            