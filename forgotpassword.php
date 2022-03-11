
<?php

include "config.php";
$sql= "SELECT * FROM users ";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data= mysqli_num_rows($result);
#is there data here?
    if ($data > 0) {


        while ($row = mysqli_fetch_array($result)) {
            $id=$row['id'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $emailAddress = $row['emailAddress'];
            $password= $row['password'];

        }
    }
}

//1.When the reset button is clicked, define the variables in the reset form
if (isset($_POST['reset'])) {

    $emailAddress = $_POST['emailAddress'];
    $newPass = $_POST['newpass'];
    $confirmPass = $_POST['confirmpass'];

// Validate
//2.(a) if the length of the new password is less than 6, echo passErr
    if (strlen($newPass) < 8) {
        $passError = "Password must have at least 8 characters";
        echo $passError;
    } else { //2.(b) encrypt the new password then store
        $storePass = password_hash($newPass, PASSWORD_DEFAULT);
    }
//3(a) verify that the new password and confirm password match,
    if ($confirmPass != $newPass) {
        $conPassErr = "<p>Passwords do not Match!</p>";
        echo $conPassErr;
    }//4(b) if the new password and the confirm password don't match, echo conPassErr


//5. If the passErr and conPassErr are empty,update in the password using the stored password
    if (empty($passError) and empty($conPassErr)) {

        $sql = "UPDATE users SET password= '$storePass' WHERE emailAddress='$emailAddress'";

        $result = mysqli_query($link, $sql);

        if ($result) {
            echo "<p class='alert alert-info'>Password Reset was Successful</p>";
            header("location:index.php");


        } else {
            echo "<p class='alert alert-danger'>Error executing query $sql</p>" . mysqli_error($link);
        }


    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FORGOT PASSWORD</title>
    <link rel="stylesheet" href="css/unemployment_form.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container shadow-lg" id="forgotpassword">
    <div class="row">
        <div class="col-5 darkblue">
            <div class="row mt-4">
                <h3 class="text-center text-white ">Hello <?php echo $firstname; ?></h3>
            </div>
            <div class="row">
                <p class="text-center text-white p-2 ">Forgot your password?</p>
                <p class="text-center text-white mt-4" >No Problem, reset here.</p>
            </div>
        </div>
        <div class="col-7">
            <div class="row">
                <h4 class="text-center text-teal p-2 mt-2">Reset Password</h4>
            </div>
            <div class="row">
                <p class="grey text-center">use your email account</p>
            </div>
            <form action="forgotpassword.php" method="post" enctype="multipart/form-data">
                <div class="row p-2 mb-2">
                    <input class="form-control rounded-pill"  type="email" name="emailAddress" placeholder="Email Address" required>
                </div>
                <div class="row p-2 justify-content-between">
                    <input class="form-control rounded-pill" type="password" name="newpass" id="newpwd" placeholder="Password" required>
                </div>
                <div class="row p-2 justify-content-between">
                    <input class="form-control rounded-pill" type="password" name="confirmpass" id="confirmnewpwd" placeholder="Confirm Password" required>
                </div>
                <div class="row m-3">
                    <input type="submit" class="btn darkblue rounded-pill resetBtn" name="reset" value="Reset">
                </div>
                <div  class="row m-3">
                    <a class="text-center" href="index.php">login</a>
                </div>
            </form>

        </div>

    </div>
</div>
</body>
</html>
</body>
</html>





