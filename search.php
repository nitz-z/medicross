<?php
include('loginsession.php');

include_once("db.php");
if(isset($_POST['search']))
{
    $flag=2;
   $search=$_POST['search'];
     $sql1 = "SELECT * FROM employe where regid like '%$search%' or phno1 like '%$search%' or firstname like '%$search%' order by id desc";
     $sql2 = "SELECT * FROM client where regid like '%$search%' or phno1 like '%$search%' or firstname like '%$search%' order by id desc";
$i=0;
$rt1= mysqli_query($conn,$sql1);
$rt2= mysqli_query($conn,$sql2);
$num1=mysqli_num_rows($rt1);
$num2=mysqli_num_rows($rt2);
   
    if($num1>0)
    {
        $nums=$num1;
        $rt=$rt1;
        $flag=1;
    } 
    else if($num2>0)
    {
        $nums=$num2;
        $rt=$rt2;
                $flag=0;

    }
    else
    {
        $nums=0;
    }
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
    $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno[$i]=$check['phno1'];
    $photo[$i]=$check['photo'];
    $email[$i]=$check['email'];
    $addressline1[$i]=$check['addressline1'];
    $addressline2[$i]=$check['addressline2'];
    $city[$i]=$check['city'];
    
    $regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
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
      
        <meta name="robots" content="noindex, nofollow">
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="assets/css/line-awesome.min.css">
				<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
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
								<h3 class="page-title">Search</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Search</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Content Starts -->
						<div class="row">
							<div class="col-12">
							
								<!-- Search Form -->
								<div class="main-search">
									<form action="search.php" method="post">
										<div class="input-group">
											<input type="text" class="form-control" name="search">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">Search</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /Search Form -->
								
								<div class="search-result">
									<h3>Search Result Found For: <u><?php echo $search;?></u></h3>
									<p><?php echo $nums;?> Results found</p>
								</div>
						
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Index</th>
											<th>Name</th>
											<th>Register ID</th>
											<th>Address</th>
											<th>Mobile</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        
                                        while($nums>0)
                                        { $in=$j+1;
                                            echo('
                                            
                                        <tr>
                                        											<td>'.$in.'</td>

											<td>
                                            ');
                                            if($flag==1)
                                            {
                                                  echo('
												<h2 class="table-avatar">
													<a href="profile-employe.php?eid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="profile-employe.php?eid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>');
                                            }
                                           else if($flag===0){
                                               
                                          echo('
												<h2 class="table-avatar">
													<a href="profile-client.php?cid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>');
                                                 }
                                            
                                            echo('
											</td>
											<td>'.$regid[$j].'</td>
											<td>'.$addressline1[$j].','.$addressline2[$j].','.$city[$j].'</td>
											<td>'.$phno[$j].'</td>
											
									
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
						</div>
					<!-- /Content End -->
					
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
				<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>