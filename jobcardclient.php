<?php
include_once("db.php");

include('loginsession.php');
          unset($_SESSION["redirectit"]);

if(isset($_SESSION["error"]))
{
    $msg=$_SESSION["error"];
}
else
{
    $msg="";
}

    if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];

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
        
        
     $sql = "select * from clientneed where cid='$cid' and status=0 order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num2=mysqli_num_rows($rt);
if($num2>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id2[$i]=$check['id'];
     	   $jobtype2[$i]=$check['jobtype'];
     	   $jobtime2[$i]=$check['jobtime'];
     	   $salary2[$i]=$check['salary'];
     	   $qualification2[$i]=$check['qualification'];
     	   $language2[$i]=$check['language'];
     	   $noofslots2[$i]=$check['noofslots'];
     	   $slot1s2[$i]=$check['slot1s'];
     	   $slot1e2[$i]=$check['slot1e'];
     	   $slot2s2[$i]=$check['slot2s'];
     	   $slot2e2[$i]=$check['slot2e'];
     	   $slot3s2[$i]=$check['slot3s'];
     	   $slot3e2[$i]=$check['slot3e'];
     	   $status2[$i]=$check['status'];
     	   $dateadded2[$i]=$check['dateadded'];
     	   $startdate2[$i]=$check['startdate'];
     	   $period2[$i]=$check['period'];
     	   $advance2[$i]=$check['advance'];
     	   $religion2[$i]=$check['religion'];
     	   $cast2[$i]=$check['cast'];
   
 $i++;
 }
    
}  
        $sql = "select * from clientneed where cid='$cid' and status=3 order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num6=mysqli_num_rows($rt);
if($num6>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id6[$i]=$check['id'];
     	   $jobtype6[$i]=$check['jobtype'];
     	   $jobtime6[$i]=$check['jobtime'];
     	   $salary6[$i]=$check['salary'];
     	   $qualification6[$i]=$check['qualification'];
     	   $language6[$i]=$check['language'];
     	   $noofslots6[$i]=$check['noofslots'];
     	   $slot1s6[$i]=$check['slot1s'];
     	   $slot1e6[$i]=$check['slot1e'];
     	   $slot2s6[$i]=$check['slot2s'];
     	   $slot2e6[$i]=$check['slot2e'];
     	   $slot3s6[$i]=$check['slot3s'];
     	   $slot3e6[$i]=$check['slot3e'];
     	   $status6[$i]=$check['status'];
     	   $dateadded6[$i]=$check['dateadded'];
     	   $startdate6[$i]=$check['startdate'];
     	   $period6[$i]=$check['period'];
     	   $advance6[$i]=$check['advance'];
     	   $religion6[$i]=$check['religion'];
     	   $cast6[$i]=$check['cast'];
   
 $i++;
 }
    
}   
        $sql = "select * from jobcard where cid='$cid' and status=0 order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $cid3[$i]=$check['cid'];
     	   $eid3[$i]=$check['eid'];
     	   $nid3[$i]=$check['nid'];
     	   $salary3[$i]=$check['salary'];
     	   $advance3[$i]=$check['advance'];
     	   $comission3[$i]=$check['comission'];
     	   $startdate3[$i]=$check['startdate'];
     	   $enddate3[$i]=$check['enddate'];
     	   $period3[$i]=$check['period'];
     $dates=$enddate3[$i];
       
      $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id=$eid3[$i]"));
$firstname3[$i]=$val['firstname']; 
$lastname3[$i]=$val['lastname']; 

       $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$nid3[$i]"));

    $jobtype3[$i]=$val['jobtype']; 
