<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compte Users</title>
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
    $compteUsers = "SELECT * FROM users WHERE id != $admin_id";
    $q = mysqli_query($database,$compteUsers);  
        if ($q !== false && $q->num_rows > 0) {
                echo "<table width ='800'>
                            <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Type</th>
                             <th>Status</th>
                             <th>created_at</th>
                             <th>Update</th>
                             
                       </tr>
                       ";      
              while($row = $q->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["username"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["user_type"]. "</td>
                <td style='color:red;'>" . $row["status"]. "</td>
                <td>" . $row["created_at"]. "</td>
                <td> <form action = 'editUser.php' method ='POST'><button type='submit' class='btn btn-info' 
                      name='edit' value='".$row['id']."'>Edit</button></form></td>
                </tr>";
                $id = $row['id'];
            }
               // if(isset($_POST['edit'])){
                //    header("location:editUser.php",true);
                //    }
                    
                
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