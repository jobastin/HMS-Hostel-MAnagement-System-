<?php
require('fun.php');
$con = connect();
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="registraion_form.css" rel="stylesheet">
    <link href="registration_form1.css" rel="stylesheet">
    <script src="test.js"></script>
    <script language="JavaScript" src="js/validate.js"></script>
    <script src="registraion_form.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
   
    <script>
    //for district selection
$(document).ready(function(){
    $('#permstate').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:'district.php',
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
                                                    <td><input type="email" class="form-control" name="hstlemail" id="hstlemail" placeholder="example@something.com" onblur="valhstlEmail();" required /></td>
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
                                                    <td><input type="email" class="form-control" name="Memail" id="Memail" onblur="valMemail()" placeholder="example@something.com" required /></td>
                                                     <td width="50px"></td><th valign="top">Mobile</th>
                                                    <td><input type="text" class="form-control" name="Mmobile" id="Mmobile" onkeypress="return /[0-9]/i.test(event.key)" onblur="valMmobile()" placeholder="10 digit molie number" required /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                    </td>

                                                </tr> 
                                                <tr><td colspan="5">
                                                <hr></td>
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
                                                    <td><input type="text" class="form-control" name="Muname" placeholder="username" required />
                                                            <br>
                                                            <span>Can contain letters (a-z), numbers (0-9)</span></td>
                                                     <td width="50px"></td><th valign="top">PASSWORD</th>
                                                    <td><input type="password" class="form-control" name="Mpass" id="Mpass" placeholder="********" required />
                                                    <br>
                                                            <span>Minimum length 8</span>
                                                            </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top">CONFRIM PASSWORD</th>
                                                    <td><input type="password" class="form-control" name="Mcpass" id="Mcpass" placeholder="********" required />
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
      <div class="content1">
        <h2>Login</h2>
        <form id="form-login" method="post" onsubmit="return false;">
          <div class="form-element form-stack">
            <label for="username-login" class="form-label"><h5>Username</h5></label>
            <input id="username-login" type="text" name="username">
          </div>
          <div class="form-element form-stack">
            <label for="password-login" class="form-label"><h5>Password</h5></label>
            <input id="password-login" type="password" name="password">
          </div>
          <div class="form-element form-submit">
            <button id="logIn" class="login" type="submit" name="login">Log In</button>
            <a href="#" style="float: right;">Forgot Password ??</a>
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
    
    $('#Mpass, #Mcpass').on('keyup', function () {
  if ($('#Mpass').val() == $('#Mcpass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
    
function checkName(text){
    return (/^[A-Za-z ]+$/.test(text));
}
var c=[0,0,0,0,0,0,0,0,0,0,0,0];
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
    </script>
</body>
</html>
