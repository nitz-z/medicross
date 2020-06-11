<?php
include('loginsession.php');

include_once("db.php");
 $sql = "SELECT * FROM employe where status=0";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
    $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("Y-m-d");
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno1[$i]=$check['phno1'];
    $photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
$cast[$i]=$check['cast'];
$qualification[$i]=$check['qualification'];
$jobtype[$i]=$check['jobtype'];
$jobtime[$i]=$check['jobtime'];

       $addressline1[$i]=$check['addressline1'];
       $addressline2[$i]=$check['addressline2'];
       $city[$i]=$check['city'];
       $blood[$i]=$check['blood'];
       $language[$i]=$check['language'];
       $gender[$i]=$check['gender'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
    $status[$i]=$check['status'];
    $dob[$i]=$check['dob'];
      $dob[$i]=str_replace("/","-",$dob[$i]);

$val = date_diff(date_create($dob[$i]), date_create($today));
    $age[$i]=$val->format('%y');
 $i++;
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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employees</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Employees</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="registeremploye.php" class="btn add-btn" ><i class="fa fa-plus"></i> Add Employee</a>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
<!--
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="filter_id">
								<label class="focus-label">Client ID</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="filter_name">
								<label class="focus-label">Client Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">  
							<div class="form-group form-focus">
								<input type="text" class="form-control floating" name="filter_no">
								<label class="focus-label">Phone no</label>
							</div>
						</div>
						
						<div class="col-sm-6 col-md-3">  
							<a class="btn btn-success btn-block"> Search </a>  
						</div>     
                    </div>
-->
					<!-- Search Filter -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Client ID</th>
											<th>Address</th>
											<th>Mobile</th>
											<th>Gender</th>
											<th>Age</th>
											<th>Job Type</th>
											<th>Job Time</th>
											<th>Religion</th>
											<th>Cast</th>
											<th>Qualification</th>
											<th>Blood</th>
											<th>Language</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($nums>0)
                                        {
                                            echo('
                                            <tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile-employe.php?eid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="profile-employe.php?eid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>
											</td>
											<td>'.$regid[$j].'</td>
											<td>'.$addressline1[$j].','.$addressline2[$j].','.$city[$j].'</td>
											<td>'.$phno1[$j].'</td>
											<td>'.$gender[$j].'</td>
											<td>'.$age[$j].'</td>
											<td>'.$jobtype[$j].'</td>
											<td>'.$jobtime[$j].'</td>
											<td>'.$religion[$j].'</td>
											<td>'.$cast[$j].'</td>
											<td>'.$qualification[$j].'</td>
											<td>'.$blood[$j].'</td>
											<td>'.$language[$j].'</td>
											<td>'.$language[$j].'</td>
											
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="clients-list.html#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="need.php?cid='.$id[$j].'" ><i class="fa fa-pencil m-r-5"></i>Need</a>
														<a class="dropdown-item" href="clientregfee.php?cid='.$id[$j].'" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Pay</a>
													</div>
												</div>
											</td>
										</tr>
										
                                            ');
                                            $j++;
                                            $nums--;
                                        }
                                        ?>
										
									</tbody>
								</table>
							</div>
						</div>
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
		
		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>