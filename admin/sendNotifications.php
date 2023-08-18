<?php 
if(isset($_POST['submit'])){
    $to = "kamelmaaloul@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $user_name = $_POST['user_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $user_name . " " . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $user_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $user_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Send Notifications</title>
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
    <div class="container">

<form action="" method="post" style="width: 20px auto;">
User Name: <input class="form-control mb-1" type="text" name="user_name" required/><br>
Email: <input class="form-control mb-1" type="text" name="email" required/><br>
Message:<br><textarea class="form-control mb-1" rows="5" name="message" cols="30" required/></textarea><br>
<input class="w-100 btn btn-dark mt-3 mb-1" type="submit" name="submit" value="Submit" required/>
</form>

</body>

</html> 