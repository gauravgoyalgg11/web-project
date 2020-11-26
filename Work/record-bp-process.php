<?php
include_once('connection.php');
$uid=$_GET['uid'];
$date=$_GET['date'];
$dia=$_GET['dia'];
$sys=$_GET['sys'];
$pls=$_GET['pls'];


$query="insert into bprecords values('$uid','$date','$dia','$sys','$pls')";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=='')
{
    echo"Record Saved";
}
else{
    echo $msg;
}

?>
