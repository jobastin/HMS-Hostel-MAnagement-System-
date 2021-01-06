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
    $res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];
    $ct=$_POST['comptype'];
    $q=mysqli_query($con,"INSERT INTO `tbl_complaint_category`(`hstl_id`, `comp_type`, `status`) VALUES ($hid,'$ct',1)")or die("Sign in Error");
    ?>
    <script>
    alert("Complaint Category Added");
    window.location.replace("../manager/#comp_category");
    </script>
<?php
}
?>