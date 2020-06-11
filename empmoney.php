<?php
include('loginsession.php');
    include_once("db.php");


if(isset($_POST['amount']) or isset($_GET['meid']) )
{
    if(isset($_GET['meid']))
    {
        $meid=$_GET['meid'];
        $_SESSION['meid']=$meid;
    }
    if(isset($_POST['amount']))
    {
                $meid=$_SESSION['meid'];

    $day=$_POST['day'];
    $amount=$_POST['amount'];
    $note=$_POST['note'];

    $flo=$day;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
       $sql = "INSERT INTO `empmoney`(`eid`,`date`, `amount`, `note`) VALUES ('$meid','$flo2','$amount','$note')";

  if(mysqli_query($conn,$sql) ){
                  $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from empmoney order by id desc limit 1"));
                    
                    $emid=$val['id'];
               
                  $sql3="insert into extraexpence (amount,date,exid,tab) values('$amount','$flo2','$emid','empmoney')";
mysqli_query($conn,$sql3);
  	            $msg="Successfully added";

 }

  	else{
            $msg="Something Went Wrong!.Please Try Again";
    }
    
    }
    
    
    
    
 $j=0;
    $result=mysqli_query($conn,"select * from empmoney order by id desc");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id1[$j]=$row['id'];
            $eid1[$j]=$row['eid'];
            $day1[$j]=$row['date'];
            $eid2=$eid1[$j];
            $amount1[$j]=$row['amount'];
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$eid2'"));
                       $name1[$j]=$val['firstname'];

          $j++;
        }
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
        <?php include_once("sidebar.php");?>

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Add Amount</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">employe money</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">employe money</h4>
                            </div>
                            <div class="card-body">

                                <form action="empmoney.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Date</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control datetimepicker" name="day" >
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">amount</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="amount" required>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Note</label> <div class="col-lg-9">
                                               <textarea rows="5" cols="5" class="form-control" name="note" placeholder="Enter expence details..."></textarea>
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
                                        <th>Date</th>
                                        <th>Amount</th>

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
											<td>'.$day1[$j].'</td>
											<td>'.$amount1[$j].'</td>
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
     
        
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>


<script>  
                      

    </script>
</body>

</html>