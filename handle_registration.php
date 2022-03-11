<?php

include 'config.php';
//the moment the register button is clicked,
if (isset($_POST["signup"])){


    $lastName = $_POST['lastName'];
    $firstName = $_POST["firstName"];
    $emailAddress = $_POST["emailAddress"];
    $password = $_POST['password'];
    $confirmPassword = $_POST["confirmPassword"];
    $usertype=$_POST['usertype'];
    $timestamp=$_POST['timestamp'];




    // Validate

    if (strlen($password)<8){
        $passError = "Password must have at least 8 characters";
        echo $passError;
    }else{
        $storePass = password_hash($password,PASSWORD_DEFAULT);
    }

    if ($confirmPassword!=$password) {
        echo $conPassErr = "Passwords do not Match!";
    }

    if($usertype != 'admin@mol.org.ke' or $usertype !='dronoh8@gmail.com'){
        $usertype ='nuser';
    }else{
        $usertype='admin';
    }

    if (empty($passError) and empty($conPassErr)){

        $sql = "INSERT INTO `users`( `lastname`, `firstname`, `emailAddress`, `password`, `usertype`)
                VALUES ('$firstName','$lastName','$emailAddress','$storePass','$usertype')";

        $result=mysqli_query($link,$sql);

        if ($result){
            header("location:index.php");

        }else{
            echo "Error executing query".mysqli_error($link);
        }
    }






    mysqli_close($link);




}