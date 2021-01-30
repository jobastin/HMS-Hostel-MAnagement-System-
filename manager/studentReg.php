<?php
require('../fun.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$con = connect();
if(sessioncheck() == false)
{
header('Location: ../index.html');
}
else
{
    $lid=$_SESSION['loginid'];
    $res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];

    $stu_name=$_POST['stuname'];
    $stu_dob=$_POST['Sdate'];
    $stu_religion=$_POST['relegion'];
    $stu_cast=$_POST['stucast'];
    $stu_category=$_POST['category'];
    $stu_nation=$_POST['stunation'];
    $stu_gender=$_POST['gender'];
    $stu_work=$_POST['stuwork'];
    $stu_Padd=$_POST['stupaddr'];
    $stu_Tadd=$_POST['stutaddr'];
    $stu_Ppin=$_POST['stupin'];
    $stu_Tpin=$_POST['stutpin'];
    $stu_state=$_POST['stustate'];
    $stu_dist=$_POST['studistrict'];
    
    $stu_state1=$_POST['stustate1'];
    $stu_dist1=$_POST['studistrict1'];
    
    $stu_mob=$_POST['stumob'];
    $stu_mail=$_POST['stuemail'];
    $stu_Fname=$_POST['fname'];
    $stu_Focc=$_POST['fo'];
    $stu_Mname=$_POST['mname'];
    $stu_Mocc=$_POST['mo'];
    $stu_Fmob=$_POST['fmob'];
    $stu_Mmob=$_POST['mmob'];
    $stu_Gname=$_POST['lname'];
    $stu_Gmob=$_POST['gmob'];
    $stu_block=$_POST['selectBlock'];
    $stu_room=$_POST['selectRoom'];
    
    $stu_pass='12345678'; 
     
    $q2=mysqli_query($con,"SELECT MAX(`login_id`) FROM `tbl_login`")or die("Sign in Error");
    $m = mysqli_fetch_array($q2);
    $stu_user=$m[0]+1;
    
    
    require '../mail/vendor/autoload.php';
    $message = "<p>Hey,". $stu_name  ."<br>Your accout is Active<br></p>";
    $message .= "<p>Login Id :<b>".$stu_user."</b></p>";
    $message .= "<p>Default Password :<b>".$stu_pass."</b></p>";
    $message .= "<p>Block Name :<b>".$stu_block."</b></p>";
    $message .= "<p>Room Number :<b>".$stu_room."</b></p>";
    $mail = new PHPMailer(true);


        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'adhinbabu1998@gmail.com';                     // SMTP username
        $mail->Password   = 'Adhin@123';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        $mail->setFrom('adhinbabu1998@gmail.com', 'HMS');
        //Recipients
        $mail->addAddress($stu_mail);
 
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "HMS : Welcome";
        $mail->Body    = $message;
        $mail->send();
    
    $stu_pass=md5($stu_pass);
    
    $q4="INSERT INTO tbl_login (username,password,role,status) VALUES ('$stu_user','$stu_pass','student',1)";
    mysqli_query($con,$q4);
    $stulid=mysqli_insert_id($con);
    
    
    
    $q6=mysqli_query($con,"UPDATE `tbl_room` SET `vacent_status`=1 WHERE `hstl_id`=$hid AND `block_id`=$stu_block AND `room_id`=$stu_room");
    
    
    
    $q1="INSERT INTO `tbl_student_info`(`stu_name`, `stu_dob`, `stu_religion`, `stu_cast`, `stu_category`, `stu_nationality`, `stu_gender`, `stu_course`, `stu_per_address`, `stu_temp_address`, `stu_per_pin`, `stu_temp_pin`, `st_id`, `dist_id`, `st_id1`, `dist_id1`,`stu_mob`, `stu_email`, `stu_f_name`, `stu_f_occupation`, `stu_m_name`, `stu_m_occupation`, `stu_f_mob`, `stu_m_mob`, `stu_g_name`, `stu_g_mob`, `login_id`,`hstl_id`, `block_id`, `room_id`,`stu_join_date`, `status`) VALUES ('$stu_name','$stu_dob','$stu_religion','$stu_cast','$stu_category','$stu_nation','$stu_gender','$stu_work','$stu_Padd', '$stu_Tadd',$stu_Ppin, $stu_Tpin,$stu_state,$stu_dist,$stu_state1,$stu_dist1,'$stu_mob','$stu_mail','$stu_Fname','$stu_Focc','$stu_Mname','$stu_Mocc','$stu_Fmob','$stu_Mmob','$stu_Gname','$stu_Gmob',$stulid, $hid,$stu_block,$stu_room,now(),1)";
    
    $q1=mysqli_query($con,$q1); 
    
    
    ?>
    <script>
    alert("Registration Successful");
    window.location.replace("../manager/#stu_register");
    </script>
<?php
}
?>



