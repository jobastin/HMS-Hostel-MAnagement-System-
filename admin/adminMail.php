<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('../fun.php');

$con = connect(); 

//if(isset($_POST['mailsend']))
//{    
//    
$hid=$_POST['hstlid'];    
$sub=$_POST['emailSub'];
$body=$_POST['emailBody'];

$q2=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$hid")or die("Sign in Error q2");
$r1 = mysqli_fetch_array($q2);
$email=$r1['hstl_manager_email'];

    require '../mail/vendor/autoload.php';
//    $message = "<p>Hey,". $hm  ."<br>Your accout is Active</p>";
//    $message .= "<p>Username :<b>".$uname."</b></p>";
//    $message .= "<p>Password :<b>".$pass1."</b></p>";
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
        $mail->addAddress($email);
 
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $body;
        $mail->send();
        echo "Email Sent";
?>
        
<script>

alert("Email sent");
function showMsg()
{
$("#alertMsg").fadeIn('slow', function () {
    $(this).delay(3000).fadeOut('slow');
  });
}
    location.href="index.php";

        </script>

