<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "config.php";



if (isset($_SESSION["id"]) and !empty($_SESSION["id"])){

    $id=$_SESSION['id'];

    $sql_w = "SELECT * FROM `personal information` WHERE id =$id";

    $result_w = mysqli_query($link, $sql_w);

    if ($result_w){

        $data_w = mysqli_num_rows($result_w);

        if ($data_w==1){

            $row = mysqli_fetch_array($result_w);

            $lastname = $row["lastname"];
            $firstname = $row["firstname"];
            $middlename=$row['middlename'];
            $othernames=$row['othernames'];
            $dob=$row['dob'];
            $age =$row['age'];
            $emailAddress=$row['emailAddress'];
            $phoneNumber=$row['phoneNumber'];
            $nationalid =$row['nationalid'];
            $helbid =$row['helbid'];
            $krapin =$row['krapin'];
            $county =$row['county'];
            $subcounty =$row['subcounty'];
            $gender=$row['gender'];



            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>PROFILE</title>
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
                            <li><a href="unemployment_form.php">Home</a></li>
                            <li><a class="active" href="profile.php">Profile</a></li>
                            <li><a href="contact_us.php">Contact Us</a></li>
                            <li><a href="reset_password.php">Reset Password</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <h2 class="m-4">Profile Summary</h2>
                    <div class="row body disabled">
                        <form action="profile.php">
                            <div class="row m-2">
                                <div class="col">
                                    <label for="lastname">Last Name:<span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" >
                                </div>
                                <div class="col">
                                    <label for="firstname">First Name:<span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="text" name="firstname" id="firstname"  value="<?php echo $firstname; ?>">
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col">
                                    <label for="middlename">Middle Name:<span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="text" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $middlename; ?>">
                                </div>
                                <div class="col">
                                    <label for="othernames">Other Names:</label>
                                    <input class="inputstyle form-control" type="text" name="othernames" id="othernames" placeholder="Other Names" value="<?php echo $othernames; ?>">
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col">
                                    <label for="dob">Date of Birth:<span class="required">*</span></label>
                                    <input class="inputstyle form-control" name="dob" id="dob" value="<?php echo $dob; ?>" >
                                </div>
                                <div class="col">
                                    <label for="age">Age:</label>
                                    <input class="inputstyle form-control" type="text" name="age" id="age" value="<?php echo $age; ?>">
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col">
                                    <label for="emailAddress">Email Address: <span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="email" name="emailAddress" id="emailAddress" value="<?php echo $emailAddress; ?>">
                                </div>
                                <div class="col">
                                    <label for="phoneNumber">Phone Number: <span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $phoneNumber; ?>">
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col">
                                    <label for="nationalid">National ID<span class="required">*</span></label>
                                    <input class="inputstyle form-control" type="text" name="nationalid" id="id" value="<?php echo $nationalid; ?>">
                                </div>
                                <div class="col">
                                    <label for="helbid">HELB ID</label>
                                    <input class="inputstyle form-control" type="text" name="helbid" id="helbid" value="<?php echo $helbid; ?>">
                                </div>
                                <div class="col">
                                    <label for="krapin">KRA PIN</label>
                                    <input class="inputstyle form-control" type="text" name="krapin" id="krapin" value="<?php echo $krapin; ?>">
                                </div>
                            </div>
                            <div class="row m-2">
                                <div class="col">
                                    <label for="county">County:<span class="required">*</span></label>
                                    <input class="inputstyle form-control" name="county" id="countyId" value="<?php echo $county; ?>" >
                                </div>

                                <div class="col">
                                    <label for="subcounty">Sub-county<span class="">*</span></label>
                                    <input class="inputstyle form-control" name="subcounty" id="sub-countyId" value="<?php echo $subcounty; ?>">
                                </div>


                            </div>

                            <div class="row m-2 gender">
                                <div class="col-md-4">
                                    <label>Gender:<span class="required p-2">*</span></label>
                                    <input class="inputstyle form-control" name="gender"  class="p-2" value="<?php echo $gender; ?>">
                                </div>

                            </div>
                        </form>
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
        echo "Error executing query $sql_w".mysqli_error($link);
    }


}else{
    echo "id value not picked";


}
?>
