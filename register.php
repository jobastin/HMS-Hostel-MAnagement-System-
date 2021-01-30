<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('fun.php');
$con = connect();

//hostel details

$hname=$_POST['hstlname'];
$hcategory=$_POST['category'];
$hcap=$_POST['totalcap'];
$hemail=$_POST['hstlemail'];
$htel=$_POST['hstltele'];
$hmob=$_POST['hstlmob'];
$hadd=$_POST['hstlAdr'];
$hpin=$_POST['hstlPin'];
$hstate=$_POST['permstate'];
$hdist=$_POST['permdistrict'];

//hostel manager details
$mname=$_POST['Mname'];
$mgender=$_POST['Mgender'];
$memail=$_POST['Memail'];
$mmobile=$_POST['Mmobile'];
$madd=$_POST['MAdr'];
$mpin=$_POST['Mpin'];
$mstate=$_POST['mstate'];
$mdist=$_POST['mdistrict'];
$muname=$_POST['Muname'];
$mpass=$_POST['Mpass'];


    require 'mail/vendor/autoload.php';
    $message = "<p>Hey,". $mname  ."<br>Your accout is Registered Successfully<br>Wait For Confirmation Message</p>";
    $message .= "<p>Username :<b>".$muname."</b></p>";
    $message .= "<p>Password :<b>".$mpass."</b></p>";
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
        $mail->addAddress($memail);
 
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "HMS : Account Registered";
        $mail->Body    = $message;
        $mail->send();
       

$mpass=md5($mpass);
$q1="INSERT INTO tbl_hostel_reg (hstl_name,hstl_address,st_id,dist_id,hstl_pin,hstl_type,hstl_capacity,hstl_mob,hstl_land,hstl_email, status)VALUES ('$hname','$hadd',$hstate,$hdist,$hpin,'$hcategory',$hcap,'$hmob','$htel','$hemail',1)";
mysqli_query($con,$q1);
$hid=mysqli_insert_id($con);


$q3="INSERT INTO tbl_login (username,password,role,status) VALUES ('$muname','$mpass','manager',0)";
mysqli_query($con,$q3);
$lid=mysqli_insert_id($con);


$q2="INSERT INTO tbl_hostel_manager (hstl_id,hstl_manager_name,hstl_manager_gender,hstl_manager_email,hstl_manager_phno, hstl_manager_add,hstl_manager_state,hstl_manager_dist,hstl_manager_pin,login_id,status) VALUES ($hid,'$mname','$mgender','$memail','$mmobile','$madd','$mstate','$mdist',$mpin,$lid,0)";
mysqli_query($con,$q2);


   





mysqli_close($con);
?>
<script>

alert("Registration Successful");
function showMsg()
{
$("#alertMsg").fadeIn('slow', function () {
    $(this).delay(3000).fadeOut('slow');
  });
}
    location.href="loginMain.php";

        </script>


