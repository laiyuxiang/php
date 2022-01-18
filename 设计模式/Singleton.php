<?php

/*
 * 单例模式
 * 单例模式顾名思义，就是只有一个实例。作为对象的创建模式， 单例模式确保某一个类只有一个实例，而且自行实例化并向整个系统提供这个实例。
 * 理解：相当于多次调用这个类的时候，类本身会实例化，然后获得这个实例的结果，后面多次调用都是获取第一次获取的实例。常用余数据库连接
 *   特点
 *   一是某个类只能有一个实例；
 *   二是它必须自行创建这个实例；
 *   三是它必须自行向整个系统提供这个实例。
 */
class Single
{
    private static $_instance;
    private static $db;
    //构造函数声明为private,防止直接创建对象
    private function __construct(){
        self::$db = "被实例化了".rand(1,999999);
    }
    private function __clone(){
        trigger_error('Clone is not allow' ,E_USER_ERROR);
    }
    public static function getInstance()
    {
        var_dump(isset(self::$_instance));
        var_dump(self::$db);
        if(!isset(self::$_instance)){//如果已经new 实例化过，直接返回实例化的结果。
            self::$_instance = new Single();
        }
        return self::$_instance;
    }

    function test(){
        echo 'test'.rand(1,999999);
    }
}

//$sign = new Single(); //报错 因为__construct 为私有
$n1 =   Single::getInstance();
$n1 = Single::getInstance();
$n1 = Single::getInstance();
$n1->test();
$n1->test();
$n1->test();
//clone $n1;
//bool(false)
//被实例化了
//bool(true)
//第一次被实例化之后 后续不再被实例化

