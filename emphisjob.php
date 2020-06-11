<?php
include('loginsession.php');
    include_once("db.php");

        
    

if(isset($_GET['cid']))
{
    $eid=$_GET['eid'];
    $cid=$_GET['cid'];
 $sql = "SELECT * FROM jobcard where cid='$cid' and eid='$eid' order by id desc";
$i=0;
$rt= mysqli_query($conn,$sql);
$num=mysqli_num_rows($rt);
if($num>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $startdate[$i]=$check['startdate'];
    $enddate[$i]=$check['enddate'];
    $salary[$i]=$check['salary'];
    $advance[$i]=$check['advance'];
$comission[$i]=$check['comission'];
       $period[$i]=$check['period'];
$nid[$i]=$check['nid'];
    $id[$i]=$check['id'];
    $dnid=$nid[$i];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$dnid"));

    $jobtype[$i]=$val['jobtype']; 
 $i++;
 }
}
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id=$eid"));

    $name=$val['firstname']; 
}else
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

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">


    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">All Works Of <?php echo $name; ?> </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Clients</li>
                            </ul>
                        </div>
                    </div>
                </div>
        
             		<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
										<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Job Type</th>
											<th>Salary</th>
											<th>Period</th>
											<th>Comission</th>
											<th>Advance</th>
											<th>Advance</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
                                        $j=0;
                                        while($num>0)
                                        { 
                                            echo('
                                            
                                        <tr>
										
										
                                           <td>'.$startdate[$j].'</td>

											<td>'.$enddate[$j].'</td>
											<td>'.$jobtype[$j].'</td>
											<td>'.$salary[$j].'</td>
											<td>'.$period[$j].'</td>
											<td>'.$comission[$j].'</td>
											<td>'.$advance[$j].'</td>
											<td><a class="btn btn-success" href="emphisdetail.php?jid='.$id[$j].'">Go</a></td>
											
											
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

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/select2.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>

    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

</body>

</html>