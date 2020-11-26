<?php
include_once('connection.php');
$btn=$_POST['btn'];
if($btn=='Submit')
{
    do_Submit($dbcon);
}
if($btn=='Update')
{
    do_Update($dbcon);
}


function do_Submit($dbcon)
{
    $uid=$_POST['txtUid'];
    $nm=$_POST['txtName'];
    $gn=$_POST['gender'];
    $age=$_POST['txtAge'];
    $adrs=$_POST['txtAd'];
    $ct=$_POST['txtCt'];
    $mail=$_POST['txtEmail'];
    $phn=$_POST['txtCn'];
    $prob=$_POST['txtProb'];
    $query="insert into patients values('$uid','$nm','$gn','$age','$adrs','$ct','$mail','$phn','$prob')";

    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=='')
    {
        echo"Submited Successfully";
    }
    else{
        echo $msg;
    }
}


function do_Update($dbcon)
{
    $uid=$_POST['txtUid'];
    $nm=$_POST['txtName'];
    $gn=$_POST['gender'];
    $age=$_POST['txtAge'];
    $adrs=$_POST['txtAd'];
    $ct=$_POST['txtCt'];
    $mail=$_POST['txtEmail'];
    $phn=$_POST['txtCn'];
    $prob=$_POST['txtProb'];
    $query="update patients set p_name='$nm',gender='$gn',age='$age',address='$adrs',city='$ct',email='$mail',contact='$phn',hlth_prob='$prob' where uid='$uid'  ";

    mysqli_query($dbcon,$query);
    $msg=mysqli_error($dbcon);
    if($msg=='')
    {
        echo"Updated Successfully";
    }
    else{
        echo $msg;
    }
}

?>
