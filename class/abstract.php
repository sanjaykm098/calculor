<?php


abstract class demo{
    public $name = "Sanjay";

    abstract public function hello($name);

    
}

class welcome extends demo{
    
    public function hello($name){
        echo $this->name = $name;
    }
}

$obj = new welcome();
$obj->hello("Sanjay Kumar");