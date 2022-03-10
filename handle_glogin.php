<?php

include "google-api/vendor/autoload.php";


$gClient= new Google_Client();

$gClient->setClientId("225491971808-r9u1knmp7u4o17mu0npsedekc3r612vp.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Chromium Login");
$gClient->setRedirectUri("https://localhost/emobilisproject/unemployment_form.php");
$gClient ->addScope("https://www.googleapis.com/auth/plus.login  https://www.googleapis.com/auth/userinfo.email");

$login_url= $gClient->createAuthUrl();

session_start();

if (isset($_GET["code"])){


    //exchange the valid authentication token
    $token =$gClient->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])){

        $gClient->setAccessToken($token['access_token']);

        #stored the token in a session
        $_SESSION['access_token']=$token['access_token'];

        #got users data from Google services
        $gServices = new Google_Service_Oauth2($gClient);

        $data = $gServices->userinfo->get();

        if (!empty($data['given_name'])){
            $firstName=$data['given_name'];
            $_SESSION['firstName']=$firstName;

        }
        if (!empty($data['family_name'])){
            $lastName=$data['family_name'];
            $_SESSION['lastName']=$lastName;
        }
        if (!empty($data['email'])){
            $email=$data['email'];
            $_SESSION['email']=$email;
        }

        if (!empty($data['gender'])){
            $gender=$data['gender'];
            $_SESSION['gender']=$gender;
        }
        if (!empty($data['picture'])){
            $picture=$data['picture'];
            $_SESSION['picture']=$picture;
        }

        $_SESSION["loggedin"]=true;
        $_SESSION["username"]=$firstName;



    }


}