<?php
session_start();
if(isset($_SESSION['activeuser'])==false)
{
header("location:index.php");
}
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
        //BP SCRIPT
        $(document).ready(function() {

            $("#bp").click(function() {
                $("#txtUid").val("");
                $("#txtDate").val("");
                $("#txtDia").val("");
                $("#txtSys").val("");
                $("#txtPls").val("");
                $("#msg1").html("");
                $("#msg2").html("");
                $("#msg").html("");
            });


            $("#btnRec").click(function() {
                var uid = $("#txtUid").val();
                var dt = $("#txtDate").val();
                var dia = $("#txtDia").val();
                var sys = $("#txtSys").val();
                var pls = $("#txtPls").val();

                var url = "record-bp-process.php?uid=" + uid + "&date=" + dt + "&dia=" + dia + "&sys=" + sys + "&pls=" + pls;

                $.get(url, function(response) {
                    $("#msg").html(response);
                });
            });

            $('#txtSys').blur(function() {
                var dia = $("#txtDia").val();
                var sys = $("#txtSys").val();

                if (70 <= dia <= 90 || 120 <= sys <= 130) {
                    $('#msg1').html('Your Blood Pressure Is Normal').addClass('low');
                }

                if (60 <= dia < 70 || 130 < sys <= 150) {
                    $('#msg1').html('Your blood pressure is not normal than usual').addClass('low');
                    $('#msg2').html('You are suggested to take precautions').addClass('low');
                }
                if (dia < 60 || sys < 120) {
                    $('#msg1').html('Your blood pressure is going LOW').addClass('low');
                    $('#msg2').html('You are suggested to Call the doctor immideately').addClass('low');
                }

                if (dia > 90 || sys > 150) {
                    $('#msg1').html('Your blood pressure is going HIGH').addClass('low');
                    $('#msg2').html('You are suggested to Call the doctor immideately').addClass('low');
                }
            });



            //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-//


            $("#sugar").click(function() {
                $("#txtUidia").val("");
                $("#txtDatedia").val("");
                $("#txtTime").val("");
                $("#diatype").val("");
                $("#txtAgedia").val("");
                $("#txtRes").val("");
                $("#txtMed").val("");
                $("#txtResu").val("");
                $("#diamsg").html("");
                $("#msg2").html("");
                $("#msg").html("");
            });

            $("#RecSugar").click(function() {
                var id = $("#txtUidia").val();
                var dte = $("#txtDatedia").val();
                var tym = $("#txtTime").val();
                var dtype = $("#diatype").val();
                var age = $("#txtAgedia").val();
                var res = $("#txtRes").val();
                var med = $("#txtMed").val();
                var resu = $("#txtResu").val();

                var url = "record-sugar-process.php?uid=" + id + "&date=" + dte + "&tym=" + tym + "&dtype=" + dtype + "&age=" + age + "&res=" + res + "&med=" + med + "&resu=" + resu;
                $.get(url, function(response) {
                    $("#diamsg").html(response);
                });

            });




        });

    </script>

    <style>
        .low {
            color: red;
        }

        .avg {
            color: red;
        }

        .high {
            color: red;
        }

        body {
            background-color: #2E2E2E;
        }

    </style>

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
                        <div class='btn btn-outline-primary' data-toggle="modal" data-target="#signupModal" id='modalsu'>Sign Up</div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <!--                            <h4 class='mt-1' style='color:black'><small>Link</small></h4>-->
                        <div class='btn btn-outline-primary' data-toggle="modal" data-target="#loginModal" id='modallog'>Log In</div>
                    </a>
                </li>
                <li class="nav-item text-white ml-3 mt-3">
                    <small>
                        <h5>Welcome <?php echo $_SESSION["activeuser"]; ?></h5>
                    </small>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href="log-out.php" class="btn btn-outline-warning">Log Out</a>
                <!--                <div class='btn  btn-danger form-control mr-sm-2'>Forgot Password</div>-->
                <!--
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
-->
            </form>
        </div>
    </nav>
    <div class='container mt-4'>
        <div class="card  mt-4">
            <div class="card-header border border-warning text-white" style="background-color:#3E4551">
                <center>
                    <h2>Patient Dashboard</h2>
                </center>
            </div>
        </div>
        <center>
            <div class="card-deck mt-3 text-white">
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/pat.jpg" class="card-img-top" height='150' alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Patient</h5>
                        <p class="card-text">Click on below button to describe your health status.</p>
                        <a href="patient-profile.php" class="btn btn-outline-success">Patient Profile</a>
                    </div>
                </div>
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/pres.png" class="card-img-top" height='150' alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Patient Prescription</h5>
                        <p class="card-text">Click on below button to go to prescription page.</p>
                        <a href="doctor-front-slip.php" class="btn btn-outline-success">Patient Prescription</a>
                    </div>
                </div>
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/bp.png" height='150' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blood Pressure</h5>
                        <p class="card-text">Click on below button to record your Blood Pressure.</p>
                        <input type='button' value='Record Blood Pressure' id='bp' name='bp' class='btn btn-outline-success' data-toggle="modal" data-target="#bpModal">
                    </div>
                </div>
            </div>

            <div class="card-deck mt-3 text-white">
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/pat.jpg" class="card-img-top" height='150' alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chech BP History</h5>
                        <p class="card-text">Click on below button to check your BP History.</p>
                        <a href="history-bp.php" class="btn btn-outline-success">Blood Pressure History</a>
                    </div>
                </div>
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/sugar.png" class="card-img-top" height='150' alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Diabetes</h5>
                        <p class="card-text">Click on below button to record your Diabetes.</p>
                        <input type='button' value='Record Diabetes' id='sugar' name='sugar' class='btn btn-outline-success' data-toggle="modal" data-target="#sugarModal">
                    </div>
                </div>
                <div class="card border border-primary" style='background-color:#3E4551'>
                    <img src="Pics/pat.jpg" height='150' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chech Sugar History</h5>
                        <p class="card-text">Click on below button to check your Diabetes History.</p>
                        <a href="history-sugar.php" class="btn btn-outline-success">Diabetes History</a>
                    </div>
                </div>
            </div>


        </center>





        <!--MODALS  -->
        <!--   =========================== BP MODAL============================-->




        <div class="modal fade" id="bpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title " id="exampleModalLabel">Record Blood Pressure</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtUid">
                                    <small>
                                        <h5>Enter User ID</h5>
                                    </small></label>
                                <input type="text" placeholder="User Id" class="form-control" id="txtUid" name='txtUid' aria-describedby="emailHelp">
                                <span id="errUid"></span>
                                <span id="errUid1"></span>
                            </div>
                            <div class='form-group'>
                                <label for="txtDate">
                                    <small>
                                        <h5>Date of Recording</h5>
                                    </small></label>
                                <input type="date" placeholder="" class='form-control' id='txtDate' name='txtDate'>
                                <span id='errDate'></span>
                            </div>
                            <small>
                                <h5> Blood Pressure</h5>
                            </small>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='txtDia'>Diastolic Pressure</label>
                                        <input type='text' id='txtDia' name='txtDia' placeholder="Diastolic(Low)" class='form-control'>
                                        <span id='errDia'></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for='txtSys'>Systolic Pressure</label>
                                        <input type='text' id='txtSys' name='txtSys' placeholder="Systolic(High)" class='form-control'>
                                        <span id='errSys'></span>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for="txtPls">
                                    <small>
                                        <h5>Pulse Rate</h5>
                                    </small></label>
                                <input type="text" placeholder="Enter Pulse Rate" class='form-control' id='txtPls' name='txtPls'>
                                <span id='errPls'></span>
                            </div>
                            <div class='form-group'>
                                <div id='msg1' class='mt-2'></div>
                                <div id='msg2' class='mt-2'></div>
                                <div id='msg' class='text-center mt-2'></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" id='btnRec' value='Record'>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <!--   =========================== DIABETES MODAL============================-->

        <div class="modal fade" id="sugarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title " id="exampleModalLabel">Record Diabetes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtUidia">
                                    <small>
                                        <h5>Enter User ID</h5>
                                    </small></label>
                                <input type="text" placeholder="User Id" class="form-control" id="txtUidia" name='txtUidia' aria-describedby="emailHelp">
                                <span id="errUidia"></span>
                                <span id="errUidia1"></span>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for="txtDatedia">
                                            <small>
                                                <h5>Date of Recording</h5>
                                            </small></label>
                                        <input type="date" placeholder="" class='form-control' id='txtDatedia' name='txtDatedia'>
                                        <span id='errDatedia'></span>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label for="txtTime">
                                            <small>
                                                <h5>Time of Recording</h5>
                                            </small></label>
                                        <input type="time" placeholder="" class='form-control' id='txtTime' name='txtTime'>
                                        <span id='errTime'></span>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <legend>
                                    Blood Sugar
                                </legend>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>

                                            <label for="diatype">
                                                <small>
                                                    <h5>Sugar Time</h5>
                                                </small>
                                            </label>
                                            <select id='diatype' name='diatype' class='form-control'>
                                                <option value='Fasting'>Fasting</option>
                                                <option value='Before Meal'>Before Meal</option>
                                                <option value='After Meal'>After Meal</option>
                                                <option value='Before Exercise'>Before Exercise</option>
                                                <option value='After Exercise'>After Exercise</option>
                                                <option value='Bed Time'>Bed Time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for="txtAgedia">
                                                <small>
                                                    <h5>Age</h5>
                                                </small>
                                            </label>
                                            <input type="text" placeholder="Enter Your Age" class='form-control' id='txtAgedia' name='txtAgedia'>
                                            <span id='errAgedia'></span>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for="txtRes">
                                                <small>
                                                    <h5>Result</h5>
                                                </small>
                                            </label>
                                            <input type="text" placeholder="Result" class='form-control' id='txtRes' name='txtRes'>
                                            <span id='errRes'></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <fieldset>
                                <legend>
                                    Urine Sugar
                                </legend>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for="txtMed">
                                                <small>
                                                    <h5>Medicine Intake</h5>
                                                </small>
                                            </label>
                                            <input type="text" placeholder="Medicinal Intake" class='form-control' id='txtMed' name='txtMed'>
                                            <span id='errMed'></span>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for="txtResu">
                                                <small>
                                                    <h5>Result</h5>
                                                </small>
                                            </label>
                                            <input type="text" placeholder="Result" class='form-control' id='txtResu' name='txtResu'>
                                            <span id='errResu'></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class='form-group'>
                                <div id='diamsg' class='text-center mt-2'></div>
                                <div id='' class='mt-2'></div>
                                <div id='' class='text-center mt-2'></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" id='RecSugar' value='Record'>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small unique-color-dark bg- bg-dark  mt-4">

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
