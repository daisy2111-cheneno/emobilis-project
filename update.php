<?php

session_start();

// check if user has looged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

    header("location:index.php");
    exit();
}


include "header.php";

include "config.php";



if (isset($_POST["update"])) {

    $id = $_POST["id"];
    $up_fullName = $_POST["fullName"];
    $up_emailAddress = $_POST["emailAddress"];
    $up_dob = $_POST["dob"];
    $up_gender = $_POST["gender"];

    // files
    $photoname =$_FILES["photo"]["name"];
    $tempname=$_FILES["photo"]["tmp_name"];
    $folder= "uploads/".$photoname;

    //cv
    $cvname =$_FILES["cv"]["name"];
    $cvtemp = $_FILES["cv"]["tmp_name"];
    $cvfolder = "uploads/".$cvname;


    $up_sql = "UPDATE `students` SET  `fullName`='$up_fullName',`emailAddress`='$up_emailAddress',`dob`='$up_dob',
                    `gender`='$up_gender',`photo`='$photoname',`cv`='$cvname' WHERE id ='$id'";

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

        $sql = "SELECT * FROM `students` WHERE id=$id";

        $result = mysqli_query($link, $sql);

        if ($result) {

            $data = mysqli_num_rows($result);

            if ($data == 1) {

                $row = mysqli_fetch_array($result);

                $fullName = $row['fullName'];
                $emailAddress= $row['emailAddress'];
                $dob= $row['dob'];
                $gender = $row['gender'];
                $photo = $row['photo'];
                $cv = $row['cv'];


                ?>
                <div class="row m-2">
                    <div class="text-primary h3">Update the Record</div>
                </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Full Name</label>
                                        <input class="form-control" type="text" name="fullName" value="<?php echo $fullName; ?>">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Email Address</label>
                                        <input class="form-control" type="text" name="emailAddress" value="<?php echo $emailAddress; ?>">
                                    </div>

                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Date of Birth</label>
                                        <input class="form-control" type="date" name="dob" value="<?php echo $dob; ?>" >
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Your Photo</label>
                                        <input class="form-control" type="file" name="photo">

                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Your CV</label>
                                        <input class="form-control" type="file" name="cv">

                                    </div>

                                </div>
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" required>
                                </div>

                                <div class="row p-2">
                                    <div class="col-md-12">

                                        <input class="btn btn-primary col-md-4" type="submit" name="update" value="UPDATE">
                                        <a class="btn btn-danger" href="participants.php">BACK</a>

                                    </div>

                                </div>


                            </form>


                        </div>
                    </div>
                </div>
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
