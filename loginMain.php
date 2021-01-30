<?php
require('fun.php');
sessiondelete();
$con = connect();

?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="css/registraion_form.css" rel="stylesheet">
    <link href="css/registration_form1.css" rel="stylesheet">
    
    <script language="JavaScript" src="js/validate1.js"></script>
    <script src="js/registraion_form.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    //for district selection
$(document).ready(function(){
    $('#permstate').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:"district.php/district()",
                data:'st_id='+countryID,
                success:function(html){
                    $('#permdistrict').html(html); 
                }
            }); 
        }else{
            $('#permdistrict').html('<option value="">Select state first</option>');
        }
    });
});
    

$(document).ready(function(){
    $('#mstate').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:'district.php',
                data:'st_id='+countryID,
                success:function(html){
                    $('#mdistrict').html(html); 
                }
            }); 
        }else{
            $('#mdistrict').html('<option value="">Select state first</option>');
        }
    });
});
    
var fu;
        
$(document).ready(function(){
  $("#fusername").on('input', function(){
    fu = $(this).val();
    if(fu){
            $.ajax({
                type:'post',
                url:'Fusername.php',
                data:'f_u='+fu,
                success:function(html){
                    $('#fusername').html(html); 
                    
                }
            }); 
        }else{
            //$('#npass').prop( "disabled", true );
        }
  });
});
       var fe; 
$(document).ready(function(){
  $("#femail").on('blur', function(){
    fe = $(this).val();
    if(fe){
            $.ajax({
                type:'post',
                url:'Femail.php',
                data:{fe:fe,fu:fu},
                success:function(html){
                    $('#femail').html(html); 
                    
                }
            }); 
        }else{
            //$('#npass').prop( "disabled", true );
        }
  });
    
 $('#fbutton').click(function() {
        $.ajax({  
                url:"ResetpasswordMail.php",  
                method:"post",  
                data:{fe:fe,fu:fu},  
                success:function(data){  
                     alert(data);
                }  
           });  
    });
    
});
        

//$(document).ready(function(){
//  $("#fphno").on('input', function(){
//    var fp = $(this).val();
//    if(fp){
//            $.ajax({
//                type:'post',
//                url:'Fphno.php',
//                data:'f_p='+fp,
//                success:function(html){
//                    $('#fphno').html(html); 
//
//                }
//            }); 
//        }else{
//
//        }
//  });
//});
        
