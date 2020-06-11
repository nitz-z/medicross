<?php
include('loginsession.php');
    include_once("db.php");

        
    

if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
 $sql = "SELECT * FROM employe where id IN (select eid from jobcard where cid='$cid') order by id desc";
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
       $email[$i]=$check['email'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
 $i++;
 }
}
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$cid"));

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
                            <h3 class="page-title">All Employes Of <?php echo $name; ?> </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employes</li>
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
											<th>Name</th>
											
											<th>Employe ID</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Religion</th>
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
													<a href="profile-client.php?cid='.$id[$j].'" class="avatar"><img src="image/'.$photo[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$id[$j].'">'.$fname[$j].' '.$lname[$j].'</a>
												</h2>
											</td>
                                           <td>'.$regid[$j].'</td>

											<td>'.$email[$j].'</td>
											<td>'.$phno[$j].'</td>
											<td>'.$religion[$j].'</td>
											<td><a class="btn btn-success" href="emphisjob.php?eid='.$id[$j].'&cid='.$cid.'">Go</a></td>
											
											
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