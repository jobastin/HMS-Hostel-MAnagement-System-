<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('fun.php');
$con = connect();
if(sessioncheck() == true)
{
$e= $_POST["fe"];
$u= $_POST["fu"];    
?>
<script>
alert("indise if");
</script>
<?php
$q1 = mysqli_query($con,"SELECT * FROM `tbl_login` WHERE `username`='".$_POST["fu"]."'")or die("Sign in Error");
$r1 = mysqli_fetch_array($q1);
$lid=$r1['login_id'];
$role=$r1['role'];
    

    require '../mail/vendor/autoload.php';
    $message = "<p>Hey,<br>Your Password is Reseted</p>";
    $message .= "<p>Username :<b>".$u."</b></p>";
    $message .= "<p>Password :<b>".12345678."</b></p>";
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
        $mail->Subject = "HMS : Account Activated";
        $mail->Body    = $message;
        $mail->send();
        echo "Email Sent";
        
        $pass=12345678;
        $pass=md5($pass);
        $q2 = mysqli_query($con,"UPDATE `tbl_login` SET `password`='$pass'  WHERE `login_id`=$lid AND `role`='$role'")or die("Sign in Error");
        echo "mail sent";
   
}
else
{
?>
<script>
alert("indise else");
</script>
<?php    
    
echo "Some Error Occoured.. Try again !!";
}
?>