</script>  
</head>
<body>
<!-- partial:index.partial.html -->
<div id="back">
  <canvas id="canvas" class="canvas-back"></canvas>
  <div class="backRight">    
  </div>
  <div class="backLeft">
  </div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Registration Page </h2>
         <div class="form-element form-submit">
            <button id="goLeft" class="signup off" style="float: right;">Back to Login</button> 
          </div>
        <br>
        <form action="register.php" method="POST">
                            <table class="table">
                                               <td colspan="5"><center><h4>HOSTEL REGISTRATION</h4></center></td>
                                                <tr>
                                                    <th valign="top">Name</th>
                                                    <td><input type="text" class="form-control"  placeholder="Name of Hostel" name="hstlname" id="hstlname" oninput="valhstlname();" onkeypress="return /[a-zA-Z ]/i.test(event.key)" required />
                                                    <td width="50px"></td>
                                                    <th valign="top">Category</th>
                                                    <td>	
                                                        <select class="form-control" name="category" style="width: 200px" required>
                                                            <option value="">-Select-</option>
                                                            <option value="Male" >Male</option>
                                                            <option value="Female" >Female</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top">Total Capacity</th>
                                                    <td><input type="number" class="form-control" name="totalcap" placeholder="Max Capacity of Hostel" id="totalcap" onblur="valCapacity();" required /></td>
                                                    <td width="50px" valign="top"></td><th>Email</th>
                                                    <td><input type="email" class="form-control" name="hstlemail" id="hstlemail" placeholder="example@something.com" onblur="valhstlEmail();" required />
                                                    <br>
                                                        <span id="user-availability-status1"></span>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top">Telephone</th>
                                                <td><input type="text" class="form-control" name="hstltele" id="hstltele" onblur="valhstlTele();" placeholder="Eg : 04952804990"  maxlength="12" onkeypress="return /[0-9]/i.test(event.key)" required /><br>
                                                <span>Telephone number with code.No space or '-' in between</span></td>
                                                     <td width="50px" valign="top"></td><th>Mobile</th>
                                                    <td><input type="text" class="form-control" name="hstlmob" id="hstlmob" onblur="valhstlMob();" placeholder="10 digit molie number" onkeypress="return /[0-9]/i.test(event.key)" required /></td>
                                                </tr>
                                                <tr>
                                                </tr>
                                                 <tr>
                                                    <th valign="top" colspan="5" style="text-align:center;/*border1px solid #ccc*/"> Address
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th valign="top">Address line </th>
                                                    <td><input type="text" class="form-control"  name="hstlAdr" maxlength="150"   id="hstlAdr"  onblur="valhstlAdr()" placeholder="Street, House name" required /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Pincode</th>
                                                    <td><input type="text" class="form-control" name="hstlPin" id="hstlPin"  onblur="valhstlPin()" placeholder="Eg : 673571" onkeypress="return /[0-9]/i.test(event.key)" required /></td>
                                                </tr>
                                               <tr>
                                                    <th valign="top">State</th>
                                                    <td><select class="form-control"style="width: 200px" name="permstate" id="permstate" tabindex="3" required >
                                                                    <option value="">-Select-</option>
                                    <?php
                                    $res=mysqli_query($con,"SELECT `st_id`,`st_name` FROM `tbl_state_list` WHERE `status`=1 ORDER BY `st_name` ASC")or die("Sign in Error");
                                    mysqli_close($con);
                                    while($s = mysqli_fetch_array($res))
                                    {
                                        ?>
                                        <option value="<?php echo $s['st_id']; ?>" ><?php echo $s['st_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                                            </select>
                                                                    </td>
                                                                    <td width="50px"></td>
                                                    <th valign="top"  >District</th>
                                                    <td ><select class="form-control" style="width: 200px "   name="permdistrict" id="permdistrict" tabindex="4" required >
                                                                    <option value="">-Select state first-</option>
                                                            </select></td>
                                            
                                                </tr>
                                                <tr><td colspan="5"><hr>
                                                        </td></tr>
                                                        <tr>
                                                   <td colspan="5"><center><h4>HOSTEL MANAGER REGISTRATION</h4></center></td>
                                               </tr>
                                               <tr>
                                                    <th valign="top">Name</th>
                                                    <td><input type="text" class="form-control"  placeholder="Name of Manager" name="Mname" id="Mname" onblur="valMname()"  onkeypress="return /[a-zA-Z ]/i.test(event.key)" required />
                                                   </td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Gender</th>
                                                    <td>	
                                                        <select class="form-control" name="Mgender" style="width: 200px" required>
                                                            <option value="">-Select-</option>
                                                            <option value="Male" >Male</option>
                                                            <option value="Female" >Female</option>
                                                        </select>
                                                    </td>
												</tr>
                                                <tr>
                                                    <th valign="top">Email</th>
                                                    <td><input type="email" class="form-control" name="Memail" id="Memail" onblur="valMemail()" placeholder="example@something.com" required />
                                                    <br>
                                                        <span id="user-availability-status2"></span>
                                                    </td>
                                                     <td width="50px"></td><th valign="top">Mobile</th>
                                                    <td><input type="text" class="form-control" name="Mmobile" id="Mmobile" onkeypress="return /[0-9]/i.test(event.key)" onblur="valMmobile()" placeholder="10 digit molie number" required /></td>
                                                </tr>
                                                
                                                <tr><td colspan="5">
                                                </td>
                                                </tr>
                                                 <tr>
                                                    <th colspan="5" colspan="2" style="text-align:center;/*border1px solid #ccc*/"> Address
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th valign="top">Address line </th>
                                                    <td><input type="text" class="form-control"  name="MAdr" id="MAdr"  onblur="valMadr()" placeholder="Street, House name" required /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Pincode</th>
                                                    <td><input type="text" class="form-control" name="Mpin" id="Mpin"  onblur="valMpin()" placeholder="Eg : 673571" onkeypress="return /[0-9]/i.test(event.key)" required /></td>
                                                </tr>
                                               <tr>
                                                    <th valign="top">State</th>
                                                    <td><select class="form-control"style="width: 200px"  name="mstate" id="mstate" required>
                                                            <option value="">-Select-</option>
                                                                    
                                                        <?php
                                                        $con = connect();
                                    $res=mysqli_query($con,"SELECT `st_id`,`st_name` FROM `tbl_state_list` WHERE `status`=1 ORDER BY `st_name` ASC")or die("Sign in Error");
                                    mysqli_close($con);
                                    while($s = mysqli_fetch_array($res))
                                    {
                                        ?>
                                        <option value="<?php echo $s['st_id']; ?>" ><?php echo $s['st_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                                        
                                                        
                                                                    </select>
                                                                    </td>
                                                                    <td width="50px"></td>
                                                    <th valign="top"  >District</th>
                                                    <td class="keraladist" ><select class="form-control" style="width: 200px "  name="mdistrict" id="mdistrict" required>
                                                            <option value="">-Select-</option>
                                                            </select></td>
                                                </tr>
                                                <tr><td colspan="5"><hr>
                                                        </td></tr>
                                                        <tr>
                                                        <tr>
                                                    <th valign="top">USERNAME</th>
                                                    <td><input type="text" class="form-control" name="Muname"  id="Muname" placeholder="username" onblur="valUsername()" required />
                                                            <br>
                                                        <span id="user-availability-status">Can contain letters (a-z, A-Z), numbers (0-9)
                                                        </span>    
                                                        </td>
                                                     <td width="50px"></td><th valign="top">PASSWORD</th>
                                                    <td><input type="password" class="form-control" name="Mpass" id="Mpass" placeholder="********" onblur="valPasswod()" required />
                                                    <br>
                                                            <span>Minimum length 8</span>
                                                            </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top">CONFIRM PASSWORD</th>
                                                    <td><input type="password" class="form-control" name="Mcpass" id="Mcpass" placeholder="********" onblur="valCPasswod()" required />
                                                    <span id='message'></span></td>
                                                     <td width="50px">
                                                </tr>
                                                <tr>
                                                <th>&nbsp;</th>
                                                <td valign="top">
                                                    <input type="submit" disabled = "true" id='reg' value="REGISTER" class="btn btn-primary" />
                                                </td>
                                                </tr>
												<tr>
                                                <td valign="top" colspan="6">
												<br><br>
                                                 </td>
                                                 </tr>
                                        </table>
                                        </form>
      </div>
    </div>
    <div class="right">
        <br>
        <center>
        <h3>Hostel Management System</h3></center>
      <div class="content1">
        <h2>Login</h2>
        <form id="form-login" method="post" action="login.php">
          <div class="form-element form-stack">
            <label for="username-login" class="form-label"><h5>Username</h5></label>
            <input id="username-login" type="text" name="username-login" onkeypress="return /[a-zA-Z0-9]/i.test(event.key)" required>
          </div>
          <div class="form-element form-stack">
            <label for="password-login" class="form-label"><h5>Password</h5></label>
            <input id="password-login" type="password" name="password-login" required>
              <span style="color:red" id="span1"></span>
          </div>
          <div class="form-element form-submit">
            <button id="login" class="login" type="submit" name="login">Log In</button>
            <a href="#" style="float: right;" data-toggle="modal" data-target="#myModal" >Forgot Password ??</a>
            <br>
            <br>
            <button id="goRight" class="login off" name="signup">Register a Hostel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js'></script>
<script  src="js/login.js"></script>
<script>
    
function checkName(text){
    return (/^[A-Za-z ]+$/.test(text));
}
function checkUsername(text){
    return (/^[A-Za-z0-9]+$/.test(text));
}
function checkPassword(text){
    return (/^.{8,}$/.test(text));
}
var c=[0,0,0,0,0,0,0,0,0,0,0,0,0,0];
function valhstlname()
        {
            
            var hname = document.getElementsByName('hstlname')[0];
            if (checkName(hname.value)){
                document.getElementById("hstlname").style.borderColor = "green";
                c[0]=1;   
            } 
            else
                {
                   document.getElementById("hstlname").style.borderColor = "red"; 
                    c[0]=0;
                }
                button();
        }
    
function valUsername()
    {
//        var mu = document.getElementsByName('Muname')[0];
//            if (checkUsername(mu.value)){
//                //document.getElementById("Muname").style.borderColor = "green";
//                c[12]=1; 
//            } 
//            else
//                {
//                //document.getElementById("Muname").style.borderColor = "red"; 
//                c[12]=0;
//            }
//            button();
jQuery.ajax({
url: "checkUsername.php",
data:'username='+$("#Muname").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
},
error:function (){
}
});
} 
    

function valhstlEmail()
        {
//            var he = document.getElementsByName('hstlemail')[0];
//            if (checkEmail(he.value)){
//                document.getElementById("hstlemail").style.borderColor = "green";
//                c[2]=1;    
//            } 
//            else
//                {
//                document.getElementById("hstlemail").style.borderColor = "red"; 
//                c[2]=0; 
//            }
//            button();
            
            
jQuery.ajax({
url: "checkHostelMail.php",
data:'hemail='+$("#hstlemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
},
error:function (){
}
});
            
        }
    
function valMemail()
    {
//        var me = document.getElementsByName('Memail')[0];
//        if (checkEmail(me.value)){
//            document.getElementById("Memail").style.borderColor = "green";
//            c[8]=1; 
//        } 
//        else
//            {
//            document.getElementById("Memail").style.borderColor = "red"; 
//            c[8]=0;
//        }
//            button();
        
jQuery.ajax({
url: "checkManagerMail.php",
data:'memail='+$("#Memail").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
},
error:function (){
}
});
    }
    
function valPasswod()
    {
        var mu = document.getElementsByName('Mpass')[0];
            if (checkPassword(mu.value)){
                document.getElementById("Mpass").style.borderColor = "green";
                c[13]=1;
            } 
            else
                {
                document.getElementById("Mpass").style.borderColor = "red"; 
                c[13]=0;
            }
                button();
    }   
    
function valCPasswod()
    {
        var mc = document.getElementsByName('Mcpass')[0];
        var mu = document.getElementsByName('Mpass')[0];
            if ((checkPassword(mc.value))&&(mc.value == mu.value)&&(mc.value!= null)){
                document.getElementById("Mcpass").style.borderColor = "green";
                c[14]=1;
            } 
            else 
                {
                document.getElementById("Mcpass").style.borderColor = "red"; 
                c[14]=0;
            }
                button();
    }   
//forgot password
var c1=[0,0];

    
function button1()
{
    var l1 = c1.length;
    var s1=0;
    for(var i=0;i<l1;i++)
    {
        s1=s1+c1[i];
    }
    if(l1==s1)
    {
        document.getElementById("fbutton").disabled = false;
    }
    else
    {
         document.getElementById("fbutton").disabled = true;
    }
}    
    
function checkEmail(text){
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text))
}    
//    
//function valFEmail()
//    {
//        var me = document.getElementsByName('femail')[0];
//        if (checkEmail(me.value)){
//            document.getElementById("femail").style.borderColor = "green";
//            c1[1]=1;
//        } 
//        else
//            {
//            document.getElementById("femail").style.borderColor = "red"; 
//            c1[1]=0;    
//        }
//        button1();
//    }
    </script>

