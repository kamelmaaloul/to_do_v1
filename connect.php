<?php

$database = mysqli_connect ('localhost','root','','example');
if($database -> connect_error){
    die('connection failed :' . $database->connect_error);
}else {

    if(isset($_POST['insert'])){
        $username   = $_POST['nom'];
        $email      = $_POST['email'];

        $additem = "insert into user values ('','$username','$email')" ;        
        mysqli_query($database,$additem); /* Exécuter l'instruction */
    
        echo "Registration Successufly";
}
}

?>