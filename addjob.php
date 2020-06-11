<?php
    include_once("db.php");

        include('loginsession.php');

    

if(isset($_POST['jobtype']))
{
    $jobtype=$_POST['jobtype'];
       
 
   
        
       $sql = "insert into jobtype(`job`)  values('$jobtype')";
  if(mysqli_query($conn,$sql) ){
                  $msg="Successfully Added Job:".$jobtype;

  	
 }

  	else{
            $msg="Cant Register.Something Went Wrong!.Please Try Again";

    }
        
    }
  
   
   

//selecting Job type 
 $j=0;
    $result=mysqli_query($conn,"select * from jobtype");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id3[$j]=$row['id'];
            $job[$j]=$row['job'];
           
          $j++;
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
                            <h3 class="page-title">Add Job</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Job</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Job Form</h4>
                            </div>
                            <div class="card-body">




                                <form action="addjob.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Enter New Jobtype</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="jobtype">
                                                </div>
                                            </div>



                                         <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </div>

                                   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><br><br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table  datatable display responsive">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Job</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        while($num>0)
                                        {$in=$j+1;
                                            echo('
                                            <tr>
										
											<td>'.$in.'</td>
											<td>'.$job[$j].'</td>
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

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/select2.min.js"></script>
   <!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

</body>

</html>