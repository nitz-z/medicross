<?php
include('loginsession.php');
    include_once("db.php");

if(isset($_GET['cid']) or isset($_POST["amount"]))
{
  
    
    
    
    
    
    if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
$_SESSION['feecid']=$cid;
  
    }
    
    if(isset($_POST['amount']))
    {
    $amount=$_POST['amount'];
    $period=$_POST['period'];
    $lts=$_POST['lts'];
    $lte=$_POST['lte'];
    $cid=$_SESSION['feecid'];
           $day=date("d-m-Y");
 
        if($period!="longterm")
        {
            $lts="";
            $lte="";
        }
        if($lts<$lte or $period!="longterm")
        {
            
      
          
       $sql = "INSERT INTO `regfeeclient`( `amount`,`cid`,`timeperiod`,`longtermstart`,`longtermend`,`regdate` ) VALUES('$amount','$cid','$period','$lts','$lte','$day')";
  if(mysqli_query($conn,$sql)){

    		header("location:client.php");
  	
 }

  	else{
  		header("location:error-500.php");
    }
              }
        else
        {
            $msg="Start date is greater than end date";
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

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

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
        <?php unset($_SESSION["error"]);?>
    </script>
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">


        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Client Registration Fee</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">C.R.F</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Fee Details</h4>
                            </div>
                            <div class="card-body">




                                <form action="clientregfee.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Amount</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="amount" required>
                                                </div>
                                            </div>
                                       <div class="form-group row hs">
                                                <label class="col-lg-3 col-form-label">Long Term Start date</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control  datetimepicker" name="lts" >
                                                </div>
                                            </div>
                                    
                                           
                                        </div>
                                        <div class="col-xl-6">
                                           
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">period</label>
                                               <div class="col-lg-9"> <select class="select" name="period" id="period" required>
                                                        <option value="3">3 months</option>
                                                        <option value="6">6months</option>
                                                        <option value="longterm">longterm</option>
                                                    </select> </div>
                                            </div>
                                         
                                             <div class="form-group row hs" >
                                                <label class="col-lg-3 col-form-label">End Date</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control  datetimepicker" name="lte" >
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

            </div>

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
		<script src="assets/js/moment.min.js"></script>

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script>
    
    
        $(".hs").hide();
      


        $("#period").on('change', function() {
            var jtime = $("#period").val();
            if (jtime == "longterm") {


                $(".hs").show();

            } else  {
                $(".hs").hide();
            
            }

        });

       
    </script>
</body>

</html>