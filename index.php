<?php
include('loginsession.php');
$logname=$_SESSION['logname'];
$monthsd= date('Y-m-01');
$monthed= date('Y-m-t');
$premonthsd= date('Y-m-d', strtotime('first day of last month'));
$premonthed= date('Y-m-d', strtotime('last day of last month'));
$monthin=date("M");

    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$monthsd' AND '$monthed'"));
    $ingainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$monthsd' AND '$monthed'"));
    $inlossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$monthsd' AND '$monthed'"));
    $inempexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$monthsd' AND '$monthed'"));
    $inexpenamt=$val['amountsum'];  
        if($ingainamt=="") { $ingainamt=0; }
        if($inlossamt=="") { $inlossamt=0; }
        if($inempexamt=="") { $inempexamt=0; }
        if($inexpenamt=="") { $inexpenamt=0; }
        

$inprofit=$ingainamt-$inlossamt;
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$premonthsd' AND '$premonthed'"));
    $pregainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$premonthsd' AND '$premonthed'"));
    $prelossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$premonthsd' AND '$premonthed'"));
    $preempexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$premonthsd' AND '$premonthed'"));
    $preexpenamt=$val['amountsum']; 
$preprofit=$pregainamt-$prelossamt;
if($pregainamt=="") { $pregainamt=0; }
        if($prelossamt=="") { $prelossamt=0; }
        if($preempexamt=="") { $preempexamt=0; }
        if($preexpenamt=="") { $preexpenamt=0; }
for ($i = 1; $i <= 4; $i++) 
{
   $months[] = date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"));
   $monthe[] = date("Y-m-t", strtotime( date( 'Y-m-01' )." -$i months"));
   $mont[] = date("M", strtotime( date( 'Y-m-01' )." -$i months"));
}
$pre2monthsd=$months[1];
$pre2monthed=$monthe[1];
$pre3monthsd=$months[2];
$pre3monthed=$monthe[2];
$pre4monthsd=$months[3];
$pre4monthed=$monthe[3];
  $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$pre2monthsd' AND '$pre2monthed'"));
    $pre2gainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$pre2monthsd' AND '$pre2monthed'"));
    $pre2lossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$pre2monthsd' AND '$pre2monthed'"));
    $pre2empexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$pre2monthsd' AND '$pre2monthed'"));
    $pre2expenamt=$val['amountsum']; 
$pre2profit=$pre2gainamt-$pre2lossamt;
  $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$pre3monthsd' AND '$pre3monthed'"));
    $pre3gainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$pre3monthsd' AND '$pre3monthed'"));
    $pre3lossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$pre3monthsd' AND '$pre3monthed'"));
    $pre3empexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$pre3monthsd' AND '$pre3monthed'"));
    $pre3expenamt=$val['amountsum']; 
$pre3profit=$pre3gainamt-$pre3lossamt;
  $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$pre4monthsd' AND '$pre4monthed'"));
    $pre4gainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$pre4monthsd' AND '$pre4monthed'"));
    $pre4lossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$pre4monthsd' AND '$pre4monthed'"));
    $pre4empexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$pre4monthsd' AND '$pre4monthed'"));
    $pre4expenamt=$val['amountsum']; 
$pre4profit=$pre4gainamt-$pre4lossamt;





$cnum=mysqli_num_rows(mysqli_query($conn,"select * from client"));
$empnum=mysqli_num_rows(mysqli_query($conn,"select * from employe"));
$runt=mysqli_query($conn,"select * from enquiry");
$ennum=mysqli_num_rows($runt);
$i=0;
    $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("d/m/Y");
