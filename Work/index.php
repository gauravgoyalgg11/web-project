<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MediCare</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <style>
        #b {
            height: 350px;
            width: 500px;
            background-color: #2E2E2E;
            margin-top: 20px;
            border-radius: 10px 10px 10px 10px;
            /*            border-color: brown;*/
        }

        body {
            /*            background-color: rgba(0, 0, 255, .1);*/
            background-color: #2E2E2E;
        }


        #i {}

    </style>



    <style>
        /*
        a:hover {
            color: antiquewhite;
        }
*/
        small {
            color: white;
        }

        small:hover {
            color: darkblue;
            border: 1px black solid;
            border-radius: 4px;
            background-color: antiquewhite;

        }

        /*
        .navbar {
        position: fixed;
        top: 0px;
        width: 100%;
        }
*/

        .not-ok {
            color: red;
            font-style: normal;
        }

        .ok {
            background-image: url("Pics/gtick1.jpg");
            width: 20px;
            height: 20px;
            background-size: contain;
            background-repeat: no-repeat;
            margin-top: 4px;
        }

        /*
        #msg {
            text-align: center;
        }
*/

    </style>

    <script>
        $(document).ready(function() {

            var flag = false;

            $("#modalsu").click(function() {
                $("#msg").html(" ");
            });

            $('#btnsignup').click(function() {

                if (flag == false) {
                    $("#msg").html("Fill all the fields");
                    $("#msg").addClass("not-ok");
                    return;
                } else {

                    var txtEmail = $('#txtEmail').val();
                    var txtPwd = $('#txtPwd').val();
                    var txtMbl = $('#txtMbl').val();
                    var cat = "";
                    if ($('#doc').prop('checked') == true)
                        cat = $('#doc').val();
                    if ($('#pt').prop('checked') == true)
                        cat = $('#pt').val();
                    var url = "php-index-signup.php?uid=" + txtEmail + "&pwd=" + txtPwd + "&mno=" + txtMbl + '&ct=' + cat;


                    $.get(url, function(response) {
                        $("#msg").html(response);
                    });

                }
            });
            $('#txtEmail').blur(function() {
                var txtEmail = $('#txtEmail').val();
                var url = "php-index-chkuid.php?un=" + txtEmail;

                $.get(url, function(response) {
                    $("#errEmail").html(response);

                });
                //                if (txtEmail == "") {
                //                    $("#errEmail").html("");
                //                    $('#errEmail1').html('Username is Mandatory');
                //                } else {
                //                    $('#errEmail1').html('');
                //                }
            });


            $('#txtPwd').keyup(function() {
                var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                $txtPwd = $("#txtPwd").val();
                var res = r.test(txtPwd);
                if ($txtPwd.length < 8) {
                    $("#errPwd").html("");
                    //                    $("errPwd2").removeClass('ok');
                    $('#errPwd1').html('Password should be atleast 8 characters long');
                } else {
                    $("#errPwd1").html('');
                    //                    $("#errPwd2").addClass('ok');
                    flag = true;
                }
            });

            $("#txtPwd").blur(function() {
                if ($("#txtPwd").val() == "") {
                    $("#errPwd1").html("");
                    $('#errPwd').addClass('not-ok').html('Password  is Mandatory');
                    flag = false;
                } else {
                    $('#errPwd').html('');
                    //                    $("#errPwd2").addClass('ok');
                    flag = true;
                }
            });

            $('#txtMbl').keyup(function() {
                var mbl = $("#txtMbl").val();
                if ($("#txtMbl").val() == "") {
                    $("#errMbl").addClass('not-ok');
                    $('#errMbl').html('Mobile Number is Mandatory');
                    flag = false;
                }
                //                    if ($("#txtMbl").val().length == 1)) 
                else {
                    $('#errMbl').html('');
                    flag = true;
                }
            });


            $("#modallog").click(function() {
                $('#txtEmaillog').val("");
                $("#txtPwdlog").val("");
                $('#msglog').html(" ");
            });


            $("#btnlogin").click(function() {
                var uid = $('#txtEmaillog').val();
                var pwd = $("#txtPwdlog").val();
                var url = "php-index-login.php?uname=" + uid + "&pwd=" + pwd;
                $.get(url, function(response) {
                    if (response == "Invalid email id or password")
                        $('#msglog').html(response);
                    else
                        location.href = "dashboard-patient.php";
                });
            });


            $('#txtEmaillog').keyup(function() {
                if ($("#txtEmaillog").val() == "") {
                    $('#errEmaillog').html('Username can not be Empty').addClass('not-ok');
                } else {
                    $('#errEmaillog').html('');
                }
            });

            $('#txtPwdlog').keyup(function() {
                //                var r = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                //                $pwd = $('#txtPwdlog').val();
                //                var res = r.test(pwd)
                //                if (res != true) {
                //                    $('#errPwdlog1').html('Password is not correct');
                //                }
                if ($("#txtPwdlog").val() == "") {
                    $('#errPwdlog').html('Password can not be Empty').addClass('not-ok');
                } else {
                    $('#errPwdlog').html('');
                }
            });


            $("#modalFpwd").click(function() {
                $('#txtUn').val("");
                $("#txtfPwd").val("");
                $('#txtCnfrm').val("");
                $("#msgfpwd").html("");
            });


            $("#btnfPwd").click(function() {
                var un = $("#txtUn").val();
                //var pwd = $("#txtfPwd").val();
                //var cnfrm = $('#txtCnfrm').val();
                var url = "forgot-pwd.php?uid=" + un;
                $.get(url, function(response) {
                    $("#msgfpwd").html(response);
                });
            });


        });

    </script>



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">
            <img src="Pics/logo.png" width="60" height="60" alt="" loading="lazy">
        </a>
        <a class="navbar-brand" href="#">
            <h5 style='color:white'><small>medicare.com<br>We Care For You</small></h5>
        </a>
        <a class="navbar-brand" href="#">
            <!--            <h3 style='color:white'><small>About Us</small></h3>-->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <h4 class='mt-2' style='color:white'><small>About Us</small></h4>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <h4 class='mt-2' style='color:white'><small>Home</small></h4>
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h4 class='mt-2' style='color:white'><small>Services</small></h4>
                    </a>
                </li>
                <li class="nav-item">
                    <!--
                    <a class="nav-link" href="#">
                                                    <h4 class='mt-1' style='color:black'><small>Link</small></h4>
                        <div class='btn btn-primary' data-toggle="modal" data-target="#signupModal" id='modalsu'>Sign Up</div>
                    </a>
