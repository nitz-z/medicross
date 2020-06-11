<?php
include('loginsessionadmin.php');
    include_once("db.php");
$today=date("d/m/Y");
if(isset($_SESSION['redirectit']))
{
          unset($_SESSION["redirectit"]);
    header("location:reportfront.php");

}
else{
    $_SESSION['redirectit']="yes";
}
if(isset($_POST['restart']))
{
    $restart=$_POST['restart'];
    $reend=$_POST['reend'];
    
    $flo=$restart;
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
    $restart=$flo2;  
    $flo=$reend;
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
    $reend=$flo2;
    
     //intializing
        $gfirstname=[];
        $glastname=[];
        $gregid=[];
        $gstartdate=[];
        $gperiod=[];
        $gphoto=[];
        $gwho=[];
    $lfirstname=[];
        $llastname=[];
        $lregid=[];
        $lstartdate=[];
        $lperiod=[];
        $lphoto=[];
        $lwho=[];
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$restart' AND '$reend'"));

    $gainamt=$val['amountsum'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from loss  WHERE date between '$restart' AND '$reend'"));

    $lossamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney  WHERE date between '$restart' AND '$reend'"));

    $empexamt=$val['amountsum']; 
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from expence  WHERE date between '$restart' AND '$reend'"));

    $expenamt=$val['amountsum']; 
   $j=0;
    $result=mysqli_query($conn,"SELECT * FROM gain WHERE date between '$restart' AND '$reend' order by id desc");
    $num=mysqli_num_rows($result);
   
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $gid[$j]=$row['id'];
            $gamount[$j]=$row['amount'];
            $gdate[$j]=$row['date'];
            $gexid[$j]=$row['exid'];
            $gtab[$j]=$row['tab'];
            $gnote[$j]=$row['note'];
             $gdtab=$gtab[$j];
             $gdexid=$gexid[$j];
            
            if($gdtab=="clientneed")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$gdexid' order by id desc"));
        $gcid[$j]=$value['cid'];
        $gstartdate[$j]=$value['startdate'];
        $gperiod[$j]=$value['period'];
                $gdmoid=$gcid[$j];
                       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$gdmoid' order by id desc"));
        $gfirstname[$j]=$value['firstname'];
        $glastname[$j]=$value['lastname'];
        $gregid[$j]=$value['regid'];
        $gphoto[$j]=$value['photo'];
                $gwho[$j]="Client";
            }
            if($gdtab=="cpayment")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from cpayment where id='$gdexid' order by id desc"));
                $dmoid=$value['nid'];
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$dmoid' order by id desc"));
        $gcid[$j]=$value['cid'];
        $gstartdate[$j]=$value['startdate'];
        $gperiod[$j]=$value['period'];
                $gdmoid=$gcid[$j];
                       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$gdmoid' order by id desc"));
        $gfirstname[$j]=$value['firstname'];
        $glastname[$j]=$value['lastname'];
        $gregid[$j]=$value['regid'];
        $gphoto[$j]=$value['photo'];
                $gwho[$j]="Client";
            }  
            if($gdtab=="empjobmoney")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from empjobmoney where id='$gdexid' order by id desc"));
                $dmoid=$value['jid']; 
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$dmoid' order by id desc"));
                $dmonid=$value['nid'];
                $dmoeid=$value['eid'];
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$dmonid' order by id desc"));
        $gstartdate[$j]=$value['startdate'];
        $gperiod[$j]=$value['period'];
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$dmoeid' order by id desc"));
        $gfirstname[$j]=$value['firstname'];
        $glastname[$j]=$value['lastname'];
        $gregid[$j]=$value['regid'];
        $gphoto[$j]=$value['photo'];
                $gwho[$j]="Employe";
            }
