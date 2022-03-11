<?php

session_start();

// check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

    header("location:index.php");
    exit();
}
include "config.php";


if (isset($_POST["submit"])){


    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $othernames = $_POST["othernames"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber = $_POST["phoneNumber"];
    $nationalid = $_POST["nationalid"];
    $helbid = $_POST["helbid"];
    $krapin = $_POST["krapin"];
    $county =$_POST['county'];
    $subcounty =$_POST['subcounty'];
    $gender = $_POST["gender"];



    // insert
    $sql_p= "INSERT INTO `personal information` ( `lastname`, `firstname`, `middlename`, `othernames`, `dob`, `age`, `emailAddress`, `phoneNumber`, `nationalid`, `helbid`, `krapin`, `county`, `subcounty`, `gender`) 
              VALUES ('$lastname','$firstname','$middlename','$othernames','$dob','$age','$emailAddress','$phoneNumber','$nationalid','$helbid','$krapin','$county','$subcounty','$gender')";


    $result_p = mysqli_query($link,$sql_p);


    if ($result_p){
        echo "<p class='alert alert-success'>Records have been Added</p>";
        header("location:unemployment_form.php");
    }else{

        echo "<p class='alert alert-danger'>Error executing query $sql_p</p>".mysqli_error($link);
    }







}
















?>

