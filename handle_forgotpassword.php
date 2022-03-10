<?php
include "config.php";


//1.When the reset button is clicked, define the variables in the reset form
if(isset($_POST['reset'])) {

    $emailAddress=$_POST['emailAddress'];
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];

// Validate
//2.(a) if the length of the new password is less than 6, echo passErr
    if (strlen($newPass)<6){
        $passError = "Password must have more than 6 characters";
        echo $passError;
    }else{ //2.(b) encrypt the new password then store
        $storePass = password_hash($newPass,PASSWORD_DEFAULT);
    }
//3(a) verify that the new password and confirm password match,
    if ($confirmPass!=$newPass) {
        $conPassErr = "<p>Passwords do not Match!</p>";
        echo $conPassErr;
    }//4(b) if the new password and the confirm password don't match, echo conPassErr


//5. If the passErr and conPassErr are empty,update in the password using the stored password
    if (empty($passError) and empty($conPassErr)){

        $sql = "UPDATE users SET password= '$storePass' WHERE emailAddress='$emailAddress'";

        $result=mysqli_query($link,$sql);

        if ($result){
            echo "<p class='alert alert-info'>Password Reset was Successful</p>";
            header("location:index.php");


        }else{
            echo "<p class='alert alert-danger'>Error executing query $sql</p>".mysqli_error($link);
        }


    }


}
?>