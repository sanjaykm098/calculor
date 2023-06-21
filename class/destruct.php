<?php
class demo{
    public $msg = "This desturct Funcation<br>";

    public function __destruct(){
        echo $this->msg;
    }
}


class demo1{
    public $msg = "This desturct Funcation<br>";
    public $msg2;

    public function hello($msg2){
        echo $this->msg2 = $msg2;
    }
    public function __destruct(){
        echo $this->msg;
    }
}
$obj = new demo();
$obj = new demo1();
$obj->hello("Hello world<br> ");


