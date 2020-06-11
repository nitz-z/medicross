<?php
include('loginsession.php');

if(isset($_SESSION["error"]))
{
    $msg=$_SESSION["error"];
}
else
{
    $msg="";
}
include_once("db.php");
 $sql = "SELECT * FROM client";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno1[$i]=$check['phno1'];
    $photo[$i]=$check['photo'];
    $addressline1[$i]=$check['addressline1'];
    $addressline2[$i]=$check['addressline2'];
    $city[$i]=$check['city'];
$religion[$i]=$check['religion'];

       $email[$i]=$check['email'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
 $i++;
 }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Need</title>
		
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
								<h3 class="page-title">Need Form</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Clients</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->


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
											<th>Religion</th>
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
													<a href="need.php?cid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="need.php?cid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>
											</td>
											<td>'.$regid[$j].'</td>
											<td>'.$addressline1[$j].','.$addressline2[$j].','.$city[$j].'</td>
											<td>'.$phno1[$j].'</td>
											<td>
                                                '.$religion[$j].'
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