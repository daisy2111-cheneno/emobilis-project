<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";

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

if (isset($_POST["work"])){


    $id=$_SESSION['id'];
    $employer = $_POST["employer"];
    $jobtitle = $_POST["jobtitle"];
    $country = $_POST["country"];
    $industry = $_POST["industry"];
    $jobtype =$_POST['jobtype'];
    $skills = $_POST["skills"];
    $startdate =$_POST['startDate'];
    $enddate =$_POST['endDate'];



    //cv
    $cvname =$_FILES["cv"]["name"];
    $cvtemp = $_FILES["cv"]["tmp_name"];
    $cvfolder = "uploads/".$cvname;



    // insert
    $sql = "INSERT INTO `unemployment` ( `employer`, `jobtitle`, `country`, `industry`, `jobtype`, `skills`, `startdate`, `enddate`, `cv`) 
            VALUES ('$employer','$jobtitle','$country','$industry','$jobtype','$skills','$startdate','$enddate','$cvname')";


    $result = mysqli_query($link,$sql);

    // cv
    if (move_uploaded_file($cvtemp,$cvfolder)){

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
