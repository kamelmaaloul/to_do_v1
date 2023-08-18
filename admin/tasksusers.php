<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tasks Users</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Application Todo - Compte Users - </a>
                <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </div>
    </nav>
    <main class="container" style="max-width: 700px; margin:auto;">
<?php
    session_start();
    $admin_id = $_SESSION['id'];
    $database = mysqli_connect("localhost","root","","zg_todo");
    if(isset($_SESSION['user_type'])=="admin"){
    $tasksUsers = "SELECT * FROM tasks WHERE user_id != $admin_id";
    $q = mysqli_query($database,$tasksUsers);  
        if ($q !== false && $q->num_rows > 0) {
                echo "<table width ='800'>
                            <tr>
                             <th>Title</th>
                             <th>Description</th>
                             <th>Due_Date</th>
                             <th>Priority</th>
                             <th>Status</th>
                             <th>User</th>
                             
                       </tr>
                       ";      
              while($row = $q->fetch_assoc()) {
                $cid = $row["user_id"];
                $compteUsers = "SELECT username FROM users WHERE id = $cid";
                $qcompte = mysqli_query($database,$compteUsers); 
                $crow = mysqli_fetch_assoc($qcompte);
 
                echo "<tr>
                <td>" . $row["title"]. "</td>
                <td>" . $row["description"]. "</td>
                <td>" . $row["due_date"]. "</td>
                <td>" . $row["priority"]. "</td>
                <td style='color:#0000ff'>" . $row["status"]. "</td>
                <td>" . $crow["username"]. "</td>
                
                ";
            }
                              
                echo "</table>";
                echo ' 
               
                <form method="POST">
                <a class="w-100 btn btn-dark mt-5 mb-1" href="http://todo.test/admin/index.php">Back to Profile</a>
                 </form>';
         
        }
    }
      

          
      ?> 

</main>  
</body>

</html>