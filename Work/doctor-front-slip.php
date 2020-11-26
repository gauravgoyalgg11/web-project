<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

    <script>
        function showPrevppic(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#x').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">
            <h3 style='color:white'><small>About Us</small></h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <h4 class='mt-1' style='color:white'><small>Home</small></h4>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h4 class='mt-1' style='color:white'><small>Services</small></h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!--                            <h4 class='mt-1' style='color:black'><small>Link</small></h4>-->
                        <div class='btn btn-primary' data-toggle="modal" data-target="#signupModal" id='modalsu'>Sign Up</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!--                            <h4 class='mt-1' style='color:black'><small>Link</small></h4>-->
                        <div class='btn btn-primary' data-toggle="modal" data-target="#loginModal" id='modallog'>Log In</div>
                    </a>
                </li>
                <li class="nav-item text-white ml-3 mt-3">
                    <small>
                        <h5>Welcome <?php echo $_SESSION["activeuser"]; ?></h5>
                    </small>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <!--                <div class='btn  btn-danger form-control mr-sm-2'>Forgot Password</div>-->
                <!--
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
-->
            </form>
        </div>
    </nav>

    <form action='doctor-front-slip-process.php' method="post" enctype="multipart/form-data">
        <div class='container'>
            <div class='row '>
                <div class='col-md-12'>
                    <span style='font-size: 50px;'>
                        <center>Patient Prescription</center>
                    </span>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='form-group'>
                        <label for='txtUid'>
                            <h2><small>Patient Id</small></h2>
                        </label>
                        <input type='text' id='txtUid' class='form-control' placeholder="Enter Your Id" name='txtUid'>
                        <span id='errUid'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtName'>
                            <h2><small>Doctor Name</small></h2>
                        </label>
                        <input type='text' id='txtName' class='form-control' placeholder="Enter Doctor's Name" name='txtName'>
                        <span id='errName'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtDate'>
                            <h2><small>Date of Visit</small></h2>
                        </label>
                        <input type='date' id='txtDate' class='form-control' placeholder="Enter Visiting Date" name='txtDate'>
                        <span id='errDate'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtCt'>
                            <h2><small>City</small></h2>
                        </label>
                        <input type='text' id='txtCt' class='form-control' placeholder="Enter City Name" name='txtCt'>
                        <span id='errCt'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtHname'>
                            <h2><small>Hospital Name(if any)</small></h2>
                        </label>
                        <input type='text' id='txtHname' class='form-control' placeholder="Enter Hospital Name" name='txtHname'>
                        <span id='errHname'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtProb'>
                            <h2><small>Problems</small></h2>
                        </label>
                        <input type='text' id='txtProb' class='form-control' placeholder="Problems Here..." name='txtProb'>
                        <span id='errProb'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtNdate'>
                            <h2><small>Next Date of Visit</small></h2>
                        </label>
                        <input type='date' id='txtNdate' class='form-control' placeholder="Enter Visiting Date" name='txtNdate'>
                        <span id='errNdate'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtDis'>
                            <h2><small>Discussion with doctor</small></h2>
                        </label>
                        <textarea rows='4' cols='50' placeholder="Discussion with Doctor(Like Precautions)" class='form-control' id='txtDis' name='txtDis'></textarea>
                        <span id='errDis'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='ppic'>
                            <h2><small>Upload Doctor slip</small></h2>
                        </label>
                        <input type='file' class='form-control' id='ppic' name='ppic' onchange="showPrevppic(this);">
                        <center>
                            <img class='mt-3' src="pics/pres.png" id="x" width="150" height="150" alt="" title='Sample Photo'>
                        </center>
                    </div>
                </div>
            </div>
            <div class='row mt-5'>
                <div class='col-md-4 offset-md-4'>
                    <div class='form-group'>
                        <input type='submit' value='Save' class='btn btn-outline-primary form-control' name='btnSave'>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <footer class="page-footer font-small unique-color-dark bg- bg-dark">

        <div style="background-color: #6351ce;">
            <div class="container">

                <!-- Grid row-->
                <div class="row py-4 d-flex align-items-center">

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0">Get connected with us on social networks!</h6>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">

                        <!-- Facebook -->
                        <a class="fb-ic">
                            <i class="fab fa-facebook-f white-text mr-4"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus-g white-text mr-4"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="li-ic">
                            <i class="fab fa-linkedin-in white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text"> </i>
                        </a>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row-->

            </div>
        </div>

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5">

            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-white">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">Company name</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4  text-white">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Products</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-white">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Useful links</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-white">

                    <!-- Links -->
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> info@example.com</p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p>
                        <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:medicare.com
            <!--           / <a href="https://mdbootstrap.com/"> medicare.com</a>-->
        </div>
        <!-- Copyright -->

    </footer>


</body>

</html>
