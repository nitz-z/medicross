<?php
include_once("db.php");
include('loginsession.php');
    if(isset($_GET['jid']))
{ 
        unset($_SESSION["eid"]);
    $jid=$_GET['jid'];
     	   $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$jid'"));
        $cid=$value['cid'];
        $nid=$value['nid'];
        $eid=$value['eid'];
$total8=0;
$total7=0;
$total9=0;
$total12=0;
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
   
    $job=explode(",",$jobtype[0]);
    $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("d-m-Y");
$age = date_diff(date_create($dob[0]), date_create($today));
    
}
    
 $sql = "SELECT * FROM client where id='$cid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums1=mysqli_num_rows($rt);
if($nums1>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname1[$i]=$check['firstname'];
    $lname1[$i]=$check['lastname'];
    $phno1[$i]=$check['phno1'];
    $photo1[$i]=$check['photo'];
$religion1[$i]=$check['religion'];
$regdate1[$i]=$check['regdate'];

       $email1[$i]=$check['email'];
      
$regid1[$i]=$check['regid'];
    $id1[$i]=$check['id'];

 $i++;
 }
}       
          
 $sql = "SELECT * FROM jobpaynotify where jid='$jid'";
$rt= mysqli_query($conn,$sql);
 $check=mysqli_fetch_assoc($rt);

     
    $id2=$check['id'];
    $actempsal2=$check['actempsal'];
    $salgivetoemp2=$check['salgivetoemp'];
    $totamtclientgive2=$check['totamtclientgive'];
    $extclientneedtogive2=$check['extclientneedtogive'];
    $amtempgiveback2=$check['amtempgiveback'];
    $amtgivebacktoclient2=$check['amtgivebacktoclient'];
    $extamttogivetoemp2=$check['extamttogivetoemp'];
   
$sql = "select * from empleave where eid='$eid' and jid='$jid' order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $day3[$i]=$check['day'];
     	   $eday3[$i]=$check['enterday'];

   
 $i++;
 }
    
}
        
        $sql = "select * from cpayment where cid='$cid' and nid='$nid' order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num7=mysqli_num_rows($rt);
if($num7>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id7[$i]=$check['id'];
     	   $day7[$i]=$check['day'];
     	   $amount7[$i]=$check['amount'];
     	       	  $total7=$total7+$amount7[$i];

   
 $i++;
 }
    
}        $sql = "select * from epayment where jid='$jid' order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num12=mysqli_num_rows($rt);
if($num12>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id12[$i]=$check['id'];
     	   $day12[$i]=$check['day'];
     	   $amount12[$i]=$check['amount'];
     	       	  $total12=$total12+$amount12[$i];

   
 $i++;
 }
    
}      
        $sql = "select * from empjobmoney where jid='$jid' order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num8=mysqli_num_rows($rt);
if($num8>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id8[$i]=$check['id'];
     	   $day8[$i]=$check['date'];
     	   $amount8[$i]=$check['amount'];
     	       	  $total8=$total8+$amount8[$i];

   
 $i++;
 }
    
}  
          $sql = "select * from clientjobmoney where jid='$jid' order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num9=mysqli_num_rows($rt);
if($num9>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id9[$i]=$check['id'];
     	   $day9[$i]=$check['date'];
     	   $amount9[$i]=$check['amount'];
     	       	  $total9=$total9+$amount9[$i];

   
 $i++;
 }
    
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

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">


    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript">
        window.onload = function() {
            var ale = "<?php echo $msg; ?>";
            if (ale != "") {
                alert("<?php echo $msg; ?>");
            }



        }
        <?php unset($_SESSION["error"]);?>
    </script>

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
							<div class="col-sm-12">
								<h3 class="page-title">Employe Job Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Job Details</li>
								</ul>
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
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname[0]." ".$lname[0];?></h3><br>
<!--														<h6 class="text-muted">UI/UX Design Team</h6>-->
<!--														<small class="text-muted">Web Designer</small>-->
														<div class="staff-id">Employe ID :<?php echo $regid[0];?> </div><br>
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
															<div class="text"><a href=""><?php echo $phno2[0];?></a></div><br>
														</li>
														<li>
															<div class="title">Third no:</div>
															<div class="text"><a href=""><?php echo $phno3[0];?></a></div><br>
														</li>
														<li>
															<div class="title">father/husband:</div>
															<div class="text"><a href=""><?php echo $famname[0];?></a></div>&nbsp;
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email[0];?></a></div>&nbsp;
														</li><li>
															<div class="title">Location:</div>
															<div class="text"><a href=""><?php echo $loc[0];?></a></div>&nbsp;
														</li>
													
												
														<li>
														    	<div class="title">Blood:</div>
															<div class="text"><?php echo $blood[0];?></div>&nbsp;
														</li><li>
														    	<div class="title">D.O.B:</div>
															<div class="text"><?php echo $dob[0];?></div>&nbsp;
														</li>

