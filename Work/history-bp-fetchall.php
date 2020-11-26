<?php
include_once("connection.php");
$uid=$_GET['uid'];
$df=$_GET['df'];
$dt=$_GET['dt'];
$query="select * from bprecords where uid='$uid' and date_of_rec>='$df' and date_of_rec<='$dt'";
$table=mysqli_query($dbcon,$query);
$jsonAry=array();
while($row=mysqli_fetch_array($table))
{
    $jsonAry[]=$row;
}
echo json_encode($jsonAry);




?>
