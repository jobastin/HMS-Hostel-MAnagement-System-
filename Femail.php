<?php
require('fun.php');
$e= $_POST["fe"];
$u= $_POST["fu"];
if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $e))
{
$con = connect();
if(!empty($_POST["fe"])) {
    $q1 = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE BINARY `username`='".$_POST["fu"]."'")or die("Sign in Error");
    $r1 = mysqli_fetch_array($q1);
    $lid=$r1['login_id'];
    $role=$r1['role'];
    

    if($role == 'student')
    {
    $qu3 = mysqli_query($con,"SELECT * FROM `tbl_student_info` WHERE `login_id`=$lid") or die("Sign in Error");
    $re3 = mysqli_fetch_array($qu3);
        if($e == $re3['stu_email'])
        {
        ?>
    <script>
        document.getElementById("msg1").innerHTML = "<span></span>";
        document.getElementById("fbutton").disabled = false;
    </script>
<?php
        }
        else
        {
         ?>
    <script>
        document.getElementById("fbutton").disabled = true;
        document.getElementById("msg1").innerHTML = "<span>This mail is not associated with this account</span>";
    </script>
<?php   
        }
    }
    
    else if($role == 'manager')
    {
    $qu2 = mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid") or die("Sign in Error");
    $re2 = mysqli_fetch_array($qu2);
    if($e == $re2['hstl_manager_email'])
        {
        ?>
    <script>
        document.getElementById("msg1").innerHTML = "<span></span>";
        document.getElementById("fbutton").disabled = false;
    </script>
    <?php
        }
        else
        {
         ?>
    <script>
        document.getElementById("fbutton").disabled = true;
        document.getElementById("msg1").innerHTML = "<span>This mail is not associated with this account</span>";
    </script>
<?php   
        }       
    }
}
}
else
{ 
?>
<script>
document.getElementById("msg1").innerHTML = "<span>Enter a valid Email</span>";
</script>
<?php
}
?>