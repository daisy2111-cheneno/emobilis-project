<?php
session_start();

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

include "config.php";
include_once "common.php";
$common = new Common();
$allCounties = $common->getCounties($link);


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
        <h4>Welcome, <strong><?php echo $firstname; ?></strong></h4>
        <h2 class="m-4">UNEMPLOYMENT FORM</h2>
        <div class="row body">
            <form action="handle_personalinformation.php" method="post" enctype="multipart/form-data" class="main mt-3">
                <h4 class="text-center m-4 ">PERSONAL INFORMATION</h4>
                <div class="row m-2">
                    <div class="col">
                        <label for="lastname">Last Name:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="lastname" id="lastname"placeholder="<?php echo $lastname; ?>" >
                    </div>
                    <div class="col">
                        <label for="firstname">First Name:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="firstname" id="firstname"  placeholder="<?php echo $firstname; ?>">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col">
                        <label for="middlename">Middle Name:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="middlename" id="middlename" placeholder="Middle Name">
                    </div>
                    <div class="col">
                        <label for="othernames">Other Names:</label>
                        <input class="inputstyle form-control" type="text" name="othernames" id="othernames" placeholder="Other Names">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col">
                        <label for="dob">Date of Birth:<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="date" name="dob" id="dob"  >
                    </div>
                    <div class="col">
                        <label for="age">Age:</label>
                        <input class="inputstyle form-control" type="text" name="age" id="age">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col">
                        <label for="emailAddress">Email Address: <span class="required">*</span></label>
                        <input class="inputstyle form-control" type="email" name="emailAddress" id="emailAddress" placeholder="<?php echo $emailAddress; ?>">
                    </div>
                    <div class="col">
                        <label for="phoneNumber">Phone Number: <span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="phoneNumber" id="phoneNumber" placeholder="0700 000 000">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col">
                        <label for="nationalid">National ID<span class="required">*</span></label>
                        <input class="inputstyle form-control" type="text" name="nationalid" id="id" placeholder="12345678">
                    </div>
                    <div class="col">
                        <label for="helbid">HELB ID</label>
                        <input class="inputstyle form-control" type="text" name="helbid" id="helbid">
                    </div>
                    <div class="col">
                        <label for="krapin">KRA PIN</label>
                        <input class="inputstyle form-control" type="text" name="krapin" id="krapin">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col">
                        <label for="county">County:<span class="required">*</span></label>
                        <select class="inputstyle form-control" name="county" id="countyId" onchange="getStatesByCounty();"; >
                            <option>County</option>
                            <?php
                            if ($allCounties->num_rows > 0 ){
                                while ($county = $allCounties->fetch_object() ) {
                                    $countyId = $county->code;
                                    $countyName = $county->name; ?>
                                    <option value="<?php echo $countyId;?>"><?php echo $countyName;?></option>
                                <?php }
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col">
                        <label for="sub-county">Sub-county<span class="">*</span></label>
                        <select class="inputstyle form-control" name="sub-county" id="sub-countyId">
                            <option>Sub-County</option>
                        </select>
                        <script>
                            function getStatesByCounty() {
                                var countyId = $("#countyId").val();
                                $.post("ajax.php",{getStatesByCounty:'getStatesByCounty',countyId:countyId},function (response) {
                                    // alert(response);
                                    var data = response.split('^');
                                    var sub_countyData = data[1];
                                    $("#sub-countyId").html(sub_countyData);
                                });
                            }
                        </script>

                    </div>


                </div>

                <div class="m-3 p-2 gender">
                    <label>Gender:<span class="required p-2">*</span></label>
                    <input type="radio" name="gender" value="male" class="p-2">
                    <label  class="p-2">Male</label>
                    <input  class="p-2" type="radio" name="gender" value="female">
                    <label  class="p-2">Female</label>
                    <input  class="p-2" type="radio" name="gender" value="other">
                    <label  class="p-2">Other</label>
                </div>
                <div class="row">
                    <input type="submit" name="submit" class="bg bg-primary text-white border-0 rounded-1 mb-4 col-md-2" style="height: 37px; transform: translate(507%,0%);" value="Submit">
                </div>



                <h4 class="m-4 text-center">EDUCATION BACKGROUND</h4>
                <!-- Button trigger modal -->
            <div>
                <button type="button" class="btn btn-primary float-end mb-4 col-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Qualifications
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Educational Background</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="handle_educationbackground.php" method="post" enctype="multipart/form-data" class="education">
                                    <div class="row p-2">
                                        <div class="col-md-12">
                                            <label class="form-label grey" for="institution">Institution:</label>
                                            <input class="form-control" type="text" name="institution" id="institution" placeholder="Employer">
                                            <label class="form-label grey" for="qualification">Qualification:</label>
                                            <input class="form-control" type="text" name="qualification" id="qualification" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-12">
                                            <label class="form-label grey" for="startdate">Start Date:</label>
                                            <input class="form-control grey" type="date" name="datestarted" id="startdate" placeholder="Employer">
                                            <label class="form-label grey" for="enddate">End Date:</label>
                                            <input class="form-control grey" type="date" name="dateended" id="enddate" placeholder="Job Title">
                                        </div>
                                    </div>
                                    <div class="row p-2">
                                        <div class="col-md-12">
                                            <label class="form-label grey" for="certificate">Certificate</label>
                                            <input class="form-control" type="file" name="certificate" id="certificate">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" name="education" class="col-6 btn btn-outline-primary" value="SUBMIT">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
                <?php
                include "config.php";

                $sql = "SELECT * FROM `education` ";

                $result = mysqli_query($link,$sql);

                if ($result){

                    $data = mysqli_num_rows($result);

                    if ($data>0){

                        echo "<table class='table table-striped table-hover'>";
                        echo "<tr>";
                        echo "<th>Institution</th>";
                        echo "<th>Qualification</th>";
                        echo "<th>Start Date</th>";
                        echo "<th>End Date</th>";
                        echo "<th>Certificate</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        while ($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['institution']."</td>" ;
                            echo "<td>".$row['qualification']."</td>" ;
                            echo "<td>".$row['datestarted']."</td>" ;
                            echo "<td>".$row['dateended']."</td>" ;
                            echo "<td>".$row['certificate']."</td>" ;
                            echo " <td>
                   
                    <a class='m-2' href='delete_workexperience.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                    <a class='m-2' href='update_workexperience.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                    <a class='m-2' href='view_workexperience.php?id=".$row['id']."'><span class='fa fa-eye'></span></a>

                    </td>";

                            echo "</tr>";



                        }


                        echo "</table>";












                    }else{
                        echo "<p class='alert alert-primary'>No Record was found in the database</p>";
                    }



                }else{
                    echo "Error executing query $sql".mysqli_error($link);
                }







                ?>





                <h4 class="m-4 text-center">WORK EXPERIENCE</h4>
                <div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end mb-4 col-md-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        Add Experience
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Work Experience</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="handle_workexperience.php" method="post" enctype="multipart/form-data" id="workexperience">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="form-label grey">Employer</label>
                                                    <input class="form-control" type="text" name="employer" placeholder="Employer">
                                                    <label class="form-label grey">Job Title</label>
                                                    <input class="form-control" type="text" name="jobtitle" placeholder="Job Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey" for="country">Country</label>
                                                <input class="form-control" type="text" name="country" id="country">
                                                <label class="form-label grey" for="industry">Industry</label>
                                                <input class="form-control" type="text" name="industry" id="industry">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey" for="jobtype">Job Type</label>
                                                <input class="form-control" type="text" name="jobtype" id="jobtype" placeholder="contact, permanent">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey" for="start_date">Start Date</label>
                                                <input class="form-control" type="date" name="startDate" id="start_date">
                                                <label class="form-label grey" for="end_date">End Date</label>
                                                <input class="form-control" type="date" name="endDate" id="end_date">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <label for="skills" class="form-label">Skills</label>
                                                <select class="form-label" name="skills" id="skills">
                                                    <option>Select Skill</option>
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
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="jobdescription"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey" for="cv">CV</label>
                                                <input class="form-control" type="file" name="cv" id="cv">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="work" class="col-6 btn btn-outline-primary" value="SUBMIT">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
                <?php
                include "config.php";

                $sql = "SELECT * FROM `work`";

                $result = mysqli_query($link,$sql);

                if ($result){

                    $data = mysqli_num_rows($result);

                    if ($data>0){

                        echo "<table class='table table-striped table-hover'>";
                        echo "<tr>";
                        echo "<th>Employer</th>";
                        echo "<th>Job Title</th>";
                        echo "<th>Industry</th>";
                        echo "<th>Skills</th>";
                        echo "<th>Start Date</th>";
                        echo "<th>End Date</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        while ($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['employer']."</td>" ;
                            echo "<td>".$row['jobtitle']."</td>" ;
                            echo "<td>".$row['industry']."</td>" ;
                            echo "<td>".$row['skills']."</td>" ;
                            echo "<td>".$row['startDate']."</td>" ;
                            echo "<td>".$row['endDate']."</td>" ;
                            echo " <td>
                   
                    <a class='m-2' href='delete_workexperience.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                    <a class='m-2' href='update_workexperience.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                    <a class='m-2' href='view_workexperience.php?id=".$row['id']."'><span class='fa fa-eye'></span></a>

                    </td>";

                            echo "</tr>";



                        }


                        echo "</table>";




                    }else{
                        echo "<p class='alert alert-primary'>No Record was found in the database</p>";
                    }



                }else{
                    echo "Error executing query $sql".mysqli_error($link);
                }







                ?>


        </div>
</div>

<footer class="m-3">Copyright &copy; 2022 by The Ministry of Labour and Social Protection. all rights reserved.</footer>
</body>
</html>