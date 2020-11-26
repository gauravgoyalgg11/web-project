<?php
include_once('connection.php');
$uid=$_GET['uid'];
$dt=$_GET['date'];
$tym=$_GET['tym'];
$dtype=$_GET['dtype'];
$age=$_GET['age'];
$res=$_GET['res'];
$med=$_GET['med'];
$resu=$_GET['resu'];

$query="insert into sugarec values('$uid','$dt','$tym','$dtype','$res','$med','$resu')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo"Successfully  Recorded";
}
else{
    echo $msg;
}
?>
