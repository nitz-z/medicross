<?php
include('loginsession.php');

include_once("db.php");
if(isset($_GET['eid']))
{
   $eid= $_GET['eid'];
 $sql = "SELECT * FROM employe where id='$eid'";
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
$marrage[$i]=$check['marrage'];
$loc[$i]=$check['loc'];
$famname[$i]=$check['famname'];
$photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
$cast[$i]=$check['cast'];
$qualification[$i]=$check['qualification'];
$remark[$i]=$check['remark'];
$gender[$i]=$check['gender'];
$language[$i]=$check['language'];
$blood[$i]=$check['blood'];
$jobtype[$i]=$check['jobtype'];
$jobtime[$i]=$check['jobtime'];
$nooftslot[$i]=$check['nooftslot'];
$slot1s[$i]=$check['slot1s'];
$slot1e[$i]=$check['slot1e'];
$slot2s[$i]=$check['slot2s'];
$slot2e[$i]=$check['slot2e'];
$slot3s[$i]=$check['slot3s'];
$slot3e[$i]=$check['slot3e'];
$acname[$i]=$check['acname'];
$acno[$i]=$check['acno'];
$ifsc[$i]=$check['ifsc'];
$ref1n[$i]=$check['ref1n'];
$ref1no[$i]=$check['ref1no'];
$ref2n[$i]=$check['ref2n'];
$ref2no[$i]=$check['ref2no'];
$police[$i]=$check['police'];
$passport[$i]=$check['passport'];
$ration[$i]=$check['ration'];
$adharf[$i]=$check['adharf'];
$adharb[$i]=$check['adharb'];
$voterf[$i]=$check['voterf'];
$voterb[$i]=$check['voterb'];
$licencef[$i]=$check['licencef'];
$licenceb[$i]=$check['licenceb'];
$status[$i]=$check['status'];
$dob[$i]=$check['dob'];
$regdate[$i]=$check['regdate'];
$email[$i]=$check['email'];
$city[$i]=$check['city'];
$state[$i]=$check['state'];
$country[$i]=$check['country'];
$pincode[$i]=$check['pincode'];
$addressline1[$i]=$check['addressline1'];
$addressline2[$i]=$check['addressline2'];
$regid[$i]=$check['regid'];
$id[$i]=$check['id'];
      $dates=$dob[$i];
    $dates=str_replace("/","-",$dates);
    $dob[$i]=$dates;
$i++;
 }
    if($status==0)
    {
        $status="<p style='color:red'>Unemployed</p>";
    }
    else{
                $status="<p style='color:green'>Employed</p>";

    }
    $job=explode(",",$jobtype[0]);
    $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("d-m-Y");
$age = date_diff(date_create($dob[0]), date_create($today));
}

    
    }
