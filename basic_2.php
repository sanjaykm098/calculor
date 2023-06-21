<?php

class person
{
    public $name;
    function __construct($yname = "Shubham")
    {
        $this->name = $yname;
    }
    function view()
    {
        echo "Your Name is : " . $this->name;
    }
}
$text = $_POST['text'];
$p1 = new person($text);
$p1->view();

?>
<form method="post">
    <input type="text" name="text">
    <input type="submit" value="err">
</form>