<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

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
                    $('#msglog').html(response);
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
            });


            $("#btnfPwd").click(function() {
                var un = $("#txtUn").val();
                var pwd = $("#txtfPwd").val();
                //var cpwd = $("#txtCnfrm").val();
                var url = "forgot-pwd.php?uid=" + un + "&pwd=" + pwd;
                $.get(url, function(response) {
                    $("#msg").html(response);
                });

            });


        });

    </script>


</head>

<body background='Pics/hosp.jpg'>
    <!-- background='Pics/mabl.jpg'-->
    <div class=''>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#">
                <h3 style='color:black'><small>About Us</small></h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <h4 class='mt-1' style='color:black'><small>Home</small></h4>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <h4 class='mt-1' style='color:black'><small>Services</small></h4>
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
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class='btn  btn-danger form-control mr-sm-2' data-toggle="modal" data-target="#fpwdModal" id='modalFpwd'>Forgot Password</div>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

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
                            <div class='form-group'>
                                <div class='text-center' id='msglog'></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-primary" id='btnfPwd' value='Reset'>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</body>

</html>
