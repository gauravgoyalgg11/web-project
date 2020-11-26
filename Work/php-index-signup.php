<?php
session_start();
include_once("connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET['uid'];
$pwd=$_GET['pwd'];
$mno=$_GET['mno'];
$cat=$_GET['ct'];
$query="insert into users values('$uid','$pwd','$mno',current_date(),'$cat')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
  //  $_SESSION["activeuser"]=$uid;
    $resp=SendSMS($mno,"You are Signed up Successfully.");
    echo"Successfully Signed Up";
}
else{
    echo $msg;
}
?>
