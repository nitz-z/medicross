<?php
include('loginsessionadmin.php');
    include_once("db.php");

if(isset($_GET['dsid']))
{
    $dsid=$_GET['dsid'];
    mysqli_query($conn,"delete from login where id='$dsid'");
}
if(isset($_POST['user']))
{
    
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $name=$_POST['name'];
    $occ=$_POST['occ'];
if($name!="admin" and $name!="Admin" and $name!="ADMIN")
{
    

       $sql = "INSERT INTO `login`( `username`, `password`, `name`, `job`) VALUES ('$user','$pass','$name','$occ')";
  if(mysqli_query($conn,$sql) ){
  
  	            $msg="Successfully added";

 }

  	else{
            $msg="Something Went Wrong!.Please Try Again";
    }
     }
    else
    {
            $msg="Name canot be admin.Please change name";
    }
    }
 $j=0;
    $result=mysqli_query($conn,"select * from login where name !='admin'");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id1[$j]=$row['id'];
            $username1[$j]=$row['username'];
            $password1[$j]=$row['password'];
            $name1[$j]=$row['name'];
            $job1[$j]=$row['job'];
           
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
                            <h3 class="page-title">Add Staff</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Staff</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Add a new Staff</h4>
                            </div>
                            <div class="card-body">

                                <form action="addstaff.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Staff name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="name" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Username</label>
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
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Occupation</label>
                                                <div class="col-lg-9">
                                                <select class="select"  name="occ">
                                                    <option value="staff">Staff</option>
                                                    <option value="accountant">Accountant</option>
                                                </select>
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
          <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table  datatable display responsive">
                                <thead>
                                    <tr>
                                        <th>Index</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Occupation</th>
                                        <th>Action</th>

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
                                          <td>'.$name1[$j].'</td>
											<td>'.$username1[$j].'</td>
											<td>'.$password1[$j].'</td>
											<td>'.$job1[$j].'</td>
											<td><a class="btn btn-danger" href="addstaff.php?dsid='.$id1[$j].'">Remove</a></td>
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