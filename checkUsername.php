<?php
require('fun.php');
$u= $_POST["username"];
if (preg_match('/^[a-zA-Z0-9]+$/', $u))
{
$con = connect();
if(!empty($_POST["username"])) {
  $query = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE BINARY `username`='" . $_POST["username"] . "' AND `role`='manager'")or die("Sign in Error");
 if(mysqli_num_rows($query) > 0){ 
      echo "<span class='status-not-available'> Username Not Available.</span>";
     ?>
<script>
document.getElementById("Muname").style.borderColor = "red";
c[12]=0;
button();
</script>
<?php
  }else{
      echo "<span class='status-available'> Username Available.</span>";
     ?>
<script>
document.getElementById("Muname").style.borderColor = "green";
c[12]=1;
button();
</script>
<?php
  }
}
}
else
{
echo "<span class='status-available'>No Space and special Character accepted</span>"; ?>
<script>
document.getElementById("Muname").style.borderColor = "red";
c[12]=0;
button();
</script>
<?php
}
?>