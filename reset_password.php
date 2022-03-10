<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

include "config.php";


//1.When the reset button is clicked, define the variables in the reset form
if(isset($_POST['reset'])) {

    $id=$_SESSION['id'];
    $password=$_SESSION['password'];
    $oldPass=$_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];
//2.Verify the old password
    if(password_verify($password,$oldPass)){

        // Validate
//3.(a) if the length of the new password is less than 6, echo passErr
        if (strlen($newPass)<6){
            $passError = "Password must have more than 6 characters";
            echo $passError;
        }else{ //3.(b) encrypt the new password then store
            $storePass = password_hash($newPass,PASSWORD_DEFAULT);
        }
//4(a) verify that the new password and confirm password match,
        if ($confirmPass!=$newPass) {
            $conPassErr = "<p>Passwords do not Match!</p>";
            echo $conPassErr;
        }//4(b) if the new password and the confirm password don't match, echo conPassErr


    }else{
        echo "<p class='alert alert-warning'>Enter your current password again</p>";
    }



//5. If the passErr and conPassErr are empty,update in the password using the stored password
    if (empty($passError) and empty($conPassErr)){

        $sql = "UPDATE users SET password= '$storePass' WHERE id='$id'";

        $result=mysqli_query($link,$sql);

        if ($result){
            echo "<p class='alert alert-info'>Password Reset was Successful</p>";


        }else{
            echo "<p class='alert alert-danger'>Error executing query $sql</p>".mysqli_error($link);
        }


    }


}




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
                <li><a class="active" href="reset_password.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="row m-2">
        <div class="card">
            <div class="card-header text-primary bg-white h4">Reset Password</div>
            <div class="card-body">
                <form action="reset_password.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Old Password</span>
                        <input type="password" name="oldPass" class="form-control" aria-describedby="basic-addon1" id="opwd" required>
                    </div>
                    <span class="eye">
                    <i class="fa fa-eye grey" id="oeye" style="position: absolute; transform: translate(0%,-250%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>
                    <script>
                        var opwd =document.getElementById('opwd');
                        var oeye =document.getElementById('oeye');


                        oeye.addEventListener('click',toggle);

                        function toggle(){

                            oeye.classList.toggle('active');

                            (opwd.type ==='password') ? opwd.type='text':
                                opwd.type = 'password';
                        }
                    </script>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">New Password</span>
                        <input type="password" name="newPass" class="form-control" aria-describedby="basic-addon1" id="pwd" required>
                    </div>
                    <span class="eye">
                    <i class="fa fa-eye grey" id="eye" style="position: absolute; transform: translate(0%,-250%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>
                    <script>
                        var pwd =document.getElementById('pwd');
                        var eye =document.getElementById('eye');


                        eye.addEventListener('click',toggle);

                        function toggle(){

                            eye.classList.toggle('active');

                            (pwd.type ==='password') ? pwd.type='text':
                                pwd.type = 'password';
                        }
                    </script>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">Confirm Password</span>
                        <input type="password" name="confirmPass" class="form-control" aria-describedby="basic-addon2" id="cpwd" required>
                    </div>
                    <span class="eye">
                    <i class="fa fa-eye grey" id="ceye" style="position: absolute; transform: translate(0%,-270%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>

                    <script>
                        var cpwd =document.getElementById('cpwd');
                        var ceye =document.getElementById('ceye');


                        ceye.addEventListener('click',toggle);

                        function toggle(){

                            ceye.classList.toggle('active');

                            (cpwd.type ==='password') ? cpwd.type='text':
                                cpwd.type = 'password';
                        }
                    </script>


                    <div class="input-group mb-3"><input type="submit" name="reset" value="Reset Password" class="btn btn-primary col-md-3 ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>






