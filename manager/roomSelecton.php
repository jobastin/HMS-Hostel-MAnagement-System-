<?php 
require('../fun.php');
$con = connect();
if(($_POST['block_id']))
{ 
     $result1=mysqli_query($con,"SELECT * FROM `tbl_room` WHERE `hstl_id`=".$_POST['hostel_id']." AND `block_id`=".$_POST['block_id']." AND `vacent_status`=0")or die("Sign in Error");
    
    if(mysqli_num_rows($result1) > 0){ 
        echo '<option value="">Select Room</option>'; 
        while($row = mysqli_fetch_array($result1)){  
            echo '<option value="'.$row['room_id'].'">'.$row['room_no'].'</option>';
            
        } 
    }else{ 
        echo '<option value="">District not available</option>'; 
    } 
}
?>