-->
													</ul>
												</div>
											</div>
										</div>
										<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href=""><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card tab-box">
						<div class="row user-tabs">
							<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
								<ul class="nav nav-tabs nav-tabs-bottom">
									<li class="nav-item"><a href="#paymentdetail" data-toggle="tab" class="nav-link active">Payment</a></li>
									<li class="nav-item"><a href="#leavedetail" data-toggle="tab" class="nav-link">Leave</a></li>
									<li class="nav-item"><a href="#salarydetail" data-toggle="tab" class="nav-link">Salary</a></li>
									<li class="nav-item"><a href="#paymentcldetail" data-toggle="tab" class="nav-link">Payment</a></li>
									<li class="nav-item"><a href="#empgiveback" data-toggle="tab" class="nav-link">Employe Given Back</a></li>
									<li class="nav-item"><a href="#retpayment" data-toggle="tab" class="nav-link">Return Payment</a></li>
									<li class="nav-item"><a href="#clientdetail" data-toggle="tab" class="nav-link">Client</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="tab-content">
					
						<!-- Payment Tab -->
						<div id="paymentdetail" class="pro-overview tab-pane fade show active">
							  <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                          			<table class="table table-striped custom-table ">
									<thead>
										<tr>
											<th>Actual Salary Of Employe</th>
											<th>Salery Given to Employe</th>
											<th>Total Amount Client Payed</th>
											<th>Additional amount client need to give</th>
											<th>Amount Employe have to give back </th>
											<th>Balance amount to give to employe </th>
											<th>Balance amount to give to Client </th>
											
										</tr>
									</thead>
									<tbody>
									<?php
                                      
                                            echo('
                                            
                                        <tr>
											<td>'.$actempsal2.'</td>
											<td>'.$salgivetoemp2.'</td>
											<td>'.$totamtclientgive2.'</td>
											<td>'.$extclientneedtogive2.'</td>
											<td>'.$amtempgiveback2.'</td>
											<td>'.$extamttogivetoemp2.'</td>
											<td>'.$amtgivebacktoclient2.'</td>
										</tr>
										
                                           ');
                                          
                                        
                                    ?>
										
									</tbody>
								</table>

                        </div>

                    </div>
                </div>
						</div>
						<!-- /payment Tab -->		
								<!-- leave Tab -->
						<div class="tab-pane fade" id="leavedetail">
							  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Date of Entry</th>
                                        <th>leave date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    
                                        while($num3>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day3[$j].'</td>
											<td>'.$eday3[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num3--;
                                        }
                                    ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
						</div>
						<!-- /leave Tab -->
						
						
						<!-- salary Tab -->
						<div class="tab-pane fade" id="salarydetail">
											        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th> Date</th>
                                        <th>Amount</th>
                                      


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    
                                        while($num12>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day12[$j].'</td>
											<td>'.$amount12[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num12--;
                                        }
                                    ?>

                                </tbody>
                            </table>
                                                    <h3 class="text-right">Total : <?php echo $total12; ?></h3>

                        </div>

                    </div>
                </div>
						</div>		<!-- salary Tab -->
						<div class="tab-pane fade" id="paymentcldetail">
											        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th> Date</th>
                                        <th>Amount</th>
                                      


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    
                                        while($num7>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day7[$j].'</td>
											<td>'.$amount7[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num7--;
                                        }
                                    ?>

                                </tbody>
                            </table>
                                                    <h3 class="text-right">Total : <?php echo $total7; ?></h3>

                        </div>

                    </div>
                </div>
						</div>
						
						
						<div class="tab-pane fade" id="empgiveback">
											        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th> Date</th>
                                        <th>Amount</th>
                                      


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    
                                        while($num8>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day8[$j].'</td>
											<td>'.$amount8[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num8--;
                                        }
                                    ?>

                                </tbody>
                            </table>
                                                    <h3 class="text-right">Total : <?php echo $total8; ?></h3>

                        </div>

                    </div>
                </div>
						</div>	
								
						<div class="tab-pane fade" id="retpayment">
											        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th> Date</th>
                                        <th>Amount</th>
                                      


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    
                                        while($num9>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day9[$j].'</td>
											<td>'.$amount9[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num9--;
                                        }
                                    ?>

                                </tbody>
                            </table>
                                                    <h3 class="text-right">Total : <?php echo $total9; ?></h3>

                        </div>

                    </div>
                </div>
						</div>
						
						
						
						
						<!-- client Tab -->
						<div class="tab-pane fade" id="clientdetail">
				<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="profile-client.php?cid=<?php echo $id1[0];?>"><img alt="" src="image/<?php echo $photo1[0];;?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname1[0]." ".$lname1[0];?></h3><br>
											
														<div class="staff-id">Client ID :<?php echo $regid1[0];?> </div><br>
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate1[0];?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href=""><?php echo $phno1[0];?></a></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email1[0];?></a></div>
														</li>
													
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><br><br>
						</div>
						<!-- /client Tab -->
						
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
		<!-- Datatable JS -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>
        
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Tagsinput JS -->
		<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>