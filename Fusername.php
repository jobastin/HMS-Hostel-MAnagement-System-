<?php
require('fun.php');
$u= $_POST["f_u"];
if (preg_match('/^[a-zA-Z0-9]+$/', $u))
{
$con = connect();
if(!empty($_POST["f_u"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE BINARY `username`='" . $_POST["f_u"] . "' AND `status`=1")or die("Sign in Error");
  mysqli_close($con);
 if(mysqli_num_rows($query)){ 
     ?>
<script>
document.getElementById("fusername").style.borderColor = "#ced4da";
document.getElementById("femail").disabled = false;
c1[0]=1;
button1();
document.getElementById("msg").innerHTML = "<span></span>";
</script>
<?php
  }else{
     ?>
<script>
document.getElementById("fusername").style.borderColor = "red";
document.getElementById("femail").disabled = true;
c1[0]=0;
button1();
document.getElementById("fbutton").disabled = true;
document.getElementById("msg").innerHTML = "<span>Enter a valid Username</span>";
</script>
<?php
  }
}
}
else
{ ?>
<script>
document.getElementById("fusername").style.borderColor = "red";
document.getElementById("femail").disabled = true;
</script>
<?php
}
?>