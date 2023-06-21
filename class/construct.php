<?php

class demo{
    public $msg = "This is construct Function<br><br>";

    public function __construct(){
        echo $this->msg;
    }
}
class demo1{
    public $msg;

    public function __construct($msg){
        echo $this->msg = $msg;
    }
}
$obj = new demo();
$obj = new demo1("Hello World");