<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

    <script src='js/angular.min.js'></script>

    <script>
        $module = angular.module("mymod", []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonAry;
            $scope.selObj;
            $scope.doFind = function() {
                $http.get("doctor-cities-process.php").then(ok, notok);

                function ok(response) {
                    //  alert(JSON.stringify(response.data));
                    $scope.jsonAry = response.data;
                    $scope.selObj = $scope.jsonAry[1]; //point
                }

                function notok(response) {
                    alert(response.data);
                }
            }
            $scope.doShow = function() {
                //alert($scope.selObj.city);
            }

            $scope.doFind2 = function() {
                $http.get("doctor-all-process.php?city=" + $scope.selObj.city).then(ok, notok);

                function ok(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonAry2 = response.data;

                }

                function notok(response) {
                    alert(response.data);
                }
            }
        });

    </script>

</head>

<body ng-app='mymod' ng-controller='mycontroller' ng-init="doFind();">
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
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class='btn  btn-danger form-control mr-sm-2'>Forgot Password</div>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class='container'>
        <div class='row'>
            <div class='col-md-4 mt-5 offset-md-4'>
                <label>
                    <h2><small>Select City</small></h2>
                </label>
                <select class="custom-select" ng-options="obj.city for obj in jsonAry" ng-change='doShow();' ng-model='selObj'></select>
            </div>
        </div>
        <div class='row mt-5'>
            <div class='col-md-4 offset-md-4'>
                <input type='button' class='form-control btn btn-primary' value='Search' ng-click='doFind2();'>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3 mt-3" ng-repeat="obj in jsonAry2 | orderBy:cname | filter:googler">
                <div class="card border border-primary h-80 d-inline-block" style="background-color: rgba(0,0,255,.1)">
                    <img src="uploads/{{obj.ppic}}" height='100' class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{obj.dname}}</h5>
                        <p class="card-text">{{obj.spl}}</p>
                        <p class="card-text">{{obj.qual}}</p>
                        <p class="card-text">{{obj.hosp_name}}</p>
                        <p class="card-text">{{obj.hosp_adrs}}</p>
                        <!--                        <p class="card-text">City: {{obj.city}}</p>-->
                        <p class="card-text">Contact: {{obj.contact}}</p>
                        <!--                        <a href="#" class="btn btn-primary" ng-click="doDelete(obj.uid);">Delete</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="page-footer font-small unique-color-dark bg- bg-dark mt-4">

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
