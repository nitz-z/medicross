<?php
include('loginsessionadmin.php');
    include_once("db.php");


if(isset($_POST['amt']))
{
    
    $date=$_POST['date'];
    $amt=$_POST['amt'];
    $note=$_POST['note'];

    

       $sql = "INSERT INTO `expence`( `date`, `amount`, `note`) VALUES ('$date','$amt','$note')";
        $flo=$date;
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
                        $sql3="insert into loss (amount,date,exid,tab,note) values('$amt','$flo2','0','expence','$note')";

  if(mysqli_query($conn,$sql) and (mysqli_query($conn,$sql3) )){
  
  	            $msg="Successfully added";

 
  }
  	else{
            $msg="Something Went Wrong!.Please Try Again";
    }
     
  
    }
 $j=0;
    $result=mysqli_query($conn,"select * from expence order by id desc");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id1[$j]=$row['id'];
            $date1[$j]=$row['date'];
            $amount1[$j]=$row['amount'];
            $note1[$j]=$row['note'];
           
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
                            <h3 class="page-title">Add Expence</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Expence</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Add Expences</h4>
                            </div>
                            <div class="card-body">

                                <form action="expence.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Date</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control datetimepicker" name="date" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Amount</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="amt" required >
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
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Note</th>

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
                                          <td>'.$date1[$j].'</td>
											<td>'.$amount1[$j].'</td>
											<td>'.$note1[$j].'</td>
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