if($ennum>0)
{
while($check = mysqli_fetch_array($runt)){
     	   $follow[$i]=$check['followdate'];
    if($follow[$i]>=$today)
    {
        
    }
    else
    {
        $ennum--;
    }
 $i++;
 }
     
}
$jnum=mysqli_num_rows(mysqli_query($conn,"select * from jobcard"));
//$i=0;
//$rt= mysqli_query($conn,$sql);
//$nums=mysqli_num_rows($rt);
//    $tz  = new DateTimeZone("Asia/Kolkata");
//    $today = date("d/m/Y");
//if($nums>0)
//{
//while($check = mysqli_fetch_array($rt)){
//     	   $fname[$i]=$check['firstname'];
//    $lname[$i]=$check['lastname'];
//    $phno1[$i]=$check['phno1'];
//    $marrage[$i]=$check['marrage'];
//    $photo[$i]=$check['photo'];
//$religion[$i]=$check['religion'];
//$cast[$i]=$check['cast'];
//$qualification[$i]=$check['qualification'];
//$jobtype[$i]=$check['jobtype'];
//$jobtime[$i]=$check['jobtime'];
//
//       $email[$i]=$check['email'];
//       $blood[$i]=$check['blood'];
//       $language[$i]=$check['language'];
//       $gender[$i]=$check['gender'];
//$regid[$i]=$check['regid'];
//    $id[$i]=$check['id'];
//    $status[$i]=$check['status'];
//    $dob[$i]=$check['dob'];
//    $dates=$dob[$i];
//    $dates=str_replace("/","-",$dates);
//    $dob[$i]=$dates;
//    $dates=$today;
//        $dates=str_replace("/","-",$dates);
//    $today=$dates;
//
//    $diff = date_diff(date_create($dob[$i]), date_create($today));
//$age[$i]=$diff->format('%y');
// $i++;
// }
//     
//}
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
		
		<!-- Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		
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
							<div class="col-sm-12">
								<h3 class="page-title">Welcome <?php echo $logname; ?></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
							<a href="enquiry.php">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<h3><?php echo $ennum; ?></h3>
										<span>Enquirys</span>
									</div>
								</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
							<a href="client.php">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
									<div class="dash-widget-info">
										<h3><?php echo $cnum; ?></h3>
										<span>Clients</span>
									</div>
								</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
							<a href="jobcard.php">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
									<div class="dash-widget-info">
										<h3><?php echo $jnum; ?></h3>
										<span>Jobs</span>
									</div>
								</div>
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
							<div class="card dash-widget">
								<a href="employe.php">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
									<div class="dash-widget-info">
										<h3><?php echo $empnum; ?></h3>
										<span>Employees</span>
									</div>
								</div>
								</a>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Total Revenue</h3>
											<div id="bar-charts"></div>
										</div>
									</div>
								</div>
<!--
								<div class="col-md-6 text-center">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Sales Overview</h3>
											<div id="line-charts"></div>
										</div>
									</div>
								</div>
-->
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card-group m-b-30">
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Loaned Money</span>
											</div>
											
										</div>
										<h3 class="mb-3"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $inempexamt; ?></h3>
<!--
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
-->
										<p class="mb-0">Previous Month <span class="text-muted">=<img src="assets/img/icon/rupee.png" width="15px"><?php echo $inempexamt; ?></span></p>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Earnings</span>
											</div>
<!--
											<div>
												<span class="text-success">100%</span>
											</div>
-->
										</div>
										<h3 class="mb-3"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $ingainamt; ?></h3>
<!--
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
-->
										<p class="mb-0">Previous Month <span class="text-muted">=<img src="assets/img/icon/rupee.png" width="15px"><?php echo $pregainamt; ?></span></p>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Expenses</span>
											</div>
<!--
											<div>
												<span class="text-danger">-2.8%</span>
											</div>
-->
										</div>
										<h3 class="mb-3"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $inlossamt; ?></h3>
<!--
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
-->
										<p class="mb-0">Previous Month <span class="text-muted"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $prelossamt; ?></span></p>
									</div>
								</div>
							
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between mb-3">
											<div>
												<span class="d-block">Profit</span>
											</div>
<!--
											<div>
												<span class="text-danger">-75%</span>
											</div>
-->
										</div>
										<h3 class="mb-3"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $inprofit; ?></h3>
<!--
										<div class="progress mb-2" style="height: 5px;">
											<div class="progress-bar bg-primary" role="progressbar" style="width: 70%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
-->
										<p class="mb-0">Previous Month <span class="text-muted"><img src="assets/img/icon/rupee.png" width="15px"><?php echo $preprofit; ?></span></p>
									</div>
								</div>
							</div>
						</div>	
					</div>
				
<!--
					<div class="row">
						<div class="col-md-6 d-flex">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Invoices</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap custom-table mb-0">
											<thead>
												<tr>
													<th>Invoice ID</th>
													<th>Client</th>
													<th>Due Date</th>
													<th>Total</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="invoice-view.html">#INV-0001</a></td>
													<td>
														<h2><a href="index.html#">Global Technologies</a></h2>
													</td>
													<td>11 Mar 2019</td>
													<td>$380</td>
													<td>
														<span class="badge bg-inverse-warning">Partially Paid</span>
													</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0002</a></td>
													<td>
														<h2><a href="index.html#">Delta Infotech</a></h2>
													</td>
													<td>8 Feb 2019</td>
													<td>$500</td>
													<td>
														<span class="badge bg-inverse-success">Paid</span>
													</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0003</a></td>
													<td>
														<h2><a href="index.html#">Cream Inc</a></h2>
													</td>
													<td>23 Jan 2019</td>
													<td>$60</td>
													<td>
														<span class="badge bg-inverse-danger">Unpaid</span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer">
									<a href="invoices.html">View all invoices</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex">
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h3 class="card-title mb-0">Payments</h3>
								</div>
								<div class="card-body">
									<div class="table-responsive">	
										<table class="table custom-table table-nowrap mb-0">
											<thead>
												<tr>
													<th>Invoice ID</th>
													<th>Client</th>
													<th>Payment Type</th>
													<th>Paid Date</th>
													<th>Paid Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="invoice-view.html">#INV-0001</a></td>
													<td>
														<h2><a href="index.html#">Global Technologies</a></h2>
													</td>
													<td>Paypal</td>
													<td>11 Mar 2019</td>
													<td>$380</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0002</a></td>
													<td>
														<h2><a href="index.html#">Delta Infotech</a></h2>
													</td>
													<td>Paypal</td>
													<td>8 Feb 2019</td>
													<td>$500</td>
												</tr>
												<tr>
													<td><a href="invoice-view.html">#INV-0003</a></td>
													<td>
														<h2><a href="index.html#">Cream Inc</a></h2>
													</td>
													<td>Paypal</td>
													<td>23 Jan 2019</td>
													<td>$60</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="card-footer">
									<a href="payments.html">View all payments</a>
								</div>
							</div>
						</div>
					</div>
					
