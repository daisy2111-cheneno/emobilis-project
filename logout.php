<?php

session_start();
$_SESSION = array();
header("Location:index.php");

exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PERSONAL INFORMATION</title>
    <link rel="stylesheet" href="css/unemployment_form.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="row float-end">
            <ul id="navbar" class="p-3">
                <li><a href="unemployment_form.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="reset_password.php">Reset Password</a></li>
                <li><a class="active" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
