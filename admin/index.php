<?php
require('../fun.php');
$con = connect();
if(sessioncheck() == false)
{
header('Location: ../index.html');
}
else
{
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
<!--    <script src="../js/reg_form%20(1).js"></script>-->
    <script src="../js/reg_form%20(21).js"></script>
      
    <script>
        $(document).ready(function(){
	// Activate tooltip
	   $('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	   var checkbox = $('table tbody input[type="checkbox"]');
	   $("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
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
		
		
		 
		 <script src="../js/admin.js"></script>
      
  </head>   
  <body onload="renderDate()">
  <div id="wrapper">
   <div class="overlay"></div>
    
        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Hostel Manager</span>
        </a>

				 <ul class="navbar-nav align-self-stretch">
	<li class=""> 
		  <a class="nav-link text-left active"  role="button" 
		  aria-haspopup="true" aria-expanded="false" onclick="dash()">
       <i class="flaticon-bar-chart-1"></i>  <h5>Dashboard</h5>
         </a>
		  </li>
        <li class="has-sub"> 
        <a class="nav-link collapsed text-left" href="#collapseExample1" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Manage Hostel
         </a>
        <div class="collapse menu mega-dropdown" id="collapseExample1">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#stu_register" onclick="Sregister()">Registered Hostel</a></li>
											<br>
											<li><a href="#stu_view" onclick="Sview()">Approval Request</a></li>
                                            <br>
										    <li><a href="#stu_vacate" onclick="Svacate()">Blacklisted Hostel</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
		     </div>
		  </div>
		  </li>
		  <li class="has-sub"> 
		  <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse" >
        <i class="flaticon-user"></i>Contact</a>
		  <div class="collapse menu mega-dropdown" id="collapseExample2">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#emp_reg" onclick="Ereg()">Phone Number</a></li>
											<br>
											<li><a href="#emp_view" onclick="Eview()">Send Email</a></li>
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
        <i class="flaticon-user"></i>Manager Details</a>
        <div class="collapse menu mega-dropdown" id="collapseExample3">
        <div class="dropmenu" aria-labelledby="navbarDropdown">
		<div class="container-fluid ">
							<div class="row">
								<div class="col-lg-12 px-2">
									<div class="submenu-box"> 
										<ul class="list-unstyled m-0">
											<li><a href="#war_reg" onclick="Wreg()">View Details</a></li>
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
			

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            
              <li class="nav-item dropdown no-arrow">
                              <a class="dropdown-item" href="#">
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
            <h1 class="h3 mb-0 text-gray-800">Admin Panel</h1>
          </div>
		  </div>
        <div class="col-md-12">
            <div class="row">
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Hostel Registered</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Total Inamtes</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
											</div>
										</div>
										
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Total Employees</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
											</div>
										</div>
										
									</div>
									<div class="col-sm-3">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Blacklisted Hostels</h5>
												<h1 class="display-5 mt-1 mb-3">0</h1>
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
                          <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text">first one</p>
                          </div>
                          <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text">second</p>
                          </div>
                          <div class="card-body text-success" style="background-color: whitesmoke">
                            <p class="card-text">Something</p>
                          </div>
              <div class="card-footer bg-transparent"><a href="#">View all</a></div>
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
        
        <!-- Registered hostel view -->
        <div class="row" id="stu_register" style="display: none;">
        <div class="col-md-12 mt-4">
        <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Registered Hostel</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
                        <th>SI no</th>
						<th>Name of Hostel</th>
						<th>Category</th>
						<th>Phone</th>
						<th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                    $c=1;
                     $q1=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `status`=1 ")or die("Sign in Error");
                     if(mysqli_num_rows($q1)>0)
                        {
                         while($sv = mysqli_fetch_array($q1))
                         {
                             $t=$sv['hstl_id'];
                             $q7=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$t")or die("Sign in Error");
                             $t1 = mysqli_fetch_array($q7);
                        ?>
					<tr>
						<td><?php echo $c++ ?></td>
						<td><?php echo $sv['hstl_name']; ?></td>
						<td><?php echo $sv['hstl_type']; ?></td>
						<td><?php echo $sv['hstl_land']; ?></td>
						<td><?php echo $sv['hstl_mob']; ?></td>
                        <?php 
                        if($sv['status'] and $t1['status'])
                        { 
                            ?>
                        <td style="background-color:#b3ffb3;"><center>Active</center></td>
                        <td><a href="#" id="<?php echo $sv['hstl_id']; ?>" class="hostelViewMore" ><i class="material-icons" data-toggle="tooltip" title="View More">remove_red_eye</i></a>
                        <a href="#" class="deleteHostel" id="<?php echo $sv['hstl_id']; ?>" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                        <?php
                        }
                             else
                             {
                              ?>
                        <td style="background-color:#ffc2b3;"><center>Waiting for Approval</center></td>
                        <td><a href="#" id="<?php echo $sv['hstl_id']; ?>" class="hostelViewMore" ><i class="material-icons" data-toggle="tooltip" title="View More">remove_red_eye</i></a></td>
                        <?php    
                             }
                        ?>
                    <?php }
                         ?>
                        </tr>
                        <?php
                     } 
                    else
                    {
                    ?>
                    <tr>
                    <td colspan="6"><center>No Inmates Added !!!!</center></td>
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
        <!-- Registered hostel view ends -->
        
        
    
        <!-- Approval Request -->
        <div class="row"  id="stu_view" style="display: none;">
        <div class="col-md-12 mt-4">
        <div class="container-xl">
	    <div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>New Request</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>SI No</th>
						<th>Name Of Manager</th>
						<th>Name of Hostel</th>
						<th>Detailed View</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                     $f=1;
                     $q1=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `status`=0")or die("Sign in Error");
                     if(mysqli_num_rows($q1)>0)
                        {
                         while($v = mysqli_fetch_array($q1))
                         {
                         $h=$v['hstl_id'];
                         $q2=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_id`=$h AND `status`=1")or die("Sign in Error");
                         $v1 = mysqli_fetch_array($q2);
                         if(mysqli_num_rows($q2)>0)
                         {
                        ?>
					<tr>
						<td><?php echo $f++ ?></td>
						<td><?php echo $v['hstl_manager_name']; ?></td>
						<td><?php echo $v1['hstl_name']; ?></td>
						<td><a href="#" id="<?php echo $v['hstl_id']; ?>" class="hostelViewMore" ><i class="material-icons" data-toggle="tooltip" title="View More" style="color:blue">remove_red_eye</i></a></td>
						<td>
							<a href="#editStudentModel" id="<?php echo $v['hstl_id']; ?>" class="approveReq" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Approve" style="color:green">check</i></a>
                            <a href="#" class="deleteHostel" id="<?php echo $v['hstl_id']; ?>" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                    <?php 
                         }}} 
                    else
                    {
                    ?>
                    <tr>
                    <td colspan="5"><center>No pending Request !!!!</center></td>
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
        <!-- Approval Request ends -->
    
        
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
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>Maria Anders</td>
						<td>mariaanders@mail.com</td>
						<td>25, rue Lauriston, Paris, France</td>
						<td>(503) 555-9931</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
		</div>
		</div>
		<!-- Student Vacated ends -->
		
		<!-- Phone number view -->
		<div class="row" id="emp_reg" style="display: none;">
		<div class="col-md-12 mt-4">
		Phone number view
		</div>
		</div>
		<!-- Phone number view ends -->

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
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
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
				<tbody>
					<tr>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
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
				<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editWardenModel" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteWardenModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
						<td>Dominique Perrier</td>
						<td>dominiqueperrier@mail.com</td>
						<td>Obere Str. 57, Berlin, Germany</td>
						<td>(313) 555-5735</td>
						<td>
							<a href="#editWardenModel" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteWardenModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
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
				<tbody>
					<tr>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<tr>
						<td>Maria Anders</td>
						<td>mariaanders@mail.com</td>
						<td>25, rue Lauriston, Paris, France</td>
						<td>(503) 555-9931</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        
</div>
			</div>
		</div>
		<!-- Warden dismissed ends -->



      </div>
    </div>
    </div>
    </div> 
    <!-- /#wrapper -->
    
  
<!-- Model classes -->
      
   <!-- Approve model --> 
   <div id="editStudentModel" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Confirmation</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Send Confirmation Message....</label>
					</div>			
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="No">
					<input type="submit" id="approveBtn" class="btn btn-info" value="Approve">
				</div>
			</form>
		</div>
	</div>
</div>
    <!-- Approve model ends --> 
  
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

<!-- hostel view more Modal  -->  
<div id="hostelViewMoreModel" class="modal fade">
<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id="hostelViewMoreBody">	
				 
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- hostel View Model  ends  -->
      
<!-- delete hostel model  -->  
<div id="deleteHostel" class="modal fade" role="dialog">
  <div class="modal-dialog">
        <div class="modal-content">
      <div class="modal-header">
       <h3>Delete a Hostel ?</h3>
        <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <div class="modal-body modal-md deleteblockbody">
        <p>Are you sure you want to delete?</p>
      </div>
        <div class="modal-footer">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
		<input type="submit" class="btn btn-danger" id="delHbutton" class="delHbutton" value="Delete">
		</div>
    </div>

  </div>
</div>
<!-- delete hostel Modal  ends -->     
    

 <script>
 
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );

});
     

 //admin view more 
$(document).ready(function(){
    var h_id;
    $('.hostelViewMore').click(function() {
       var h_id = $(this).attr("id"); 
        $.ajax({  
                url:"hostelViewMore.php",  
                method:"post",  
                data:{h_id:h_id},  
                success:function(data){  
                     $('#hostelViewMoreBody').html(data);  
                     $('#hostelViewMoreModel').modal("show");  
                }  
           }); 
    });
});  
     
// delete hostel  

$(document).ready(function(){
    var hid;
    $('.deleteHostel').click(function() {
        hid = $(this).attr("id"); 
        $('#deleteHostel').modal("show"); 
        
        $('#delHbutton').click(function() {
        $('#deleteHostel').modal("hide");
        $.ajax({  
                url:"deleteHostel.php",  
                method:"post",  
                data:{hid:hid},  
                success:function(data){  
                     alert(data);
                     location.reload();
                }  
           });
    });
        
    });
});  
     
//Approval request
$(document).ready(function(){
    var ha;
    $('.approveReq').click(function() {
        ha = $(this).attr("id"); 
        $('#editStudentModel').modal("show"); 
        
        $('#approveBtn').click(function() {
        $('#editStudentModel').modal("hide");
            
        $.ajax({  
                url:"ApproveMail.php",  
                method:"post",  
                data:{ha:ha},  
                success:function(data){  
                     alert(data);
                     location.reload();
                }  
           });  
    });
        
    });
});     
     
  </script>
  </body>
</html>
<?php } ?>