
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
<div class="container shadow-lg" id="login">
    <div class="row mb-3">
        <div class="col-7">
            <div class="row mb-3">
                <div class="row m-3">
                    <h3 class="text-center" >Sign In</h3>
                </div>
                <div class="row">
                    <ul class="social_icons">
                        <li><i class="fa fa-google"></i></li>
                        <li><i class="fa fa-facebook"></i></li>
                        <li> <i class="fa fa-linkedin"></i></li>
                    </ul>
                </div>
                <div class="row mb-3">
                    <p class="grey text-center grey">or use your email to sign in</p>
                </div>
                <form action="handle_login.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div>
                            <input class="form-control rounded-pill" type="email" name="emailAddress" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div>
                            <input class="form-control rounded-pill" type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember" value="Yes" name="rememberMe">Remember Me</label>
                        </div>
                        <div class="col-sm-6">
                            <a href="forgotpassword.php" class="forgotpass float-end">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <input type="submit" name="login" class="btn darkblue rounded-pill signinBtn" value="SIGN IN">
                    </div>
                </form>

            </div>

        </div>
        <div class="col-5 darkblue">
            <div class="row m-5">
                <h3 class="text-center text-white">Hello Friend!</h3>
            </div>
            <div class="row mb-3">
                <p class="text-center text-white">Have an account?<br>Sign up and join us in this journey</p>
            </div>
            <div class="row mb-3">
                <a href="registration.php" class="btn btn-outline-light rounded-pill signupBtn">SIGN UP</a>
            </div>
        </div>

    </div>




</div>
</body>
</html>

