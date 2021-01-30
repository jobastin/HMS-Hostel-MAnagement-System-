<?php
require('fun.php');
$u= $_POST["memail"];
if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $u))
{
$con = connect();
if(!empty($_POST["memail"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_manager_email`='".$_POST["memail"]."' AND `status`=1")or die("Sign in Error email");
      
 if(mysqli_num_rows($query) > 0){ 
      echo "<span class='status-not-available1'>Email Alredy Registered</span>";
     ?>
<script>
document.getElementById("Memail").style.borderColor = "red";
c[8]=0;
button();
</script>
<?php
  }else{
      echo "<span class='status-available1'></span>";
     ?>
<script>
document.getElementById("Memail").style.borderColor = "green";
c[8]=1;
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
document.getElementById("Memail").style.borderColor = "red";
c[8]=0;
button();
</script>
<?php
}
?>