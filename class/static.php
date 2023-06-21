<style>
    body{
        white-space: pre;
    }
</style>


<?php
error_reporting(E_ALL);
class ParentClass {
    public $staticProperty = 'Parent Static Property <br>';

    public static function staticMethod() {
        echo 'Parent Static Method <br>';
    }
}

class ChildClass extends ParentClass {
    public static function staticMethod() {
        echo 'Child Static Method <br>';
    }
}

// Accessing static property
// echo ParentClass::$staticProperty;  // Output: Parent Static Property
// echo ChildClass::$staticProperty;  // Output: Parent Static Property (inherited from ParentClass)

// // Calling static method
// ParentClass::staticMethod();  // Output: Parent Static Method
// ChildClass::staticMethod();   // Output: Child Static Method (overrides ParentClass method)


$obj = new ParentClass();
$obj->staticMethod();
echo $obj->staticProperty;
// phpinfo();