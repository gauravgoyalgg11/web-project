<?php
include_once('connection.php');
$uid=$_GET['un'];

$query="select * from doctorss where uid='$uid'";

$table=mysqli_query($dbcon,$query);
$row=mysqli_num_rows($table);
if($row==0){
    echo"Available";
}
else{
    echo"Not Available";
}


?>
