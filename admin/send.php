<?php 
if(isset($_POST['submit'])){
    $to = "kamelmaaloul@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $user_name = $_POST['username'];
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
        <title> Send Notifications </title>
        <link rel="shortcut icon" href="img/logo_todo.jpeg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">Application Todo - Compte Users - </a>
                <img src="../img/logo_todo.jpeg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
            </div>
    </nav>
<body>

<h2>Notifications Form</h2>

<div class="container">
  <form method="POST">
  <div class="row">
    <div class="col-25">
      <label for="fname">User Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="username" placeholder="Your name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Email</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="email" placeholder="Your address email..">
    </div>
  </div>
      
  <div class="row">
    <div class="col-25">
      <label for="subject">Subject</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
  <a class="w-100 btn btn-dark mt-3 mb-1" href="http://todo.test/admin/index.php">Back to Profile</a>

</div>

</body>
</html>


