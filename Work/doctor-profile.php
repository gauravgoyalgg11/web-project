<!DOCTYPE html>
<html lang='en'>

<head>
    <title>

    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

    <style>
        /*
        #pdiv {
            width: 1600px;
            height: 1500px;
            background-image: url(Pics/hosp1.jpg);
            background-size: contain;
                        position: absolute;
                        background-repeat: no-repeat;
        }
*/

        #btnFetch {
            margin-top: 7px;
        }

        #btnFetch:active {
            background-color: mediumblue;
            color: white;
        }

        .container {
            color: black;
            /*            background-image: url(Pics/st1.jpg);*/
        }

        /*
        #pdiv {
        background-color: navajowhite;
        }
*/

    </style>


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

        function showPrevcrtf(file1) {

            if (file1.files && file1.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#y').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file1.files[0]);
            }

        }

        $(document).ready(function() {
            $("#btnFetch").click(function() {
                var uid = $("#chkuid").val();
                var url = "doctor-fetch-profile.php?uid=" + uid;
                $.getJSON(url, function(response) {
                    //                    alert(JSON.stringify(response));
                    $("#txtName").val(response[0].dname);
                    $("#txtCon").val(response[0].contact);
                    $("#splLst").html(response[0].spl);
                    $("#txtQual").val(response[0].qual);
                    $("#txtStd").val(response[0].studied_from);
                    $("#txtExp").val(response[0].experience);
                    $("#txtHosp").val(response[0].hosp_name);
                    $("#txtAd").val(response[0].hosp_adrs);
                    $("#txtCt").val(response[0].city);
                    $("#txtEmail").val(response[0].email);
                    $("#txtWeb").val(response[0].website);
                    $("#pic1").val(response[0].ppic);
                    $("#x").prop("src", "uploads/" + response[0].ppic);
                    $("#pic2").val(response[0].crtf_pic);
                    $("#y").prop("src", "uploads/" + response[0].crtf_pic);
                    $("#Info").val(response[0].other_info);

                });
            });
            //            $("#jasus").val(response[0].img);

            $('#chkuid').blur(function() {
                var txtUid = $('#chkuid').val();
                var url = "doctor-chkuid.php?un=" + txtUid;

                $.get(url, function(response) {
                    $("#errUid").html(response);

                });
            });

        });

    </script>

</head>

