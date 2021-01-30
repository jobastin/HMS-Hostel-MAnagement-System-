<?php
require('fun.php');
$u= $_POST["hemail"];
if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $u))
{
$con = connect();
if(!empty($_POST["hemail"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_email`='".$_POST["hemail"]."' AND `status`=1")or die("Sign in Error email");
      
 if(mysqli_num_rows($query) > 0){ 
      echo "<span class='status-not-available1'>Email Alredy Registered</span>";
     ?>
<script>
document.getElementById("hstlemail").style.borderColor = "red";
c[2]=0;
button();
</script>
<?php
  }else{
      echo "<span class='status-available1'></span>";
     ?>
<script>
document.getElementById("hstlemail").style.borderColor = "green";
c[2]=1;
button();
</script>
<?php
  }
}
}
else
{
echo "<span class='status-available1'></span>"; ?>
<script>
document.getElementById("hstlemail").style.borderColor = "red";
c[2]=0;
button();
</script>
<?php
}
?>