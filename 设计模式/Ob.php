<?php

/*
 * 观察者模式
 * 理解： 一个事件产生后，这个事件会通知所有观察者，事件抽象出来，就是事件都通知所有观察者干XX事情。
 * 观察者和事件如果需要存在关联或者监听关系，需要一方主动，观察者模式中，事件产生后会注册观察者，然后通知他。
 * 观察者模式(Observer)，当一个对象状态发生变化时，依赖它的对象全部会收到通知，并自动更新。观察者模式实现了低耦合，非侵入式的通知与更新机制。
 */

interface Observer
{
    //吃饭
    public function eat();
}

interface Event
{
  public function register(Observer $observer); //注册观察者
  public function notify(); //通知观察者
}

//观察者zhangsan

class Zhangsan implements Observer{
    public function eat()
    {
        // TODO: Implement eat() method.
        echo '张三吃火锅';
    }
}

class Lisi implements Observer{
    public function eat()
    {
        // TODO: Implement eat() method.
        echo "李四吃烤鸭";
    }
}

class Eventeat implements Event{
    protected $_observer;
    public function register(Observer $observer)
    {
        // TODO: Implement register() method.
        $this->_observer[] = $observer;
    }

    public function notify()
    {
        // TODO: Implement notify() method.
        //通知每个观察者
        foreach ($this->_observer as $k=>$v){
            $v->eat();
        }
    }
}

//触发吃东西这个事件
$eat = new Eventeat();
//注册观察者
$eat->register(new Zhangsan());
$eat->register(new Lisi());
//通知张三
$eat->notify();
