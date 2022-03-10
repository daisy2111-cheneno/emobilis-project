<?php

session_start();

// check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true ){

    header("location:index.php");
    exit();
}

include "header.php";

?>

<div class="row m-2 p-2 ">

    <div class="col-4 ">
        <p class="h3 grey"> Participants</p>
    </div>

    <div class="col-8">

        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Student
        </button>
        <a href="getreport.php" class="m-1 btn btn-danger float-end">Get Report</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-center modal-title" id="exampleModalLabel">ADD  STUDENT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="handle_addstudents.php" method="post" enctype="multipart/form-data">
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Full Name</label>
                                    <input class="form-control" type="text" name="fullName" placeholder="">
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Email Address</label>
                                    <input class="form-control" type="text" name="emailAddress">
                                </div>

                            </div>
                            <div class="row p-2">
                                <div class="col-md-12">
                                    <label class="form-label grey">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" >
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



                            </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="submit" class="col-6 btn btn-outline-danger" value="SUBMIT">
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>

<div class="row m-2 p-2">
    <?php
    include "config.php";

    $sql = "SELECT * FROM `students`";

    $result = mysqli_query($link,$sql);

    if ($result){

        $data = mysqli_num_rows($result);

        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Full Name</th>";
            echo "<th>Email Address</th>";
            echo "<th>DoB</th>";
            echo "<th>Gender</th>";
            echo "<th>Actions</th>";
            echo "</tr>";
            while ($row=mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>" ;
                echo "<td>".$row['fullName']."</td>" ;
                echo "<td>".$row['emailAddress']."</td>" ;
                echo "<td>".$row['dob']."</td>" ;
                echo "<td>".$row['gender']."</td>" ;
                echo " <td>
                   
                    <a class='m-2' href='delete.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                    <a class='m-2' href='update.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                    <a class='m-2' href='view.php?id=".$row['id']."'><span class='fa fa-eye'></span></a>

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
