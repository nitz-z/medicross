<?php
include('loginsession.php');
include_once("db.php");
if(isset($_GET['cid']))
{
   $cid= $_GET['cid'];
 $sql = "SELECT * FROM client where id='$cid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $fname[$i]=$check['firstname'];
    $lname[$i]=$check['lastname'];
    $phno[$i]=$check['phno1'];
    $phno2[$i]=$check['phno2'];
    $phno3[$i]=$check['phno3'];
    $photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
$regdate[$i]=$check['regdate'];

       $email[$i]=$check['email'];
       $city[$i]=$check['city'];
       $state[$i]=$check['state'];
       $country[$i]=$check['country'];
       $landmark[$i]=$check['landmark'];
       $pincode[$i]=$check['pincode'];
       $detailedaddress[$i]=$check['detailedaddress'];
       $addressline1[$i]=$check['addressline1'];
       $addressline2[$i]=$check['addressline2'];
$regid[$i]=$check['regid'];
    $id[$i]=$check['id'];
    $idprooff[$i]=$check['idprooff'];
    $idproofb[$i]=$check['idproofb'];
 $i++;
 }
}

    
    }
else{
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
window.onload = function(){
var ale="<?php echo $msg; ?>";
    if(ale!="")
        {
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Client Registration Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">C.R.F</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Registration Form</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Personal Information</h4>




                                <form action="edit.php" method="post" enctype="multipart/form-data">
                          <input type="text"  name="cid" value="<?php echo $cid; ?>" hidden>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="firstname" value="<?php echo $fname[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 1</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno1" value="<?php echo $phno[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 3</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno3" value="<?php echo $phno3[0]; ?>">
                                                </div>
                                            </div>
                                           <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Religion</label>
                                                <div class="col-lg-9">
                                                    <select class="select reli" name="religion" >
                                                        <option>select</option>
                                                        <option value="hindhu">Hindhu</option>
                                                        <option value="christian">Christian</option>
                                                        <option value="muslim">Muslim</option>
                                                        <option value="intercast">Intercast</option>
                                                    </select> </div>
                                            </div>
                                    
                                           
                                        </div>
                                        <div class="col-xl-6">
                                           <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="lastname" value="<?php echo $lname[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 2</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno2" value="<?php echo $phno2[0]; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email" value="<?php echo $email[0]; ?>">
                                                </div>
                                            </div>
                                            

                                           
                                        </div>
                                    </div>
                                    <h4 class="card-title">Address</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 1</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address1" value="<?php echo $addressline1[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address2" value="<?php echo $addressline2[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="state" value="<?php echo $state[0]; ?>">
                                                </div>
                                            </div> 
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Land mark</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="landmark" value="<?php echo $landmark[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="city" value="<?php echo $city[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="country" value="<?php echo $country[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="pincode" value="<?php echo $pincode[0]; ?>">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Detailed route</label> <div class="col-lg-9">
                                               <textarea rows="5" cols="5" class="form-control" name="route" placeholder="Enter Route"><?php echo $detailedaddress[0]; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                  

                                    <h4 class="card-title">Proofs Images</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">photo</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control"  name="photo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">ID Proof Front</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control"  name="idcardf">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">ID Proof Back</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control"  name="idcardb">
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
		<script src="assets/js/moment.min.js"></script>

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script>  
                      

    
                      
    
    </script>
</body>

</html>