-->
                </li>
                <li class="nav-item">
                    <!--
                    <a class="nav-link" href="#">
                        <h4 class='mt-1' style='color:black'><small>Link</small></h4>
                        <div class='btn btn-primary' data-toggle="modal" data-target="#loginModal" id='modallog'>Log In</div>
                    </a>
-->
                </li>
                <li class="nav-item text-white ml-3 mt-3">
                    <small>
                        <!--                        <h5>Welcome <?php echo $_SESSION["activeuser"]; ?></h5>-->
                    </small>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">



                <div class='btn btn-primary mr-sm-2 form-control' data-toggle="modal" data-target="#signupModal" id='modalsu'>Sign Up</div>


                <div class='btn btn-primary mr-sm-2 my-2 my-sm-0 form-control' data-toggle="modal" data-target="#loginModal" id='modallog'>Log In</div>


                <div class='btn btn-outline-danger form-control my-2 my-sm-0' data-toggle="modal" data-target="#fpwdModal" id='modalFpwd'>Forgot Password</div>

                <!--
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
-->

            </form>
        </div>
    </nav>
    <div>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Pics/c1.jpg" class="d-block w-100" height='400' alt="...">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h5>We care for our Patient</h5>
                        <p>Patient is our First Priority.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Pics/c4.jpg" class="d-block w-100" height='400' alt="...">
                    <div class="carousel-caption d-none d-md-block text-dark">
                        <h5>Advanced Systems</h5>
                        <p>Full Automated System in our Hospital.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="Pics/c3.jpg" class="d-block w-100" height='400' alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div style="background-color:#2E2E2E;">
        <div class='container'>
            <div class="card  mt-4">
                <div class="card-header border border-warning text-white" style="background-color:#3E4551">
                    <center>
                        <h2>Our Services</h2>
                    </center>
                </div>
            </div>
            <center>
                <div class="card-deck mt-4  text-white">
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/doc.png" class="card-img-top" height='150' alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Search Doctors</h5>
                            <p class="card-text">Here You Can find Doctors of any Speciality.
                                Just Search the doctors and they will be in front of you.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/brec.jpg" class="card-img-top" height='150' alt="...">
                        <div class="card-body">
                            <h5 class="card-title">BP History</h5>
                            <p class="card-text">You can record your BP Stats here as well.Apart from that you can also check your BP history of any time before.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/srec.jpg" height='150' class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sugar History</h5>
                            <p class="card-text">You can also record your Sugar Stats here so you don't need to worry about carrying the prescription files with you.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>

                <div class="card-deck mt-3 text-white">
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/presc.jpg" class="card-img-top" height='150' alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Upload Doctor's Slip</h5>
                            <p class="card-text">It's a digital way of uploading your Prescription slips on the Go.
                                So you can upload your slip on our server.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/ssa.png" class="card-img-top" height='150' alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Fully Safe and Secure</h5>
                            <p class="card-text">Your data is absolutely secure here as our system has been built with fully Authenticated Log in system.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card border border-primary" style='background-color:#3E4551'>
                        <img src="Pics/dregg.jpg" height='150' class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Doctor's Registration</h5>
                            <p class="card-text">Any doctor can register here but with valid certificate and after full Verification.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>


            </center>

        </div>
    </div>



    <div style="background-color:#2E2E2E;">
        <div class='container'>
            <div class="card  mt-4">
                <div class="card-header border border-warning text-white" style="background-color:#3E4551">
                    <center>
                        <h2>Reach Us</h2>
                    </center>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-6 mt-3' id='b'>
                    <center> <iframe class='mt-4' src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.5050275537596!2d74.95017682959522!3d30.211924964545627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732a4f07278a9%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1590144388241!5m2!1sen!2sin" width="470" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></center>
                </div>
                <div class='col-md-6 mt-3' id='b'>

                </div>
            </div>
        </div>
    </div>



    <div style="background-color:#2E2E2E;">
        <div class='container mt-4'>
            <div class="card  mt-4">
                <div class="card-header border border-warning text-white" style="background-color:#3E4551">
                    <center>
                        <h2>Meet The Developers</h2>
                    </center>
                </div>
            </div>

            <div class='row mt-3'>
                <div class='col-md-4 offset-md-2'>
                    <div class="card border border-primary" style='background-color:#1C2331;'>
                        <center> <img src="Pics/gg1.jpg" class="card-img-top mt-2" style='border-radius:50%;width:50%;' alt="..." height='162'></center>
                        <div class="card-body text-white">
                            <center>
                                <h5 class="card-title">Developed By-</h5>
                                <p class="card-text">Gaurav Goyal
                                    <br> <b>Full Stack Web Developer</b><br>
                                    Currently Pursuing B.tech.<br>
                                    Contact:95011-xxxxx<br>
                                    <br>
                                    Gmail-ID:imgauravgoyal11@gmail.com<br>
                                    Linked In link Given Below
                                </p>
                            </center>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class='col-md-4'>

                    <div class="card border border-primary" style='background-color:#1C2331;'>
                        <center> <img src="Pics/rj.jpg" class="card-img-top mt-2" height='170' style='border-radius:50%;width:50%;' alt="..."></center>
                        <div class="card-body text-white">
                            <center>
                                <h5 class="card-title">Under the Guidance of</h5>
                                <p class="card-text">This site has been created under the Guidance of Mr.Rajesh Bansal<br>
                                    <b> Head of<i> Banglore Computer Education</i>,Bathinda (Punjab)</b></p>
                                Author of:<i><b>"Real Java"</b></i>(Available on Amazon)
                            </center>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <!-- =-=-=-=-=-=-=-=-=-=-=---===========-MODALS---------------------------------------->

    <!--Sign Up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Sign Up Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtEmail">Enter Username</label>
                            <input type="text" placeholder="Username" class="form-control" id="txtEmail" aria-describedby="emailHelp">
                            <span id="errEmail"></span>
                            <span id="errEmail1"></span>
                        </div>
                        <div class='form-group'>
                            <label for="txtPwd">Enter Password</label>
                            <input type='password' placeholder="Password" class='form-control' id='txtPwd'>
                            <span id='errPwd'></span>
                            <span id='errPwd1'></span>
                            <span id='errPwd2'></span>
                        </div>
                        <div class='form-group'>
                            <label for='txtMbl'>Mobile</label>
                            <input type='tel' id='txtMbl' placeholder="Contact Number" class='form-control'>
                            <span id='errMbl'></span>
                        </div>
                        Category
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <label for='doc' class='ml-2'>Doctor&nbsp;&nbsp;&nbsp;</label>
                                    <input type="radio" name='cat' id='doc' value='Doctor'>
                                </div>
                                <div class="input-group-text ml-2">
                                    <label for='pt' class='ml-2'>Patient&nbsp;&nbsp;&nbsp;</label>
                                    <input type="radio" name='cat' id='pt' value='Patient'>
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div id='msg' class='text-center mt-2'></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id='btnsignup' value='Sign Up'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--   log in modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Log In Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtEmaillog">Enter Username</label>
                            <input type="text" placeholder="Username" class="form-control" id="txtEmaillog" aria-describedby="emailHelp">
                            <span id="errEmaillog"></span>
                        </div>
                        <div class='form-group'>
                            <label for="txtPwdlog">Enter Password</label>
                            <input type='password' placeholder="Password" class='form-control' id='txtPwdlog'>
                            <span id='errPwdlog'></span>
                            <span id='errPwdlog1'></span>
                        </div>
                        <div class='form-group'>
                            <div class='text-center' id='msglog'></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id='btnlogin' value='Log In'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--Forgot Password Modal-->

    <div class="modal fade" id="fpwdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="txtUn">Enter Username</label>
                            <input type="text" placeholder="Username" class="form-control" id="txtUn" aria-describedby="emailHelp">
                            <span id="errUn"></span>
                            <span id="errUn1"></span>
                        </div>
                        <!--
                        <div class='form-group'>
                            <label for="txtfPwd">Enter New Password</label>
                            <input type='password' placeholder="Password" class='form-control' id='txtfPwd'>
                            <span id='errfPwd'></span>
                            <span id='errfPwd1'></span>
                            <span id='errfPwd2'></span>
                        </div>
                        <div class='form-group'>
                            <label for='txtCnfrm'>Re-Enter Password</label>
                            <input type='password' id='txtCnfrm' placeholder="Confirm Password" class='form-control'>
                            <span id='errCnfrm'></span>
                        </div>
-->
                        <div class='form-group'>
                            <div class='text-center' id='msgfpwd'></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary" id='btnfPwd' value='Request Password'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark bg- bg-dark mt-3">

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
        <div class="footer-copyright text-center py-3 text-white">© 2020 Copyright:medicare.com
            <!--           / <a href="https://mdbootstrap.com/"> medicare.com</a>-->
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->









</body>

</html>
