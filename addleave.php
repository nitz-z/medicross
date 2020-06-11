<?php
include('loginsession.php');

include_once("db.php");
    if(isset($_GET['eid']))
{ 
        unset($_SESSION["eid"]);
    $eid=$_GET['eid'];
        $_SESSION['eid']=$eid;
     	   $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where eid='$eid' and status=0"));
        $cid=$value['cid'];
        $jid=$value['id'];

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
        
 $sql = "SELECT * FROM client where id='$cid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname4[$i]=$check['firstname'];
    $lname4[$i]=$check['lastname'];
    $phno4[$i]=$check['phno'];
    $photo4[$i]=$check['photo'];
$religion4[$i]=$check['religion'];
$regdate4[$i]=$check['regdate'];

       $email4[$i]=$check['email'];
      
$regid4[$i]=$check['regid'];
    $id4[$i]=$check['id'];

 $i++;
 }
}       
        
        
  
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
        
        
    }
else if(isset($_POST['eday']))
{
    $eid=$_SESSION['eid'];
       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where eid='$eid' and status=0"));
        $cid=$value['cid'];
        $jid=$value['id'];
       

        $day=date("Y-m-d");
        $eday=$_POST['eday'];
        
 $sql = "insert into empleave(eid,jid,day,enterday) 
     values('$eid','$jid','$day','$eday')";
  if(mysqli_query($conn,$sql))
  {
    $msg="Leave Added Successfully";
  }
    else{
            $msg="Failed To Add Leave";

    }
    
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
     $sql = "SELECT * FROM client where id='$cid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname4[$i]=$check['firstname'];
    $lname4[$i]=$check['lastname'];
    $phno4[$i]=$check['phno1'];
    $photo4[$i]=$check['photo'];
$religion4[$i]=$check['religion'];
$regdate4[$i]=$check['regdate'];

       $email4[$i]=$check['email'];
      
$regid4[$i]=$check['regid'];
    $id4[$i]=$check['id'];

 $i++;
 }
}       
      
  
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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Leave Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Leave</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Enter the Leave </h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Leave  Details</h4>





                                <form action="addleave.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row" id="timeslot1">
                                                <label class="col-lg-3 col-form-label">Leave Date</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="text" class="form-control datetimepicker" name="eday"></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                       
                                    </div>





                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <br><br>
<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="profile-employe.php?eid=<?php echo $eid;?>"><img alt="" src="image/<?php echo $photo[0];;?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname[0]." ".$lname[0];?></h3><br>
											
														<div class="staff-id">Employe ID :<?php echo $regid[0];?> </div><br>
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate[0];?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href=""><?php echo $phno[0];?></a></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email[0];?></a></div>
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
					<div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="profile-client.php?cid=<?php echo $cid;?>"><img alt="" src="image/<?php echo $photo4[0];;?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname4[0]." ".$lname4[0];?></h3><br>
											
														<div class="staff-id">Client ID :<?php echo $regid4[0];?> </div><br>
														<div class="small doj text-muted">Date of Reg : <?php echo $regdate4[0];?></div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href=""><?php echo $phno4[0];?></a></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href=""><?php echo $email4[0];?></a></div>
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
        
        
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Select2 JS -->
        <script src="assets/js/select2.min.js"></script>

        <!-- Custom JS -->
        <script src="assets/js/app.js"></script>

</body>

</html>