<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Application Todo -Edit User- </a>
                <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </div>
    </nav>
<main class="container m-auto" style="max-width: 720px;">

<?php
session_start();
   
    $database = mysqli_connect("localhost","root","","zg_todo");
    //$users = "SELECT * FROM users WHERE id = $admin_id";
    //$q = mysqli_query($database,$users); 
    //$user = mysqli_fetch_assoc($q);
    if(isset($_POST['edit'])){

    $id = $_POST ['edit'];
    echo $id;
    if($id != ''){
        $selectuser = "SELECT * FROM users WHERE id = $id";
        $quser = mysqli_query($database,$selectuser);  
        if (mysqli_num_rows($quser) === 1) {
          $row = mysqli_fetch_assoc($quser);
    echo '<form method="POST">
    Username : <input class="form-control mb-1" type="text" name="username" value="'.$row['username'].'" required />
    Email: <input  class="form-control mb-1" type="email" name="email" value="'.$row['email'].'" required />
    User_type : <input  class="form-control mb-1" type="text" name="user_type" value="'.$row['user_type'].'" required />
    User_type : <input  class="form-control mb-1" type="text" name="status" value="'.$row['status'].'" required />
    ';

        echo '
        <button class="w-100 btn btn-warning mt-1 mb-1" type="submit" name="change" value="'.$row['id'].'">Update</button>
        <a class="w-100 btn btn-dark mt-1 mb-1" href="index.php"> Back to Profile  </a>
        </form>';
        //$id=$row['id'];
        //echo $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cc = $_POST['username'];

        if($cc !=""){
            echo 'mmmm';
            $database = mysqli_connect("localhost","root","","zg_todo");
            $select_user= "SELECT * FROM users WHERE id=$id";
            $quser= mysqli_query($database,$select_user);
            $ruser = mysqli_fetch_assoc($quser);       // if(isset($_POST['update'])){
            $name=$ruser['username'];
            $email=$ruser['email'];
            echo $email;
            $database = mysqli_connect("localhost","root","","zg_todo");
            $update_user = "UPDATE users set username='$name',email='$email',updated_at=NOW() WHERE id=$id";
            $q = mysqli_query($database,$update_user);
            
            } else echo'2222';
        } } }
    }

   

   
?> 
</main>
</body>

</html>