$j++;
        }
}
    $j=0;
    $result=mysqli_query($conn,"SELECT * FROM loss WHERE date between '$restart' AND '$reend' order by id desc");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $lid[$j]=$row['id'];
            $lamount[$j]=$row['amount'];
            $ldate[$j]=$row['date'];
            $lexid[$j]=$row['exid'];
            $ltab[$j]=$row['tab'];
            $lnote[$j]=$row['note'];
             $ldtab=$ltab[$j];
             $ldexid=$lexid[$j];
            
            if($ldtab=="epayment")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from epayment where id='$ldexid' order by id desc"));
        $ljid[$j]=$value['jid'];
        $leid[$j]=$value['eid'];
                $ldmojid=$ljid[$j];
                $ldmoeid=$leid[$j];
                       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$ldmojid' order by id desc"));
                 $lstartdate[$j]=$value['startdate'];
        $lperiod[$j]=$value['period'];
                
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$ldmoeid' order by id desc"));
        $lfirstname[$j]=$value['firstname'];
        $llastname[$j]=$value['lastname'];
        $lregid[$j]=$value['regid'];
        $lphoto[$j]=$value['photo'];
                $lwho[$j]="Employe";
            }   
            if($ldtab=="clientjobmoney")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientjobmoney where id='$ldexid' order by id desc"));
        $ljid[$j]=$value['jid'];
                $ldmojid=$ljid[$j];
                       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$ldmojid' order by id desc"));
                        $lcid[$j]=$value['cid'];
                $ldmocid=$lcid[$j];
                 $lstartdate[$j]=$value['startdate'];
        $lperiod[$j]=$value['period'];
                
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$ldmocid' order by id desc"));
        $lfirstname[$j]=$value['firstname'];
        $llastname[$j]=$value['lastname'];
        $lregid[$j]=$value['regid'];
        $lphoto[$j]=$value['photo'];
                $lwho[$j]="Client";
            }    
            if($ldtab=="jobcard")
            {
                
                       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$ldexid' order by id desc"));
                        $leid[$j]=$value['eid'];
                $ldmoeid=$leid[$j];
                 $lstartdate[$j]=$value['startdate'];
        $lperiod[$j]=$value['period'];
                
       $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$ldmoeid' order by id desc"));
        $lfirstname[$j]=$value['firstname'];
        $llastname[$j]=$value['lastname'];
        $lregid[$j]=$value['regid'];
        $lphoto[$j]=$value['photo'];
                $lwho[$j]="Employe";
            } 
            if($ldtab=="staffsalary")
            {
                $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from staffsalary where id='$ldexid' order by id desc"));
        $lfirstname[$j]=$value['name'];
        $llastname[$j]="";
        $lregid[$j]="";
        $lphoto[$j]="";
                 $lstartdate[$j]="";
        $lperiod[$j]="";
                
                $lwho[$j]="Staff";
            }      
            if($ldtab=="expence")
            {
                
        $lfirstname[$j]="";
        $llastname[$j]="";
        $lregid[$j]="";
        $lphoto[$j]="";
                $lwho[$j]="";
            }   
           
           $j++;
        }
}
  
 $j=0;
    $result=mysqli_query($conn,"select * from empmoney WHERE date between '$restart' AND '$reend' order by id desc");
    $num3=mysqli_num_rows($result);
if($num3>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id1[$j]=$row['id'];
            $eid1[$j]=$row['eid'];
            $day1[$j]=$row['date'];
            $eid2=$eid1[$j];
            $amount1[$j]=$row['amount'];
            $note1[$j]=$row['note'];
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$eid2'"));
                       $firstname1[$j]=$val['firstname'];
                       $lastname1[$j]=$val['lastname'];
                       $photo1[$j]=$val['photo'];
                       $regid1[$j]=$val['regid'];

          $j++;
        }
    } 
    
     $j=0;
    $result=mysqli_query($conn,"select * from expence order by id desc");
    $num4=mysqli_num_rows($result);
