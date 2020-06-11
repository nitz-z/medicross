<?php
    include_once("db.php");

    $result=mysqli_query($conn,"select * from employe");
    $enum=mysqli_num_rows($result); 
$result=mysqli_query($conn,"select * from employe where status=0");
    $e0num=mysqli_num_rows($result);
$result=mysqli_query($conn,"select * from employe where status=1");
    $e1num=mysqli_num_rows($result);
$result=mysqli_query($conn,"select * from client");
    $ecnum=mysqli_num_rows($result);
$logname=$_SESSION['logname'];
$logjob=$_SESSION['logjob'];

?>
           
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
           		<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li >
								<a href="index.php"><i class="la la-dashboard"></i> <span> Dashboard</span> </a>
							
							</li>
							<?php
                            if($logname=="admin" or $logjob=="accountant")
                            {
                                echo ('<li >
								<a href="paynotification.php"><i class="las la-user-shield"></i><span> Admin Panel</span> </a>
							
							</li>');
                            }
                            ?>
								<li >
								<a href="enquiry.php"><i class="las la-phone"></i><span> Enquiry</span> </a>
							
							</li>
							<li >
								<a href="needclist.php"><i class="las la-handshake"></i><span> Need</span> </a>
							
							</li>
							<li >
								<a href="registerclient.php"><i class="las la-user-plus"></i> <span> Client Registration</span> </a>
							
							</li>
							<li >
								<a href="registeremploye.php"><i class="las la-plus-square"></i> <span> Employe Registration</span> </a>
							
							</li>
							<li >
								<a href="jobcard.php"><i class="las la-briefcase"></i> <span> Jobcard</span> </a>
							
							</li>
							<li >
								<a href="payclient.php"><i class="las la-credit-card"></i> <span> Client Payment</span> </a>
							
							</li>
							<li >
								<a href="payemploye.php"><i class="las la-wallet"></i> <span>Employe Salary</span> </a>
							
							</li>
							<li >
								<a href="empleave.php"><i class="las la-procedures"></i> <span>Employe Leave</span> </a>
							
							</li>
							
							
							<li class="menu-title"> 
								<span>Employees/Clients</span>
							</li>
							<li class="submenu">
								<a href="" class="noti-dot"><i class="las la-users"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="employe.php">All Employees<span class="badge badge-pill bg-primary float-right"><?php echo $enum; ?></span></a></li>
									<li><a href="unemployed.php">Unemployed<span class="badge badge-pill bg-primary float-right"><?php echo $e0num; ?></span></a></li>
									<li><a href="employed.php">Employed <span class="badge badge-pill bg-primary float-right"><?php echo $e1num; ?></span></a></li>
									
								</ul>
							</li>
						
							<li> 
								<a href="client.php"><i class="las la-user"></i><span>Clients</span> <span class="badge badge-pill bg-primary float-right"><?php echo $ecnum; ?></span></a>
							</li>
						
                            <li class="menu-title"> 
								<span>Add Info</span>
							</li>
							<li> 
								<a href="addjob.php"><i class="las la-building"></i> <span>Add Job</span></a>
							</li>
							<li> 
								<a href="addqualification.php"><i class="las la-graduation-cap"></i> <span>Add Qualification</span></a>
							</li>
							<li> 
								<a href="addcast.php"><i class="las la-pray"></i> <span>Add Religion</span></a>
							</li>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->