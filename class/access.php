<?php

class sho{
    public $msg;

    public function demo($msg){
        echo $this->msg = $msg;
    }
    private function demo1($msg){
        echo $this->msg = $msg;
    }
    protected function demo2($msg){
        echo $this->msg = $msg;
    }
}

class sah extends sho{
    public function demo2($msg){
        echo $this->msg = $msg;
    }
}
$obj = new sho();

$obj = new sah();
$obj->demo2("This protected function<br>");
$obj->demo("This public function<br>");
// $obj::demo1("This private function");