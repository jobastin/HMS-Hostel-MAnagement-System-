<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['h_id']))
{
$con = connect(); 
$hid=$_POST['h_id'];
$q1=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_id`=$hid")or die("Sign in Error q1");
$row = mysqli_fetch_array($q1);

$q2=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$hid")or die("Sign in Error q1");
$r1 = mysqli_fetch_array($q2);

?>
    <div>
    <h5><b>Manager Details :</b></h5>
    <br>
        <h6><b>Name :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_name']; ?></h6>
        <h6><b>Id :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_id']; ?></h6>
        <h6><b>Gender :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_gender']; ?></h6>
    <hr>
        <h6><b>Address :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_add']; ?></h6>
        <?php 
             $s=$r1['hstl_manager_state'];
             $s1=mysqli_query($con,"SELECT * FROM `tbl_state_list` WHERE `st_id`=$s")or die("Sign in Error q1");
            $row1 = mysqli_fetch_array($s1);
             ?>
        <h6><b>State :</b>&nbsp;&nbsp;&nbsp;<?php echo $row1['st_name']; ?></h6>
         <?php 
             $d=$r1['hstl_manager_dist'];
             $d1=mysqli_query($con,"SELECT * FROM `tbl_district_list` WHERE `st_id`=$s AND `dist_id`=$d")or die("Sign in Error q1");
            $row2 = mysqli_fetch_array($d1);
             ?>
        <h6><b>District :</b>&nbsp;&nbsp;&nbsp;<?php echo $row2['dist_name']; ?></h6>
        <h6><b>Pin :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_pin']; ?></h6>
    <hr>
        <h6><b>Mobile :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_phno']; ?></h6>
        <h6><b>E-mail :</b>&nbsp;&nbsp;&nbsp;<?php echo $r1['hstl_manager_email']; ?></h6>
    <hr>
    <h5><b>Hostel Details :</b></h5>
    <br>
        <h6><b>Name of hostel :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_name']; ?></h6>
        <h6><b>Hostel Id :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_id']; ?></h6>
    <hr>
        <h6><b>Address :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_address']; ?></h6>
        <?php 
             $s=$row['st_id'];
             $s1=mysqli_query($con,"SELECT * FROM `tbl_state_list` WHERE `st_id`=$s")or die("Sign in Error q1");
            $row1 = mysqli_fetch_array($s1);
             ?>
        <h6><b>State :</b>&nbsp;&nbsp;&nbsp;<?php echo $row1['st_name']; ?></h6>
         <?php 
             $d=$row['dist_id'];
             $d1=mysqli_query($con,"SELECT * FROM `tbl_district_list` WHERE `st_id`=$s AND `dist_id`=$d")or die("Sign in Error q1");
            $row2 = mysqli_fetch_array($d1);
             ?>
        <h6><b>District :</b>&nbsp;&nbsp;&nbsp;<?php echo $row2['dist_name']; ?></h6>
        <h6><b>Pin :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_pin']; ?></h6>
        <h6><b>Category :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_type']; ?></h6>
        <h6><b>Capacity :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_capacity']; ?></h6>
    <hr>
        <h6><b>Mobile :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_mob']; ?></h6>
        <h6><b>Phone :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_land']; ?></h6>
        <h6><b>E-mail :</b>&nbsp;&nbsp;&nbsp;<?php echo $row['hstl_email']; ?></h6>
    </div>    
<?php
}
?>