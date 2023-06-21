<?php

class fun
{
    public $a,$b,$c;

    function sum(){
        $this->c = $this->a + $this->b;
        return $this->c;
    }
    function sub(){
        $this->c = $this->a - $this->b;
        return $this->c;
    }
}

$sum = new fun();

$sum->a = 1980;
$sum->b = 1980;

echo $sum->sum()."<br>";

$sub = new fun();

$sub->a = 12;
$sub->b = 33;

echo $sub->sub();
