<?php
include('loginsessionadmin.php');
    include_once("db.php");
$today=date("d/m/Y");
$tod=date("Y-m-d");
if(isset($_GET['regnid']))
{
    $regnid=$_GET['regnid'];
}
    if(isset($_POST['per']))
{
  $per=$_POST['per'];
  $rfee=$_POST['rfee'];
  $rpnid=$_POST['rpnid'];
     $rrfee=$rfee;  
      $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$rpnid"));
    $regperiod=$val['regperiod'];
    $regfee=$val['regfee'];
    $rcid=$val['cid'];
   
        $rfee=$rfee+$regfee;
        $preer=$per;
        $per=$per+$regperiod;
       $sql = "update clientneed set regperiod='$per',regfee='$rfee' where id=$rpnid";
//        $sql4="insert into gain (amount,date,exid,tab,note) values('$rrfee','$tod','$rpnid','clientneed','Extending Registration Period')";
 $sql7 = "insert into regfee (amount,date,nid,cid,period) values('$rrfee','$today','$rpnid','$rcid','$preer')";

  if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql7)  ){
                header("location:index.php");

  	
 }

  	else{
            $msg="Cant extend.Something Went Wrong!.Please Try Again";

    }
            
}   
// if(isset($_POST['rcancelid']))
//{
//  $rcancelid=$_POST['rcancelid'];
//
//       $sql = "update clientneed set regstatus=1 where id=$rcancelid";
//  if(mysqli_query($conn,$sql) ){
//                header("location:index.php");
//
//  	
// }
//
//  	else{
//            $msg="Cant extend.Something Went Wrong!.Please Try Again";
//
//    }
//            
//}   


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
    <title>Registration Fees</title>

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

                   
                   <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#gaintab" data-toggle="tab" class="nav-link active">Extend </a></li>
                       

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">

                    <!-- Payment Tab -->
                    <div id="gaintab" class="pro-overview tab-pane fade show active">
                        <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="page-title">Enter Extention details</h4>

                                </div>
                            </div>
                        </div>
        
                                       <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0"></h4>
                            </div>
                            <div class="card-body">




                                <form action="regnotification.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            
                                                                                                <input type="text" class="form-control" name="rpnid" value="<?php echo $regnid; ?>" hidden>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Enter New Period</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="per" required>
                                                </div>
                                            </div>  <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Registration Fee</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="rfee" required>
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
                        
                        
                        
                    </div> <!-- Payment Tab -->
            
                    
                    
                    
                    
                </div>

               



            </div>
            <!-- /Page Content -->
            <div id="editingmodel" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-body">

                            <form action="paynotification.php" method="post">
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <div id="editview">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->

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

    <script>
        $('.editing').click(function() {
            var nojid = $(this).attr("id");
            var tab = $(this).attr("value");

            $.ajax({
                url: "ajaxcomission.php",
                method: "post",
                data: {
                    nojid: nojid,
                    tab: tab
                },
                success: function(data) {
                    $('#editview').html(data);
                    $('#editingmodel').modal("show");
                }
            });
        });

        $('.dtc').DataTable({
            "bFilter": true,
          

        });
    </script>
</body>

</html>