<?php
include_once("db.php");
include('loginsession.php');
    if(isset($_GET['sts']))
{ 
        unset($_SESSION["cid"]);
        unset($_SESSION["nid"]);
        unset($_SESSION["sts"]);
    $cid=$_GET['cid'];
    $nid=$_GET['nid'];
    $sts=$_GET['sts'];
        $_SESSION['cid']=$cid;
        $_SESSION['nid']=$nid;
        $_SESSION['sts']=$sts;
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
                
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$nid'"));
        $jobe=$value['jobtype'];
        $salary=$value['salary'];
        $period=$value['period'];
        $regfee=$value['regfee'];
        $regperiod=$value['regperiod'];

        
     
        if($sts==0)
        {
                    $sql = "select * from cpayment where nid=$nid and cid=$cid and status=0 order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $day3[$i]=$check['day'];
     	   $amount3[$i]=$check['amount'];
     	       	  $total=$total+$amount3[$i];

   
 $i++;
 }
    
} 
        }
        else if($sts==1)
        {
                $sql = "select * from cpayment where nid=$nid and cid=$cid and status=1 order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $day3[$i]=$check['day'];
     	   $amount3[$i]=$check['amount'];
     	       	  $total=$total+$amount3[$i];

   
 $i++;
 }
    
} 
        }
  
 
        
        
    }
else if(isset($_POST['day']))
{
    $cid=$_SESSION['cid'];
    $nid=$_POST['nid'];
    $sts=$_SESSION['sts'];
        $day=$_POST['day'];
        $amount=$_POST['amount'];
 $sql = "insert into cpayment(cid,nid,day,amount,jid,status) 
     values('$cid','$nid','$day','$amount','0','$sts')";

  if(mysqli_query($conn,$sql))
  {
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from cpayment order by id desc limit 1"));
        $dmoid=$value['id'];
          $flo=$day;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                    $sql3="insert into gain (amount,date,exid,tab,note) values('$amount','$flo2','$dmoid','cpayment','Client Payment')";
  if(mysqli_query($conn,$sql3))
  {

    $msg="Payment Added Successfully";
  }
  }
    else{
            $msg="Failed To Add Payment";

    }
    
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
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$nid'"));
        $jobe=$value['jobtype'];
    $salary=$value['salary'];
        $period=$value['period'];
        $regfee=$value['regfee'];
        $regperiod=$value['regperiod'];
        

        
      
        
        if($sts==0)
        {
                    $sql = "select * from cpayment where nid=$nid and cid=$cid and status=0 order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $day3[$i]=$check['day'];
     	   $amount3[$i]=$check['amount'];
     	       	  $total=$total+$amount3[$i];

   
 $i++;
 }
    
} 
        }
        else if($sts==1)
        {
                $sql = "select * from cpayment where nid=$nid and cid=$cid and status=1 order by id desc";
$i=0;
             	  $total=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $day3[$i]=$check['day'];
     	   $amount3[$i]=$check['amount'];
     	       	  $total=$total+$amount3[$i];

   
 $i++;
 }
    
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
                            <h3 class="page-title">Payment Details</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Payment</li>
                            </ul>
                        </div>

                    </div>
                </div>
                
                
                <div class="card mb-0">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="profile-view">
										<div class="profile-img-wrap">
											<div class="profile-img">
												<a href="profile-client.php?cid=<?php echo $cid;?>"><img alt="" src="image/<?php echo $photo[0];;?>"></a>
											</div>
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-12 ">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0"><?php echo $fname[0]." ".$lname[0];?></h3>&nbsp;
											
														<div class="staff-id">Client ID :<?php echo $regid[0];?> </div>&nbsp;
														<div class="text">Phone : <?php echo $phno[0];?></div>&nbsp;
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="profile-view">
									
											<div class="row">
												<div class="col-md-12 ">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0">Payment Details</h3>&nbsp;
											
														<div class="staff-id">Salary :<?php echo $salary;?> </div>&nbsp;
														<div class="text">Period : <?php echo $period;?></div>&nbsp;
													</div>
												</div>
												
											</div>
									</div>
								</div>
							<div class="col-md-4">
									<div class="profile-view">
									
											<div class="row">
												<div class="col-md-12 ">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0">Registration Details</h3>&nbsp;
											
														<div class="staff-id">Registration Fee :<?php echo $regfee;?> </div>&nbsp;
														<div class="text">Registration Period : <?php echo $regperiod?></div>&nbsp;
													</div>
												</div>
												
											</div>
									</div>
								</div>
							
							</div>
						</div>
					</div><br>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Enter the Payment </h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Payment  Details</h4>





                                <form action="paymentneed.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                       <input type="text" class="form-control" name="nid" value="<?php echo $nid; ?>" hidden>
                                        <div class="col-xl-6">
                                            <div class="form-group row" id="timeslot1">
                                                <label class="col-lg-3 col-form-label">Payment Date</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="text" class="form-control datetimepicker" name="day"></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-xl-6">

                                            <div class="form-group row" id="timeslot1">
                                                <label class="col-lg-3 col-form-label">Payment Amount</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="number" class="form-control" name="amount"></div>
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




                <br>
<br>




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
                                    
                                        while($num3>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
										
											<td>'.$in.'</td>
											<td>'.$day3[$j].'</td>
											<td>'.$amount3[$j].'</td>
											
											
										</tr>
										
                                           ');
                                            $j++;
                                            $num3--;
                                        }
                                    ?>

                                </tbody>
                            </table>
                                                    <h3 class="text-right">Total : <?php echo $total; ?></h3>

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