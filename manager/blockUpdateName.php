<?php
require('../fun.php');
$con = connect();
if((sessioncheck() == true or isset($_POST['bid'])) and ($_POST["rc"]>0))
{
$bid=$_POST['bid'];
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id']; 
$rco=$_POST["rc"];    
    
$q=mysqli_query($con,"SELECT MAX(`room_no`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid")or die("Sign in Error q1"); 
$m = mysqli_fetch_array($q);
$max=$m[0];
    

$q6=mysqli_query($con,"SELECT SUM(`vacent_status`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid")or die("Sign in Error q1");
$v = mysqli_fetch_array($q6);
$va=$v[0];

if($va>0)
{
echo "Some Rooms are Occupied";
}
else if($max > $rco)
{
    $q1=mysqli_query($con,"UPDATE `tbl_block_info` SET `block_name`='".$_POST["n"]."' WHERE `block_id`=$bid AND `hstl_id`=$hid")or die("Sign in Error q1");
   while($rco < $max)
   {
       $q2=mysqli_query($con,"DELETE FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid AND `room_no`=$max")or die("Sign in Error q2"); 
       $max--;
   }
}
    
if($max < $rco)
{
 $q3=mysqli_query($con,"UPDATE `tbl_block_info` SET `block_name`='".$_POST["n"]."' WHERE `block_id`=$bid AND `hstl_id`=$hid")or die("Sign in Error q3");
 while($max < $rco)
 {
     $q4=mysqli_query($con,"INSERT INTO `tbl_room`(`hstl_id`, `block_id`, `room_no`, `vacent_status`) VALUES ($hid,$bid,$max+1,0)")or die("Sign in Error q4");
     $max++;
     
 }
}
    
if($max == $rco)
{
 $q5=mysqli_query($con,"UPDATE `tbl_block_info` SET `block_name`='".$_POST["n"]."' WHERE `block_id`=$bid AND `hstl_id`=$hid")or die("Sign in Error q5");  
echo "Block Name and Room Updated";
}
}
else
{
echo "check Block name and room number";
}
?>