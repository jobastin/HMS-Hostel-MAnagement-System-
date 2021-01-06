<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == false)
{
header('Location: ../index.html');
}
else
{
    $lid=$_SESSION['loginid'];
    $res=mysqli_query($con,"SELECT * FROM `tbl_student_info` WHERE `login_id`=$lid")or die("Sign in Error");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];
    $res1=mysqli_query($con,"SELECT * FROM `tbl_student_info` WHERE `hstl_id`=$hid AND `login_id`=$lid")or die("Sign in Error");
    $row1 = mysqli_fetch_array($res1);
    $blockid=$row1['block_id'];
    $roomid=$row1['room_id'];
    
    ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <title>Student Dashboard</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://morrisjs.github.io/morris.js/css/morris.css'>
    <link rel="stylesheet" href="../css/student_dash.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>
    <script src='https://cdn.oesmith.co.uk/morris-0.4.1.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script  src="../js/student_dash.js"></script>
    <script  src="../js/student_dash_validation15.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <!-- view table student and employee -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/dash_style.css">
    <link rel="stylesheet" type="text/css" href="../css/viewTbl.css">
    <script src="../js/student_dash.js"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="">
    <header class="navbar-fixed-top">
      <div class="row">
        <div class="container-fluid">
          <div class="pull-left">
            <div class="pull-left logo text-center">
              <span>LOGO</span>
            </div>
          </div>
          <div class="pull-right">
            <div class="marr20">
              <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown user">
                  <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#"><i class=
                  "fa fa-user fa-fw"></i> </a>
                  <ul class="dropdown-menu dropdown-user">
                    <li>
                      <a href="#" data-toggle="modal" data-target="#EdiPassModal"><i class="fa fa-gear fa-fw"></i>Edit Password</a>
                    </li>
