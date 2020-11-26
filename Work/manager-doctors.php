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
                $http.get('manager-doctors-fetchall.php').then(ok, notok);

                function ok(response) {
                    //alert(JSON.stringify(response.data)) //JSON array
                    $scope.jsonAry = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }
            }

            $scope.doDel = function(uid) {
                $http.get('manager-doctors-delete.php?uid=' + uid).then(ok, notok);

                function ok(response) {
                    //alert(JSON.stringify(response.data)) //JSON array
                    // $scope.jsonAry = response.data;
                    alert(response.data);
                    $scope.doFetchAll();
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
            font-weight: 500;
        }

        /*
        #stt td {
        width: 200px;
        }
*/

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
                            <div class='btn btn-primary' ng-click='doFetchAll();'>Show All Doctors</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" ng-model='googler.uid' placeholder="Search Doctor ID" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- ====================================================================================-->
        <div class='container mt-5'>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sr. No.</th>
                        <th scope="col" ng-click="doSort('uid')">Doctor ID</th>
                        <th scope="col" ng-click="doSort('dname')">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Specializations</th>
                        <th scope="col" ng-click="doSort('hosp_name')">Hospital Name</th>
                        <th scope="col">Website</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat='obj in jsonAry | orderBy:cname | filter:googler'>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{obj.uid}}</td>
                        <td>{{obj.dname}}</td>
                        <td>{{obj.contact}}</td>
                        <td>{{obj.spl}}</td>
                        <td>{{obj.hosp_name}}</td>
                        <td>{{obj.website}}</td>
                        <td align='center'><input type='button' value='Delete' class='btn btn-danger' ng-click="doDel(obj.uid);"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



</body>

</html>
