<?php
include("function.php");

$obj = new database();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $email = $_POST['email'];
        $passs = $_POST['pass'];
        $pass = password_hash($passs, PASSWORD_DEFAULT);
        $id = "NULL";
        $val = array($email,$pass);
        $key = array("email","pass");

        $data = array_combine($key,$val);

        #inserting data
        $obj->insert("test",$data);
    }
    
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form class="container pt-5" method="post">
        <h1>Fill The Form</h1>
        <br>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" autocomplete="false" name="email" id="" aria-describedby="emailHelpId" placeholder="abc@mail.com">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" autocomplete="false" name="pass" id="" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>