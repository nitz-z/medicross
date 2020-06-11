<?php
include('loginsessionadmin.php');
    include_once("db.php");


 $j=0;
    $result=mysqli_query($conn,"select * from edithis order by id desc");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id[$j]=$row['id'];
            $date[$j]=$row['date'];
            $time[$j]=$row['time'];
            $name[$j]=$row['staff'];
            $editid[$j]=$row['editid'];
            $edid=$editid[$j];
            $edit[$j]=$row['edit'];
            $ed=$edit[$j];
           $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from $ed where id=$edid "));

            $regid[$j]=$val['regid'];
            $firstname[$j]=$val['firstname'];
            $lastname[$j]=$val['lastname'];
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
                            <h3 class="page-title">Edit History</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Ehistory</li>
                            </ul>
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
                                        <th>Time</th>
                                        <th>Edited table</th>
                                        <th>c/e Name</th>
                                        <th>c/e Regid</th>

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
                                          <td>'.$name[$j].'</td>
											<td>'.$date[$j].'</td>
											<td>'.$time[$j].'</td>
											<td>'.$edit[$j].'</td>
											<td>'.$firstname[$j].' '.$lastname[$j].'</td>
											<td>'.$regid[$j].'</td>
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
                      

    
    </script>
</body>

</html>