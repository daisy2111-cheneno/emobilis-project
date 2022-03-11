<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";
$sql= "SELECT * FROM users ";
#execute query
$result = mysqli_query($link, $sql);

#check
if ($result) {
    $data= mysqli_num_rows($result);
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

if (isset($_SESSION["id"]) and !empty($_SESSION["id"])){

    $id = $_SESSION["id"];

    $sql_w = "SELECT * FROM `work` WHERE id =$id";

    $result_w = mysqli_query($link, $sql_w);

    if ($result_w){

        $data_w = mysqli_num_rows($result_w);

        if ($data_w==1){

            $row = mysqli_fetch_array($result_w);

            $employer = $row["employer"];
            $jobtitle = $row["jobtitle"];
            $country=$row['country'];
            $industry=$row['industry'];
            $jobtype=$row['jobtype'];
            $startDate=$row['startDate'];
            $endDate =$row['endDate'];
            $skills=$row['skills'];
            $jobdescription=$row['jobdescription'];
            $cv =$row['cv'];

            $filepath = "uploads/$cv";


            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>VIEW WORK EXPERIENCE</title>
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
                                    <a CLASS="btn btn-primary col-md-3" href="unemployment_form.php">BACK</a>
                                </div>
                            </div>

                        </div>
                        <div class="modal-body">
                            <div class="row disabled" id="workexperience">
                                <div class="row">
                                    <div>
                                        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label grey">Employer</label>
                                            <input class="form-control" type="text" name="employer" value="<?php echo $employer; ?>">
                                            <label class="form-label grey">Job Title</label>
                                            <input class="form-control" type="text" name="jobtitle" value="<?php echo $jobtitle; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey" for="country">Country</label>
                                        <input class="form-control" type="text" name="country" id="country" value="<?php echo $country; ?>">
                                        <label class="form-label grey" for="industry">Industry</label>
                                        <input class="form-control" type="text" name="industry" id="industry" value="<?php echo $industry; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey" for="jobtype">Job Type</label>
                                        <input class="form-control" type="text" name="jobtype" id="jobtype" placeholder="contact, permanent" value="<?php echo $jobtype; ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey" for="start_date">Start Date</label>
                                        <input class="form-control" name="startDate" id="start_date" value="<?php echo $startDate; ?>">
                                        <label class="form-label grey" for="end_date">End Date</label>
                                        <input class="form-control" name="endDate" id="end_date" value="<?php echo $endDate; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="skills" class="form-label">Skills</label>
                                        <input class="form-control" name="skills" id="skills" value="<?php echo $skills; ?>">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="exampleFormControlTextarea1" class="form-label">Job Description:</label>
                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="jobdescription" value="<?php echo $jobdescription; ?>">
                                </div>

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
