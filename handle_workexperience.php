<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";



if (isset($_POST["work"])){


    $id=$_SESSION['id'];
    $employer = $_POST["employer"];
    $jobtitle = $_POST["jobtitle"];
    $country = $_POST["country"];
    $industry = $_POST["industry"];
    $jobtype =$_POST['jobtype'];
    $skills = $_POST["skills"];
    $jobdescription=$_POST['jobdescription'];
    $startDate =$_POST['startDate'];
    $endDate =$_POST['endDate'];



    //cv
    $cvname =$_FILES["cv"]["name"];
    $cvtemp = $_FILES["cv"]["tmp_name"];
    $cvfolder = "uploads/".$cvname;



    // insert
    $sql_w = "INSERT INTO `work`( `employer`, `jobtitle`, `country`, `industry`, `jobtype`, `skills`, `jobdescription`, `startDate`, `endDate`, `cv`)
              VALUES ('$employer','$jobtitle','$country','$industry','$jobtype','$skills','$jobdescription','$startDate','$endDate','$cvname')";


    $result_w = mysqli_query($link,$sql_w);

    // cv
    if (move_uploaded_file($cvtemp,$cvfolder)){

        echo "<p class='alert alert-warning'>CV uploaded successfully</p>";
    }else{
        echo "<p class='alert alert-info'>CV was Not uploaded</p>";
    }


    if ($result_w){
        echo "<p class='alert alert-success'>Records have been Added</p>";
        header("location:unemployment_form.php");
    }else{

        echo "<p class='alert alert-danger'>Error executing query $sql_w</p>".mysqli_error($link);
    }







}
















?>
