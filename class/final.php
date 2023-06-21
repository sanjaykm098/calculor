<?php

 class finalClass{
    final public function hello(){
        echo "Finall funcation";
    }
}
$obj = new finalClass();
$obj->hello();

class finlly extends finalClass{

    public function hello(){
        echo "Hello";
    }
}
$obj = new finlly();
$obj->hello();
?>