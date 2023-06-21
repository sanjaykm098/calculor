<?php
session_start();
require "class.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = ($_POST["number1"]);
    $num2 = ($_POST["number2"]);
    if(isset($_POST['method'])){
        $way = $_POST['method'];
    }
    else{
        $way = "add";
    }
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $msg = "<br><div class='alert alert-warning alert-dismissible fade show' role='alert'><div>
<i class='fa fa-warning' aria-hidden='true'></i>
Please Enter Number Only
        </div>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } else {
        match ($way) {
            'add' => $method = " + ",
            'sub' => $method = " - ",
            'div' => $method = " / ",
            'mul' => $method = " * ",
            'reminder' => $method = " % ",
            'double_mul' => $method = " ** ",
        };
        $obj = new Calculator($num1, $way, $num2);
        $his = "<p>{$num1}{$method}{$num2} = {$obj}</p>";
        $_SESSION["value"] = $obj;
        if (isset($_SESSION['his'])) {
            $b = $_SESSION['his'];
            $a =  explode(" ", $b);
            array_push($a, $his);
            $b = implode(" ", $a);
            $_SESSION['his'] = $b;
        } else {
            $a = array();
            array_push($a, $his);
            // print_r($a);
            $b = implode(" <br>", $a);
            $_SESSION['his'] = $b;
        }
    }
}

if (isset($_GET['del'])) {
    session_destroy();
    echo "History Deleted";
    header("location:index.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    .his p {
        margin-bottom: 0;
    }

    .his p:nth-child(odd) {
        color: red;
    }

    .his p:nth-child(even) {
        color: blue;
    }
</style>

<body>
    <div class="container">
        <div class="pt-5 pb-3">
            <h1>Simple Calculator
                <button type="button" class="border-0 bg-white text-success " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  History  <i class="fa fa-calculator" aria-hidden="true"></i>
            </h1>
            </button>
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
        </div>
        <form action="" method="post" class="" id="yourFormId">
            <div class="mb-3">
                <label for="" class="form-label">First Number <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></label>
                <input value="<?php if (isset($_SESSION["value"])) {
                                    if (isset($obj)) {
                                        echo $obj;
                                    }
                                } ?>" type="" class="form-control" name="number1" id="number1" aria-describedby="emailHelpId" placeholder="Enter Number">
            </div>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'add') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio1" value="add">
                <label class="form-check-label" for="inlineRadio1">Add</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'sub') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio2" value="sub">
                <label class="form-check-label" for="inlineRadio2">Sub</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'mul') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio3" value="mul">
                <label class="form-check-label" for="inlineRadio3">Multiple</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'div') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio4" value="div">
                <label class="form-check-label" for="inlineRadio4">Divide</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'double_mul') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio5" value="double_mul">
                <label class="form-check-label" for="inlineRadio5">Double Multiple</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" <?php echo (isset($way) && $way === 'reminder') ? 'checked' : ''; ?> type="radio" name="method" id="inlineRadio6" value="reminder">
                <label class="form-check-label" for="inlineRadio6">Reminder</label>
            </div>

            <br>
            <br>
            <div class="mb-3 text-left">
                <label for="" class="form-label">2nd Number <i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></label>
                <input type="" class="form-control" name="number2" id="number2" aria-describedby="emailHelpId" placeholder="Enter Number">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="?del=all"><button type="button" class="btn btn-danger">Reset</button></a>
        </form>
    </div>
</body>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">History of Calculator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($b)) {
                    echo "<div class='his'>{$b}</div>";
                } else {
                    echo "No History Found!!";
                }
                ?>
            </div>
            <div class="modal-footer text-center">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                <a href="?del=all"><button type="button" class="btn btn-danger">Reset</button></a>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("blur", () => {
        document.title = "Calculator Example";
    });

    // when the user's focus is back to your tab (website) again
    window.addEventListener("focus", () => {
        document.title = "PHP / Session / OOPS";
    });
</script>

</html>