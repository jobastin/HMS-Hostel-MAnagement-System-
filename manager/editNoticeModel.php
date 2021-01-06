<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['notice_id']))
{
$nid=$_POST['notice_id'];
$con = connect();
?>
<script>
function noticeContent()
    {
        if(!document.getElementById('noticetextC').value.trim().length)
        {
        document.getElementById("noticetextC").style.borderColor = "red";
        document.getElementById("editNoticeContent").disabled = true;
    }
        else{
        document.getElementById("noticetextC").style.borderColor = "green";
         document.getElementById("editNoticeContent").disabled = false;   
        }
    }
</script>
<?php
    
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id'];
$q1=mysqli_query($con,"SELECT * FROM `tbl_notice_publish` WHERE `notice_id`=$nid AND `hstl_id`=$hid")or die("Sign in Error");
$row = mysqli_fetch_array($q1);
    ?>
    <table>
            <tr>
            <th width="50px">Content</th>
            <td>&nbsp;</td>
            <td>
    <textarea class="form-control" id="noticetextC"  class="noticetextC" oninput="noticeContent()" required ><?php  echo $row['content']; ?></textarea>
    </td>
    </tr>
    </table>
<?php
}
?>