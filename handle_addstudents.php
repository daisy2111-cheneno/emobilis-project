<?php

include "header.php";
include "config.php";

if (isset($_POST["submit"])){

    $fullName = $_POST["fullName"];
    $emailAddress = $_POST["emailAddress"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];

    // files
    $photoname =$_FILES["photo"]["name"];
    $tempname=$_FILES["photo"]["tmp_name"];
    $folder= "uploads/".$photoname;

    //cv
    $cvname =$_FILES["cv"]["name"];
    $cvtemp = $_FILES["cv"]["tmp_name"];
    $cvfolder = "uploads/".$cvname;


    // insert
    $sql = "INSERT INTO `students` ( `fullName`, `emailAddress`, `dob`, `gender`, `photo`, `cv`)
      VALUES ('$fullName','$emailAddress','$dob','$gender','$photoname','$cvname')";


    $result = mysqli_query($link,$sql);

    // photo
    if (move_uploaded_file($tempname,$folder)){

        echo "<p class='alert alert-info'>Photo uploaded successfully</p>";
    }else{
        echo "<p class='alert alert-info'>Photo Not uploaded</p>";
    }

    // cv
    if (move_uploaded_file($cvtemp,$cvfolder)){

        echo "<p class='alert alert-warning'>CV uploaded successfully</p>";
    }else{
        echo "<p class='alert alert-info'>CV was Not uploaded</p>";
    }


    if ($result){
        echo "<p class='alert alert-success'>Records have been Added</p>";
    }else{

        echo "<p class='alert alert-danger'>Error executing query $sql</p>".mysqli_error($link);
    }







}
















?>
