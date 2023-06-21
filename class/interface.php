<?php

interface demo{
    public function hello($name);
}
interface demo1{
    public function age($name);
}

class welcome implements demo,demo1{
    public function hello($name){
        echo $name;
    }  
    public function age($name){
        echo " age is ".$name;
    }  
}


$obj = new welcome();
$count = 1;
$obj->hello("Sanjay Kumar");
$obj->age("20");

