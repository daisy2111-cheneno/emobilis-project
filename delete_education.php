<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}

include "config.php";
$sql_1 = "SELECT * FROM users ";
#execute query
$result_1 = mysqli_query($link, $sql_1);

#check

if (isset($_POST["submit"]) and !empty($_POST["id"])){
    $id = $_POST["id"];
    $sql = "DELETE FROM `unemployment` WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if ($result){
        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>Record deleted Successfully</p>";
        echo "<a class='btn btn-primary col-md-4' href='unemployment_form.php'>BACK</a>";
        echo "</div>";
        header("location:unemployment_form.php");

    }else{
        echo "Error executing query $sql" .mysqli_error($link);
    }

}else{



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
                <div class="alert alert-warning">

                    <form action="delete_workexperience.php" method="post">
                        <div class="p-2 text-center">
                            <label class="form-label">Are you sure you want to delete this record?</label> <br>
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                        </div>
                        <div class="p-2 text-center">
                            <input type="submit" name="submit" value="YES" class="btn btn-danger col-md-3">
                            <a href="unemployment_form.php" class="btn btn-primary col-md-3">NO</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

<?php }?>

