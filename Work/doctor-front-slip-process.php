<?php
include_once('connection.php');
$uid=$_POST['txtUid'];
$nm=$_POST['txtName'];
$dv=$_POST['txtDate'];
$ct=$_POST['txtCt'];
$hname=$_POST['txtHname'];
$prob=$_POST['txtProb'];
$nd=$_POST['txtNdate'];
$dis=$_POST['txtDis'];
$pic=$_FILES['ppic']['name'];
$tmpPic=$_FILES['ppic']['tmp_name'];
move_uploaded_file($tmpPic,'uploads/'.$pic);


$query="insert into slips values(null,'$uid','$nm','$dv','$ct','$hname','$prob','$nd','$dis','$pic')";

mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=='')
    {
        echo"Submited Successfully";
    }
    else{
        echo $msg;
    }
?>
