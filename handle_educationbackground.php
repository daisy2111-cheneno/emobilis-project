<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

$sql_1 = "SELECT * FROM users ";
#execute query
$result_1 = mysqli_query($link, $sql_1);

#check
if ($result_1) {
    $data_1 = mysqli_num_rows($result_1);
#is there data here?
    if ($data_1 > 0) {


        while ($row = mysqli_fetch_array($result_1)) {
            $id=$row['id'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $emailAddress = $row['emailAddress'];

        }
    }
}

if (isset($_POST["education"])){

    $emailAddress=$_SESSION['emailAddress'];
    $institution = $_POST["institution"];
    $qualification = $_POST["qualification"];
    $startdate = $_POST["datestarted"];
    $enddate = $_POST["dateended"];


    //certificate
    $certificatename =$_FILES["certificate"]["name"];
    $certificatetemp = $_FILES["certificate"]["tmp_name"];
    $certificatefolder = "uploads/".$certificatename;



    // insert
    $sql = "INSERT INTO `education` ( `institution`, `qualification`, `startdate`, `enddate`, `certificate`) 
               VALUES ('$institution','$qualification','$startdate','$enddate','$certificatename')";


    $result = mysqli_query($link,$sql);

    // cv
    if (move_uploaded_file($certificatetemp,$certificatefolder)){

        echo "<p class='alert alert-warning'>CV uploaded successfully</p>";
    }else{
        echo "<p class='alert alert-info'>CV was Not uploaded</p>";
    }


    if ($result){
        echo "<p class='alert alert-success'>Records have been Added</p>";
        header("location:unemployment_form.php");
    }else{

        echo "<p class='alert alert-danger'>Error executing query $sql</p>".mysqli_error($link);
    }







}
















?>