if($num4>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id4[$j]=$row['id'];
            $date4[$j]=$row['date'];
            $amount4[$j]=$row['amount'];
            $note4[$j]=$row['note'];
           
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
    <meta name="robots" content="noindex, nofollow">
    <title>RE-QUEUE</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">


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
        <?php include_once("adminsidebar.php");?>

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                   
                   <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#gaintab" data-toggle="tab" class="nav-link active">Gain: <img src="assets/img/icon/rupee.png" width="15px"><?php echo $gainamt;?> </a></li>
                        <li class="nav-item"><a href="#losstab" data-toggle="tab" class="nav-link">Loss: <img src="assets/img/icon/rupee.png" width="15px"><?php echo $lossamt;?> </a></li>
                        <li class="nav-item"><a href="#expencetab" data-toggle="tab" class="nav-link">Expence: <img src="assets/img/icon/rupee.png" width="15px"><?php echo $expenamt;?> </a></li>
                        <li class="nav-item"><a href="#emptab" data-toggle="tab" class="nav-link">Employe Rented Money: <img src="assets/img/icon/rupee.png" width="15px"><?php echo $empexamt;?> </a></li>

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
                                    <h4 class="page-title">Details of all money gained during <?php echo $restart;?> and <?php echo $reend;?></h4>

                                </div>
                            </div>
                        </div>
<?php ?>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table  dtc display responsive">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Regid</th>
                                                <th>C/E</th>
                                                <th>Start Date</th>
                                                <th>Period</th>
                                                <th>Amount</th>
                                                <th>Note</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $j=0;
                                        $localnum=$num;
                                        while($localnum>0)
                                        {
                                           
                                            $in=$j+1;
                                            echo('
                                            <tr>
											<td>'.$gdate[$j].'</td>
											<td><h2 class="table-avatar">
													<a href="" class="avatar"><img src="image/'.$gphoto[$j].'" alt=""></a>
													<a href="">'.$gfirstname[$j].' '.$glastname[$j].'</a>
												</h2></td>
                                                <td>'.$gregid[$j].'</td>

											<td>'.$gwho[$j].'</td>
											<td>'.$gstartdate[$j].'</td>
											<td>'.$gperiod[$j].'</td>
											<td>'.$gamount[$j].' </td>
											<td>'.$gnote[$j].' </td>
										</tr>
										
                                            ');
                                            
                                            $j++;
                                            $localnum--;
                                        
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <br><br><br>
                        
                        
                        
                        
                    </div>
                    
                    
                    
                    
                    
                     <div class="tab-pane fade" id="losstab">
                      <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="page-title">Details of all money given in between <?php echo $restart;?> and <?php echo $reend;?></h4>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table  dtc display responsive">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Regid</th>
                                                <th>C/E</th>
                                                <th>Start Date</th>
                                                <th>Period</th>
                                                <th>Amount</th>
                                                <th>Note</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $j=0;
                                        $localnum=$num2;
                                        while($localnum>0)
                                        {
                                           
                                            $in=$j+1;
                                            echo('
                                            <tr>
											<td>'.$ldate[$j].'</td>
											<td><h2 class="table-avatar">
													<a href="" class="avatar"><img src="image/'.$lphoto[$j].'" alt=""></a>
													<a href="">'.$lfirstname[$j].' '.$llastname[$j].'</a>
												</h2></td>
                                                <td>'.$lregid[$j].'</td>

											<td>'.$lwho[$j].'</td>
											<td>'.$lstartdate[$j].'</td>
											<td>'.$lperiod[$j].'</td>
											<td>'.$lamount[$j].' </td>
											<td>'.$lnote[$j].' </td>
										</tr>
										
                                            ');
                                            
                                            $j++;
                                            $localnum--;
                                        
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <br><br><br>
                    
                </div>   
                    
                                        
                     <div class="tab-pane fade" id="emptab">
                      <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Amount Rented To Employe</h3>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table  dtc display responsive">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Employe Name</th>
                                                <th>Regid</th>
                                                <th>Amount</th>
                                                <th>Note</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $j=0;
                                        $localnum=$num3;
                                        while($localnum>0)
                                        {
                                           
                                            $in=$j+1;
                                            echo('
                                            <tr>
											<td>'.$day1[$j].'</td>
											<td><h2 class="table-avatar">
													<a href="" class="avatar"><img src="image/'.$photo1[$j].'" alt=""></a>
													<a href="">'.$firstname1[$j].' '.$lastname1[$j].'</a>
												</h2></td>
                                                <td>'.$regid1[$j].'</td>

											<td>'.$amount1[$j].' </td>
											<td>'.$note1[$j].' </td>
										</tr>
										
                                            ');
                                            
                                            $j++;
                                            $localnum--;
                                        
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <br><br><br>
                        
                        
                        
                     
                </div>                   
                     <div class="tab-pane fade" id="expencetab">
                      <!-- Page Header -->
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="page-title">Total Expences</h3>

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
                                        while($num4>0)
                                        {$in=$j+1;
                                            echo('
                                            <tr>
										
											<td>'.$in.'</td>
                                          <td>'.$date4[$j].'</td>
											<td>'.$amount4[$j].'</td>
											<td>'.$note4[$j].'</td>
										</tr>
										
                                            ');
                                            $j++;
                                            $num4--;
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                
                
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
<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
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