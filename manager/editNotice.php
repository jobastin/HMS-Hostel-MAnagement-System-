<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == true or isset($_POST['bid']))
{
$nid=$_POST['nid'];
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id']; 
    
$q=mysqli_query($con,"UPDATE `tbl_notice_publish` SET `content`='".$_POST["c"]."' WHERE `notice_id`=$nid AND `hstl_id`=$hid")or die("Sign in Error q1"); 
echo "Notice Updated"; 
}
else
{
echo "Some Error Occoured.. Try again !!";
}
?>