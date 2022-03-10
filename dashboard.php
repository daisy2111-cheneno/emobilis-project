<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
     exit();
}
include "header.php";


//echo $_SESSION['firstName'];
//echo $_SESSION['lastName'];
//echo $_SESSION['email'];
//echo $_SESSION['gender'];
//echo "<img scr='".$_SESSION['picture']."'>";
?>
            <div class="row m-2">
                <div class="col-4">
                    <p class="h3 m-2 grey">dashboard</p>

                </div>
                <div class="col-8">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Adipisci animi corporis delectus earum enim est fuga, porro ratione voluptas voluptate.
                                        Accusantium aspernatur ea eaque esse iste magnam quod tenetur, voluptatem!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
</body>
</html>
© 2022 GitHub, Inc.
Terms
Privacy
Security
Status
Docs
Contact