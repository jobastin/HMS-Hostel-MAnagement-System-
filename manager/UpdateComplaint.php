<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == true or isset($_POST['cid']))
{
$cid=$_POST['cid'];
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id']; 
    
$q=mysqli_query($con,"UPDATE `tbl_complaint_category` SET `comp_type`='".$_POST["c"]."' WHERE `comp_id`=$cid AND `hstl_id`=$hid")or die("Sign in Error q1"); 
echo "Complaint Type Updated"; 
}
else
{
echo "Some Error Occoured.. Try again !!";
}
?>
