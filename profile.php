<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

include "config.php";


$sql = "SELECT * FROM users ";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data = mysqli_num_rows($result);
#is there data here?
    if ($data > 0) {


        while ($row = mysqli_fetch_array($result)) {
            $id=$row['id'];
            $lastname = $row['lastname'];
            $firstname = $row['firstname'];
            $emailAddress = $row['emailAddress'];

        }
    }
}


if (isset($_GET["id"]) and !empty($_GET["id"])){

    $id = $_GET["id"];

    $sql = "SELECT * FROM `students` WHERE id =$id";

    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);

        if ($data==1){

            $row = mysqli_fetch_array($result);

            $fullName = $row['fullName'];
            $emailAddress = $row['emailAddress'];
            $dob = $row['dob'];
            $gender = $row['gender'];
            $photo =$row['photo'];
            $cv =$row['cv'];

            $filepath = "uploads/$photo";


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
</head>
<body>
<div class="container">
    <div class="row">
        <div class="row float-end">
            <ul id="navbar" class="p-3">
                <li><a href="unemployment_form.php">Home</a></li>
                <li><a class="active" href="profile.php">Profile</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="reset_password.php">Reset Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="row m-2">

                <div class="text-primary h3">VIEW RECORDS</div>

            </div>

            <div class="row m-2">
                <div class="card col-md-3 m-2">
                    <div class="card-body">
                        <img src="<?php echo $filepath?>" alt="loading" height="150" width="150" class="rounded-pill">
                        <div>
                            <a CLASS="btn btn-danger col-md-8" href="participants.php">BACK</a>
                        </div>
                    </div>

                </div>
                <div class="card col-md-6 m-2 bg-primary">
                    <div class="card-body">

                        <div>
                            <label class="form-label h6">FULL NAME</label>
                            <p class="text-warning"><?php echo $fullName; ?></p>
                        </div>
                        <hr>
                        <div>
                            <label class="form-label h6">GENDER</label>
                            <p class="text-warning"><?php echo $gender; ?></p>
                        </div>
                        <hr>
                        <div>
                            <label class="form-label h6">EMAIL ADDRESS</label>
                            <p class="text-warning"><?php echo $emailAddress; ?></p>
                        </div>
                        <div>
                            <label class="form-label h6">DATE OF BIRTH</label>
                            <p class="text-warning"><?php echo $dob; ?></p>
                        </div>
                        <hr>


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



