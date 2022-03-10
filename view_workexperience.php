<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";


if (isset($_POST["submit"]) and !empty($_SESSION["id"])){

    $id = $_SESSION["id"];

    $sql = "SELECT * FROM `work` WHERE id =$id";

    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);

        if ($data==1){

            $row = mysqli_fetch_array($result);

            $employer = $_POST["employer"];
            $jobtitle = $_POST["jobtitle"];
            $startdate =$_POST['startDate'];
            $enddate =$_POST['endDate'];
            $cv =$row['cv'];


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="row float-end">
            <ul id="navbar" class="p-3">
                <li><a class="active" href="unemployment_form.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="reset_password.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
            <div class="row m-2">

                <div class="text-primary h3">VIEW RECORDS</div>

            </div>

            <div class="row m-2">
                <div class="card row m-2">
                    <div class="card-body">
                        <div>
                            <a CLASS="btn btn-danger col-md-8" href="unemployment_form.php">BACK</a>
                        </div>
                    </div>

                </div>
                <div class="card row m-2 bg-primary">
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <label class="form-label">Are you sure you want to delete this record?</label> <br>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label h6">EMPLOYER</label>
                            <p class="text-warning"><?php echo $employer; ?></p>
                        </div>
                        <hr>
                        <div class="col">
                            <label class="form-label h6">JOB TITLE</label>
                            <p class="text-warning"><?php echo $jobtitle; ?></p>
                        </div>
                        <hr>
                        <div class="col">
                            <label class="form-label h6">START DATE</label>
                            <p class="text-warning"><?php echo $startdate; ?></p>
                        </div>
                        <div class="col">
                            <label class="form-label h6">END DATE</label>
                            <p class="text-warning"><?php echo $enddate; ?></p>
                        </div>
                        <hr>


                    </div>

                </div>
            </div>
    </div>
</div>
</body>
            </html>
            <?php

        }else{
            echo "No record was found";
        }


    }else{
        echo "Error executing query $sql".mysqli_error($link);
    }


}else{
    echo "id value not picked";


}
?>
