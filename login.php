<?php 
require('fun.php');
$con = connect();
session_start();
if (isset($_POST['login']))
{
    $con = connect();
    $user = $_POST['username-login'];
    $pass = $_POST['password-login'];
    $pass=md5($pass);
    $res = mysqli_query($con, "SELECT * FROM `tbl_login` WHERE BINARY `username`='$user' AND `password`='$pass'") or die("Sign in Error");
     mysqli_close($con);
     if (mysqli_num_rows($res)==1){
        $row = mysqli_fetch_array($res);
        if ($row['role'] == 'manager' and $row['status'] == 1){
            $_SESSION['loginid'] = $row['login_id']; 
            $_SESSION['r'] = $row['role'];
            header('Location: manager/');
        }
         else if($row['role'] == 'student' and $row['status'] == 1)
         {
            $_SESSION['loginid'] = $row['login_id']; 
            $_SESSION['r'] = $row['role'];
            header('Location: student/'); 
         }
         else if($row['role'] == 'admin' and $row['status'] == 1)
         {
            $_SESSION['loginid'] = $row['login_id']; 
            $_SESSION['r'] = $row['role'];
            header('Location: admin/'); 
         }
        else
        {
        header("Location: loginMain.php");
        }
    } else
   ?>
<script>

alert("Invalid username and password");
location.href="loginMain.php";

        </script>
<?php
}
?>