<?php


/*
 * 注册树模式
 *
 * 理解：将需要对象或者实例注册到树上
 *   特点
 *   注册树模式通过将对象实例注册到一棵全局的对象树上，需要的时候从对象树上采摘的模式设计方法
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

class Register{
    protected static $obj;
    public static function set($name,$obj){
        self::$obj[$name] = $obj;
    }
    public static function get($name){
        return self::$obj[$name];
    }
    public static function _unset($name){
        unset(self::$obj[$name]);
    }
}

//定义每个类的类名
const A = 'mysql';
const B = 'sqlserver';
const C = 'oracle';
//调用注册
Register::set('mysqldb',Database::getInstance(A));
$db = Register::get('mysqldb');
var_dump($db);