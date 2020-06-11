
<?php
session_start();
if(isset($_SESSION["error"]))
{
    $msg=$_SESSION["error"];
}
else
{
    $msg="";
}
include_once("db.php");
    $today = date("Y-m-d");

 $sql = "SELECT * FROM employe where status=1";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $regid3[$i]=$check['regid'];
     	   $jobtype3[$i]=$check['jobtype'];
     	   $jobtime3[$i]=$check['jobtime'];
     	   $firstname3[$i]=$check['firstname'];
     	   $lastname3[$i]=$check['lastname'];
     	   $phno3[$i]=$check['phno1'];
     	   $qualification3[$i]=$check['qualification'];
     	   $language3[$i]=$check['language'];
     	   $gender3[$i]=$check['gender'];
     	   $email3[$i]=$check['email'];
     	   $photo3[$i]=$check['photo'];
     	   $nooftslot3[$i]=$check['nooftslot'];
     	   $slot1s3[$i]=$check['slot1s'];
     	   $slot1e3[$i]=$check['slot1e'];
     	   $slot2s3[$i]=$check['slot2s'];
     	   $slot2e3[$i]=$check['slot2e'];
     	   $slot3s3[$i]=$check['slot3s'];
     	   $slot3e3[$i]=$check['slot3e'];
     	   $religion3[$i]=$check['religion'];
     	   $cast3[$i]=$check['cast'];
       $dob[$i]=$check['dob'];
      $dob[$i]=str_replace("/","-",$dob[$i]);

$val = date_diff(date_create($dob[$i]), date_create($today));
    $age3[$i]=$val->format('%y');
   
   
 $i++;
 }
}
 $sql = "SELECT * FROM employe where status=0";
$i=0;
$rt= mysqli_query($conn,$sql);
$num=mysqli_num_rows($rt);
if($num>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id[$i]=$check['id'];
     	   $regid[$i]=$check['regid'];
     	   $jobtype[$i]=$check['jobtype'];
     	   $jobtime[$i]=$check['jobtime'];
     	   $firstname[$i]=$check['firstname'];
     	   $lastname[$i]=$check['lastname'];
     	   $phno[$i]=$check['phno1'];
     	   $qualification[$i]=$check['qualification'];
     	   $language[$i]=$check['language'];
     	   $gender[$i]=$check['gender'];
     	   $email[$i]=$check['email'];
     	   $photo[$i]=$check['photo'];
     	   $nooftslot[$i]=$check['nooftslot'];
     	   $slot1s[$i]=$check['slot1s'];
     	   $slot1e[$i]=$check['slot1e'];
     	   $slot2s[$i]=$check['slot2s'];
     	   $slot2e[$i]=$check['slot2e'];
     	   $slot3s[$i]=$check['slot3s'];
     	   $slot3e[$i]=$check['slot3e'];
     	   $religion[$i]=$check['religion'];
     	   $cast[$i]=$check['cast'];
       $dob[$i]=$check['dob'];
      $dob[$i]=str_replace("/","-",$dob[$i]);

$val = date_diff(date_create($dob[$i]), date_create($today));
    $age[$i]=$val->format('%y');
   
   
 $i++;
 }
} 
?>

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
								<h3 class="page-title">Employe Salary</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Employe Salary</li>
								</ul>
							</div>
							
						</div>
					</div>


										<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable   display responsive" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Employe ID</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Gender</th>
											<th>Age</th>
											<th>Job Type</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num3>0)
                                        {
                                            echo('
                                            <tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile-employe.php?eid='.$id3[$j].'" class="avatar"><img src="image/'.$photo3[$j].'" alt=""></a>
													<a href="profile-employe.php?eid='.$id3[$j].'">'.$firstname3[$j].' '.$lastname3[$j].'</a>
												</h2>
											</td>
											<td>'.$regid3[$j].'</td>
											<td>'.$email3[$j].'</td>
											<td>'.$phno3[$j].'</td>
											<td>'.$gender3[$j].'</td>
											<td>'.$age3[$j].'</td>
											<td>'.$jobtype3[$j].'</td>
											                                            <td><a  class="btn btn-success " href="payempjob.php?eid='.$id3[$j].'" >go<a/></td>

											
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
					</div><br><br>
					
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Unemployed</h3>
								
							</div>
							
						</div>
					</div>


										<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable   display responsive" >
									<thead>
										<tr>
											<th>Name</th>
											<th>Employe ID</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Gender</th>
											<th>Age</th>
											<th>Job Type</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num>0)
                                        {
                                            echo('
                                            <tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile-employe.php?eid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="profile-employe.php?eid='.$id[$j].'">'.$firstname[$j].' '.$lastname[$j].'</a>
												</h2>
											</td>
											<td>'.$regid[$j].'</td>
											<td>'.$email[$j].'</td>
											<td>'.$phno[$j].'</td>
											<td>'.$gender[$j].'</td>
											<td>'.$age[$j].'</td>
											<td>'.$jobtype[$j].'</td>
											  <td><a  class="btn btn-success " href="empmoney.php?meid='.$id[$j].'" >go<a/></td>

											
										</tr>
										
                                            ');
                                            $j++;
                                            $num--;
                                        }
                                        ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div><br><br>
					
					
                
	
			
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