else
{
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
								<h3 class="page-title">Employe Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Employe Profile</li>
								</ul>
                            </div>
								<div class="col-sm-6">
							<div class="staff-msg text-right"><a class="btn btn-custom" href="emphis.php?eid=<?php echo $eid;?>">HISTORY</a></div>

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
														<div class="staff-id">Employe ID :<?php echo $regid[0];?> </div>&nbsp;
														<div class="staff-id">Main Number :<?php echo $phno[0];?> </div>&nbsp;
														<div class="staff-id">Status :<?php echo $marrage[0];?> </div>&nbsp;
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate[0];?></div>
<!--														<div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>-->
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Secondary no:</div>
															<div class="text"><?php echo $phno2[0];?></div>&nbsp;
														</li>
														<li>
															<div class="title">Third no:</div>
															<div class="text"><?php echo $phno3[0];?></div>&nbsp;
														</li>
														<li>
															<div class="title">father/husband:</div>
															<div class="text"><?php echo $famname[0];?></div>&nbsp;
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><?php echo $email[0];?></div>&nbsp;
														</li><li>
															<div class="title">Location:</div>
															<div class="text"><?php echo $loc[0];?></div>&nbsp;
														</li>
													
												
														<li>
														    	<div class="title">Blood:</div>
															<div class="text"><?php echo $blood[0];?></div>
														</li><li>
														    	<div class="title">D.O.B:</div>
															<div class="text"><?php echo $dob[0];?></div>
														</li>

-->
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a  class="edit-icon" href="edit-employe.php?eid=<?php echo $eid;?>"><i class="fa fa-pencil"></i></a></div>
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
											<h3 class="card-title">Personal Info </h3>
											<ul class="personal-info">
											<li>
													<div class="title">Gender</div>
													<div class="text"><?php echo $gender[0];?></div>
												</li>	
												<li>
													<div class="title">Age</div>
													<div class="text"><?php echo $age->format('%y');?></div>
												</li>
												<li>
													<div class="title">Religion</div>
													<div class="text"><?php echo $religion[0];?></div>
												</li>
												
												<li>
													<div class="title">Cast</div>
													<div class="text"><?php echo $cast[0];?></div><br>
												</li>
												
												<li>
													<div class="title">Language</div>
													<div class="text"><?php echo $language[0];?></div>
												</li>	
												
												
									
											
											</ul>
									
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ADDRESS</h3>
											<ul class="personal-info">
												<li>
													<div class="title">Address Line 1</div>
													<div class="text"><?php echo $addressline1[0].", ".$addressline2[0] ;?></div>
												</li>
												<li>
													<div class="title">Address Line 2</div>
													<div class="text"><?php echo $city[0].",". $pincode[0] ;?><?php echo $state[0].",".$country[0] ;?></div>
												</li><br>
												<li>
													<div class="title">Police Station</div>
													<div class="text"><?php echo $police[0];?></div>
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
											<h3 class="card-title">Qualification </h3>
											<ul class="personal-info">
												<li>
													<div class="title">Education</div>
													<div class="text"><?php echo $qualification[0];?></div><br>
												</li>
												
												<li>
													<div class="title">Remark</div>
													<div class="text"><?php echo $remark[0];?></div><br>
												</li>
												
												
												
									
											
											</ul>
									
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Known Jobs </h3>
											<ul class="personal-info">
											<?php
                                                  for ($l=0;$l<count($job);$l++)
  {
                                                      $z=$l+1;
   
    echo '<li>
    													<div class="title">Job '.$z.'</div>

													<div class="text">'. $job[$l].'</div>
                                                    
												</li>';
  } 
                                                
                                                
                                                ?>
												
											
											
											</ul>
									
										</div>
									</div>
								</div>	
							
							</div>
											<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Account Details </h3>
											<ul class="personal-info">
											<li>
													<div class="title">Account Holder Name</div>
													<div class="text"><?php echo $acname[0];?></div>
												</li>	<br>
												<li>
													<div class="title">Account Number</div>
													<div class="text"><?php echo $acno[0];?></div>
												</li><br>
												<li>
													<div class="title">I.F.S.C Number</div>
													<div class="text"><?php echo $ifsc[0];?></div><br>
												</li>
												
												
												
									
											
											</ul>
									
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Reference Person </h3>
											<ul class="personal-info">
												<li>
													<div class="title">First Person Name</div>
													<div class="text"><?php echo $ref1n[0] ;?></div>
												</li>
												<li>
													<div class="title">First Person No</div>
													<div class="text"><?php echo $ref1no[0];?></div>
												</li>
												<li>
													<div class="title">Second Person Name</div>
													<div class="text"><?php echo $ref2n[0] ;?></div>
												</li>
												<li>
													<div class="title">Second Person No</div>
													<div class="text"><?php echo $ref2no[0];?></div>
												</li><br>
											
											
											</ul>
									
										</div>
									</div>
								</div>	
							
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Passport</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $passport[0];?>"> <img src="image/<?php echo $passport[0];?>" class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">Ration card</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $ration[0];?>"> <img src="image/<?php echo $ration[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
								
							</div>	
								<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ADHAR FRONT</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $adharf[0];?>"> <img src="image/<?php echo $adharf[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">ADHAR BACK</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $adharb[0];?>"> <img src="image/<?php echo $adharb[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
								
							</div>
                               <div class="row">	
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">VOTER ID FRONT</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $voterf[0];?>"> <img src="image/<?php echo $voterf[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">VOTER ID BACK</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $voterb[0];?>"> <img src="image/<?php echo $voterb[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
								
							</div>
                                    <div class="row">	
                                	<div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">LICENCE FRONT</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $licencef[0];?>"> <img src="image/<?php echo $licencef[0];?>"  class="img-fluid"></a>
                                            </div>
									</div>
								</div>
                                </div>
                                <div class="col-md-6 d-flex">
									<div class="card profile-box flex-fill">
										<div class="card-body">
											<h3 class="card-title">LICENCE BACK</h3>
										<div class="proofimg">
										   <a href="image/<?php echo $licenceb[0];?>"> <img src="image/<?php echo $licenceb[0];?>"  class="img-fluid"></a>
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