<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == true  or isset($_POST['bid']))
{
$bid=$_POST['bid'];
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id'];
  
    
$q6=mysqli_query($con,"SELECT SUM(`vacent_status`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid")or die("Sign in Error q1");
$v = mysqli_fetch_array($q6);
$va=$v[0];

if($va>0)
{
    echo "Some Rooms are Occupied";
}
else
{
$q2=mysqli_query($con,"DELETE FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid")or die("Sign in Error q2"); 
$q=mysqli_query($con,"DELETE FROM `tbl_block_info` WHERE `hstl_id` =$hid AND `block_id`=$bid")or die("Sign in Error q1");   
echo "Deleted";
}
}
else
{
echo "Some Error Occoured.. Try again !!";
}
?>