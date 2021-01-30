<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == false or isset($_POST['roomS']) )
{
header('Location: ../index.html');
}
else
{
    $lid=$_SESSION['loginid'];
    $res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];
    $name = $_POST['Bname'];  
    $fcount = $_POST['fcount'];
    $c=$fcount;
    $r=1;
    $update=mysqli_query($con,"INSERT INTO `tbl_block_info`(`hstl_id`, `block_name`, `room_count`, `status`) VALUES ($hid,'$name',$fcount,1)")or die("Sign in Error");
    $bid=mysqli_insert_id($con);
    while($c>0)
    {
        $u=mysqli_query($con,"INSERT INTO `tbl_room`(`hstl_id`, `block_id`, `room_no`, `vacent_status`) VALUES ($hid,$bid,$r,0)")or die("Sign in Error u");
        $c--;
        $r++;
    }
    ?>
    <script>
           alert("Block and Room added Successfully");
           window.location.reload();
           window.location.replace("../manager/#block_allocation");
    </script>
<?php
}
?>