<!--                    <li class="divider"></li>-->
                    <li>
                      <a href="#" id="logout" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                  </ul><!-- /.dropdown-user -->
                </li><!-- /.dropdown -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="wrap">
      <div class="side-menu">
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            
          </div><!-- Main Menu -->
          <div class="side-menu-container">
            <ul class="nav navbar-nav">
              <li>
                <a href="#dashboard" onclick="dashboard()"><span class="glyphicon glyphicon-send"></span> Dashboard</a>
              </li>
              <li >
                <a href="#complaint" onclick="complaint()"><span class="glyphicon glyphicon-cog"></span> Register Complaint</a>
              </li>
              <li>
                <a href="#notice" onclick="notice()"><span class="glyphicon glyphicon-th-list"></span> Notice View</a>
              </li>
              <li>
                <a href="#laundry" onclick="laundry()"><span class="glyphicon glyphicon-triangle-right"></span> Laundary Information</a>
              </li>
              <li>
                <a href="#mess" onclick="mess()"><span class="glyphicon glyphicon-triangle-right"></span> Mess detail View</a>
              </li>
              <li>
                <a href="#vacate" onclick="vacate()"><span class="glyphicon glyphicon-triangle-right"></span> Vacating Form</a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </nav>
      </div>
      <!--      Dashboard Begins -->
      <div class="container-fluid" id="dashboard" style="display: inline;" >
        <div class="side-body">
          <div class="page-title-box">
            <h3 class="page-title pull-left" >Dashboard</h3>
            <div class="clearfix"></div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-sm-12">
              <div class="row">

                <div class="col-sm-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div>
                              <?php 
    
                              $q1=mysqli_query($con,"SELECT * FROM `tbl_block_info` WHERE `hstl_id`=$hid AND `block_id`=$blockid")or die("Sign in Error");
                              $r = mysqli_fetch_array($q1);
                              $q2=mysqli_query($con,"SELECT * FROM `tbl_room` WHERE `room_id`=$roomid AND `hstl_id`=$hid AND `block_id`=$blockid")or die("Sign in Error");
                              $r2= mysqli_fetch_array($q2);
                              ?>
                            <h4>Block Name : <?php echo $r['block_name']; ?> <br>
                            Room No : <?php echo $r2['room_no']; ?></h4>
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          <i class="fa fa-home fa-5x"></i>
                        </div> 
                      </div>
                    </div>
                    <div class="panel-footer">
                      Warden number
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="panel panel-yellow">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div>
                           <h3>Complaint Status</h3>
                          </div>
                          <div>
                            <h5>Active</h5>
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          <i class="fa  fa-5x">0</i>
                        </div>
                      </div>
                    </div><a href="#">
                    <div class="panel-footer">
                      <span class="pull-left">View Details</span> <span class="pull-right"><i class=
                      "fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>
                
                <div class="col-sm-6">
                  <div class="panel panel-green">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div>
                            <h3>Laundry Update<br></h3><h5>In date : 23/89/2020</h5>
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          Status
                        </div> 
                      </div>
                    </div>
                    <a href="#">
                    <div class="panel-footer">
                      <span class="pull-left">View Details</span> <span class="pull-right"><i class=
                      "fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="panel panel-red">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div>
                           <h3>Leave Request<br></h3><h5>Applied on : 23/89/2020</h5>
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          Status
                        </div>
                      </div>
                    </div><a href="#">
                    <div class="panel-footer">
                      <span class="pull-left">View Details</span> <span class="pull-right"><i class=
                      "fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <i class="fa fa-bell fa-fw"></i> Notice Board
                </div>
                <div class="panel-body">
                  <div class="list-group">
                      <?php
                        $q2=mysqli_query($con,"SELECT * FROM `tbl_notice_publish` WHERE`hstl_id`=$hid AND `status`=1 ORDER BY `notice_id` DESC")or die("Sign in Errorq2");
                        mysqli_num_rows($q2);
                        if(mysqli_num_rows($q2))
                        {
                        $c=3;
                        while($row=mysqli_fetch_array($q2) and $c>0)
                        {
                            ?>
                         <div class="list-group-item" >
                            <p class="card-text"><?php echo $row['content']; ?></p>
                          </div>  
                         <?php
                            $c--;
                        }
                        }
                            else
                            {
                                ?>
                               <div class="list-group-item">
                            <p class="card-text">Not yet Published !!</p>
                          </div>
                         <?php
                            } 
                         ?>
                  </div><a class="btn btn-info btn-block" href="#" onclick="notice()">View All Notice</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <i class="fa fa-line-chart fa-fw"></i> Common Rules
                </div>
                <p class="padd20">something</p>
                <div id="line-chart" style="height:250px;"></div>
              </div>
            </div> 
            <div class="col-sm-4">
              <div class="panel panel-success">
                <div class="panel-heading">
                  <i class="fas fa-utensils"></i> Mess info Updates  
                </div>
                <p class="padd20">food details</p>
                <div id="donut-chart" style="height:250px"></div>
              </div>
            </div>            
          </div>
        </div>
      </div>
      <!--      Dashboard ends--> 
      
      
      
      <!--  Register Complaint-->
        <div class="container-fluid" id="complaint" style="display: none;">
        <div class="side-body">
        <div class="page-title-box">
        <div class="col-md-12 mt-4">
        <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Complaint Category</h2>
					</div>
                    <div class="col-sm-6">  
						<a href="#myModal" class="btn btn-success"  data-toggle="modal" data-target="#myModal"><i class="material-icons">&#xE147;</i> <span>Register a Comlaint</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SiNo</th>
						<th>Complaint Type</th>
						<th>Details</th>
                        <th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
                <tbody>
                <?php
                $q2=mysqli_query($con,"SELECT * FROM `tbl_complaint_category` WHERE `hstl_id`=$hid AND `status`=1")or die("Sign in Error");
                if(mysqli_num_rows($q2)>0)
                {
                    $c=1;
                while($row=mysqli_fetch_array($q2))
                {
                ?>
                <tr>
						<td><?php echo $c++; ?></td>
						<td>123</td>
						<td>123</td>
                        <td>1</td>
						<td>
							<a href="#" class="editComptype" id="<?php echo $row['comp_id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#" class="deleteComptype" id="<?php echo $row['comp_id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>    
                <?php
                }
                }
                else
                {
                ?>
                <tr>
                <td colspan="6"><center>No Notice Added !!!!</center></td>
                </tr>
                <?php
                }
                ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>  
			</div>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
      <!--   Register complaint ends-->
    
     <!--  Notice publishing -->
        <div class="container-fluid" id="notice" style="display: none;">
        <div class="side-body">
          <div class="page-title-box">
              <div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Notice List</h2>
					</div>
				</div>
			</div>
            <div class="clearfix"></div>
            <table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SiNo</th>
						<th>Content</th>
						<th>Publish date</th>
					</tr>
				</thead>
                <tbody>
                <?php
                $q2=mysqli_query($con,"SELECT * FROM `tbl_notice_publish` WHERE `hstl_id`=$hid AND `status`=1")or die("Sign in Error");
                if(mysqli_num_rows($q2)>0)
                {
                    $c=1;
                while($row=mysqli_fetch_array($q2))
                {
                ?>
                <tr>
						<td><?php echo $c++; ?></td>
						<td><?php echo $row['content']; ?></td>
						<td><?php echo $row['publish_date']; ?></td>
					</tr>    
                <?php
                }
                }
                else
                {
                ?>
                <tr>
                <td colspan="4"><center>No Notice Added !!!!</center></td>
                </tr>
                <?php
                }
                ?>
				</tbody>
			</table>
          </div>
        </div>
    </div>
      <!--  Notice publishing  ends-->
      
      <!--  laundry section -->
        <div class="container-fluid" id="laundry" style="display: none;">
        <div class="side-body">
          <div class="page-title-box">
            <h3 class="page-title pull-left">Laundry List</h3>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
      <!--  laundry section ends-->
      
      <!--  mess -->
        <div class="container-fluid" id="mess" style="display: none;">
        <div class="side-body">
          <div class="page-title-box">
            <h3 class="page-title pull-left">Mess</h3>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
      <!--  mess ends-->
    
    <!--  vacating form -->
        <div class="container-fluid" id="vacate" style="display: none;">
        <div class="side-body">
          <div class="page-title-box">
            <h3 class="page-title pull-left">vacate</h3>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
      <!--  vacating form ends-->
    
    
  </div>
  </div>
