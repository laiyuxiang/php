<?php

/*
 * 策略模式
 * 理解： 比如我在高德导航上导航家到公司，出行方式有，打车，公交地铁，骑行，步行等方式，这些方式就是以到公司为目的的策略，策略可以变化。
 * 定义一系列算法，将每一个算法封装起来，并让它们可以相互替换。策略模式让算法独立于使用它的客户而变化
 */

//构建策略 去公司
abstract class Stratrgy{
    abstract function goCompany();
}

//坐地铁地铁
class Subway extends Stratrgy
{
    public function goCompany()
    {
        // TODO: Implement goCompany() method.
        echo 'subway';
    }
}

//打车
class Taxi extends Stratrgy
{
    public function goCompany()
    {
        // TODO: Implement goCompany() method.
        echo  'taxi';
    }
}

//定义抽象算法实现
class Obj
{
    protected $stratrgy;
    function __construct(Stratrgy $way)
    {
        $this->stratrgy = $way;
    }

    public function goCompany(){
        $this->stratrgy->goCompany();
    }
}

//现在打车去公司

$nowWay = new Taxi();
$s = new Obj($nowWay);
$s->goCompany();

