<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == false)
{
header('Location: ../index.html');
}
else
{
    
    $hid = $_POST['hid'];
    $q1=mysqli_query($con,"UPDATE `tbl_hostel_reg` SET `status`=0 WHERE `hstl_id`=$hid")or die("Sign in Error res");
    $q4=mysqli_query($con," UPDATE `tbl_hostel_manager` SET `status`=0 WHERE `hstl_id`=$hid")or die("Sign in Error res");
   
    $q6=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$hid")or die("Sign in Errorq5");
    $r = mysqli_fetch_array($q6);
    $lid=$r['login_id'];
    
    $q2=mysqli_query($con,"UPDATE `tbl_login` SET `status`=0 WHERE `login_id`=$lid ")or die("Sign in Error res");
    echo "Hostel is Not active anymore";
}
?>

