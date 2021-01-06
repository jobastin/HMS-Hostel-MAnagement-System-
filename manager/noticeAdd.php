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
    $notice=$_POST['noticetext'];
    $q=mysqli_query($con,"INSERT INTO `tbl_notice_publish`(`hstl_id`, `content`,`status`) VALUES ($hid,'$notice',1)")or die("Sign in Error");
    ?>
    <script>
    alert("Notice added Successful");
    window.location.replace("../manager/#notice_publish");
    </script>
<?php
}
?>