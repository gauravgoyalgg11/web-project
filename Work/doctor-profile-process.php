<?php
include_once("connection.php");
//$all=substr($all,0,strlen($all)-1);

$btnVal=$_POST['btn'];
if($btnVal=='Submit')
{
    do_Submit($dbcon);
}
if($btnVal=='Update')
{
    do_Update($dbcon);
}

function do_Submit($dbcon)
{
$uid=$_POST['txtUid'];
$name=$_POST['txtName'];
$cno=$_POST['txtCon'];
$spl=$_POST['Spl'];
$qual=$_POST['txtQual'];
$std=$_POST['txtStd'];
$exp=$_POST['txtExp'];
$hname=$_POST['txtHosp'];
$ad=$_POST['txtAd'];
$ct=$_POST['txtCt'];
$email=$_POST['txtEmail'];
$web=$_POST['txtWeb'];
$pic=$_FILES['ppic']['name'];
$tmpPic=$_FILES['ppic']['tmp_name'];
move_uploaded_file($tmpPic,'uploads/'.$pic);


$crtf=$_FILES['crtf']['name'];
$tmpCrtf=$_FILES['crtf']['tmp_name'];
move_uploaded_file($tmpCrtf,"uploads/".$crtf);

$info=$_POST['Info'];


$all="";
for($i=0;$i<count($spl);$i++)
{
    $all=$all.$spl[$i];//.','
}
$query="insert into doctor values('$uid','$name','$cno','$all','$qual','$std','$exp','$hname','$ad','$ct','$email','$web','$pic','$crtf','$info',current_date())";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo"Submitted Successfully";
}
else{
    echo $msg;
}
}


function do_Update($dbcon)
{
    $uid=$_POST['txtUid'];
$name=$_POST['txtName'];
$cno=$_POST['txtCon'];
$spl=$_POST['Spl'];
$qual=$_POST['txtQual'];
$std=$_POST['txtStd'];
$exp=$_POST['txtExp'];
$hname=$_POST['txtHosp'];
$ad=$_POST['txtAd'];
$ct=$_POST['txtCt'];
$email=$_POST['txtEmail'];
$web=$_POST['txtWeb'];
    

$pic=$_FILES['ppic']['name'];
$tmpPic=$_FILES['ppic']['tmp_name'];


$cpic=$_FILES['crtf']['name'];
$tmpCrtf=$_FILES['crtf']['tmp_name'];

$info=$_POST['Info'];


$all="";
for($i=0;$i<count($spl);$i++)
{
    $all=$all.$spl[$i]; //.','
}
    
$jasus1=$_POST['pic1'];
if($pic=="")
    {
        $filename=$jasus1;
    }
else
    {
        $fileName=$pic;
        move_uploaded_file($tmpPic,'uploads/'.$pic);
    }
    
$jasus2=$_POST['pic2'];
if($cpic=="")
    {
        $file_name=$jasus2;
    }
else
    {
        $file_name=$cpic;
        move_uploaded_file($tmpCrtf,"uploads/".$cpic);
    }
    
    
    $query="update doctor set dname='$name',contact='$cno',spl='$all',qual='$qual',studied_from='$std',experience='$exp',hosp_name='$hname',hosp_adrs='$ad',city='$ct',email='$email',website='$web',ppic='$filename',crtf_pic='$file_name',other_info='$info' where uid='$uid'";
mysqli_query($dbcon,$query);
$msg=mysqli_error($dbcon);
if($msg=="")
{
    echo"Updated Successfully";
}
else{
    echo $msg;
}
    
}
?>