</body>

<!-- logout Modal  -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="../logout.php" id="logout">Logout</a>
      </div>
    </div>
  </div>
</div>
<!-- logout Modal  ends --> 

<!-- edit password Modal  -->
<div class="modal fade" id="EdiPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="resetPass.php" method="POST">
      <!-- Modal body -->
      <div class="modal-body">
            <input class="form-control" type="password" name="cpass1" id="cpass1"   placeholder="Enter Current Password" required>
            <span id="msg1"></span>
            <br>
                <input class="form-control" type="password" name="npass1" id="npass1"  disabled onblur="valFPasswod()" placeholder="New Password" required>
            <br>
                <input class="form-control" type="password" name="ncpass1" id="ncpass1"  disabled onblur="valCFPasswod()"  placeholder="Confirm New Password" required>
            <br>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" value="Update" id="Epass" disabled class="btn btn-primary" />
      </div>
      </form>
    </div>
  </div>
</div>
<!-- edit password Modal  ends --> 
   
<!-- REgister complaint Modal  -->
<div class="modal fade" id="myModal" role="dialog">
    <form action="registerComp.php" method="POST">
    <div class="modal-dialog">
      <div class="modal-content">
          <form>
        <div class="modal-header">
           <h4 class="modal-title">Register a Complaint</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
           <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category :</label>
            <select class="form-control" id="exampleFormControlSelect1" style="font-size:1em" required >
                <?php 
                $qc=mysqli_query($con,"SELECT * FROM `tbl_complaint_category` WHERE `hstl_id`=$hid AND `status`=1")or die("Sign in Error");
                if(mysqli_num_rows($qc)>0)
                {
                ?>
                <option value="">-- Select --</option>
                <?php
                while($row=mysqli_fetch_array($qc))
                {    
                ?>
                <option value="<?php echo $row['comp_id']; ?>"><?php echo $row['comp_type']; ?></option>
                <?php 
                }
                }
                else
                { 
                ?>
                <option value="">-- No Category Added --</option>  
                <?php
                }
                ?>
            </select>
            </div>
            <div class="form-group">
            <label for="exampleFormControlInput1">Details :</label>
            <textarea class="form-control"  required onkeypress="return /[a-zA-Z 0-9]/i.test(event.key)" oninput="checkComp()" id="compDetails" name="compDetails" placeholder="Complaint Details" style="font-size:1em" ></textarea>
            </div>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="ADD" id="compAdd" disabled title='Enter the values' >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
    </form>
  </div>
<!-- REgister complaint Modal ends -->

<!-- partial -->

<script>
   
    
function checkComp()
    {
        if(!document.getElementById('compDetails').value.trim().length)
        {
        document.getElementById("compDetails").style.borderColor = "red";
        document.getElementById("compAdd").disabled = true;
    }
        else{
        //document.getElementById("compDetails").style.borderColor = "green";
        document.getElementById("compAdd").disabled = false;   
        }
    }
    
$(document).ready(function(){
  $("#cpass1").blur(function(){
    var pass1 = $("#cpass1").val();
        $.ajax({  
                url:"checkCPass.php",  
                method:"post",  
                data:{pass:pass1},  
                success:function(data){  
                if(data==1)
                    {
                    $("#npass1").removeAttr("disabled");
                    $("#ncpass1").removeAttr("disabled");
                    }
                    if(data==0)
                    {
                    $("#npass1").attr("disabled", "disabled");
                    $("#ncpass1").attr("disabled", "disabled");
                    }
                }  
           });  
  }); 
});   
</script>
</body>
</html>
<?php } ?>