<?php
include('loginsession.php');
    include_once("db.php");
if(isset($_SESSION['error']))
{
    $msg=$_SESSION['error'];
}
if(isset($_POST['firstname']))
{
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
  
    $email=$_POST['email'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $landmark=$_POST['landmark'];
    $route=$_POST['route'];
    $phno1=$_POST['phno1'];
    $phno2=$_POST['phno2'];
    $phno3=$_POST['phno3'];
    $pin=$_POST['pincode'];
    $religion=$_POST['religion'];
    $photo = $_FILES['photo']['name'];
    $idcardf = $_FILES['idcardf']['name'];
    $idcardb = $_FILES['idcardb']['name'];
        $tz  = new DateTimeZone("Asia/Kolkata");

//$age = DateTime::createFromFormat('d/m/Y',$dob , $tz)
//     ->diff(new DateTime('now', $tz))
//     ->y;
    $dayid=date("dmYhis");
   $checking=mysqli_query($conn,"select * from client where phno1='$phno1'");
    $count=mysqli_num_rows($checking);
    $currentid=mysqli_fetch_assoc(mysqli_query($conn,"select cid from regids where id=1"));
$currentid=$currentid['cid'];
    $currentid++;
    $year=date("Y");
    $ye[0]=$year[2];
    $ye[1]=$year[3];
        $ys=$ye;

    $regid="M".implode($ys)."C".$currentid;
     
    if($religion=="Select")
    {
        $relegion="";
    }
    if($count<=0)
    {
   
   if($photo=="")
    {
            $photo=$val['photo'];
    }
    else
    {
          $imgext1=explode('.',$photo);
        $imgactulext1=strtolower(end($imgext1));
         $newimgname1 = "Cphoto".$dayid.".".$imgactulext1;
  	$target1 = "image/".$newimgname1;
    }
    if($idcardf=="")
    {
        $idcardf=$val['idprooff'];
    }
    else
    {
      
     $imgext=explode('.',$idcardf);
        $imgactulext=strtolower(end($imgext));
         $newimgname = "Cidprooff".$dayid.".".$imgactulext;
  	$target = "image/".$newimgname;
   
    }
    if($idcardb=="")
    {
        $idcardb=$val['idproofb'];
    }
    else
    {
  $imgext2=explode('.',$idcardb);
        $imgactulext2=strtolower(end($imgext2));
         $newimgname2 = "Cidproofb".$dayid.".".$imgactulext2;
  	$target2 = "image/".$newimgname2;
    }
        
       $sql = "insert into client(`firstname`,`lastname`,`addressline1`,`addressline2`,`city`,`state`,`country`,`landmark`,`detailedaddress`,`pincode`,`phno1`,`phno2`,`phno3`,`email`,`religion`,`regid`,`photo`,`idprooff`,`idproofb`) 
     values('$fname','$lname','$address1','$address2','$city','$state','$country','$landmark','$route','$pin','$phno1','$phno2','$phno3','$email','$religion','$regid','$newimgname1','$newimgname','$newimgname2')";
        $sql2="update regids set cid=$currentid where id=1";
       
  if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2)){
  	move_uploaded_file($_FILES['photo']['tmp_name'], $target1);
  	move_uploaded_file($_FILES['idcardf']['tmp_name'], $target);
  	move_uploaded_file($_FILES['idcardb']['tmp_name'], $target2);
  		header("location:client.php");
  	
 }

  	else{
            $msg="Cant Register.Something Went Wrong!.Please Try Again";
    }
        
    }
    else
    {
                    $msg="The client with same phone number is already registered!";

    }
   
   
}


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
    <title>Blank Page - HRMS admin template</title>

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




                                <form action="registerclient.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="firstname" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 1</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 3</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno3" >
                                                </div>
                                            </div>
                                           <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Religion</label>
                                                <div class="col-lg-9">
                                                    <select class="select reli" name="religion" >
                                                        <option>Select</option>
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
                                                    <input type="text" class="form-control" name="lastname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 2</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno2" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email">
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
                                                    <input type="text" class="form-control" name="address1" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address2" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="state" >
                                                </div>
                                            </div> 
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Land mark</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="landmark" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="city" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="country" value="India">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="pincode">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Detailed route</label> <div class="col-lg-9">
                                               <textarea rows="5" cols="5" class="form-control" name="route" placeholder="Enter Route"></textarea>
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