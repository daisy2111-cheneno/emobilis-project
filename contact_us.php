<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

include 'config.php';

if(isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $emailAddress = $_POST['emailAddress'];
    $message = $_POST['message'];


    $sql = "INSERT INTO `contact us`( `lastName`, `firstname`, `emailAddress`, `message`) 
           VALUES ('$lastname','$firstname','$emailAddress','$message')";

    $result = mysqli_query($link, $sql);


    if ($result) {
        echo "<p class='alert alert-success'>Message sent Successfully</p>";
    } else {

        echo "<p class='alert alert-danger'>Error executing query $sql</p>" . mysqli_error($link);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CONTACT US</title>
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
                <li><a class="active" href="contact_us.php">Contact Us</a></li>
                <li><a href="reset_password.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-5 darkblue">
            <h4 class="text-white mt-4">Contact Information</h4>
            <ul class="">

            </ul>
            <ul class="contacts_icons" style="display:inline-block; padding: 40px;">
                <li style="list-style: none;padding: 20px"><a style="text-decoration: none" href="https://labour.go.ke/contact-us/"><i class="fa fa-envelope fa-lg text-white"></i><span class="text-white" style="padding-left: 10px;">info@labour.org.ke</span></a></li>
                <li style="list-style: none; padding: 20px"><a style="text-decoration: none" href="https://labour.go.ke/contact-us/"><i class="fa fa-phone fa-lg text-white"></i><span class="text-white" style="padding-left: 10px;">+254 (0) 2729801/804-819</span></a></li>
                <li style="list-style: none; padding: 20px"><a style="text-decoration: none" href="https://labour.go.ke/"><i class="fa fa-globe fa-lg text-white"></i></a><span class="text-white" style="padding-left: 10px;">www.labour.go.ke</span></li>
                <li style="list-style: none; padding: 20px"><a style="text-decoration: none" href="https://labour.go.ke/contact-us/"><i class="fa fa-map-marker fa-lg text-white"></i><address class="text-white" style="transform: translate(7%,-40%);"">Ministry of Labour ,
                            Bishops Road, Social Security House<br>
                            P.O. Box 40326 – 00100, Nairobi</address></a></li>
            </ul>
        </div>

        <div class="col-7">
            <h3>Get in touch with us</h3>
            <form action="contact_us.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <label for="firstname">First Name:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="firstname" id="firstname" placeholder="First Name" required>
                    </div>
                    <div class="col">
                        <label for="lastname">Last Name:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="emailAddress" id="exampleFormControlInput1" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="10" required></textarea>
                </div>
                <div>
                    <input type="submit" class="bg bg-primary text-white border-0 rounded-1 mb-4 float-end col-md-2" name=submit id="submit" value="Submit">
                </div>
            </form>


        </div>
    </div>
</div>
<footer class="m-3">Copyright &copy; 2022 by The Ministry of Labour and Social Protection. all rights reserved.</footer>
</body>
</html>