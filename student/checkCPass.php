<?php
require('../fun.php');
$u= $_POST["pass"];
if (preg_match('/^.{8,}$/', $u) and sessioncheck() == true)
{
$con = connect();
if(!empty($_POST["pass"])) {
  $lid=$_SESSION['loginid'];
  $query = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE `login_id`=$lid AND `password`='" . $_POST["pass"] . "'")or die("Sign in Error");
 if(mysqli_num_rows($query) > 0)
 {
     echo "1";
  }
    else{
    echo "0";
  }
}
}
else
{
 echo "0";
}
?>
        