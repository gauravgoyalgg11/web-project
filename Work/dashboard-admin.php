<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

</head>

<body ng-app='mymodule' ng-controller='mycontroller'>
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
                        <!--                        <h5>Welcome <?php echo $_SESSION["activeuser"]; ?></h5>-->
                    </small>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class='btn  btn-danger form-control mr-sm-2'>Forgot Password</div>
                <!--
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
-->
            </form>
        </div>
    </nav>
    <form>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <center>
                        <font size='15'>Admin Dashboard</font>
                    </center>
                </div>
            </div>
            <div class='row mt-5'>
                <div class='col-md-3 offset-md-2'>
                    <div class="card">
                        <img src="Pics/pat.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Doctors</h5>
                            <p class="card-text">Click on below button.</p>
                            <a href="manager-doctors.php" class="btn btn-primary">Doctor's Manager</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-3 offset-md-2'>
                    <div class="card">
                        <img src="Pics/pat.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Patient</h5>
                            <p class="card-text">Click on below button.</p>
                            <a href="manager-patients.php" class="btn btn-primary">Patient's Manager</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
