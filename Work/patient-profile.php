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

    <style>
        body {
            background-color: bisque;
        }

    </style>


    <script>
        $(document).ready(function() {
            $('#btnFetch').click(function() {
                //                alert();
                var txtUid = $("#txtUid").val();
                var url = "patient-fetch-profile.php?uid=" + txtUid;
                $.getJSON(url, function(response) {

                    //                    alert(JSON.stringify(response));

                    $("#txtName").val(response[0].p_name);
                    $("#errGender").html(response[0].gender);
                    $("#txtAge").val(response[0].age);
                    $("#txtAd").val(response[0].address);
                    $("#txtCt").val(response[0].city);
                    $("#txtEmail").val(response[0].email);
                    $("#txtCn").val(response[0].contact);
                    $("#txtProb").val(response[0].hlth_prob);
                });
            });
        });

    </script>


</head>

<body>
    <!-- background='Pics/cg.jpg'-->
    <form action='patient-profile-process.php' method="post">
        <div class='container'>
            <div class='row '>
                <div class='col-md-12'>
                    <span style='font-size: 50px;'>
                        <center>Patient Description</center>
                    </span>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-8'>
                    <div class='form-group'>
                        <label for='txtUid'>
                            <h2><small>Patient Id</small></h2>
                        </label>
                        <input type='text' id='txtUid' class='form-control' placeholder="Enter Your Id" name='txtUid' value="<?php echo $_SESSION['activeuser'];?>" readonly>
                        <span id='errUid'></span>
                    </div>
                </div>
                <div class='col-md-4 mt-2'>
                    <div class='form-group'>
                        <input type='button' id='btnFetch' value='Fetch' class='form-control btn btn-primary mt-5'>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtName'>
                            <h2><small>Name</small></h2>
                        </label>
                        <input type='text' id='txtName' class='form-control' placeholder="Enter Your Name" name='txtName'>
                        <span id='errName'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='gender'>
                            <h2><small>Gender</small></h2>
                        </label>
                        <select class="form-control" id="gender" name='gender'>
                            <option value='Male'>Male</option>
                            <option value='Female'>Female</option>
                            <option value='Others'>Others</option>
                        </select>
                        <span id='errGender'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtAge'>
                            <h2><small>Age</small></h2>
                        </label>
                        <input type='number' id='txtAge' class='form-control' placeholder="Enter Your Age" name='txtAge'>
                        <span id='errAge'></span>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-group'>
                        <label for='txtAd'>
                            <h2><small>Address</small></h2>
                        </label>
                        <input type='text' id='txtAd' class='form-control' placeholder="Enter Your Address" name='txtAd'>
                        <span id='errAd'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label for='txtCt'>
                            <h2><small>City</small></h2>
                        </label>
                        <input type='text' id='txtCt' class='form-control' placeholder="Enter Your City" name='txtCt'>
                        <span id='errCt'></span>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label for='txtEmail'>
                            <h2><small>Email-Id</small></h2>
                        </label>
                        <input type='text' id='txtEmail' class='form-control' placeholder="Enter Your Email" name='txtEmail'>
                        <span id='errEmail'></span>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group'>
                        <label for='txtCn'>
                            <h2><small>Contact No.</small></h2>
                        </label>
                        <input type='text' id='txtCn' class='form-control' placeholder="Enter Your Number" name='txtCn'>
                        <span id='errCn'></span>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <label for='txtProb'>
                        <h2><small>Health Problems</small></h2>
                    </label>
                    <textarea id='txtProb' class='form-control' placeholder="Health Problems Here.." name='txtProb'></textarea>
                    <span id='errProb'></span>
                </div>
            </div>
            <div class='row mt-5'>
                <div class='col-md-6'>
                    <input type='submit' value='Submit' id='btnSub' name='btn' class='form-control btn btn-success'>
                </div>
                <div class='col-md-6'>
                    <input type='submit' value='Update' id='btnUpd' name='btn' class='form-control btn btn-warning'>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
