
<?php
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
include_once("db.php");
 $sql = "SELECT * FROM client where id IN (select cid from clientneed where status=0) order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num=mysqli_num_rows($rt);
if($num>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno[$i]=$check['phno1'];
    $photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
      $addressline1[$i]=$check['addressline1'];
    $addressline2[$i]=$check['addressline2'];
    $city[$i]=$check['city'];
       $email[$i]=$check['email'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
 $i++;
 }
}
$sql = "SELECT * FROM client where id IN (select cid from clientneed where status=1) order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num2=mysqli_num_rows($rt);
if($num2>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname2[$i]=$check['firstname'];
    $lname2[$i]=$check['lastname'];
    $phno2[$i]=$check['phno1'];
    $photo2[$i]=$check['photo'];
$religion2[$i]=$check['religion'];
      $addressline12[$i]=$check['addressline1'];
    $addressline22[$i]=$check['addressline2'];
    $city2[$i]=$check['city'];
       $email2[$i]=$check['email'];
$regid2[$i]=$check['regid'];
    $id2[$i]=$check['id'];
 $i++;
 }
}
$sql = "SELECT * FROM client where id IN (select cid from clientneed where status=3) order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname3[$i]=$check['firstname'];
    $lname3[$i]=$check['lastname'];
    $phno3[$i]=$check['phno1'];
    $photo3[$i]=$check['photo'];
$religion3[$i]=$check['religion'];
       $email3[$i]=$check['email'];
      $addressline13[$i]=$check['addressline1'];
    $addressline23[$i]=$check['addressline2'];
    $city3[$i]=$check['city'];
$regid3[$i]=$check['regid'];
    $id3[$i]=$check['id'];
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
								<h3 class="page-title">Jobcard </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Jobcard</li>
								</ul>
							</div>
							
						</div>
					</div>


					<h3 class="text-center" style="color:Black">Unassigned</h3>

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
                                        while($num>0)
                                        { 
                                            echo('
                                            
                                        <tr>
										
											<td>
												<h2 class="table-avatar">
													<a href="jobcardclient.php?cid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="jobcardclient.php?cid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>
											</td>
                                           <td>'.$regid[$j].'</td>

											<td>'.$addressline1[$j].','.$addressline2[$j].','.$city[$j].'</td>
											<td>'.$phno[$j].'</td>
											<td>'.$religion[$j].'</td>
											
											
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
					<?php if($num3>0)
                            {
    ?>
					<h3 class="text-center" style="color:Black">Reassigned</h3>

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
                                        while($num3>0)
                                        { 
                                            echo('
                                            
                                        <tr>
											<td>
												<h2 class="table-avatar">
													<a href="jobcardclient.php?cid='.$id3[$j].'" class="avatar"><img src="image/'.$photo3[$j].'" alt=""></a>
													<a href="jobcardclient.php?cid='.$id3[$j].'">'.$fname3[$j].' '.$lname3[$j].'</a>
												</h2>
											</td>
                                           <td>'.$regid3[$j].'</td>
											<td>'.$addressline13[$j].','.$addressline23[$j].','.$city3[$j].'</td>
											<td>'.$phno3[$j].'</td>
											<td>'.$religion3[$j].'</td>
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
					<?php } 
                    if($num2>0)
                            {
                    ?>
					<h3 class="text-center" style="color:Black">Assigned</h3>

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
                                        while($num2>0)
                                        { 
                                            echo('
                                        <tr>
											<td>
												<h2 class="table-avatar">
													<a href="jobcardclient.php?cid='.$id2[$j].'" class="avatar"><img src="image/'.$photo2[$j].'" alt=""></a>
													<a href="jobcardclient.php?cid='.$id2[$j].'">'.$fname2[$j].' '.$lname2[$j].'</a>
												</h2>
											</td>
                                           <td>'.$regid2[$j].'</td>
											<td>'.$addressline12[$j].','.$addressline22[$j].','.$city2[$j].'</td>
											<td>'.$phno2[$j].'</td>
											<td>'.$religion2[$j].'</td>
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
						
					<?php } ?>
                
	
			
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