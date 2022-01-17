<?php
/*
 *  连接数据库 可以用多种方式
 *  理解： 工厂模式 ， 比如我告诉工厂，我想要一辆汽车，我只care汽车，不care汽车的来源，或者制造方式。（本例中，我只需要使用mysql，而mysql连接的实现过程，我不在意）
 *
 */

class mysql
{
    //这里使用单例
    private static $_instance;
    private function __clone(){}
    private function __construct()
    {
        echo "我正在使用mysql";
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new mysql();
        }
        return self::$_instance;
    }
}
class sqlserver
{

}
class oracle
{

}
class Database
{
    public static function getInstance($newclass)
    {
        $class = $newclass;//真实项目中这里常常是用来解析路由，加载文件。
        return $class::getInstance();
    }
}
//定义每个类的类名
const A = 'mysql';
const B = 'sqlserver';
const C = 'oracle';
//调用方法：
$return = Database::getInstance('mysql');
var_dump($return);