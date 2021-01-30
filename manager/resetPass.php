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
    
    $pwd=$_POST['npass1'];
    $pwd=md5($pwd);
    $q1=mysqli_query($con,"UPDATE `tbl_login` SET `password`='$pwd' WHERE `login_id`=$lid")or die("Sign in Error q1");
    ?>
    <script>
    alert("Password Updated");
    window.location.replace("../manager/#notice_publish");
    </script>
<?php
}
?>