<?php

include "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashstyles.css">
    <link rel="stylesheet" href="css/dashstyles2.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">

        <div class="col-3 darkblue">
            <ul class="nav flex-column">
                <li class="nav-item stylenav">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="fa fa-chrome fa-3x text-white"></i>
                        <span class="text-white">MOL ADMIN</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <div class="nav-link active" aria-current="page" href="#">
                        <i class="fa fa-dashboard fa-lg text-white"></i>
                        <span class="dropdown dropdown-toggle text-white">Dashboard
                            <div class="dropdown-content">
                                <a href="dashboard.php#m_earn">User count</a>
                                <a href="dashboard.php#to_do">Gender count</a>
                                <a href="dashboard.php#requests">HELB debt count</a>
                            </div>
                    </span>
                    </div>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="participants.php">
                        <i class="fa fa-users fa-lg text-white"></i>
                        <span class="text-white">Users</span>
                    </a>

                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="#">
                        <i class="fa fa-info-circle fa-lg text-white"></i>
                        <span class="text-white">Personal Information</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link">
                        <i class="fa fa-graduation-cap fa-lg text-white"></i>
                        <span class="text-white">Education</span>
                    </a>
                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link">
                        <i class="fa fa-history fa-lg text-white"></i>
                        <span class="text-white">Work Experience</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="reset.php">
                        <i class="fa fa-key fa-lg text-white"></i>
                        <span class="text-white">Reset Password</span>
                    </a>

                </li>
                <li class="nav-item stylenav">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-mail-forward fa-lg text-white"></i>
                        <span class="text-white">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-9 bg-light">
            <div class="row bg-white">
                <div class="col-7">
                    <nav class="navbar navbar-light">
                        <div class="container-fluid">
                            <form class="d-flex">
                                <input class="col-8 form-control me-2" type="search" placeholder="Search for ..." aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </nav>

                </div>
                <div class="col-5">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-bell fa-lg"></i>
                                            <span class="badge rounded-pill bg-danger">3+</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="fa fa-envelope fa-lg"></i>
                                            <span class="badge rounded-pill bg-danger">8+</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            John Doe |
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">
                                            <img src="images/female.svg" alt="" width="50" height="50">
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>

            </div>
            <div class="row m-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body border-left-primary">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-primary" id="m_earn">MONTHLY EARNINGS</div>
                                    <div class="grey">$20,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-calendar-o fa-2x grey"></i>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body border-left-success">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-success" id="to_do">TO DO LIST</div>
                                    <div class="grey">5 items</div>
                                </div>
                                <div class="col">
                                    <div class="progress">
                                        <div class="progress-bar w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div>


                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-reorder fa-2x grey"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body border-left-warning">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="text-warning" id="requests">REQUESTS</div>
                                    <div class="grey">Over 50</div>
                                </div>
                                <div class="col">
                                    <div class="spinner-border text-warning" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <i class="fa fa-comments fa-2x grey"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header text-primary bg-white">Monthly Projections</div>
                            <div class="card-body">
                                <img src="images/chart1.jpeg" alt="loading" width="500" height="250">
                            </div>
                        </div>

                    </div>
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header text-primary bg-white">Quarterly Details</div>
                            <div class="card-body">
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                QUARTER ONE #1
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body">
                                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                QUARTER TWO #2
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                QUARTER THREE #3
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                            <div class="accordion-body">
                                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row m-2">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header text-primary bg-white">Project</div>
                            <div class="card-body">
                                <div class="m-2 p-2">
                                    <span>Database Creation</span>
                                    <div class="progress grey">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                </div>
                                <div class="m-2 p-2">
                                    <span>Server Installation</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    </div>
                                </div>
                                <div class="m-2 p-2">
                                    <span>Boostrap Dashboards</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                    </div>
                                </div>
                                <div class="m-2 p-2">
                                    <span>Account Setup</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header text-primary bg-white">Fixing Bugs</div>
                            <div class="card-body">
                                <a href="https://undraw.co/search">
                                    <img src="images/debug.svg" alt="" width="300" height="265">
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-3">
                        <div class="alert alert-primary" role="alert">
                            A simple primary alert—check it out!
                        </div>
                        <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>
                        <div class="alert alert-danger" role="alert">
                            A simple danger alert—check it out!
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="alert alert-secondary" role="alert">
                            A simple secondary alert—check it out!
                        </div>
                        <div class="alert alert-warning" role="alert">
                            A simple warning alert—check it out!
                        </div>
                        <div class="alert alert-dark" role="alert">
                            A simple dark alert—check it out!
                        </div>

                    </div>

                    <div class="col-6" >
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item<span class="badge rounded-pill bg-primary float-end">54</span></li>
                                <li class="list-group-item">A second item<span class="badge rounded-pill bg-primary float-end">2</span></li>
                                <li class="list-group-item">A third item<span class="badge rounded-pill bg-primary float-end">1</span></li>
                                <li class="list-group-item">A fourth item<span class="badge rounded-pill bg-primary float-end">3</span></li>
                                <li class="list-group-item">A fifth item<span class="badge rounded-pill bg-primary float-end">7</span></li>
                                <li class="list-group-item"><span class="bg-primary">A sixth list item</span><span class="badge rounded-pill bg-primary float-end">3</span></li>
                            </ul>
                        </div>

                    </div>

                </div>

                <footer class="bg-white m-3">
                    <div class="text-center p-3" >
                        <small class="grey">&copy; eMobilis Chromium 2022. All rights reserved.</small>
                    </div>

                </footer>


            </div>
            </div>


</div>

</div>



</body>
</html>
