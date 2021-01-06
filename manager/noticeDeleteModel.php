<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == false)
{
header('Location: ../index.html');
}
else
{
    $lid=$_SESSION['loginid'];
    $res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error res");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];
    $no = $_POST['nid'];
    $q6=mysqli_query($con,"UPDATE `tbl_notice_publish` SET `status`=0 WHERE `notice_id`=$no AND `hstl_id`=$hid")or die("Sign in Errorq5");
    echo "Notice Deleted";
}
?>