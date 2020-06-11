<?php
include('loginsession.php');
include_once("db.php");
$today=date("d/m/Y");
$toid=date("Y-m-d");
if(isset($_SESSION['redirectit']))
{
          unset($_SESSION["redirectit"]);
    header("location:jobcard.php");

}
else{
    $_SESSION['redirectit']="yes";
}
if(isset($_POST['jid']) or isset($_POST['bonjid']))
{
    
    if(isset($_POST['bonjid']))
    {
        $bonjid=$_POST['bonjid'];
        $bonus=$_POST['bonus'];
        $sq="update table jobpaydetails set bonus='$bonus'";
        $sql9="insert into loss (amount,date,exid,tab) values('$bonus','$tod','$bonjid','jobcard','Bonus amount given to employe')";

        mysqli_query($conn,$sq);
        mysqli_query($conn,$sql9);
                header('location:jobcard.php');

    }
        
if(isset($_POST['jid']))
{
    $jid=$_POST['jid'];
    $enddate=$_POST['enddate'];
    $jcend=$enddate;
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id=$jid"));

    $eid=$val['eid']; 
    $nid=$val['nid']; 
    $salary=$val['salary']; 
    $comission=$val['comission']; 
    $period=$val['period']; 
    $startdate=$val['startdate'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$nid"));

    $stype=$val['stype'];
    
    
    
//      echo "nid:".$nid."<br>";
$totalsalary=0;
    $sum=0;
    $emphave=0;
//      echo "commition:".$comission."<br>";
//  echo "salary:".$salary."<br>";
//  echo "period:".$period."<br>";
//  echo "startdate:".$startdate."<br>";
    $startdate=str_replace("/","-",$startdate);
$start=$startdate;
//echo $start;
//    echo $enddate;
    $startdate=strtotime($startdate);
    $enddate=strtotime($enddate);
  $actualperiod= ceil(abs($enddate - $startdate) / 86400);
    $actualperiod++;
    $jcperiod=$actualperiod;
//        echo"ac period".$actualperiod;

          $val=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as 'noofrow' from empleave where jid='$jid'"));
            $noofleave=$val['noofrow'];
$actualperiod=$actualperiod-$noofleave;
            $actualsalary=$salary;
//echo "no of l".$noofleave;
    $daily=0;
    $daily1=0;
    $daily2=0;
    
    
    if($stype=="full")
    {
            $daily=$actualsalary/$period;
          $totalsalary=$daily*$actualperiod;
    }
    else{
            
    
    if($actualperiod<28)
    {
    $daily=$actualsalary/30;
            $totalsalary=$daily*$actualperiod;
            $totalsalary=$totalsalary-$comission;
                $totalsalary=round($totalsalary,2);
    }
    else if($actualperiod==28)
    {
    
    $daily=$actualsalary/28;
            $totalsalary=$daily*$actualperiod;
                $totalsalary=round($totalsalary,2);

    }
    else if($actualperiod>28)
    {
        $d1=$actualperiod/28;
       $d2=$actualperiod%28;
//echo "/ 28".$d1;
//echo "% 28".$d2;
 $daily1=$actualsalary/28;    
    $daily2=$actualsalary/30;
        $per1=28*(int)$d1;
            $totalsalary=($daily1*$per1)+($daily2*$d2);
        $totalsalary=round($totalsalary,2);

        $daily=$daily2;

    }

    }
    



//      echo "totalsalary:dailyxactu:".$totalsalary."<br>";

              $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from cpayment where jid='$jid'"));

    $sum=$val['amountsum'];  
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from epayment where jid='$jid'"));

    $emphave=$val['amountsum'];
//      echo "sum:".$sum."<br>";
//  echo "emphave:".$emphave."<br>";
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amtempgiveback) as 'amountsum' from jobpaynotify where jid in (select id from jobcard where eid='$eid') "));
$prevamt=$val['amountsum'];
    
    
    
      $chpay=0;
    $ehpay=0;
    $payclient=0;
    $payemp=0;
    if($sum=="")
    {
        $sum=0;
    }
    if($emphave=="")
    {
        $emphave=0;
    }
            $sum=round($sum,2);

    if($totalsalary>$sum)
    {
        $chpay=(float)$totalsalary-(float)$sum;
                $chpay=round($chpay,2);

    }else if($totalsalary<$sum)
    {
        $payclient=(float)$sum-(float)$totalsalary;
        $payclient=round($payclient,2);
    }
                            $totalsalary=$totalsalary-$comission;

    if($totalsalary>$emphave)
    {
        $payemp=(float)$totalsalary-(float)$emphave;
                $payemp=round($payemp,2);

    }else if($totalsalary<$emphave)
    {
        $ehpay=(float)$emphave-(float)$totalsalary;
        $ehpay=round($ehpay,2);
    }

    
 $sql = "update clientneed set status=2,regstatus=1 where id='$nid'";
 $sql2 = "update employe set status=0 where id='$eid'";
 $sql3 = "update jobcard set status=1, enddate='$jcend',period='$jcperiod' where id='$jid' ";
   $sql4 = "insert into jobpaydetails(jid,actempsal,salgivetoemp,totamtclientgive,extclientneedtogive,amtempgiveback,amtgivebacktoclient,extamttogivetoemp) 
     values('$jid','$totalsalary','$emphave','$sum','$chpay','$ehpay','$payclient','$payemp')"; 
    $sql5 = "insert into jobpaynotify(jid,actempsal,salgivetoemp,totamtclientgive,extclientneedtogive,amtempgiveback,amtgivebacktoclient,extamttogivetoemp) 
     values('$jid','$totalsalary','$emphave','$sum','$chpay','$ehpay','$payclient','$payemp')";
$sql6="update cpayment set status=4 where jid='$jid'";

if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2) and  mysqli_query($conn,$sql3) and  mysqli_query($conn,$sql4) and  mysqli_query($conn,$sql5) and  mysqli_query($conn,$sql6))
{
    
}
    else{
        header('location:error-500.php');
    }
}
}
 else{
        header('location:error-500.php');
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
		
		<!-- Datatable CSS -->
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
		<link rel="stylesheet" href="assets/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
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
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Salary details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Salarydetail</li>
								</ul>
							</div>
							
						</div>
					</div>
                                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                                                       <div class="card-body">

                            <div class="row">
                                <div class="col-md-6"><span>Actual Period : <?php echo $actualperiod; ?></span></div>
                                <div class="col-md-6"><span>Daily Amount : <?php echo round($daily,2)."  , ".round($daily1,2); ?></span></div>
                            </div>
                            </div></div></div></div>
					            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Add Bonus</h4>
                            </div>
                            <div class="card-body">

                                <form action="jobcardremove.php" method="post" enctype="multipart/form-data">
                                <input type="number"  name="bonjid" value="<?php echo $jid; ?>" hidden>

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-3 col-form-label">Additional days</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" id="bonday" name="addday" >
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-3 col-form-label">Bonus Amount</label>
                                                <div class="col-lg-9" id="bonushow">

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
						<div class="col-md-12">
							<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Actual Salary Of Employe</th>
											<th>Salery Given to Employe</th>
											<th>Total Amount Client Payed</th>
											<th>Additional amount client need to give</th>
											<th>Amount Employe have to give back </th>
											<th>Balance amount to give to employe </th>
											<th>Balance amount to give to Client </th>
											<th>Previous amount </th>
											<th>add </th>
											<th>confirm</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
                                      
                                            echo('
                                            
                                        <tr>
											
											<td>'.$totalsalary.'</td>
											<td>'.$emphave.'</td>
											<td>'.$sum.'</td>
											<td>'.$chpay.'</td>
											<td>'.$ehpay.'</td>
											<td>'.$payemp.'</td>
											<td>'.$payclient.'</td>
											<td>'.round($prevamt).'</td>
											<td><a class="preamt repreamt" id="'.$prevamt.'" value="'.$jid.'"><img src="assets/img/icon/plus.png" width="20px"></a></td>
											<td><a href="jobcard.php" class="btn btn-success">Finish</a></td>
											
											
										</tr>
										
                                           ');
                                          
                                        
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
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		<script>
            function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}

$(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
});
                  var bonamount= "<?php echo round($daily); ?>";              
                  var payemp= "<?php echo round($payemp); ?>";              
            

            $( ".preamt" ).click(function() {
                var payem=payemp;
                var preamt=$(this).attr("id");
                var prejid=$(this).attr("value");
                if(payem>0)
                    {
                        $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{preamt:preamt,prejid:prejid},  
                success:function(data){  
                     $('.repreamt').removeClass("preamt");
                    alert(data);
                    }
                    }); 
                    }
                        else{
                    alert ("For this job employe has no extra amount to pay back");
                }
            });
          
                        
            $( "#bonday" ).keyup(function() {
                var bonm=bonamount;
                  var days = $(this).val(); 
                if(days=="")
                    {
                        days=0;
                    }
                $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{days:days,bonamount:bonm},  
                success:function(data){  
                     $('#bonushow').html(data);  
                }  
           });  
                
});
        </script>
    </body>
</html>