<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<?php   require_once 'nav.php' ?> 
  <div class="container">
            <form method="POST">
            Email:<input class="form-control mb-1" type="email" name="email"  required/>
            </br>
            <button  class="w-100 btn btn-dark mb-1" type="submit" name="reset" >Reset Password</button>
             </form> 
    </div> 
    <?php
        $database = mysqli_connect("localhost","root","","zg_todo");
        if($database){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $email = $_POST['email'];
              $reset = "SELECT email,security_code FROM users WHERE email ='$email'";
              $q = mysqli_query($database,$reset);
              $row = mysqli_fetch_assoc($q);
             $security_code = $row['security_code'];
              if (!$q ) {
                echo '
                <div class="alert alert-warning mt-3">
                This email is not registered with us </div>';
                                      
                    } else {
                    require_once 'mail.php';
                    $mail->addAddress($email);
                    $mail->Subject = "Reset Password";
                    $mail->Body = '
                    Password reset link <br>
                   ' . '<a href="http://localhost/reset.php?email='.$_POST['email']. 
                    '&code='.$security_code. '">http://localhost/reset.php?email='.$_POST['email']. 
                    '&code='.$security_code.'</a>';
                    ;
                    $mail->setFrom("kamelmaaloul@gmail.com","zg_todo");
                    $mail->send();
                        echo '
                        <div class="alert alert-success mt-3"> 
                        A password reset link has been sent to your account
                        </div> ';

                    }
                    
                } 
                       
} 


?>  
</body>
<?php   require_once 'footer.php' ?>;

</html>
