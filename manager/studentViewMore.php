<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['st_id']))
{
$con = connect(); 
$sid=$_POST['st_id'];
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error res");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id'];
$q1=mysqli_query($con,"SELECT * FROM `tbl_student_info` WHERE `hstl_id`=$hid AND `stu_id`=$sid")or die("Sign in Error q1");

 $row = mysqli_fetch_array($q1);
?>
    <center>
    <table class="table table-striped" >
            <tr>
            <th>Student Id</th>
            <td><?php echo $row['stu_id']; ?></td>
    </tr>
         <tr>
            <th>Name</th>
            <td><?php echo $row['stu_name']; ?></td>
    </tr>
         <tr>
            <th>Dob</th>
            <td><?php echo $row['stu_dob']; ?></td>
    </tr>
         <tr>
            <th>Relogion</th>
            <td><?php echo $row['stu_religion']; ?></td>
    </tr>
    <tr>
        <th>Cast</th>
        <td><?php echo $row['stu_cast']; ?></td>
    </tr>
    <tr>
        <th>Category</th>
        <td><?php echo $row['stu_category']; ?></td>
    </tr>
    <tr>
        <th>Nationality</th>
        <td><?php echo $row['stu_nationality']; ?></td>
    </tr>
        <tr>
        <th>Gender</th>
        <td><?php echo $row['stu_gender']; ?></td>
    </tr>
    <tr>
        <th>Course</th>
        <td><?php echo $row['stu_course']; ?></td>
    </tr>
    <tr>
        <th>Permenent Address</th>
        <td><?php echo $row['stu_per_address']; ?></td>
    </tr>
    <tr>
        <th>State</th>
        <?php 
        $state=$row['st_id'];
        $s1=mysqli_query($con,"SELECT * FROM `tbl_state_list` WHERE `st_id`=$state")or die("Sign in Error res");
        $row1 = mysqli_fetch_array($s1);
        ?>
        <td><?php echo $row1['st_name']; ?></td>
    </tr>
    <tr>
        <th>District</th>
        <?php 
        $s2=mysqli_query($con,"SELECT * FROM `tbl_district_list` WHERE `st_id`=$state")or die("Sign in Error res");
        $row3 = mysqli_fetch_array($s2);
        ?>
        <td><?php echo $row3['dist_name']; ?></td>
    </tr>
    <tr>
        <th>Pin</th>
        <td><?php echo $row['stu_per_pin']; ?></td>  
    </tr>
    <tr>
        <th>Temporary Address</th>
        <td><?php echo $row['stu_temp_address']; ?></td>
    </tr>
    <tr>
        <th>Pin</th>
        <td><?php echo $row['stu_temp_pin']; ?></td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td><?php echo $row['stu_mob']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $row['stu_email']; ?></td>
    </tr>
    <tr>
        <th>Father's Name</th>
        <td><?php echo $row['stu_f_name']; ?></td>
    </tr>
    <tr>
        <th>Faher's Occupation</th>
        <td><?php echo $row['stu_f_occupation']; ?></td>
    </tr>
    <tr>
        <th>Mobile number</th>
        <td><?php echo $row['stu_f_mob']; ?></td>
    </tr>
    <tr>
        <th>Mother's Name</th>
        <td><?php echo $row['stu_m_name']; ?></td>
    </tr>
    <tr>
        <th>Mother's Occupation</th>
        <td><?php echo $row['stu_m_occupation']; ?></td>
    </tr>
    <tr>
        <th>Mobile Number</th>
        <td><?php echo $row['stu_m_mob']; ?></td>
    </tr>
    <tr>
        <th>Guardian Name</th>
        <td><?php echo $row['stu_g_name']; ?></td>
    </tr>
    <tr>
        <th>Mobile Number</th>
        <td><?php echo $row['stu_g_mob']; ?></td>
    </tr>
    <!-- <tr>
        <th>Room Number</th>
        <td></td>
    </tr> -->
    <tr>
        <th>Join Date</th>
        <td><?php echo $row['stu_join_date']; ?></td>
    </tr>
    </table>
    </center>
<?php
}
?>