<!--forgot password modal-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot password ??</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="#" method="POST">
      <!-- Modal body -->
      <div class="modal-body">
          
            <input class="form-control"  name="fusername" id="fusername" type="text" placeholder="Username" required>
            <span id="msg" style="color:red"></span>
            <br>
            <input class="form-control" type="email" name="femail" disabled id="femail" placeholder="Registered Email" 
                        required>
            <span id="msg1" style="color:red"></span>

<!--
            <br>
                <input class="form-control" type="text" name="fphno" disabled id="fphno" placeholder="Mobile Number" 
                       onkeypress="return /[0-9]/i.test(event.key)" required onblur="valFhstlMob()">
            <br>
                <input class="form-control" type="password" name="npass" id="npass" onblur="valFPasswod()" disabled placeholder="New Password" required>
            <br>
                <input class="form-control" type="password" name="ncpass" id="ncpass" onblur="valCFPasswod()" disabled placeholder="Confirm New Password" required>
            <br>
-->
          
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" value="Reset Password" id="fbutton" disabled class="btn btn-primary" />
      </div>
      </form>
    </div>
  </div>
</div>
<!--forgot password modal ends-->
<?php
//CHECKING FOR REGISTRATION PAGE LINK
if (isset($_GET['page'])){ ?>
    <script>
        console.log("working");
    $('#slideBox').animate({
      'marginLeft' : '0'
    });
    $('.topLayer').animate({
      'marginLeft' : '100%'
  });
        
    </script>
<?php } ?>
</body>
</html>
