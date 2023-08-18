<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ٌRegister</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <?php   require_once 'nav.php' ?> 
  <div class="container">
            <form method="POST">
            Username:<input class="form-control mb-1" type="text" name="username"  required/>
            </br>
            Email:<input class="form-control mb-1" type="email" name="email"  required/>
            </br>
            Password:<input class="form-control mb-1" type="password" name="password" required/>
            </br>
            <button  class="w-100 btn btn-dark mb-1" type="submit" name="register" >Register</button>
             </form> 
    </div>
<?php
$database = mysqli_connect("localhost","root","","zg_todo");
//$insert = "INSERT INTO users VALUES('','abderrahmane','abde@gg.gg','456123','user')";
  //  $q = mysqli_query($database,$insert);
if($database){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $security_code = md5(date("h:i:s"));
        $database = mysqli_connect("localhost","root","","zg_todo");
        $insert = "INSERT INTO users VALUES('','$username','$email','$password','user','$security_code','is pending',NOW())";
        $q = mysqli_query($database,$insert);
    if($q){
        echo '<div class="alert alert-success" role="alert"> Register Successufly</div>';
        echo '<a class="btn btn-warning" href="login.php">Login in </a>';
    }else        echo '<div class="alert alert-danger" role="alert"> Register refused</div>';

}
}
?>

</body>
<?php   require_once 'footer.php' ?>

</html>
<!--
$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $database = mysqli_connect("localhost","root","","zg_todo");
    $insert = "INSERT INTO users VALUES('','$username','$email','$password','user')";
    $q = mysqli_query($database,$insert);
    if($q){
        echo '<div class="alert alert-success" role="alert"> Register Successufly</div>';
        echo '<a class="btn btn-warning" href="login.php">Login in </a>';
    }else        echo '<div class="alert alert-danger" role="alert"> Register refused</div>';



