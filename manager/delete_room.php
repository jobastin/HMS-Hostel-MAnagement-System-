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
    $no = $_POST['rd'];
    $q2=mysqli_query($con,"SELECT COUNT(`room_no`) FROM tbl_room_info WHERE `hstl_id`=$hid")or die("Sign in Errorq2");
    mysqli_num_rows($q2);
    $q3=mysqli_query($con,"SELECT * FROM `tbl_room_info` WHERE `hstl_id`=$hid")or die("Sign in Errorq2");
    mysqli_num_rows($q3);
    
    $m = mysqli_fetch_array($q2);
    $boolean=0;
    $s=$m[0]-$no;
    $c=0;
    if($no<$m[0])
    {
    for($x=$m[0];$x>$s;$x--)
    {
    $q4=mysqli_query($con,"SELECT * FROM `tbl_room_info` WHERE `hstl_id`=$hid AND `room_no`=$x")or die("Sign in Errorq4");
    $v = mysqli_fetch_array($q4);
    $va=$v['vacate_status'];
    if($va==1)
    {
    ?><script>
    alert("Some Rooms are Occupied.\n Cannot delete them !!!!");
    window.location.replace("../manager/#room_allocation");
    </script>
    <?php
    $boolean=1;
    break;
    }
    else
    {
    $q5=mysqli_query($con,"DELETE FROM `tbl_room_info` WHERE `hstl_id`=$hid AND `room_no`=$x")or die("Sign in Errorq5");
    }
    }
    }
    elseif($no==$m[0])
    {
    $q6=mysqli_query($con,"DELETE FROM `tbl_room_info` WHERE `hstl_id`=$hid")or die("Sign in Errorq5");
    }
    elseif($no>$m[0])
    {
    ?>
    <script>
        alert("Cannot Delete Rooms which are not allocated !!!!!");
        $boolean=1;
        window.location.replace("../manager/#room_allocation");
    </script>
<?php  
    }
if($boolean==0)
{
?>
<script>
alert("Rooms Deleted");
window.location.replace("../manager/#room_allocation");
</script>
<?php
}
}
?>