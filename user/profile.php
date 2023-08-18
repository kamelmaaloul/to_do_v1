<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Aolication Todo </a>
                <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </div>
    </nav>
    <main class="container" style="max-width: 700px; margin:auto;">
    <?php
       session_start();
        if(isset($_SESSION['user_type'])=="user"){
            echo ' 
            <form method="POST">
            Username:<input class="form-control mb-1" type="text" name="username" value="'.$_SESSION['username'].'" required/>
            </br>
            Email:<input class="form-control mb-1" type="email" name="email" value="'.$_SESSION['email'].'" required/>
            </br>
            Password:<input class="form-control mb-1" type="text" name="password" required/>
            </br>
            <button class="w-100 btn btn-warning mb-1" type="submit" name="update" value="'.$_SESSION['id'].'">update</button>
            </br>
            <a class="w-100 btn btn-dark mb-1" href="http://todo.test/user/index.php">Back to Your Home</a>
             </form>';

             if(isset($_POST['update'])){
                $id=$_SESSION['id'];
                $name=$_POST['username'];
                $email=$_POST['email'];
                $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                $database = mysqli_connect("localhost","root","","zg_todo");
                $update_user = "UPDATE users set username='$name',email='$email',password='$password',updated_at=NOW() where id=$id";
                $q = mysqli_query($database,$update_user);
                if($q){
                    echo '<div class="alert alert-success mt-3">Update completed successfully</div>';
                    $database = mysqli_connect("localhost","root","","zg_todo");
                    $select_user = "select * from users where id=$id";
                    $user= mysqli_query($database,$select_user);
                    $row = mysqli_fetch_assoc($user);
                    
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    header("refresh:5");
                       }
                       else echo 'Refused Update';
            


             }
        }
?>


</main>  
</body>

</html>


    