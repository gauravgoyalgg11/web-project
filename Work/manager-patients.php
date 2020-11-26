<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel=stylesheet href='css/bootstrap.min.css'>

    <script src='js/jquery-1.8.2.min.js'></script>

    <script src='js/bootstrap.min.js'></script>

    <script src='js/angular.min.js'></script>
    <script>
        $module = angular.module('mymodule', []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonAry;
            $scope.doFetchAll = function() {
                $http.get('manager-patients-fetchall.php').then(ok, notok);

                function ok(response) {
                    //alert(JSON.stringify(response.data)) //JSON array
                    $scope.jsonAry = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }
            }

            $scope.doSort = function(col) {
                $scope.cname = col;
            }
        });

    </script>
    <style>
        #st {
            cursor: pointer;
        }

    </style>
</head>

<body ng-app='mymodule' ng-controller='mycontroller'>
    <div>
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
                            <div class='btn btn-primary' ng-click='doFetchAll();'>Show All Patients</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" ng-model="googler.uid" type="search" placeholder="Search Patient ID" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- ====================================================================================-->
        <div class='container mt-5'>
            <center>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col" ng-click="doSort('uid')">Patient ID</th>
                            <th scope="col" ng-click="doSort('p_name')">Name</th>
                            <th scope="col" ng-click="doSort('age')">Age</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat='obj in jsonAry | orderBy:cname | filter:googler'>
                            <th scope="row">{{$index+1}}</th>
                            <td>{{obj.uid}}</td>
                            <td>{{obj.p_name}}</td>
                            <td>{{obj.age}}</td>
                            <td>{{obj.address}}</td>
                            <td>{{obj.city}}</td>
                            <td>{{obj.contact}}</td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </div>



</body>

</html>
