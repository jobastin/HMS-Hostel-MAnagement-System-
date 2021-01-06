<?php
require('fun.php');
$u= $_POST["f_p"];
$con = connect();
if(!empty($_POST["f_p"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_manager_phno`='" . $_POST["f_p"] . "'")or die("Sign in Error");
    
 if(mysqli_num_rows($query) > 0){
     
     
     
     ?>
<script>
document.getElementById("fphno").style.borderColor = "green";
document.getElementById("npass").disabled = false;
document.getElementById("ncpass").disabled = false;
</script>
<?php
  }else{
     ?>
<script>
document.getElementById("fphno").style.borderColor = "red";
document.getElementById("npass").disabled = true;
document.getElementById("ncpass").disabled = true;
</script>
<?php
  }
}
?>