-->

				
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
		
		<!-- Chart JS -->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
<!--		<script src="assets/js/chart.js"></script>-->
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		<script>
        $(document).ready(function() {
var p0g="<?php echo $ingainamt; ?>";
var p0l="<?php echo $inlossamt; ?>";
var p0emp="<?php echo $inempexamt; ?>";
var p0ex="<?php echo $inexpenamt; ?>";
var p1g="<?php echo $pregainamt; ?>";
var p1l="<?php echo $prelossamt; ?>";
var p1emp="<?php echo $preempexamt; ?>";
var p1ex="<?php echo $preexpenamt; ?>";
var p2g="<?php echo $pre2gainamt; ?>";
var p2l="<?php echo $pre2lossamt; ?>";
var p2emp="<?php echo $pre2empexamt; ?>";
var p2ex="<?php echo $pre2expenamt; ?>";
var p3g="<?php echo $pre3gainamt; ?>";
var p3l="<?php echo $pre3lossamt; ?>";
var p3emp="<?php echo $pre3empexamt; ?>";
var p3ex="<?php echo $pre3expenamt; ?>";
var p4g="<?php echo $pre4gainamt; ?>";
var p4l="<?php echo $pre4lossamt; ?>";
var p4emp="<?php echo $pre4empexamt; ?>";
var p4ex="<?php echo $pre4expenamt; ?>";
var monthname1="<?php echo $monthin; ?>";
var monthname2="<?php echo $mont[0]; ?>";
var monthname3="<?php echo $mont[1]; ?>";
var monthname4="<?php echo $mont[2]; ?>";
var monthname5="<?php echo $mont[3]; ?>";
            
        if(p0g=="") { p0g=0; }
        if(p1g=="") { p1g=0; }
        if(p2g=="") { p2g=0; }
        if(p3g=="") { p3g=0; }
        if(p4g=="") { p4g=0; }
        if(p0l=="") { p0l=0; }
        if(p1l=="") { p1l=0; }
        if(p2l=="") { p2l=0; }
        if(p3l=="") { p3l=0; }
        if(p4l=="") { p4l=0; }
        if(p0emp=="") { p0emp=0; }
        if(p1emp=="") { p1emp=0; }
        if(p2emp=="") { p2emp=0; }
        if(p3emp=="") { p3emp=0; }
        if(p4emp=="") { p4emp=0; }
            
            
            
	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: monthname1, a: p0g, b: p0l, c: p0emp},
			{ y: monthname2, a: p1g,  b: p1l, c: p1emp},
			{ y: monthname3,  a: p2g,  b: p2l, c: p2emp},
			{ y: monthname4,  a: p3g,  b: p3l, c: p3emp},
			{ y: monthname5,  a: p4g,  b: p4l, c: p4emp}
		],
		xkey: 'y',
		ykeys: ['a', 'b', 'c'],
		labels: ['Total Income', 'Total Outcome', 'Loaned'],
		lineColors: ['#ff9b44','#fc6075','#FF0000'],
		lineWidth: '3px',
		barColors: ['#ff9b44','#fc6075','#FFcccb'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	Morris.Line({
		element: 'line-charts',
	data: [
			{ y: monthname1+'1', a: p0g, b: p0l, c: p0emp},
			{ y: monthname2+'2', a: p1g,  b: p1l, c: p1emp},
			{ y: monthname3+'3',  a: p2g,  b: p2l, c: p2emp},
			{ y: monthname4+'4',  a: p3g,  b: p3l, c: p3emp},
			{ y: monthname5+'5',  a: p4g,  b: p4l, c: p4emp}
		],
		xkey: 'y',
		ykeys: ['a', 'b', 'b'],
		labels: ['Total Income', 'Total Outcome', 'Total Outcome'],
		lineColors: ['#ff9b44','#fc6075','#fc6075'],
		lineWidth: '3px',
        barColors: ['#ff9b44','#fc6075','#fc6075'],
		resize: true,
		redraw: true
	});
		
});
        </script>
    </body>
</html>