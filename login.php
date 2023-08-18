<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aplication TO_DO</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<?php   require_once 'nav.php' ?>;
    <div class="container">
    <form method="POST">
        Email:<input class="form-control" type="email" name="email" required/>
        </br>
        Password:<input class="form-control" type="password" name="password" required/>
        <a href="reset.php">Reset Passsword</a>
        </br>
        <button class="btn btn-warning mt-3" type="submit" name="login">Login</button>
    </form>
    </div>
    <?php
        $database = mysqli_connect("localhost","root","","zg_todo");
        if($database){

            if (isset($_POST['login'])){
              $email = $_POST['email'];
              $password = $_POST['password'];
              $login = "SELECT * FROM users WHERE email ='$email'";
              $q = mysqli_query($database,$login);  
              if (mysqli_num_rows($q) === 1) {
                $row = mysqli_fetch_assoc($q);
    
                if ($row['email'] === $email && password_verify($password,$row['password'])) {
    
                   echo '<div class="alert alert-success" role="alert"> Hello Logged in! Successufly</div>';
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_type'] = $row['user_type']; 
                   if($row['user_type']=='admin'){
                        header("location:admin/index.php",true);
                    }else
                        header("location:user/index.php",true);

                }else    echo '<div class="alert alert-danger" role="alert"> Your Email or Password No Correct</div>';
                       
} else    echo '<div class="alert alert-danger" role="alert"> login refused</div>';

}
}
?>

</body>
<?php   require_once 'footer.php' ?>;

</html>

