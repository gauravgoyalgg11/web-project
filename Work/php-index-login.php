<?php
session_start();
include_once("connection.php");
$uid=$_GET['uname'];
$pwd=$_GET['pwd'];
$query="select * from users where BINARY uid='$uid' and Binary pwd='$pwd' ";
$table=mysqli_query($dbcon,$query);
$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==0)
{
    echo"Invalid email id or password";
}
else
{
    $_SESSION["activeuser"]=$uid;
    echo"Successfully logged in "."as a ".$row['cat'];
     //location.href="dashboard-patient.php";
}


?>
