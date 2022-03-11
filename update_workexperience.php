<?php

session_start();

// check if user has looged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

    header("location:index.php");
    exit();
}


include "config.php";

if (isset($_POST["update"])){

    $id = $_SESSION["id"];
    $up_employer = $_POST["employer"];
    $up_jobtitle = $_POST["jobtitle"];
    $up_country = $_POST["country"];
    $up_industry = $_POST["industry"];
    $up_jobtype =$_POST['jobtype'];
    $up_skills = $_POST["skills"];
    $up_jobdescription = $_POST["jobdescription"];
    $up_startdate =$_POST['startDate'];
    $up_enddate =$_POST['endDate'];



    //cv
    $cvname =$_FILES["cv"]["name"];
    $cvtemp = $_FILES["cv"]["tmp_name"];
    $cvfolder = "uploads/".$cvname;



    $up_sql = "UPDATE `work` SET `employer`='$up_employer',`jobtitle`='$up_jobtitle',`country`='$up_country',`industry`='$up_industry',`jobtype`='$up_jobtype',
            `skills`='$up_skills',`jobdescription`='$up_jobdescription',`startDate`='$up_startdate',`endDate`='$up_enddate',`cv`='$cvname', WHERE id ='$id'";

    $up_result=mysqli_query($link,$up_sql);

    if ($up_result){

        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-success'>Records have been updated!</p>";
        echo "<a class='btn btn-primary col-md-4' href='participants.php'>BACK</a>";
        echo "</div>";


    }else{
        echo "Error executing query $up_sql".mysqli_error($link);
    }



} else {

    if (isset($_GET["id"]) and !empty($_GET["id"])) {

        $id = $_GET["id"];

        $sql = "SELECT * FROM `work` WHERE id=$id";

        $result = mysqli_query($link, $sql);

        if ($result) {

            $data = mysqli_num_rows($result);

            if ($data == 1) {

                $row = mysqli_fetch_array($result);

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
            <h3 class="text-primary  h3">Update the Record</h3>
        </div>
        <div class="row m-2">
            <div class="card row m-2">
                <div class="card-body">
                    <div>
                        <a CLASS="btn btn-primary col-md-3" href="unemployment_form.php">BACK</a>
                    </div>
                </div>

            </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="update_workexperience.php" method="post" enctype="multipart/form-data" id="workexperience">
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" required>
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label grey">Employer</label>
                                            <input class="form-control" type="text" name="employer" placeholder="Employer" value="<?php echo $employer; ?>">
                                            <label class="form-label grey">Job Title</label>
                                            <input class="form-control" type="text" name="jobtitle" placeholder="Job Title" value="<?php echo $jobtitle; ?>">
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
                                        <input class="form-control" type="date" name="startDate" id="start_date" value="<?php echo $startDate; ?>">
                                        <label class="form-label grey" for="end_date">End Date</label>
                                        <input class="form-control" type="date" name="endDate" id="end_date" value="<?php echo $endDate; ?>">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <label for="skills" class="form-label grey">Skills</label>
                                        <select name="skills" id="skills">
                                            <option value="<?php echo $skills;?>">Select Skill</option>
                                            <option value="Javascript">Javascript</option>
                                            <option value="Python">Python</option>
                                            <option value="PHP">PHP</option>
                                            <option value="Databases">Databases</option>
                                            <option value="Perl">Perl</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="exampleFormControlTextarea1" class="form-label">Job Description:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $jobdescription; ?>"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey" for="cv">CV</label>
                                        <input class="form-control" type="file" name="cv" id="cv">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" value=" <?php echo "<a class='btn btn-primary col-md-4' href='unemployment_form.php'>BACK</a>";?>">Close</button>
                                    <input type="submit" name="update" class="col-6 btn btn-outline-primary" value="SUBMIT">
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
    </div>
</div>
</body>
                </html>
                <?php

            } else {
                echo "No record was found";
            }


        } else {
            echo "error executing query $sql" . mysqli_error($link);
        }


    } else {
        echo "id value not picked";
    }


}


?>

