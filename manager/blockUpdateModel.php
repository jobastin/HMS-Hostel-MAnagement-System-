<?php
require('../fun.php');
if(sessioncheck() == true or isset($_POST['block_id']))
{
$bid=$_POST['block_id'];
$con = connect();
?>
<script>

c=[1,1];
function checkBlock()
{
var m = document.getElementsByName('newBlockName')[0];
        if (checkName(m.value)){
            document.getElementById("newBlockName").style.borderColor = "green";
            c[0]=1;
             document.getElementById("editBlockName").disabled = false;
        } 
        else
            {
            document.getElementById("newBlockName").style.borderColor = "red"; 
                document.getElementById("editBlockName").disabled = true;
                c[0]=0;
        }
    button1();
}
function checkRoom()
    {
      var r = document.getElementsByName('roomCount')[0];
        if (r.value>0){
            document.getElementById("roomCount").style.borderColor = "green";
             document.getElementById("editBlockName").disabled = false;
            c[1]=1;
        } 
        else
            {
            document.getElementById("roomCount").style.borderColor = "red"; 
            document.getElementById("editBlockName").disabled = true;
            c[1]=0;
        }
        button1();
    }
    
function button1()
{
    var l = c.length;
    var s=0;
    for(var i=0;i<l;i++)
    {
        s=s+c[i];
    }
    if(l==s)
    {
        document.getElementById("editBlockName").disabled = false;
    }
    else
    {
         document.getElementById("editBlockName").disabled = true; 
    }
}
</script>
<?php
    
$lid=$_SESSION['loginid'];
$res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
$row = mysqli_fetch_array($res);
$hid=$row['hstl_id'];
$q1=mysqli_query($con,"SELECT * FROM `tbl_block_info` WHERE `block_id`=$bid AND `hstl_id`=$hid")or die("Sign in Error");
    ?>
    <table>
            <tr>
            <th>Update Block Name</th>
            <td>
                <?php
    $row = mysqli_fetch_array($q1);
    ?>
    <input type="text" id="newBlockName" name="newBlockName" class="form-control" oninput="checkBlock();" onkeypress="return /[a-zA-Z ]/i.test(event.key)" value="<?php  echo $row['block_name']; ?>" required>
    </td>
    </tr>
    <?php
    $b2=mysqli_query($con,"SELECT MAX(`room_no`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$bid")or die("Sign in Error");
    $m = mysqli_fetch_array($b2);
    $max=$m[0];    
        ?>
    <tr>
            <th>Room Count</th>
            <td>
    <input type="text" id="roomCount" name="roomCount" class="form-control"  oninput="checkRoom();" onkeypress="return /[0-9]/i.test(event.key)" 
           value="<?php  echo $max; ?>" required>
    </td>
    </tr>
    </table>
<?php
}
?>