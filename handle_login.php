<?php

session_start();
include "config.php";

if (isset($_POST['login'])){

    $userEmail = $_POST["emailAddress"];
    $userPassword = $_POST["password"];


    //compare

    $sql = "SELECT * FROM `users` WHERE emailAddress ='$userEmail'" ;
    $result = mysqli_query($link, $sql);

    if ($result){
        $data = mysqli_num_rows($result);

        if ($data==1){

            while ($row=mysqli_fetch_array($result)){
                $id = $row['id'];
                $emailAddress = $row["emailAddress"];
                $password =$row["password"];


                //verify password
                if (password_verify($userPassword,$password)) {

                    if($row['usertype']=='nuser'){


                        $_SESSION["loggedin"]=true;
                        $_SESSION["id"]=$id;
                        $_SESSION["username"]=$firstName;
                        $_SESSION['usertype']=$user_type;

                        header("location:unemployment_form.php");

                    }elseif($row['usertype']=='admin'){


                        $_SESSION["loggedin"]=true;
                        $_SESSION["id"]=$id;
                        $_SESSION["username"]=$firstName;
                        $_SESSION['usertype']=$user_type;

                        header("location:admin.php");

                    }else{

                        echo "<p class='alert alert-info'>Please ask admin to assign you a user type.</p>";
                    }




                    header("location:unemployment_form.php?id=".$row['id']." ");


                }else{
                    echo "Passwords are not matching";
                }
            }

        }else{
            echo "The email address does not exist";
        }
    }

}


