<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['ha']))
{
$con = connect(); 
$hid=$_POST['ha'];
    
$q1=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_id`=$hid")or die("Sign in Error q1");
$row = mysqli_fetch_array($q1);

$q2=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$hid")or die("Sign in Error q2");
$r1 = mysqli_fetch_array($q2);
    
$lid=$r1['login_id'];
$email=$r1['hstl_manager_email'];

//$q5=mysqli_query($con,"UPDATE `tbl_login` SET `status`=1 WHERE `login_id`=$lid")or die("Sign in Error q5");
//    
//$q3=mysqli_query($con,"UPDATE `tbl_hostel_manager` SET `status`=1 WHERE `hstl_id`=$hid")or die("Sign in Error q3");
    

$to_email = $email;
$subject = "Simple Email Test via PHP";
$body = "Hi, This is test email send by PHP Script";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
}
?>