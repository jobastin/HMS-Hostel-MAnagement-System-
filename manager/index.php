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
    $res=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `login_id`=$lid")or die("Sign in Error");
    $row = mysqli_fetch_array($res);
    $hid=$row['hstl_id'];
    $res1=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_id`=$hid")or die("Sign in Error");
    $h = mysqli_fetch_array($res1);
?>
<!doctype html>
<html lang="en">
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Main dash -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    
    <!-- view table student and employee -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    
  
 
    
    <script src="../js/calendar.js"></script>
    <script src="../js/reg_form%20(21).js"></script>
    <script type="text/javascript" src="../js/validateStudent.js"></script> 
    <script type="text/javascript" src="../js/admindash1.js"></script>
    <script type="text/javascript" src="../js/student_dash_validation15.js"></script>
      
    <script>
        
//for district selection
$(document).ready(function(){
    $('#stustate').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:"../district.php",
                data:'st_id='+countryID,
                success:function(html){
                    $('#studistrict').html(html); 
                }
            }); 
        }else{
            $('#studistrict').html('<option value="">Select state first</option>');
        }
    });
});    

        
//for district selection
$(document).ready(function(){
    $('#stustate1').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'post',
                url:"../district.php",
                data:'st_id='+countryID,
                success:function(html){
                    $('#studistrict1').html(html); 
                }
            }); 
        }else{
            $('#studistrict').html('<option value="">Select state first</option>');
        }
    });
});    
        
        
//for room selection
$(document).ready(function(){
    $('#selectBlock').on('change', function(){
        var bID = $(this).val();
        var hID= <?php echo $hid; ?> ;
        if(bID){
            $.ajax({
                type:'post',
                url:"roomSelecton.php",
                data:{hostel_id:hID,block_id:bID},
                success:function(html){  
                    $('#selectRoom').html(html); 
                }
            }); 
        }else{
            $('#selectRoom').html('<option value="">--Select Block  first</option>');
        }
    });
});           
        
//reset password
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
      
    <!-- End -->
    
    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="../css/dash_style.css">
    <link rel="stylesheet" type="text/css" href="../css/calendar.css">
    <link rel="stylesheet" type="text/css" href="../css/viewTbl.css">
    <link rel="stylesheet" type="text/css" href="../css/registraion_form.css">
    <link rel="stylesheet" type="text/css" href="../css/registration_form1.css">
    <title>HMS</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	    <!--fontawesome-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		 <link rel="stylesheet" href="font/font/flaticon.css">
		 
		 
		 
		 
		 
  </head>   
  <body onload="renderDate()">
  <div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="#">
          <span class="align-middle">Hostel Manager</span>
        </a>

				 <ul class="navbar-nav align-self-stretch">
	<li class=""> 
		  <a class="nav-link text-left active"  role="button" 
		  aria-haspopup="true" aria-expanded="false" onclick="dash()">
       <i class="flaticon-bar-chart-1"></i>  <h5>Dashboard</h5>
         </a>
		  </li>
        <li class="sidebar-header">
		<h5>Inmates</h5>
        </li>
        <li class="has-sub"> 
        <a class="nav-link collapsed text-left" href="#collapseExample1" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>   Student
         </a>
        <div class="collapse menu mega-dropdown" id="collapseExample1">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#stu_register" onclick="Sregister()">New Regisration</a></li>
											<br>
											<li><a href="#stu_view" onclick="Sview()">View Student</a></li>
                                            <br>
										    <li><a href="#stu_vacate" onclick="Svacate()">Vacated Students</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
		     </div>
		  </div>
		  </li>
		  <li class="sidebar-header">
		  <h5> Employees</h5>
		  </li>
		  <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Employe</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample2">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#emp_reg" onclick="Ereg()">New Regisration</a></li>
											<br>
											<li><a href="#emp_view" onclick="Eview()">View Employee</a></li>
                                            <br>
										    <li><a href="#emp_del" onclick="Edel()">Resigned / Deleted employee</a></li>
										    <br>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
		  
		  
		   <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample3" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Warden</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample3">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#war_reg" onclick="Wreg()">New Regisration</a></li>
											<br>
											<li><a href="#war_view" onclick="Wview()">View </a></li>
                                            <br>
										    <li><a href="#war_del" onclick="Wdel()">Deleted List</a></li>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>

		  <li class="sidebar-header"><h5>Tasks</h5></li>
		   <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample4" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Room Allocation</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample4">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#block_allocation" onclick="Ballocation()">Blocks</a></li>
<!--
                                            <br>
                                            <li><a href="#room_allocation" onclick="Room_allocation()">Rooms</a></li>
                                            <br>
-->
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
		   <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample5" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Notice Publishing</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample5">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#notice_publish" onclick="notice_publish()">Publish New</a></li>
											<br>
										    <li><a href="#notice_delete" onclick="notice_delete()">Deleted List</a></li>
										    <br>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
           
          <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample6" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Mess Update</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample6">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#">Publish Menu</a></li>
											<br>
											<li><a href="#">Edit Published</a></li>
                                            <br>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
        
          <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample7" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Complaint Management</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample7">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
                                            <li><a href="#comp_view" onclick="comp_view()">View Complaints</a></li>
                                            <br>
											<li><a href="#comp_category" onclick="comp_category()">Complaint Category</a></li>
											<br>
											<li><a href="#comp_resolved" onclick="comp_resolved()">Resolved Complaints</a></li>
                                            <br>
										</ul>
									</div>
								</div>
								
							</div>
						</div>
		     </div>
		  </div>
		  </li>
		  </ul>
</div>
	   
	   
    </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
         
			
			<div id="content">

       <div class="container-fluid p-0 px-lg-0 px-md-0">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light my-navbar">

          <!-- Sidebar Toggle (Topbar) -->
            <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
               <span></span>
			    <span></span>
				 <span></span>
            </div>
			

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            
              <li class="nav-item dropdown no-arrow">
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#EdiPassModal">
                  <i class="fas fa fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a> 
            </li>
             <li class="nav-item dropdown no-arrow">
                  <a class="dropdown-item" href="#"  id="logout" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Dashboard begin -->
<div class="container-fluid px-lg-4" >
<div class="row" style="display: inline;" id="dashboard">
<div class="col-md-12 mt-lg-4 mt-4">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $h['hstl_name']; ?></h1>
          </div>
		  </div>
<div class="col-md-12">
       <div class="row">
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Total Inmates</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> In </span>
													<span class="text-muted">0</span>
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Out</span>
													<span class="text-muted">0</span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Total Employes</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> On Duty </span>
													<span class="text-muted">0</span>
												</div>
											</div>
										</div>
										
									</div>
           <?php 
            $r1=mysqli_query($con,"SELECT COUNT(`room_no`) FROM `tbl_room` WHERE `hstl_id`=$hid")or die("Sign in Error");
            $c = mysqli_fetch_array($r1);
            $r2=mysqli_query($con,"SELECT COUNT(`room_no`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `vacent_status`=1 ")or die("Sign in Error");
            $c1 = mysqli_fetch_array($r2);
            ?>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Rooms</h5>
												<h1 class="display-5 mt-1 mb-3"><?php echo $c[0]; ?></h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> Vacant</span>
													<span class="text-muted"><?php $ty=$c[0]-$c1[0];
                                                        echo $ty; ?>
                                                    </span>
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> Occupied</span>
													<span class="text-muted"><?php echo $c1[0]; ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">xxxx</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
												<div class="mb-1">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right">xxxx</i>  </span>
													<span class="text-muted"></span>
												</div>
											</div>
										</div>
										
									</div>
									
									
								</div>
</div>


    

    
    
    
     
                    <!-- column -->
                    <div class="col-md-12 mt-4">

                 <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-6" >
                     <div class="card border-success mb-3" style="max-width: auto;">
                      <div class="card-header bg-transparent border"><h3><b>Notice Board</b></h3></div>
                         <?php
                        $q2=mysqli_query($con,"SELECT * FROM `tbl_notice_publish` WHERE`hstl_id`=$hid AND `status`=1 ORDER BY `notice_id` DESC")or die("Sign in Errorq2");
                        mysqli_num_rows($q2);
                        if(mysqli_num_rows($q2))
                        {
                        $c=3;
                        while($row=mysqli_fetch_array($q2) and $c>0)
                        {
                            ?>
                         <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text"><?php echo $row['content']; ?></p>
                          </div>  
                         <?php
                            $c--;
                        }
                        }
                            else
                            {
                                ?>
                               <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text">Not yet Published !!</p>
                          </div>
                         <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            </p>
                          </div>
                         <?php
                            } 
                         ?>
              <div class="card-footer bg-transparent"><a href="#notice_publish" onclick="notice_publish()">View all</a></div>
</div>
                     
                     
                    </div>

                <div class="calendar">
                <div class="month">
                <div class="prev" onclick="moveDate('prev')">
                    <span>&#10094;</span>
                </div>
                <div>
                    <h2 id="month"></h2>
                    <p id="date_str"></p>
                </div>
                <div class="next" onclick="moveDate('next')">
                    <span>&#10095;</span>
                </div>
                </div>
                <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
                </div>
            <div class="days">
            </div>
        </div>
   
</div>
</div>
</div>
</div>
</div>
       <!-- Dashboard end -->
        
        <!-- Student Registration -->
        <div class="row" id="stu_register" style="display: none;">
        <div class="col-md-12 mt-4">
		<div id="container" class="effect aside-float aside-bright mainnav-lg">
        <div class="boxed">
            <div id="content-container">
                <div id="page-content">
                    <div class="panel">
                        <form action="studentReg.php" method="POST">
                            <div class="table-responsive">
                            <table class="table" style="font-size:15px">
                                               <h2>New Student Admission</h2>
                                                <tr>
                                                    <th valign="top">Name</th>
                                                    <td><input type="text" class="form-control" placeholder="Enter Your Name" required onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="stuname" name="stuname" onblur="valstuname();" /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Date of Birth </th>
                                                    <td><input type="date" class="form-control" name="Sdate" id="Sdate" min="1940-01-01" onblur="checkDate();" placeholder="YYYY-MM-DD"  required /></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Religion </th>
                                                    <td>	
                                                    <select class="form-control" id="relegion"  style="width: 200px"  name="relegion" required >
                                                            <option value="">-Select-</option>
                                                            <option value="Christian" >Christian</option>
                                                            <option value="Hindu" >Hindu</option>
                                                            <option value="Islam" >Islam</option>
                                                            <option value="Buddhism" >Buddhism</option>
                                                        </select>
                                                    </td><td width="50px"></td>
                                                    <th valign="top">Caste</th>
                                                    <td><input type="text" class="form-control"  placeholder="Enter Your Cast"  required id="stucast" name="stucast" onblur="valstucast();" onkeypress="return /[a-zA-Z ]/i.test(event.key)" /></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Category</th>
                                                    <td>	
                                                        <select class="form-control" name="category" id="category" style="width: 200px" required>
                                                            <option value="">-Select-</option>
                                                            <option value="General" >General</option>
                                                            <option value="SC/ST" >SC/ST</option>
                                                            <option value="OBC" >OBC</option>
                                                             <option value="OEC" >OEC</option>
                                                        </select>
                                                    </td><td width="50px"></td>
                                                    <th valign="top">Nationality</th>
                                                <td><input type="text" class="form-control"  placeholder="Enter your Nationality" required onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="stunation" name="stunation" onblur="valstunation();" /></td>
                                                    <td></td>
                                                </tr> 
                                                <tr>
                                                    <th valign="top">Gender</th>
                                                    <td>	
                                                        <select class="form-control" name="gender" id="gender" style="width: 200px" required>
                                                            <option value="">-Select-</option>
                                                            <option value="Male" >Male</option>
                                                            <option value="Female" >Female</option>
                                                        </select>
                                                    </td><td width="50px"><th valign="top">Work / Course</th>
                                                    <td>	
                                                    <input type="text" class="form-control"  placeholder="Enter details"  onkeypress="return /[a-zA-Z ]/i.test(event.key)" id="stuwork" name="stuwork" onblur="valstuwork();" required
                                                           /></td>
                                                    </tr>
                                                <tr>
                                                    <th valign="top" style="line-height: 12px"></th>
                                                    <td>
                                                    </td>

                                                    <td></td>
                                                </tr> 
                                                <tr><td colspan="5">
                                                <br><hr><br></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top" colspan="2" style="text-align:center;/*border1px solid #ccc*/">Permanent Address
                                                    </th><td width="50px"></td>
                                                    <th valign="top"  colspan="2" style="text-align:center;/*border1px solid #ccc*/">Address for Communication
                                                    </th>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th valign="top">Address line 1 </th>
                                                    <td><input type="text" class="form-control"  placeholder="Street, House name" id="stupaddr" name="stupaddr" onblur="valstuPaddr();" required 
                                                    onkeypress="return /[A-Za-z0-9, ().-]/i.test(event.key)" required /></td>
                                                    <td width="50px"></td><th valign="top">
                                                    Communication Address </th>
                                                    <td><input type="text" class="form-control"  placeholder="Street, House name" id="stutaddr" name="stutaddr" onblur="valstuTaddr();" 
                                                    onkeypress="return /[A-Za-z0-9, ().-]/i.test(event.key)" required /></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Pincode</th>
                                                    <td><input type="text" class="form-control"  placeholder="Eg : 673571"   required onkeypress="return /[0-9]/i.test(event.key)" id="stupin" name="stupin" onblur="valstuPin();" required /></td>
                                                    <td width="50px"></td><th valign="top">Pincode</th>
                                                    <td><input type="text" class="form-control"  placeholder="Eg : 673571" onkeypress="return /[0-9]/i.test(event.key)" id="stutpin" name="stutpin" onblur="valstuTPin();" required /></td>
                                                    <td></td>
                                                </tr>
                                               <tr>
                                                    <th valign="top">State</th>
                                                    <td><select class="form-control" style="width: 200px"  name="stustate" id="stustate"  required>
                                                            <option value="">-Select-</option>
                                    <?php
                                    $res4=mysqli_query($con,"SELECT `st_id`,`st_name` FROM `tbl_state_list` WHERE `status`=1 ORDER BY `st_name` ASC")or die("Sign in Error");
                                    while($s = mysqli_fetch_array($res4))
                                    {
                                        ?>
                                        <option value="<?php echo $s['st_id']; ?>" ><?php echo $s['st_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                                                    </select>
                                                                    </td>
                                                    <td></td>
                                                   <th valign="top">State</th>
                                                    <td><select class="form-control" style="width: 200px"  name="stustate1" id="stustate1"  required>
                                                            <option value="">-Select-</option>
                                    <?php
                                    $res4=mysqli_query($con,"SELECT `st_id`,`st_name` FROM `tbl_state_list` WHERE `status`=1 ORDER BY `st_name` ASC")or die("Sign in Error");
                                    while($s = mysqli_fetch_array($res4))
                                    {
                                        ?>
                                        <option value="<?php echo $s['st_id']; ?>" ><?php echo $s['st_name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                                                    </select>
                                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top"  >District</th>
                                                    <td><select class="form-control" style="width: 200px "    name="studistrict" id="studistrict" required>
                                                            <option value="">-Select state first-</option>
                                                            </select></td>
                                                    <td></td>
                                                    <th valign="top"  >District</th>
                                                    <td><select class="form-control" style="width: 200px "    name="studistrict1" id="studistrict1" required>
                                                            <option value="">-Select state first-</option>
                                                            </select></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" ><hr style="border-top:1px dotted #ccc;"/></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Mobile Number</th>
                                                    <td><input type="text" class="form-control"  placeholder="10 Digit Mobile number" id="stumob" name="stumob" onblur="valstuMob();" onkeypress="return /[0-9]/i.test(event.key)" required /></td>
                                                     <td width="50px"></td><th valign="top">Email</th>
                                                    <td><input type="text" class="form-control"  name="stuemail" id="stuemail" placeholder="example@something.com" onblur="valstuEmail();" required /></td>
                                                    <td></td>
                                                </tr>
                                                <tr><td colspan="5"><br><hr>
                                                        <br></td></tr>

                                                <tr>
                                                       <th valign="top">Father's Name </th>
                                                    <td><input type="text" class="form-control"  placeholder="Name of Father" onkeypress="return /[a-zA-Z ]/i.test(event.key)" required name="fname" id="fname"  onblur="valfname();" /></td>
                                                    <td width="50px"></td><th valign="top">Occupation</th>
                                                    <td><input type="text" class="form-control" required placeholder="Occupation of Father" onkeypress="return /[a-zA-Z ]/i.test(event.key)" name="fo" id="fo"  onblur="valfo();" /></td>
                                                    <td></td>
                                                </tr>                                                
                                                <tr>
                                                    <th valign="top">Mother's Name </th>
                                                    <td><input type="text" class="form-control"  required placeholder="Name of Mother" onkeypress="return /[a-zA-Z ]/i.test(event.key)" name="mname" id="mname"  onblur="valmname();" /></td>
                                                    <td width="50px"></td><th valign="top">Occupation</th>
                                                    <td><input type="text" class="form-control"  required placeholder="Occupation of Mother" onkeypress="return /[a-zA-Z ]/i.test(event.key)" name="mo" id="mo"  onblur="valmo();" /></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Father's Contact No </th>
                                                    <td><input type="text" class="form-control"  placeholder="Mobile Number" onkeypress="return /[0-9]/i.test(event.key)" required  name="fmob" id="fmob"  onblur="valfmob();"/></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Mother's Contact No </th>
                                                    <td><input type="text"  class="form-control"  placeholder="Mobile Number" onkeypress="return /[0-9]/i.test(event.key)" required name="mmob" id="mmob"  onblur="valmmob();" /></td>
                                                    <td width="50px"></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Name of Local Guardian </th>
                                                    <td><input type="text"  class="form-control"  placeholder="Name of Local Guardian" required name="lname" id="lname"  onblur="vallname();" /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Guardian's Contact No </th>
                                                    <td><input type="text" class="form-control"  placeholder="Mobile Number"  onkeypress="return /[0-9]/i.test(event.key)"  required name="gmob" id="gmob"  onblur="valgmob();" /></td>
                                                    <td></td>
                                                </tr>
                                                <tr><td colspan="5"><br><hr>
                                                        <br></td></tr>
                                 <tr><td colspan="5"> <h3>Default Username and password are Given Below</h3></td></tr>
                               
                                            <?php 
                                            $q2=mysqli_query($con,"SELECT MAX(`login_id`) FROM `tbl_login`")or die("Sign in Errorq2");
                                            $m = mysqli_fetch_array($q2);
                                            $s=$m[0]+1;
                                                    ?>
                                                    <tr>
                                                    <th valign="top">Username</th>
                                                    <td>	
                                                    <input type="text"  class="form-control" disabled placeholder="<?php echo $s; ?>" required name="duser" id="duser" /> 
                                                    </td>
                                                    <td width="50px"><th valign="top">Password</th>
                                                    <td>	
                                                    <input type="text"  class="form-control" required name="dpass" id="dpass" disabled value="12345678" />
                                                    </td>
                                                    </tr>
                                                
                                                    <tr>
                                                    <th valign="top" >Select Block</th>
                                                    <td><select class="form-control" style="width: 200px "  name="selectBlock" id="selectBlock" required>
                                                    <option value="">-Select Block-</option>
                                                        <?php
                                    $res5=mysqli_query($con,"SELECT * FROM `tbl_block_info` WHERE `hstl_id`=$hid")or die("Sign in Error");
                                    while($s = mysqli_fetch_array($res5))
                                    {
                                        ?>
                                        <option value="<?php echo $s['block_id']; ?>" ><?php echo $s['block_name']; ?></option>
                                    <?php
                                    }
                                    ?>    
                                                    </select>
                                                    </td>
                                                        <td></td>
                                                   <th valign="top" >Select Room</th>
                                                    <td><select class="form-control" style="width: 200px "  name="selectRoom" id="selectRoom" required>
                                                            <option value="">-Select Block First-</option>    
                                                    </select>
                                                        </td>
                                                    </tr>
                                    
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td valign="top">
                                                    <input type="submit" name="addStu" id="addStu" disabled value="Add Student" class="btn btn-primary" />
                                                </td>
                                                <td></td>
                                            </tr>
                                                <tr>
                                                 <td valign="top" colspan="6">
                                                     </td>
                                                 </tr>
                                        </table>
                                        </div>
                                        </form>
                    
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
</div>
        </div>
        <!-- Student Registration ends -->
        
        
    
        <!-- Student View -->
        <div class="row"  id="stu_view" style="display: none;">
        <div class="col-md-12 mt-4">
        <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Student View</h2>
					</div>
					<div class="col-sm-6">
						<a href="#stu_register" onclick="Sregister()" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>Student ID</th>
						<th>Name</th>
                        <th>Mobile Number</th>
						<th>Email</th>
                        <th>Block Name</th>
						<th>Room No</th>
						<th>Join Date</th>
                        <th>View Details</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                    $qs1=mysqli_query($con,"SELECT * FROM `tbl_student_info` WHERE `hstl_id`=$hid")or die("Sign in Error");
                    if(mysqli_num_rows($qs1)>0)
                    {
                    while($sv = mysqli_fetch_array($qs1))
                    {
                        $room_id=$sv['room_id'];
                        $block_id=$sv['block_id'];
                        $qs2=mysqli_query($con,"SELECT * FROM `tbl_room` WHERE `room_id`=$room_id AND `hstl_id`=$hid")or die("Sign in Error");
                        $sv1 = mysqli_fetch_array($qs2);
                        
                        $qs3=mysqli_query($con,"SELECT * FROM `tbl_block_info` WHERE `hstl_id`=$hid AND `block_id`=$block_id")or die("Sign in Error");
                        $sv3 = mysqli_fetch_array($qs3);
                        
                    ?>
					<tr>
					<td><?php echo $sv['stu_id']; ?></td>
                    <td><?php echo $sv['stu_name']; ?></td>
                    <td><?php echo $sv['stu_mob']; ?></td>
                    <td><?php echo $sv['stu_email']; ?></td>
                    <td><?php echo $sv3['block_name']; ?></td>
                    <td><?php echo $sv1['room_no']; ?></td>
                    <td><?php echo $sv['stu_join_date']; ?></td>
                    <td><a href="#" id="<?php echo $sv['stu_id']; ?>" class="studentViewMore" ><i class="material-icons" data-toggle="tooltip" title="View More">remove_red_eye</i></a></td>
					</tr>	
                    <?php }} 
                    else
                    {
                    ?>
                    <tr>
                    <td colspan="7"><center>No Inmates Added !!!!</center></td>
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
        </div>
        <!-- Student view ends -->
    

		<!-- Student Vacated -->
		<div class="row" id="stu_vacate" style="display: none;">
		<div class="col-md-12 mt-4">
		
		<div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Vacated Students</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>        
</div>
		</div>
		</div>
		<!-- Student Vacated ends -->
		
		<!-- Employee register -->
		<div class="row" id="emp_reg" style="display: none;">
		<div class="col-md-12 mt-4">
		<div id="container" class="effect aside-float aside-bright mainnav-lg">
        <div class="boxed">
            <div id="content-container">
                <div id="page-content">
                    <div class="panel">
                        
                        <div class="panel-body">
                            <form action="#" method="post">
                            <div class="table-responsive">
                            <table class="table" style="font-size:15px">
                                               <h2>New Employee Registration</h2>
                                                <tr>
                                                    <th valign="top">Name</th>
                                                    <td><input type="text" class="form-control"  value="Enter Your Name" /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Date of Birth</th>
                                                    <td><input type="text" class="form-control" value="YYYY-MM-DD" /></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th valign="top">Gender</th>
                                                    <td>	
                                                        <select class="form-control" name="gender" style="width: 200px"   >
                                                            <option value="">-Select-</option>
                                                            <option value="Male" >Male</option>
                                                            <option value="Female" >Female</option>
                                                        </select>
                                                    </td><td width="50px"><th valign="top">Work Category</th>
                                                    <td>	
                                                    <select class="form-control" name="workType" style="width: 200px"   >
                                                            <option value="">-Select-</option>
                                                            <option value="Male" >Carpenter</option>
                                                        </select></td>
                                                    </tr>
                                                <tr><td colspan="5">
                                                <hr></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top" colspan="2" style="text-align:center;/*border1px solid #ccc*/"> Address
                                                    </th><td width="50px"></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <th valign="top">Address line 1</th>
                                                    <td><input type="text" class="form-control"  name="permAdr" maxlength="150"   id="permAdr"  onblur="address()" placeholder="Street, House name" /></td>
                                                    <td width="50px"></td>
                                                    <th valign="top">Pincode</th>
                                                    <td><input type="text" class="form-control" name="permpincode" id="permpincode" tabindex="2" onblur="address()" placeholder="0000000" onkeypress="return onlyNos(event,this);" maxlength="6" /></td>
                                                    <td></td>
                                                </tr>
                                               <tr>
                                                    <th valign="top">State</th>
                                                    <td><select class="form-control"style="width: 200px" onchange="getDist(this.value,1) ;address()"   name="permstate" id="permstate" tabindex="3">
                                                            <option value="">-Select-</option>
                                                                    <option value="1" selected>Kerala</option>
                                                                    <option value="2" >Outside Kerala</option>
                                                                    <option value="3" >Outside India</option>
                                                                    </select>
                                                                    </td>
                                                                    <td width="50px"></td>
                                                    <th valign="top"  >District</th>
                                                    <td class="keraladist" ><select class="form-control" style="width: 200px "  onchange="address()"  name="permdistrict" id="permdistrict" tabindex="4">
                                                            <option value="">-Select-</option>
                                                                    <option value="1" >Kottayam</option>
                                                                    <option value="2" >Thiruvananthapuram</option>
                                                            </select></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" ><hr style="border-top:1px dotted #ccc;"/></td>
                                                </tr>
                                                <tr>
                                                    <th valign="top">Telephone</th>
                                                    <td><input type="text" class="form-control" name="telephone" placeholder="9400804990" onkeypress="return onlyNoandSpace(event,this);" maxlength="12" /></td>
                                                     <td width="50px"></td><th valign="top">Email</th>
                                                    <td><input type="text" class="form-control" name="email" placeholder="example@something.com" /></td>
                                                    <td></td>
                                                </tr>
                                                <tr style="display:none">
                                                    <th valign="top">Mobile <span style="color:red">*</span></th>
                                                    <td><input type="text" class="form-control" name="mobile" value="9995461423" onkeypress="return onlyNos(event,this);" maxlength="10" readonly='true' /></td>
                                                    <td width="50px"></td><th valign="top">Email</th>
                                                    <td><input type="text" readonly='true' class="form-control" name="email" value="alphin2002paul@gmail.com" /></td>
                                                    <td></td>
                                                </tr> 
                                                <tr><td colspan="5"><hr>
                                                        </td></tr>
                                            <tr>
                                                <th>&nbsp;</th>
                                                <td valign="top">
                                                    <input type="submit" name='draft' value="Add Employee" class="btn btn-primary" />
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        </div>
                                        </form>
                        </div>
                    </div>
                </div>    
            </div>        
                 </div>    
		
		
		</div>
		</div>
		</div>
		<!-- Employee register ends -->

		<!-- Employee view -->
		<div class="row" id="emp_view" style="display: none;">
			<div class="col-md-12 mt-4">
			<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#emp_reg" onclick="Ereg()" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>        
</div>
			</div>
		</div>
			<!-- Employee view ends -->

		<!-- Employee deleted -->
		<div class="row" id="emp_del" style="display: none;">
			<div class="col-md-12 mt-4">
					<div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Employee Resigned/ Removed</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>        
</div>
			</div>
		</div>
		<!-- Employee deleted ends -->

		<!-- Warden Regitration-->
		<div class="row" id="war_reg" style="display: none;">
			<div class="col-md-12 mt-4">
			 register warden
			</div>
		</div>
		<!-- Warden Regitration ends -->

		<!-- warden view -->
		<div class="row" id="war_view" style="display: none;">
			<div class="col-md-12 mt-4">
			<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Warden</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#war_reg" onclick="Wreg()" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Warden</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>        
</div>
			
			
			</div>
		</div>
		<!-- Warden view ends -->

		<!-- warden dismissed -->
		<div class="row" id="war_del" style="display: none;">
			<div class="col-md-12 mt-4">
					<div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Warden Resigned / Dismissed</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>        
</div>
			</div>
		</div>
		<!-- Warden dismissed ends -->

           
		<!-- Block allocation-->
		<div class="row" id="block_allocation" style="display:none;">
			<div class="col-md-12 mt-4">
			         <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Block Details</h2>
					</div>
					<div class="col-sm-6">
<!--
                        <a href="#"  class="btn btn-success" data-toggle="modal" data-target="#deleteblock">
                             add new block model
                        <i class="material-icons">delete</i> <span>Delete Block</span></a>
-->
                        
						<a href="#"  class="btn btn-success" data-toggle="modal" data-target="#addnewblock">
                            <!-- add new block model-->
                        <i class="material-icons">&#xE147;</i> <span>Add New Block</span></a>			
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
					<tr>
						<th>SIno</th>
						<th>Block ID</th>
						<th>Block Name</th>
                        <th>Vacent Rooms</th>
                        <th>Room count</th>
                        <th colspan="2"></th>
					</tr>
                <?php 
            $b1=mysqli_query($con,"SELECT * FROM `tbl_block_info` WHERE `hstl_id` = $hid AND `status` = 1")or die("Sign in Error");
            $c=1;
            while($b = mysqli_fetch_array($b1))
            {    
                 $block=$b['block_id'];
                 $b2=mysqli_query($con,"SELECT MAX(`room_no`) FROM `tbl_room` WHERE `hstl_id`=$hid AND `block_id`=$block")or die("Sign in Error");
                 $m = mysqli_fetch_array($b2);
                 $max=$m[0];
                 $b3=mysqli_query($con,"SELECT COUNT(`room_no`) FROM `tbl_room` WHERE `vacent_status`=0 AND `hstl_id`=$hid AND `block_id`=$block")or die("Sign in Error");
                 $m1 = mysqli_fetch_array($b3);
                 $v=$m1[0];
                ?>
                    <tr>
						<td><?php echo $c; ?></td>
						<td><?php echo 'B'.$b['block_id']; ?></td>
						<td><?php echo $b['block_name'];  $c=$c+1; ?></td>
                        <td><?php echo $v;  ?></td>
                        <td><?php echo $max;  ?></td>
                        <td>
                        <input type="button" value="Edit" id="<?php echo $b['block_id']; ?>" class="editBlock btn btn-success" />
                        </td>
                        <td>
                        <input type="button" value="Delete" id="<?php echo $b['block_id']; ?>" class="deleteBlock btn btn-danger" />
						</td>
					</tr>
                <?php } ?>
			</table>
		</div>
	</div>        
</div>
			</div>
		</div>
		<!-- Block allocation ends -->

        <!-- Room allocation-->
		<div class="row" id="room_allocation" style="display:none;">
			<div class="col-md-12 mt-4">
			         <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Room Details</h2>
					</div>
					<div class="col-sm-6">
                        <a href="#"  class="btn btn-success" data-toggle="modal" data-target="#deletenewroom">
                            <!-- add new block model-->
                        <i class="material-icons">delete</i> <span>Delete Room</span></a>
						<a href="#"  class="btn btn-success" data-toggle="modal" data-target="#addnewroom">
                            <!-- add new block model-->
                        <i class="material-icons">&#xE147;</i> <span>Add New Room</span></a>
					</div>
                    
				</div>
			</div>
            <?php 
            $r1=mysqli_query($con,"SELECT COUNT(`room_no`) FROM tbl_room_info WHERE `hstl_id`=$hid AND `status`=1")or die("Sign in Error");
            $c = mysqli_fetch_array($r1);
            $r2=mysqli_query($con,"SELECT COUNT(`vacate_status`) FROM `tbl_room_info` WHERE `hstl_id`=$hid AND `vacate_status`=0 AND `status`=1 ")or die("Sign in Error");
            $c1 = mysqli_fetch_array($r2);
            ?>
			<table class="table table-striped table-hover">
					<tr>
						<th>Total Number of Rooms</th>
                        <th><?php echo $c[0]; ?></th>
					</tr>
                    <tr>
						<th>Total Number of Rooms Occupied</th>
                        <th><?php $ty=$c[0]-$c1[0];
                            echo $ty; ?></th>
					</tr>
                    <tr>
						<th>Vacent Rooms</th>
                        <th><?php echo $c1[0]; ?></th>
					</tr>
			</table>
            
            
		</div>
	</div>        
</div>
			</div>
		</div>
		<!-- Room allocation ends -->   
        
      </div>
    </div>

    
  
<!-- Model classes -->  
            
   <!-- Edit student model --> 
   <div id="editStudentModel" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Student Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
    <!-- edit student model ends --> 
  
  <!-- Delete  student Modal  -->
<div id="deleteStudentModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Student</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete  student Modal  ends -->


<!-- Edit employee Modal -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- edit employee model end -->

  <!-- Delete  employee Modal  -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete  employee Modal  ends -->
   
   
   
    <!-- Edit warden model --> 
   <div id="editWardenModel" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Warden Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
    <!-- edit warden model ends --> 
    
     <!-- Delete  warden Modal  -->
    <div id="deleteWardenModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Unassign Warden</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete  warden Modal  ends -->

            
            
            
<!-- notice publishing -->
		<div class="row" id="notice_publish" style="display: none;">
			<div class="col-md-12 mt-4">
        <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Notice Publishing</h2>
					</div>
                    <div class="col-sm-6">  
						<a href="#exampleModal" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal"><i class="material-icons">&#xE147;</i> <span>Add New Notice</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SiNo</th>
						<th>Content</th>
						<th>Publish date</th>
						<th>Actions</th>
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
						<td>
							<a href="#" class="editNoticeC" id="<?php echo $row['notice_id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#" class="deleteNoticeC" id="<?php echo $row['notice_id']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
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
			</div>
		</div>
<!-- notice publishing ends -->            
            

<!-- notice deleted -->
<div class="row" id="notice_delete" style="display: none;">
    <div class="col-md-12 mt-4">
					<div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Notice Deleted</h2>
					</div>
				</div>
			</div>
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
                $q2=mysqli_query($con,"SELECT * FROM `tbl_notice_publish` WHERE `hstl_id`=$hid AND `status`=0")or die("Sign in Error");
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
                <td colspan="4"><center>No Notice Deleted !!!!</center></td>
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
    
            </div>
<!-- notice deleted ends -->
            

<!-- complaint view -->
		<div class="row" id="comp_view" style="display: none;">
			<div class="col-md-12 mt-4">
			 complaint view
			</div>
		</div>
<!-- complaint view ends -->
            
            
<!-- complaint category -->
		<div class="row" id="comp_category" style="display: none;">
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
						<a href="#newCategory" class="btn btn-success"  data-toggle="modal" data-target="#newCategory"><i class="material-icons">&#xE147;</i> <span>Add New Type</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SiNo</th>
						<th>Complaint ID</th>
						<th>Category Type</th>
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
						<td><?php echo "C".$row['comp_id']; ?></td>
						<td><?php echo $row['comp_type']; ?></td>
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
			</div>
		</div>
<!-- complaint category ends --> 

<!-- complaint resolved -->
		<div class="row" id="comp_resolved" style="display: none;">
			<div class="col-md-12 mt-4">
			 comp resolved
			</div>
		</div>
<!-- complaint resolved ends -->            
            
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
      
<!-- add new block Modal  -->  
<div id="addnewblock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
      <div class="modal-header">
       <h3>Add New Block</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md">
         <form method="POST" action="blockUpdate.php">
          <center><table class="table-sm"  >
    <tbody>
        <tr>
            <th scope="row">Block Name</th>
            <td>
            <input type="text" name="Bname"  id="Bname" class="form-control" oninput="blockName();" 
                   onkeypress="return /[a-zA-Z0-9 ]/i.test(event.key)" required/>
            </td>
        </tr>
        <tr>
            <th scope="row">Room Count</th>
            <td>
            <input type="text" name="fcount"  id="fcount" class="form-control"  oninput="FloorCount();" onkeypress="return /[0-9]/i.test(event.key)" required/>
            </td>
        </tr>
        <tr>
           <td colspan="2">
                <center><input class="btn btn-success btn-primary btn-lg form-control"  id="roomS" type="submit"  value="Submit"></center>
            </td>
        </tr>
    </tbody>
</table>
</center>
</form>
      </div>
    </div>

  </div>
</div>
<!-- add new block Modal  ends -->     

      
<!-- delete block Modal  -->  
<div id="deleteblock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
      <div class="modal-header">
       <h3>Delete A Block</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md deleteblockbody">
        <p>Are you sure you want to delete these Records?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>
        <div class="modal-footer">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
		<input type="submit" class="btn btn-danger" id="delbutton" value="Delete">
		</div>
    </div>

  </div>
</div>
<!-- delete block Modal  ends -->   
      
      
<!-- add new room Modal  -->  
<div id="addnewroom" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
      <div class="modal-header">
       <h3>Room Count Update</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md">
         <form method="POST" action="room_count.php">
          <center><table class="table-sm"  >
    <tbody>
        <tr>
            <th scope="row">Room Count</th>
            <td>
            <input type="text" name="rc"  id="rc" class="form-control" oninput="RoomNO();" onkeypress="return /[0-9]/i.test(event.key)" required/>
            </td>
        </tr>
        <tr>
           <td colspan="2">
                <center><input class="btn btn-success btn-primary btn-lg form-control" name="rno" id="rno" type="submit" disabled value="Submit"></center>
            </td>
        </tr>
    </tbody>
</table>
</center>
</form>
      </div>
    </div>

  </div>
</div>
<!-- add new room Modal  ends -->  

      
      
<!-- Delete room Modal  -->  
<div id="deletenewroom" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
      <div class="modal-header">
       <h3>Delete Room</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md">
         <form method="POST" action="delete_room.php">
          <center><table class="table-sm"  >
    <tbody>
        <tr>
            <th scope="row">Number of Rooms to Delete</th>
            <td>
            <input type="text" name="rd"  id="rd" class="form-control" oninput="delRoom();" onkeypress="return /[0-9]/i.test(event.key)" required/>
            </td>
        </tr>
        <tr>
           <td colspan="2">
                <center><input class="btn btn-success btn-primary btn-lg form-control" name="dno" id="dno" type="submit" disabled value="Update"></center>
            </td>
        </tr>
    </tbody>
</table>
</center>
</form>
      </div>
    </div>

  </div>
</div>
<!-- delete room Modal  ends -->  

      
<!-- edit new block Modal  -->  
<div id="editnewblock" class="modal fade ">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Block Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="editnewblockbody">	
				 
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info editBlockName"   id="editBlockName" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- edit new block Modal  -->


<!-- Student view more Modal  -->  
<div id="studentViewMoreModel" class="modal fade">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Student Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="studentViewMoreBody">	
				 
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Student View Model  ends  -->


            
<!--add new notice-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Notice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="noticeAdd.php">
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Content:</label>
            <textarea class="form-control" id="noticetext" name="noticetext" required ></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Notice</button>
      </div>
    </form>
    </div>
  </div>
</div>       
<!--add new notice ends-->            
 

<!--edit notice content-->
<div id="editnotice" class="modal fade ">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Notice Content</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="editnoticebody">	
				 
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info editNoticeContent" id="editNoticeContent"  value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<!--edit notice content ends-->   


<!-- delete notice Modal  -->  
<div id="deletenotice" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-header">
       <h3>Delete A Notice</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md deleteblockbody">
        <p>Are you sure you want to delete this notice?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>
        <div class="modal-footer">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
		<input type="submit" class="btn btn-danger" id="delNbutton" class="delNbutton" value="Delete">
		</div>
    </div>

  </div>
</div>
<!-- delete notice Modal  ends -->   
 
<!--add new complaint category-->
<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="complaintAdd.php">
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Category Name :</label>
            <textarea class="form-control" id="comptype" name="comptype" required onkeypress="return /[a-zA-Z 0-9]/i.test(event.key)" ></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>       
<!--add new Complaint caegory ends--> 

<!-- edit Complaint Modal  -->  
<div id="editComplaint" class="modal fade ">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Complaint Type</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="editComplaintbody">	
				 
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info editComplaintType" id="editComplaintType" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- edit Complaint Modal  ends-->
            
 </div>
</div>             

      
<!-- delete complaint type Modal  -->  
<div id="deleteComp" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-header">
       <h3>Delete</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md deleteblockbody">
        <p>Are you sure you want to delete this Complaint?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
      </div>
        <div class="modal-footer">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
		<input type="submit" class="btn btn-danger" id="delCbutton" name="delCbutton" value="Delete">
		</div>
    </div>

  </div>
</div>
<!-- delete complaint type Modal  ends -->   
      
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
                <input class="form-control" type="password" name="npass1" id="npass1"  disabled oninput="valFPasswod()" placeholder="New Password" required>
            <br>
                <input class="form-control" type="password" name="ncpass1" id="ncpass1"  disabled oninput="valCFPasswod()"  placeholder="Confirm New Password" required>
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
      
<script>
    

// update notice Model 
$(document).ready(function(){
    var notice_id;
    $('.editNoticeC').click(function() {
        notice_id = $(this).attr("id"); 
        $.ajax({  
                url:"editNoticeModel.php",  
                method:"post",  
                data:{notice_id:notice_id},  
                success:function(data){  
                     $('#editnoticebody').html(data);  
                     $('#editnotice').modal("show");  
                }  
           });  
    });
    $('.editNoticeContent').click(function() {
        var c = $("#noticetextC").val();
        $.ajax({  
                url:"editNotice.php",  
                method:"post",  
                data:{c:c,nid:notice_id},  
                success:function(data){  
                     alert(data);
                }  
           });  
    });
});           
    

// dELETE notice  Model 

$(document).ready(function(){
    var n_id;
    $('.deleteNoticeC').click(function() {
        n_id = $(this).attr("id"); 
        $('#deletenotice').modal("show"); 
        
        $('#delNbutton').click(function() {
        $('#deletenotice').modal("hide");
        $.ajax({  
                url:"noticeDeleteModel.php",  
                method:"post",  
                data:{nid:n_id},  
                success:function(data){  
                     alert(data);
                     location.reload();
                }  
           });  
    });
        
    });
});           

// update block name Model 
$(document).ready(function(){
    var block_id;
    $('.editBlock').click(function() {
        block_id = $(this).attr("id"); 
        $.ajax({  
                url:"blockUpdateModel.php",  
                method:"post",  
                data:{block_id:block_id},  
                success:function(data){  
                     $('#editnewblockbody').html(data);  
                     $('#editnewblock').modal("show");  
                }  
           });  
    });
    $('.editBlockName').click(function() {
        var n = $("#newBlockName").val();  
        var rc= $("#roomCount").val();
        $.ajax({  
                url:"blockUpdateName.php",  
                method:"post",  
                data:{n:n,bid:block_id,rc:rc},  
                success:function(data){  
                     alert(data);
                }  
           });  
    });
});       



// dELETE block  Model 

$(document).ready(function(){
    var block_id1;
    $('.deleteBlock').click(function() {
        block_id1 = $(this).attr("id"); 
        $('#deleteblock').modal("show"); 
        
        $('#delbutton').click(function() {
        $('#deleteblock').modal("hide");
        $.ajax({  
                url:"blockDeleteModel.php",  
                method:"post",  
                data:{bid:block_id1},  
                success:function(data){  
                     alert(data);
                     location.reload();
                }  
           });  
    });
        
    });
});       
    

 //student view more 
$(document).ready(function(){
    var st_id;
    $('.studentViewMore').click(function() {
       var st_id = $(this).attr("id"); 
        $.ajax({  
                url:"studentViewMore.php",  
                method:"post",  
                data:{st_id:st_id},  
                success:function(data){  
                     $('#studentViewMoreBody').html(data);  
                     $('#studentViewMoreModel').modal("show");  
                }  
           });  
    });
});  


// update complaint type 
$(document).ready(function(){
    var comp_id;
    $('.editComptype').click(function() {
        comp_id = $(this).attr("id"); 
        $.ajax({  
                url:"editComplaintModel.php",  
                method:"post",  
                data:{comp_id:comp_id},  
                success:function(data){  
                     $('#editComplaintbody').html(data);  
                     $('#editComplaint').modal("show");  
                }  
           });  
    });
    $('.editComplaintType').click(function() {
        var c = $("#newCompType").val();
        $.ajax({  
                url:"UpdateComplaint.php",  
                method:"post",  
                data:{c:c,cid:comp_id},  
                success:function(data){  
                alert(data);
                }  
           });  
    });
});       
 
// dELETE complaint type
$(document).ready(function(){
    var c_id;
    $('.deleteComptype').click(function() {
        c_id = $(this).attr("id"); 
        $('#deleteComp').modal("show"); 
        
        $('#delCbutton').click(function() {
        $('#deleteComp').modal("hide");
            
        $.ajax({  
                url:"DeleteComp.php",  
                method:"post",  
                data:{cid:c_id},  
                success:function(data){  
                     alert(data);
                     location.reload();
                }  
           });  
    });
        
    });
});     
    
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

});
  </script>
  </body>
      
</html>
<?php } ?>