<?php
include('loginsessionadmin.php');
    include_once("db.php");

if(isset($_POST['user']))
{
    
    $user=$_POST['user'];
    $pass=$_POST['pass'];
  $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from login where id=1 "));

        if($user=="")
        {
            $user=$val['username'];
        }
    if($pass=="")
        {
            $pass=$val['password'];
        }
       $sql = "update login set username='$user',password='$pass' where id=1";
  if(mysqli_query($conn,$sql) ){
  
  		header("location:client.php");
  	
 }

  	else{
            $msg="Something Went Wrong!.Please Try Again";
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
        <?php include_once("adminsidebar.php");?>

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Change Password</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">password</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Change Password</h4>
                            </div>
                            <div class="card-body">

                                <form action="changepass.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">user name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="user" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Password</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="pass" >
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
                      

    $('.reli').on('change', function() {
      var cat = $(this).val();
        if(cat=="hindhu")
            {
          $('#fetchcast').html('<label class="col-lg-3 col-form-label">Cast</label>  <div class="col-lg-9"><select class="select" name="cast" > <option>Select</option><option>Nair</option><option>Ezhava</option></select> </div>');

            }
//    $('fetchcast').innerHTML = '<b>Hello World!</b>';
});
    
    
                      
    
    </script>
</body>

</html>