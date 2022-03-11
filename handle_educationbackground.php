<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";



if (isset($_POST["education"])){


    $id=$_SESSION['id'];
    $institution = $_POST["institution"];
    $qualification = $_POST["qualification"];
    $datestarted = $_POST["datestarted"];
    $dateended = $_POST["dateended"];


    //certificate
    $certificatename =$_FILES["certificate"]["name"];
    $certificatetemp = $_FILES["certificate"]["tmp_name"];
    $certificatefolder = "uploads/".$certificatename;



    // insert
    $sql_e = "INSERT INTO `education` ( `institution`, `qualification`, `datestarted`, `dateended`, `certificate`) 
              VALUES ('$institution','$qualification','$datestarted','$dateended','$certificatename')";


    $result_e = mysqli_query($link,$sql_e);

    // certificate
    if (move_uploaded_file($certificatetemp,$certificatefolder)){

        echo "<p class='alert alert-warning'>Certificate uploaded successfully</p>";
    }else{
        echo "<p class='alert alert-info'>Certificate was Not uploaded</p>";
    }


    if ($result_e){
        echo "<p class='alert alert-success'>Records have been Added</p>";
        header("location:unemployment_form.php");
    }else{

        echo "<p class='alert alert-danger'>Error executing query $sql_e</p>".mysqli_error($link);
    }







}
















?>
