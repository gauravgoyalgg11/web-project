<?php
include_once("connection.php");
$uid=$_GET['un'];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbcon,$query);
$rows=mysqli_num_rows($table);
if($rows==0)
{
    echo"Available";
}
else{
    echo"Username already Taken!";
}
?>
