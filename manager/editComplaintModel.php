<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['comp_id']))
{
$cid=$_POST['comp_id'];
$con = connect();
?>
<script>
function CheckComp()
    {
        if(!document.getElementById('newCompType').value.trim().length)
        {
        document.getElementById("newCompType").style.borderColor = "red";
        document.getElementById("editComplaintType").disabled = true;
    }
        else{
        document.getElementById("newCompType").style.borderColor = "green";
         document.getElementById("editComplaintType").disabled = false;   
        }
    }
</script>
<?php
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id'];
$q1=mysqli_query($con,"SELECT * FROM `tbl_complaint_category` WHERE `comp_id`=$cid AND `hstl_id`=$hid")or die("Sign in Error");
$row = mysqli_fetch_array($q1);
    ?>
    <table>
            <tr>
            <th width="50px">Category</th>
            <td>&nbsp;</td>
            <td>
            <textarea id="newCompType" name="newCompType" oninput="CheckComp()" class="form-control"  onkeypress="return /[a-zA-Z 0-9]/i.test(event.key)" 
            required><?php  echo $row['comp_type']; ?></textarea>
    </td>
    </tr>
    </table>
<?php
}
?>