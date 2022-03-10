<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/unemployment_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container shadow" id="register">
    <div class="row">

        <div class="col-5 darkblue">
            <div class="row m-5 p-2">
                <h3 class="text-center text-white">Welcome Back!</h3>
            </div>
            <div class="row">
                <p class="text-center text-white">Have an account?<br>Sign in with your personal information</p>
            </div>
            <div class="row mt-4">
                <a href="index.php" class="btn btn-outline-light rounded-pill signinBtn">SIGN IN</a>
            </div>
        </div>

        <div class="col-7">
            <div class="row mb-3">
                <div class="row m-3">
                    <h3 class="text-center">Create an account</h3>
                </div>
                <form action="handle_registration.php" method="post" enctype="multipart/form-data">
                        <ul class="social_icons" id="register_icons">
                            <li><i class="fa fa-google"></i></li>
                            <li><i class="fa fa-facebook"></i></li>
                            <li> <i class="fa fa-linkedin"></i></li>
                        </ul>

                    <div class="row mb-3">
                        <p class="grey text-center grey">or use your email for registration</p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <input class="form-control rounded-pill" type="text" name="firstName" placeholder="First Name" required>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control rounded-pill" type="text" name="lastName" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div>
                            <input class="form-control rounded-pill" type="email" name="emailAddress" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <input class="form-control rounded-pill" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control rounded-pill" type="password" name="confirmPassword" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" value="nuser" name="usertype">
                    </div>

                    <div class="row m-3">
                        <input type="submit" class="btn darkblue rounded-pill signupBtn" name="signup" value="SIGN UP">
                    </div>

        </div>
    </div>
</div>

</body>
</html>

