<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj2 = new hello();

// $obj  = new access();

?>