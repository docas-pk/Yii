### expansion
## 模块化设计

    注释 ：把项目划分为若干个模块，它们相互配合，共同的去完成整个系统交给它们的任务。

## 事件
    解释：使用事件，可以在特定的时点，触发执行预先设定的一段代码，事件既是代码解耦的一种方式，也是设计业务流程的一种模式。现代软件中，事件无处不在，比如，你发了个微博，触发了一个事件，导致关注你的人，看到了你新发出来的内容。
    业务需求：支付成功后的，更新客户的等级、统计渠道的成功率、通知游戏客户端
    实现：可以将支付当做一个事件，支付成功后触发一个 PAY_SECCESS_AFTER 事件。当一笔订单进行支付成功时，我们将更新客户的等级、统计渠道的成功率、通知游戏客户端的业务逻辑绑定到 PAY_SECCESS_AFTER 事件上
    
## 行为之类混合
   
    解释：行为（behavior）可以在不修改现有类的情况下，对类的功能进行扩充。 通过将行为绑定到一个类，可以使类具有行为本身所定义的属性和方法，就好像类本来就有这些属性和方法一样。  而且不需要写一个新的类去继承或包含现有类。
   
## 依赖注入之容器
    注释：依赖注入(Dependency Injection，DI)容器就是一个对象，它知道怎样初始化并配置对象及其依赖的所有对象。
    例子：
        1、玩家进行支付操作  支付的接口、支付具体实现的类、支付调用的类
        2、支付调用的类，可以使用构造方法和方法进行注入（支付调用的类依赖与支付的接口的实现）
        
        
## composer

## debug
    
    检测程序执行时间
    Yii::beginProfile("pay_time_log_start");
    Yii::endProfile("pay_time_log_end");
    
## gii
