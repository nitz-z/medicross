<?php
include_once("db.php");

include('loginsession.php');


    if(isset($_GET['eid']))
{
    $eid=$_GET['eid'];

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
    $photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
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
 $i++;
 }
}       
        
        
//     $sql = "select * from clientneed where status=0";
//$i=0;
//$rt= mysqli_query($conn,$sql);
//$num2=mysqli_num_rows($rt);
//if($num2>0)
//{
//while($check = mysqli_fetch_array($rt)){
//     	   $id2[$i]=$check['id'];
//     	   $jobtype2[$i]=$check['jobtype'];
//     	   $jobtime2[$i]=$check['jobtime'];
//     	   $salary2[$i]=$check['salary'];
//     	   $qualification2[$i]=$check['qualification'];
//     	   $language2[$i]=$check['language'];
//     	   $noofslots2[$i]=$check['noofslots'];
//     	   $slot1s2[$i]=$check['slot1s'];
//     	   $slot1e2[$i]=$check['slot1e'];
//     	   $slot2s2[$i]=$check['slot2s'];
//     	   $slot2e2[$i]=$check['slot2e'];
//     	   $slot3s2[$i]=$check['slot3s'];
//     	   $slot3e2[$i]=$check['slot3e'];
//     	   $status2[$i]=$check['status'];
//     	   $dateadded2[$i]=$check['dateadded'];
//     	   $startdate2[$i]=$check['startdate'];
//     	   $period2[$i]=$check['period'];
//     	   $advance2[$i]=$check['advance'];
//     	   $religion2[$i]=$check['religion'];
//     	   $cast2[$i]=$check['cast'];
//   
// $i++;
// }
//    
//}   
        $sql = "select * from jobcard where eid='$eid' and status=0 order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $cid3[$i]=$check['cid'];
     	   $nid3[$i]=$check['nid'];
     	   $comission3[$i]=$check['comission'];
     	   $salary3[$i]=$check['salary'];
     	   $advance3[$i]=$check['advance'];
     	   $period3[$i]=$check['period'];
     	   $startdate3[$i]=$check['startdate'];
     	   $enddate3[$i]=$check['enddate'];
     	   $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$cid3[$i]"));

        $cfname[$i]=$value['firstname'];
        $clname[$i]=$value['lastname'];
        $cphno[$i]=$value['phno1'];
        $cregid[$i]=$value['regid'];
   
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
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">All Active Needs</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Active Need</li>
								</ul>
							</div>
							
						</div>
					</div>
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
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate[0];?></div>
<!--														<div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div>-->
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href=""><?php echo $phno[0];?></a></div>
														</li>
														<br>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email[0];?></a></div>
														</li><br>
													
												
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
									</div>
								</div>
							</div>
						</div>
					</div><br><br><br>

					
				
					
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Client Name</th>
											<th>Client Regid</th>
											<th>Client Number</th>
											<th>Startdate</th>
											<th>Salary</th>
											<th>Payments</th>
										
											
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num3>0)
                                        { 
                                            echo('
                                            
                                        <tr>
										
											<td>'.$cfname[$j].' '.$clname[$j].'</td>
											<td>'.$cregid[$j].'</td>
											<td>'.$cphno[$j].'</td>
											<td>'.$startdate3[$j].'</td>
											<td>'.$salary3[$j].'</td>
											<td><a class="btn btn-primary" href="epaydetails.php?jid='.$id3[$j].'&eid='.$eid.'&nid='.$nid3[$j].'">All Payment</a></td>
											
											
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
				<!-- /Page Content 
		
				
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
		
		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>