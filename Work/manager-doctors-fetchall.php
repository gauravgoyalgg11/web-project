<?php
include_once('connection.php');
$query="select * from doctor";
$table=mysqli_query($dbcon,$query);
$jsonAry=array();
while($row=mysqli_fetch_array($table))
{
    $jsonAry[]=$row;
}
echo json_encode($jsonAry);


?>
