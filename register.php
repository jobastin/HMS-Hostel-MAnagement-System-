<?php
require('fun.php');
$con = connect();

//hostel details

$hname=$_POST['hstlname'];
$hcategory=$_POST['category'];
$hcap=$_POST['totalcap'];
$hemail=$_POST['hstlemail'];
$htel=$_POST['hstltele'];
$hmob=$_POST['hstlmob'];
$hadd=$_POST['hstlAdr'];
$hpin=$_POST['hstlPin'];
$hstate=$_POST['permstate'];
$hdist=$_POST['permdistrict'];

//hostel manager details
$mname=$_POST['Mname'];
$mgender=$_POST['Mgender'];
$memail=$_POST['Memail'];
$mmobile=$_POST['Mmobile'];
$madd=$_POST['MAdr'];
$mpin=$_POST['Mpin'];
$mstate=$_POST['mstate'];
$mdist=$_POST['mdistrict'];
$muname=$_POST['Muname'];
$mpass=$_POST['Mpass'];


$q1="INSERT INTO tbl_hostel_reg (hstl_name,hstl_address,st_id,dist_id,hstl_pin,hstl_type,hstl_capacity,hstl_mob,hstl_land,hstl_email, status)VALUES ('$hname','$hadd',$hstate,$hdist,$hpin,'$hcategory',$hcap,$hmob,$htel,'$hemail',1)";
mysqli_query($con,$q1);
$hid=mysqli_insert_id($con);
echo $hid;

$q3="INSERT INTO tbl_login (username,password,role,status) VALUES ('$muname','$mpass','manager',1)";
mysqli_query($con,$q3);
$lid=mysqli_insert_id($con);
echo $lid;

$q2="INSERT INTO tbl_hostel_manager (hstl_id,hstl_manager_name,hstl_manager_gender,hstl_manager_email,hstl_manager_phno, hstl_manager_add,hstl_manager_state,hstl_manager_dist,hstl_manager_pin,login_id,status) VALUES ($hid,'$mname','$mgender','$memail',$mmobile,'$madd','$mstate','$mdist',$mpin,$lid,1)";
mysqli_query($con,$q2);
mysqli_close($con);
?>

