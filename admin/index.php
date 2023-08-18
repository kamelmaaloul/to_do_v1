<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>dashboard Admin</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
        <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Application Todo </a>
            <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
        </div>
        </nav>
        <main class="container m-auto" style="max-width: 700px;">
        <?php
            session_start();
            if(isset($_SESSION['user_type'])){
                if($_SESSION['user_type']=="admin"){
                    echo '<div class="shadow p-3 mb-1 bg-body-tertiary rounded mt-5"> Welcome' . ' Admin' . ' : ' .$_SESSION['username'] . '</div>';
                    echo '<a class ="btn btn-light  shadow w-100 mb-1" href="profile.php" style="color:indigo;">Update Profile</a>';
                    echo '<a class ="btn btn-light  shadow w-100 mb-1" href="task.php">Add Task</a>';
                    echo '<a class ="btn btn-light  shadow w-100 mb-1" href="compteusers.php" style="color:green;">Compte Users</a>';
                    echo '<a class ="btn btn-light  shadow w-100 mb-1" href="tasksusers.php">Tasks Users</a>';
                    echo '<a class ="btn btn-light  shadow w-100 mb-1" href="send.php" style="color:blue;" >Send Notifications</a>';
                    echo '<form method="GET"> <button type ="submit" class="btn btn-danger mt-3 w-100" name="logout">Logout</button></form>';
                    
                if(isset($_GET['logout'])){
                     session_unset();
                    session_destroy();
                    header("location:http://todo.test/login.php",true);
                    }
        
            }
    
            }else{
                    header("location:http://todo.test/login.php",true);
                    die("");
                }

    ?>
</main>   
</body>
<?php   require_once '../footer.php' ?>

</html>
   