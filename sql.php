as
fsa
fas
fas
f
saf
asfss<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $server = "localhost";
        $db = "todo";
        $pass = "a@123";
        $user = "root";
        $cn = new mysqli($server,$user,$pass,$db);

        if($cn->connect_error){
            die("Connection Error");
        }

        $sq = "SELECT * FROM user";
        $result = $cn->query($sq);

        if($result->num_rows>0){
            while($res = $result->fetch_array()){
            echo "ID: {$res['id']} UserName: {$res['userid']} Email: {$res['email']}<br>";
            }
        }
        $cn->close();
    ?>
</body>
</html>
