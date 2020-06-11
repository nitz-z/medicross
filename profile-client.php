<?php
include('loginsession.php');
include_once("db.php");
if(isset($_GET['cid']))
{
   $cid= $_GET['cid'];
 $sql = "SELECT * FROM client where id='$cid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno[$i]=$check['phno1'];
    $phno2[$i]=$check['phno2'];
    $phno3[$i]=$check['phno3'];
    $photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
$regdate[$i]=$check['regdate'];

       $email[$i]=$check['email'];
       $city[$i]=$check['city'];
       $state[$i]=$check['state'];
       $country[$i]=$check['country'];
       $pincode[$i]=$check['pincode'];
       $detailedaddress[$i]=$check['detailedaddress'];
       $addressline1[$i]=$check['addressline1'];
       $addressline2[$i]=$check['addressline2'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
    $idprooff[$i]=$check['idprooff'];
    $idproofb[$i]=$check['idproofb'];
 $i++;
 }
}

    
    }
else{
    header("location:error-500.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <title>RE-QUEUE</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
	
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			 <?php include_once("header.php");?>
        <?php include_once("sidebar.php");?>
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="page-title">Client Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Client Profile</li>
								</ul>
							</div>
							<div class="col-sm-6">
							<div class="staff-msg text-right"><a class="btn btn-custom" href="clienthis.php?cid=<?php echo $cid;?>">HISTORY</a></div>

							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="profile.html#"><img alt="" src="image/<?php echo $photo[0];;?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname[0]." ".$lname[0];?></h3>&nbsp;
<!--														<h6 class="text-muted">UI/UX Design Team</h6>-->
<!--														<small class="text-muted">Web Designer</small>-->
														<div class="staff-id">Client ID :<?php echo $regid[0];?> </div>&nbsp;
														<div class="staff-id">Main Number :<?php echo $phno[0];?> </div>&nbsp;
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate[0];?></div>
<!--														<div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>-->
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Secondary No:</div>
															<div class="text"><a href=""><?php echo $phno2[0];?></a></div>&nbsp;
														</li><li>
															<div class="title">Mobile N0 3:</div>
															<div class="text"><a href=""><?php echo $phno3[0];?></a></div>&nbsp;
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email[0];?></a></div>&nbsp;
														</li>
													
												
														<li>
														    	<div class="title">Religion:</div>
															<div class="text"><?php echo $religion[0];?></div>
														</li>
<!--
														
														<li>
															<div class="title">Reports to:</div>
															<div class="text">
															   <div class="avatar-box">
																  <div class="avatar avatar-xs">
																	 <img src="assets/img/profiles/avatar-16.jpg" alt="">
																  </div>
															   </div>
															   <a href="profile.html">
																	Jeffery Lalor
																</a>
															</div>
														</li>
-->
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a  class="edit-icon" href="edit-client.php?cid=<?php echo $cid;?>"><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
<!--
					
					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="profile.html#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
									<li class="nav-item"><a href="profile.html#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
									<li class="nav-item"><a href="profile.html#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li>
								</ul>
							</div>
						</div>
					</div>
-->
					
					<div class="tab-content">
					
						<div id="emp_profile" class="pro-overview tab-pane fade show active">
							<div class="row">
							
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ADDRESS <a href="profile.html#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
											<h5 class="section-title">Primary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Address Line 1</div>
													<div class="text"><?php echo $addressline1[0].", ".$addressline2[0] ;?></div>
												</li>
												<li>
													<div class="title">Address Line 2</div>
													<div class="text"><?php echo $city[0].",". $pincode[0] ;?><?php echo $state[0].",".$country[0] ;?></div>
												</li>
											
											</ul>
									
										</div>
									</div>
								</div>	
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">DETAILED ADDRESS <a href="profile.html#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
											<h5 class="section-title">Primary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Detailed path</div>
													<div class="text"><?php echo $detailedaddress[0];?></div>
												</li>
												
											
											</ul>
									
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ID PROOF FRONT</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $idprooff[0];?>"> <img src="image/<?php echo $idprooff[0];?>" class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ID PROOF BACK</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $idproofb[0];?>"> <img src="image/<?php echo $idproofb[0];?>" class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
								
							</div>
						
						</div>
						<!-- /Profile Info Tab -->
						

						
					</div>
                </div>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>

		
    </body>
</html>