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
    
    $q1=mysqli_query($con,"SELECT MAX(`room_no`) FROM tbl_room_info WHERE `hstl_id`=$hid")or die("Sign in Error q1");
    mysqli_num_rows($q1);
    $m = mysqli_fetch_array($q1);
    $max=$m[0]+1;
    if($max == 0)
    {
        $max=$max+1;
    }
    
    $q2=mysqli_query($con,"SELECT COUNT(`room_no`) FROM tbl_room_info WHERE `hstl_id`=$hid")or die("Sign in Errorq2");
    mysqli_num_rows($q2);
    $c = mysqli_fetch_array($q2);
    $c1=$c[0];
    $no = $_POST['rc'];
    if($c1>=0)
    {
    for ($x = 0; $x < $no ; $x++)
    {
    $q3=mysqli_query($con,"INSERT INTO `tbl_room_info`(`hstl_id`, `room_no`, `vacate_status`, `status`) VALUES ($hid,$max,0,1)")or die("Sign in Errorq3");  
    $max++;
    }
    
    }   
    ?>
<script>
alert("Rooms Updated");
window.location.replace("../manager/#room_allocation");
</script>
<?php
}
?>