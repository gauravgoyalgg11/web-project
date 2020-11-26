<?php
include_once('connection.php');
$uid=$_GET['uid'];
$query="select * from patients where uid='$uid'";
$table=mysqli_query($dbcon,$query);
$jsonAry=array();
while($row=mysqli_fetch_array($table))
{
    $jsonAry[]=$row;
}
echo json_encode($jsonAry);


?>