<body background='Pics/60238.jpg'>
    <!--background='Pics/doc1.jpg'-->

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="#">
            <img src="Pics/logo.png" width="60" height="60" alt="" loading="lazy">
        </a>
        <a class="navbar-brand" href="#">
            <h5 style='color:white'><small>medicare.com<br>We Care For You</small></h5>
        </a>
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
                <div class='btn  btn-primary form-control mr-sm-2'>Sign Up</div>
                <div class='btn  btn-primary form-control mr-sm-2'>Log In</div>
                <!--                <div class='btn  btn-danger form-control mr-sm-2'>Forgot Password</div>-->
                <!--
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
-->
            </form>
        </div>
    </nav>

    <form action='doctor-profile-process.php' method='post' enctype="multipart/form-data">
        <input type='hidden' name='pic1' id="pic1">
        <input type='hidden' name='pic2' id="pic2">

        <div id='pdiv'>
            <div class='container'>
                <div class='row '>
                    <div class='col-md-12'>
                        <span style='font-size: 50px;'>
                            <center>Doctor Registration</center>
                        </span>
                    </div>
                </div>
                <div class='row'>
                    <div class='col md-6'>
                        <div class='form-group'>
                            <label for='txtUid'>
                                <h2><small>Doctor Id</small></h2>
                            </label>
                            <input type='text' id='chkuid' class='form-control' placeholder="Enter Your Id" name='txtUid'>
                            <span id='errUid'></span>
                        </div>
                    </div>
                    <div class='col-md-2 mt-5'>
                        <div class='form-group'>
                            <button class='btn btn-outline-primary' class='form-control' id='btnFetch'>Fetch</button>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtName'>
                                <h2><small>Doctor Name</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="Enter Your Name" id='txtName' name='txtName'>
                            <span id='errName'></span>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtCon'>
                                <h2><small>Contact No.</small></h2>
                            </label>
                            <input type='tel' class='form-control' placeholder="Enter Your Contact Number" name='txtCon' id='txtCon'>
                            <span id='errCon'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class="form-group">
                            <label for="Spl">
                                <h2><small>Specialization</small></h2>
                            </label>
                            <select class="form-control" id="Spl" name='Spl[]'>
                                <option value='Allergists'>Allergists</option>
                                <option value='Anesthesiologists'>Anesthesiologists</option>
                                <option value='Cardiologists'>Cardiologists</option>
                                <option value='Dermatologists'>Dermatologists</option>
                                <option value='Endocrinologists'>Endocrinologists</option>
                                <option value='Emergency Medicine Specialists'>Emergency Medicine Specialists</option>
                                <option value='Family Physicians'>Family Physicians</option>
                                <option value='Gastroenterologists'>Gastroenterologists</option>
                                <option value='Hematologists'>Hematologists</option>
                                <option value='Infectious Disease Specialists'>Infectious Disease Specialists</option>
                                <option value='Nephrologists'>Nephrologists</option>
                                <option value='Neurologists'>Neurologists</option>
                                <option value='Oncologists'>Oncologists</option>
                                <option value='Ophthalmologists'>Ophthalmologists</option>
                                <option value='Pathologists'>Pathologists</option>
                                <option value='Plastic Surgeons'>Plastic Surgeons</option>
                                <option value='Psychiatrists'>Psychiatrists</option>
                                <option value='Radiologists'>Radiologists</option>
                                <option value='Sports Medicine Specialists'>Sports Medicine Specialists</option>
                                <option value='Others'>Others</option>
                            </select>
                            <div id='splLst' style='color:black;font-size:20px;'></div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtQual'>
                                <h2><small>Qualification</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="Enter Your Qualification" name='txtQual' id='txtQual'>
                            <span id='errQual'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtStd'>
                                <h2><small>Studied From</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="University" id='txtStd' name='txtStd'>
                            <span id='errStd'></span>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtExp'>
                                <h2><small>Work Experience</small></h2>
                            </label>
                            <input type='text' id='txtExp' class='form-control' placeholder="Experience" name='txtExp'>
                            <span id='errExp'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <label for='txtHosp'>
                                <h2><small>Hospital Name</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="Enter Hospital Name" id='txtHosp' name='txtHosp'>
                            <span id='errHosp'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtAd'>
                                <h2><small>Hospital Address</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="Enter Hospital Address" id='txtAd' name='txtAd'>
                            <span id='errAd'></span>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtCt'>
                                <h2><small>City</small></h2>
                            </label>
                            <input type='text' class='form-control' placeholder="City Name" name='txtCt' id='txtCt'>
                            <span id='errCt'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtEmail'>
                                <h2><small>Email</small></h2>
                            </label>
                            <input type='text' class='form-control' id='txtEmail' placeholder="Enter Your Email Address" name='txtEmail'>
                            <span id='errEmail'></span>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='txtWeb'>
                                <h2><small>Website</small></h2>
                            </label>
                            <input type='text' class='form-control' id='txtWeb' placeholder="Website Name" name='txtWeb'>
                            <span id='errWeb'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='ppic'>
                                <h2><small>Select Profile Pic</small></h2>
                            </label>
                            <input type='file' class='form-control' id='ppic' name='ppic' onchange="showPrevppic(this);">
                            <center><img class='mt-3' src="pics/docimg.jpg" id="x" width="150" height="150" alt="" title='Sample Photo'>
                            </center>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <label for='crtf'>
                                <h2><small>Select Certificate(if any)</small></h2>
                            </label>
                            <input type='file' class='form-control' id='crtf' name='crtf' onchange="showPrevcrtf(this);">
                            <center><img src="pics/crtf.jpg" id="y" width="150" height="150" alt="" title='Sample Certificate' class='mt-3'>
                            </center>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-group'>
                            <label for='Info'>
                                <h2><small>Describe Yourself</small></h2>
                            </label>
                            <textarea id='Info' class='form-control' cols='100' rows="5" placeholder="Write Few Words About Yourself" name='Info'></textarea>
                            <span id='errInfo'></span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <input type=submit name='btn' value='Submit' class='form-control mt-4 btn btn-outline-success'>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='form-group'>
                            <input type=submit name='btn' value='Update' class='form-control mt-4 btn btn-outline-warning'>
                        </div>
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
