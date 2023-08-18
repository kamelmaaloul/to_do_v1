<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Admin</title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Application Todo -Task Admin- </a>
                <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </div>
    </nav>
    <main class="container" style="max-width: 700px; margin:auto;">
<?php
session_start();
echo $_SESSION['user_type'];
    if(isset($_SESSION['user_type'])=="admin"){

    echo '
    <div class="container">
    <form method="POST">

    Title Task: <input class="form-control mb-1" type="text" name="text" required/>
    Description Task : <input class="form-control mb-1" type="text" name="description" required/>
    Name Categories: <input class="form-control mb-1" type="text" name="categories" required/>
    Position Categories: <input class="form-control mb-1" type="number" name="position" required/>
    <label for="fruit">Select a Priority :</label>
        <select name="priority" id="priority" class="form-control mb-1">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
        
        <label for="fruit">Select a Status :</label>
        <select name="status" id="status" class="form-control mb-1">
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
        </br>
    <button class="w-100 btn btn-warning mb-1" type="submit" name="add">ADD</button>
    <a class="w-100 btn btn-light mb-1" href="http://todo.test/admin/index.php"> Back to Your Home </a>


    </form>';
    $database = mysqli_connect("localhost","root","","zg_todo");
          
    if(isset($_POST['add'])){
    $user_id = $_SESSION['id'];
    $title = $_POST['text'];
    $description = $_POST['description'];
    //$date = $_POST['date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $categories = $_POST['categories'];
    $position = $_POST['position'];
    $addItem = "INSERT INTO tasks VALUES('','$title','$description',NOW(),'$priority','$status','$user_id')";
    $q = mysqli_query($database,$addItem); 
    $addcategorie = "INSERT INTO categories VALUES('','$categories','$position')";
    $qcategorie = mysqli_query($database,$addcategorie); 
        if($q){
            echo '<div class="alert alert-success mt-3 mb-3"> Added Task Successfully</div>';
            header("refresh:3;");
            }else  {
                echo 'Added Task Refused';
            }
        } 
          
        if(isset($_SESSION['user_type'])=="admin"){
                $id = $_SESSION['id'];        
                $selectItem = "SELECT * FROM tasks WHERE user_id=$id";
                $result = mysqli_query($database,$selectItem); 
                if ($result !== false && $result->num_rows > 0) {
                    echo "<table width ='660'>
                                <tr>
                                <th>Number Task</th>
                                 <th>Title Task</th>
                                 <th>Due_Date</th>
                                 <th>Status Task</th>
                                 <td> <form method = 'GET'><button type='submit' class='btn btn-outline-danger' 
                                 name='allremove' >All Remove</button></form></td>
                           </tr>
                           ";
                  if(isset($_GET['allremove'])){
                      $removeItem = "DELETE FROM tasks WHERE user_id = $id";
                      $res = mysqli_query($database,$removeItem); 
                      header("location:task.php");
                      }
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr>
                  <td>" . $row["id"]. "</td>
                  <td>" . $row["title"]. "</td>
                  <td>" . $row["due_date"]. "</td>
                  <td>" . $row["status"]. "</td>
                  <td> <form method ='POST'><button type='submit' class='btn btn-outline-danger' 
                        name='remove' value='".$row['id']."'>Remove</button></form></td>
                  </tr>";
                  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove"])) {
                          $id = $_POST["remove"];
                          $removeItem = "DELETE FROM tasks WHERE id = $id";
                          $res = mysqli_query($database,$removeItem);            
                          header("location:task.php");
                         }
                  }
                  
              }
      
              echo "</table>";
            } else echo "No Tasks";
            
         }
      
      
      
          
      ?> 

</main>  
</body>

</html>