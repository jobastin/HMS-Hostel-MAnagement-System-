<?php 
require('fun.php');
$con = connect();
if(!empty($_POST["st_id"])){ 
    ?>
<?php
     $result=mysqli_query($con,"SELECT * FROM `tbl_district_list` WHERE `st_id`= ".$_POST['st_id']." AND `status`=1 ORDER BY `dist_name` ASC")or die("Sign in Error");
    if(mysqli_num_rows($result) > 0){ 
        echo '<option value="">Select District</option>'; 
        while($row = mysqli_fetch_array($result)){  
            echo '<option value="'.$row['dist_id'].'">'.$row['dist_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">District not available</option>'; 
    } 
}
?>