$start=$startdate3[$i];
     $start=str_replace("/","-",$start);
    $to=date("d-m-Y");
    $start=strtotime($start);
    $to=strtotime($to);
  $actualperio= ceil(abs($to - $start) / 86400);
    $actualperio++;
    $actualperiod[$i]=$actualperio;
    
   
 $i++;
 }
    
}    
        
        
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
				<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

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
								<h3 class="page-title">Jobcard Client</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Jobcard Client</li>
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
														<div class="staff-id">Client ID :<?php echo $regid[0];?> </div><br>
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
										<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href=""><i class="fa fa-pencil"></i></a></div>
									</div>
								</div>
							</div>
						</div>
					</div><br><br><br>

					<?php if($num6>0)
{ ?>
<h3 class="text-center" style="color:blue">REASSIGNED</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
										<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Period</th>
											<th>Job Type</th>
											<th>Salary</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num6>0)
                                        { 
                                            echo('
                                        <tr>
											<td>'.$period6[$j].'</td>
											<td>'.$jobtype6[$j].'</td>
											<td>'.$salary6[$j].'</td>
											<td><a class="btn btn-success" href="jobresort.php?nid='.$id6[$j].'">Reactivate</a></td>

										</tr>
                                           ');
                                            $j++;
                                            $num6--;
                                        }
                                    ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div><br><br>
					<?php }
                    if($num2>0)
                    {
                    ?>
					<h3 class="text-center" style="color:red">INACTIVE</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
										<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Job Type</th>
											<th>Period</th>
											<th>Salary</th>
											<th>Action</th>
											<th>Cancel</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num2>0)
                                        { 
                                            echo('
                                            
                                        <tr>
										
											<td>'.$jobtype2[$j].'</td>
											<td>'.$period2[$j].'</td>
											
											<td>'.$salary2[$j].'</td>
											<td><a class="btn btn-success" href="jobcardsort.php?nid='.$id2[$j].'">Activate</a></td>
											<td><a class="btn btn-success" href="ajaxcomission.php?dcnid='.$id2[$j].'">Cancel</a></td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num2--;
                                        }
                                    ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div><br><br>
					
					<?php }
                    if($num3>0)
                    { ?>
					<h3 class="text-center" style="color:green">ACTIVE</h3>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Period</th>
											<th>Days</th>
											<th>Job Type</th>
											<th>Salary</th>
											<th>Reassign</th>
											<th>Stop</th>
											<th>Extend</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num3>0)
                                        { 
                                            echo('
                                            
                                        <tr>
										
											<td>'.$firstname3[$j].' '.$lastname3[$j].'</td>
											<td>'.$startdate3[$j].'</td>
											<td>'.$enddate3[$j].'</td>
											<td>'.$period3[$j].'</td>
											<td>'.$actualperiod[$j].'</td>
											<td>'.$jobtype3[$j].'</td>
											<td>'.$salary3[$j].'</td>
											<td><a class="btn btn-primary reassigns" id="'.$id3[$j].'" value="'.$enddate3[$j].'">Reassign</a></td>
											<td><a class="btn btn-danger view_data" id="'.$id3[$j].'" value="'.$enddate3[$j].'">Inactive</a></td>
											<td><a class="btn btn-warning extending" value="'.$enddate3[$j].'" id="'.$id3[$j].'">Extend</a></td>
											
											
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
            <?php   } ?>
                </div>
                
                
                
			<div id="assign-model" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Extra Details</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" >
								  
                                <form action="jobextend.php" method="post" >
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
															<div id="comview">
															    
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>                
			<div id="assign-models" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Date of which Employe stoped working</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" >
								  
                                <form action="jobcardremove.php" method="post" >
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
															<div id="comviews">
															    
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>		
						<div id="reassignmod" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Date of which Employe stoped working</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" >
								  
                                <form action="jobreassign.php" method="post" >
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															
															<div id="reassignview">
															    
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										
										
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>		
					
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
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var job_id = $(this).attr("id");  
           var enddate = $(this).attr("value");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{job_id:job_id,enddate:enddate},  
                success:function(data){  
                     $('#comviews').html(data);  
                     $('#assign-models').modal("show");  
                }  
           });  
      }); 
     $('.extending').click(function(){  
           var extendjob_id = $(this).attr("id");  
           var enddate = $(this).attr("value");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{extendjob_id:extendjob_id,enddate:enddate},  
                success:function(data){  
                     $('#comview').html(data);  
                     $('#assign-model').modal("show");  
                }  
           });  
      });   
     $('.reassigns').click(function(){  
           var reid = $(this).attr("id");  
                    var enddate = $(this).attr("value");  

           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{reid:reid,enddate:enddate},  
                success:function(data){  
                     $('#reassignview').html(data);  
                     $('#reassignmod').modal("show");  
                }  
           });  
      }); 
 });
 </script>
		
    </body>
</html>