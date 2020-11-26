<?php
include_once("connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET['uid'];
$query="select * from users where uid='$uid' ";
$table=mysqli_query($dbcon,$query);
$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==0)
{
    echo "User does not exist";
}
else{
    $resp=SendSMS($row["mno"],"Password :- ".$row["pwd"]);
    echo "Sent to your Registered Mobile Number.<br>".$resp;
}


?>
