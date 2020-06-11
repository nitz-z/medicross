<?php
include('loginsessionadmin.php');
    include_once("db.php");
$today=date("d/m/Y");
        $tod=date("Y-m-d");

 if(isset($_POST['cancelcid']))
{
     $cancelcid=$_POST['cancelcid'];

   if( mysqli_query($conn,"update cpayment set status=4 where nid='$cancelcid' and status=0"))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
     
 } 
if(isset($_POST['paycid']))
{
     $paycid=$_POST['paycid'];
          $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from cpayment where nid='$paycid' and status=0"));
    $amtpay=$val['amountsum'];
   if( mysqli_query($conn,"update cpayment set status=4 where nid='$paycid' and status=0") and mysqli_query($conn,"insert into loss(amount,date,exid,tab,note) values('$amtpay','$tod','$paycid','clientneed','Canceled need Return payment')"))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
     
 }
 if(isset($_POST['canceljid']))
{
     $canceljid=$_POST['canceljid'];
    $col=$_POST['col'];

   if( mysqli_query($conn,"update jobpaynotify set $col=0 where jid=$canceljid"))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
     
 }



 if(isset($_POST['cancelregid']))
{
     $cancelregid=$_POST['cancelregid'];

   if( mysqli_query($conn,"update regfee set amount=0 where id='$cancelregid'"))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
     
 }





if(isset($_POST['noregfullid']))
{
     $nrfid=$_POST['noregfullid'];
   $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from regfee where id='$nrfid'"));
        $orregamt=$val['amount'];
        $ornid=$val['nid'];
      $sql3="insert into gain(amount,date,exid,tab,note) values('$orregamt','$tod','$ornid','clientneed','Registration Fee')";

   if( mysqli_query($conn,"update regfee set amount=0 where id='$nrfid'")  and mysqli_query($conn,$sql3))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
     
 }




if(isset($_POST['noregid']))
{
    $noregid=$_POST['noregid'];
    $regamt=$_POST['amt'];
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from regfee where id='$noregid'"));
        $orregamt=$val['amount'];
        $ornid=$val['nid'];
     if($regamt<=$orregamt and $regamt>=0)
    {
    $actamt=$orregamt-$regamt;
                             $sql3="insert into gain(amount,date,exid,tab,note) values('$regamt','$tod','$ornid','clientneed','Registration Fee')";
          $sql9="update regfee set amount=$actamt where id='$noregid'";
        
if(mysqli_query($conn,$sql9) and mysqli_query($conn,$sql3) )
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }        

        }
    else
    {
        $msg="amount too big in";
    }
}
    






    if(isset($_POST['tab']))
{
    $nojid2=$_POST['nojid'];
    $tab=$_POST['tab'];
    $amt2=$_POST['amt'];
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid2'"));

        $amt3=$val[$tab];
    
    
    if($amt2<=$amt3 and $amt2>=0)
    {
    $actamt=$amt3-$amt2;
                
   
    if($tab=="amtempgiveback")
    {
       $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid2'"));
        $dmamt=$val['salgivetoemp'];
          $dmamt=(float)$dmamt-(float)$amt2;
        mysqli_query($conn,"update jobpaynotify set salgivetoemp='$dmamt' where jid='$nojid2'");

$sql12="insert into empjobmoney(amount,date,jid) values('$amt2','$today','$nojid2')";
 $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from empjobmoney order by id desc limit 1"));
        $dmoid=$value['dmioid'];
        $dmoid++;
        
       
                    $sql3="insert into gain(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','empjobmoney','Amount Employe Given Back')";
        

    }
    else if($tab=="amtgivebacktoclient")
    {
        
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid2'"));
        $dmamt=$val['totamtclientgive'];
          $dmamt=(float)$dmamt-(float)$amt2;
        mysqli_query($conn,"update jobpaynotify set totamtclientgive='$dmamt' where jid='$nojid2'");
        
                    $sql12="insert into clientjobmoney(amount,date,jid) values('$amt2','$today','$nojid2')";
        $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientjobmoney order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
                    $sql3="insert into loss(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','clientjobmoney','Return Payment To Client')";

    } 
    else if($tab=="extamttogivetoemp")
    {               
        
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid2'"));
        $dmamt=$val['salgivetoemp'];
          $dmamt=(float)$dmamt+(float)$amt2;
        mysqli_query($conn,"update jobpaynotify set salgivetoemp='$dmamt' where jid='$nojid2'");
        
        
             $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$nojid2'"));
        $dmoeid=$val['eid'];
        $dmonid=$val['nid'];
        
                  $sql12="insert into epayment (amount,day,eid,nid,jid) values('$amt2','$today','$dmoeid','$dmonid','$nojid2')";
         $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from epayment order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
                    $sql3="insert into loss(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','epayment','Extra Salary Given To Employee After Job')";


    }   else if($tab=="extclientneedtogive")
    {
        
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid2'"));
        $dmamt=$val['totamtclientgive'];
          $dmamt=(float)$dmamt+(float)$amt2;
        mysqli_query($conn,"update jobpaynotify set totamtclientgive='$dmamt' where jid='$nojid2'");
        
        
              $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$nojid2'"));
        $dmocid=$val['cid'];
        $dmonid=$val['nid'];
        
                  $sql12="insert into cpayment (amount,day,cid,nid) values('$amt2','$today','$dmocid','$dmonid')";
 $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from cpayment order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;

                    $sql3="insert into gain(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','cpayment','Additional Money Client Give Back')";

    }
      
        
        $sql9="update jobpaynotify set $tab=$actamt where jid=$nojid2";
        
if(mysqli_query($conn,$sql9) and mysqli_query($conn,$sql3) and mysqli_query($conn,$sql12))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }        
        
        
}
    else
    {
        $msg="amount too big";
    }
    
    
}






    if(isset($_POST['nojid2']))
{
    $nojid=$_POST['nojid2'];
    $col=$_POST['col'];
        
        
        
    if($col=="amtempgiveback")
    {
               $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $amt=$val['amtempgiveback'];
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $dmamt=$val['salgivetoemp'];
          $dmamt=$dmamt-$amt;
        mysqli_query($conn,"update jobpaynotify set salgivetoemp='$dmamt' where jid='$nojid'");
        
        
     
                            $sql12="insert into empjobmoney(amount,date,jid) values('$amt','$today','$nojid')";

 $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from empjobmoney order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
                    $sql3="insert into gain(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','empjobmoney','Amount Employe Given Back')";
    }
    else if($col=="amtgivebacktoclient")
    {
        
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $amt=$val['amtgivebacktoclient'];
        
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $dmamt=$val['totamtclientgive'];
          $dmamt=$dmamt-$amt;
        mysqli_query($conn,"update jobpaynotify set totamtclientgive='$dmamt' where jid='$nojid'");
        
        
                    $sql12="insert into clientjobmoney(amount,date,jid) values('$amt','$today','$nojid')";
$value=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientjobmoney order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
                    $sql3="insert into loss(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','Return Payment To Client')";
    } 
        else if($col=="extamttogivetoemp")
    {
        
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $amt=$val['extamttogivetoemp'];
            
            
             $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $dmamt=$val['totamtclientgive'];
          $dmamt=$dmamt+$amt;
        mysqli_query($conn,"update jobpaynotify set totamtclientgive='$dmamt' where jid='$nojid'");
            
            
            
              $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where jid='$nojid'"));
        $dmoeid=$val['eid'];
        $dmonid=$val['nid'];
        
                  $sql12="insert into epayment (amount,day,eid,nid,jid) values('$amt','$today','$dmoeid','$dmonid','$nojid')";
        

  $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from epayment order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
                    $sql3="insert into loss(amount,date,exid,tab,note) values('$amt2','$tod','$dmoid','epayment','Extra Salary Given To Employee After Job')";
    }   else if($col=="extclientneedtogive")
    {
        
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $amt=$val['extclientneedtogive'];
            
 $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$nojid'"));
        $dmamt=$val['totamtclientgive'];
          $dmamt=$dmamt+$amt;
        mysqli_query($conn,"update jobpaynotify set totamtclientgive='$dmamt' where jid='$nojid'");
        
             $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where jid='$nojid'"));
        $dmocid=$val['cid'];
        $dmonid=$val['nid'];
        
                  $sql12="insert into cpayment (amount,day,cid,nid) values('$amt','$today','$dmocid','$dmonid')";
 $value=mysqli_fetch_assoc(mysqli_query($conn,"select * from cpayment order by id desc limit 1"));
        $dmoid=$value['id'];
        $dmoid++;
 $sql3="insert into gain(amount,date,exid,tab,note) values('$amt','$tod','$dmoid','cpayment','Additional Money Client Give Back')";
    }
        
        
        
        
        
        
        

   if( mysqli_query($conn,"update jobpaynotify set $col=0 where jid=$nojid") and mysqli_query($conn,$sql3) and mysqli_query($conn,$sql12))
   {
               header("location:paynotification.php");

   }
    else
    {
        header("location:error-500.php");
    }
}

 $j=0;
    $result=mysqli_query($conn,"select * from jobpaynotify order by id desc");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id[$j]=$row['id'];
            $jid[$j]=$row['jid'];
            $actempsal[$j]=$row['actempsal'];
            $salgivetoemp[$j]=$row['salgivetoemp'];
            $totamtclientgive[$j]=$row['totamtclientgive'];
            $extclientneedtogive[$j]=$row['extclientneedtogive'];
            $amtempgiveback[$j]=$row['amtempgiveback'];
            $amtgivebacktoclient[$j]=$row['amtgivebacktoclient'];
            $extamttogivetoemp[$j]=$row['extamttogivetoemp'];
            $bonus[$j]=$row['bonus'];
            $jid222=$jid[$j];
           $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$jid222'"));

            $cid=$val['cid'];
            $nid=$val['nid'];
            $startdate[$j]=$val['startdate']; 
            $enddate[$j]=$val['enddate'];
            $period[$j]=$val['period'];
            $eid=$val['eid'];
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$cid'"));
            $firstname[$j]=$val['firstname']; 
            $lastname[$j]=$val['lastname']; 
            $regid[$j]=$val['regid']; 
            $cphoto[$j]=$val['photo']; 
            $clientid[$j]=$val['id']; 
             $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id='$eid'"));

            $efirstname[$j]=$val['firstname']; 
            $elastname[$j]=$val['lastname']; 
            $eregid[$j]=$val['regid']; 
            $ephoto[$j]=$val['photo']; 
            $employeid[$j]=$val['id'];    
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$nid'"));

            $jobtype[$j]=$val['jobtype']; 
            
          
          
            
          $j++;
        }
    } 

 $j=0;
    $result=mysqli_query($conn,"select * from regfee order by id desc");
    $num7=mysqli_num_rows($result);
if($num7>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id7[$j]=$row['id'];
            $nid7[$j]=$row['nid'];
            $cid7[$j]=$row['cid'];
            $date7[$j]=$row['date'];
            $period7[$j]=$row['period'];
            $amount7[$j]=$row['amount'];
            $nid222=$nid7[$j];
            $cid222=$cid7[$j];
       
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$cid222'"));
            $firstname7[$j]=$val['firstname']; 
            $lastname7[$j]=$val['lastname']; 
            $regid7[$j]=$val['regid']; 
            $cphoto7[$j]=$val['photo']; 
            $clientid7[$j]=$val['id']; 
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$nid222'"));
            $jobtype7[$j]=$val['jobtype']; 
            
          
          
            
          $j++;
        }
    } 
$j=0;
    $result=mysqli_query($conn,"select * from clientneed where status=6 order by id desc");
    $num10=mysqli_num_rows($result);
if($num10>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id10[$j]=$row['id'];
            $cid10[$j]=$row['cid'];
            $period10[$j]=$row['period'];
            $salary10[$j]=$row['salary'];
            $jobtype10[$j]=$row['jobtype'];
            $nid222=$id10[$j];
            $cid222=$cid10[$j];
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id='$cid222'"));
            $firstname10[$j]=$val['firstname']; 
            $lastname10[$j]=$val['lastname']; 
            $regid10[$j]=$val['regid']; 
            $cphoto10[$j]=$val['photo']; 
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from cpayment where nid='$nid222' and status=0"));
            $amt10=$val['amountsum'];
          
          
            
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
                            <h3 class="page-title">Additional amount CLIENT has to pay</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Employe</th>
                                        <th>Job</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        $localnum=$num;
                                        while($localnum>0)
                                        {
                                            if($extclientneedtogive[$j]!=0)
                                            {
                                            $in=$j+1;
                                            echo('
                                            <tr>
										
											<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$clientid[$j].'" class="avatar"><img src="image/'.$cphoto[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$clientid[$j].'">'.$firstname[$j].' '.$lastname[$j].'</a>
												</h2></td>
                                                <td>'.$regid[$j].'</td>

                                          <td><h2 class="table-avatar">
													<a href="profile-employe.php?cid='.$employeid[$j].'" class="avatar"><img src="image/'.$ephoto[$j].'" alt=""></a>
													<a href="profile-employe.php?cid='.$employeid[$j].'">'.$efirstname[$j].' '.$elastname[$j].'</a>
												</h2></td>
											
											<td>'.$jobtype[$j].'</td>
											<td>'.$startdate[$j].'</td>
											<td>'.$enddate[$j].'</td>
											<td>'.$period[$j].'</td>
											<td>'.$extclientneedtogive[$j].' </td>
											<td><a class="editing" id="'.$jid[$j].'" value="extclientneedtogive" ><img src="assets/img/icon/edit.png" width="20px"></a></td>
											<td><a class="nojidpay" id="'.$jid[$j].'" value="extclientneedtogive" ><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a class="canceljidpay" id="'.$jid[$j].'" value="extclientneedtogive"><img src="assets/img/icon/cross.png" width="20px"></a></td>
										</tr>
										
                                            ');
                                            }
                                            $j++;
                                            $localnum--;
                                        
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <br><br><br>
                 <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Amount Employe Has To Give Back</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Client Name</th>
                                        <th>Job</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                    $localnum=$num;
                                        while($localnum>0)
                                        {
                                             if($amtempgiveback[$j]!=0)
                                            {
                                            $in=$j+1;
                                            echo('
                                            <tr>
										
                                          <td><h2 class="table-avatar">
													<a href="profile-employe.php?cid='.$employeid[$j].'" class="avatar"><img src="image/'.$ephoto[$j].'" alt=""></a>
													<a href="profile-employe.php?cid='.$employeid[$j].'">'.$efirstname[$j].' '.$elastname[$j].'</a>
												</h2></td>
											<td>'.$eregid[$j].'</td>
											<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$clientid[$j].'" class="avatar"><img src="image/'.$cphoto[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$clientid[$j].'">'.$firstname[$j].' '.$lastname[$j].'</a>
												</h2></td>
											<td>'.$jobtype[$j].'</td>
											<td>'.$startdate[$j].'</td>
											<td>'.$enddate[$j].'</td>
											<td>'.$period[$j].'</td>
											<td>'.$amtempgiveback[$j].' </td>
											<td><a class="editing" id="'.$jid[$j].'" value="amtempgiveback" ><img src="assets/img/icon/edit.png" width="20px"></a></td>
                                            <td><a href="paynotification.php?nojid='.$jid[$j].'&col=amtempgiveback"><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a href="paynotification.php?canceljid='.$jid[$j].'&col=amtempgiveback"><img src="assets/img/icon/cross.png" width="20px"></a></td>										</tr>
										
                                            ');
                                             }
                                            $j++;
                                            $localnum--;
                                        
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                 <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Pending Salary</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Client Name</th>
                                        <th>Job</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        $localnum=$num;
                                        while($localnum>0)
                                        {
                                            if($extamttogivetoemp[$j]!=0)
                                            {
                                                 $in=$j+1;
                                            echo('
                                            <tr>
										
                                          <td><h2 class="table-avatar">
													<a href="profile-employe.php?cid='.$employeid[$j].'" class="avatar"><img src="image/'.$ephoto[$j].'" alt=""></a>
													<a href="profile-employe.php?cid='.$employeid[$j].'">'.$efirstname[$j].' '.$elastname[$j].'</a>
												</h2></td>
											<td>'.$eregid[$j].'</td>
											<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$clientid[$j].'" class="avatar"><img src="image/'.$cphoto[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$clientid[$j].'">'.$firstname[$j].' '.$lastname[$j].'</a>
												</h2></td>
											<td>'.$jobtype[$j].'</td>
											<td>'.$startdate[$j].'</td>
											<td>'.$enddate[$j].'</td>
											<td>'.$period[$j].'</td>
											<td>'.$extamttogivetoemp[$j].' </td>
											<td><a class="editing" id="'.$jid[$j].'" value="extamttogivetoemp" ><img src="assets/img/icon/edit.png" width="20px"></a></td>
                                            <td><a href="paynotification.php?nojid='.$jid[$j].'&col=extamttogivetoemp"><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a href="paynotification.php?canceljid='.$jid[$j].'&col=extamttogivetoemp"><img src="assets/img/icon/cross.png" width="20px"></a></td>										</tr>
										
                                            ');
                                            }
                                            $j++;
                                            $localnum--;
                                        
                                            }
                                           
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Return Payment</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Employe</th>
                                        <th>Job</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        $localnum=$num;
                                        while($localnum>0)
                                        {
                                            if($amtgivebacktoclient[$j]!=0)
                                            {
                                                 $in=$j+1;
                                            echo('
                                            <tr>
										
                                            	<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$clientid[$j].'" class="avatar"><img src="image/'.$cphoto[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$clientid[$j].'">'.$firstname[$j].' '.$lastname[$j].'</a>
												</h2></td>
                                          
											<td>'.$regid[$j].'</td>
										<td><h2 class="table-avatar">
													<a href="profile-employe.php?cid='.$employeid[$j].'" class="avatar"><img src="image/'.$ephoto[$j].'" alt=""></a>
													<a href="profile-employe.php?cid='.$employeid[$j].'">'.$efirstname[$j].' '.$elastname[$j].'</a>
												</h2></td>
											<td>'.$jobtype[$j].'</td>
											<td>'.$startdate[$j].'</td>
											<td>'.$enddate[$j].'</td>
											<td>'.$period[$j].'</td>
											<td>'.$amtgivebacktoclient[$j].' </td>
											<td><a class="editing" id="'.$jid[$j].'" value="amtgivebacktoclient" ><img src="assets/img/icon/edit.png" width="20px"></a></td>
                                            <td><a href="paynotification.php?nojid='.$jid[$j].'&col=amtgivebacktoclient"><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a href="paynotification.php?canceljid='.$jid[$j].'&col=amtgivebacktoclient"><img src="assets/img/icon/cross.png" width="20px"></a></td>										</tr>
										
                                            ');
                                            }
                                            $j++;
                                            $localnum--;
                                        
                                            }
                                           
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Registration Fee</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Job</th>
                                        <th>Period</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        $localnum=$num7;
                                        while($localnum>0)
                                        {
                                            if($amount7[$j]!=0)
                                            {
                                                 $in=$j+1;
                                            echo('
                                            <tr>
										
                                            	<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$clientid7[$j].'" class="avatar"><img src="image/'.$cphoto7[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$clientid7[$j].'">'.$firstname7[$j].' '.$lastname7[$j].'</a>
												</h2></td>
                                          
											<td>'.$regid7[$j].'</td>
											<td>'.$jobtype7[$j].'</td>
											<td>'.$period7[$j].'</td>
											<td>'.$amount7[$j].' </td>
											<td><a class="editingreg" id="'.$id7[$j].'" ><img src="assets/img/icon/edit.png" width="20px"></a></td>
                                            <td><a class="noregfullid" id="'.$id7[$j].'"><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a class="cancelregid" id="'.$id7[$j].'"><img src="assets/img/icon/cross.png" width="20px"></a></td>								</tr>
										
                                            ');
                                            }
                                            $j++;
                                            $localnum--;
                                        
                                            }
                                           
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
  <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Canceled Need Payments</h3>
                            
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
                                        <th>Name</th>
                                        <th>Regid</th>
                                        <th>Job</th>
                                        <th>Period</th>
                                        <th>Salary</th>
                                        <th>Payed Amount</th>
                                        <th>Payed</th>
                                        <th>Cancel</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        $localnum=$num10;
                                        while($localnum>0)
                                        {
                                            if($amt10!=0)
                                            {
                                                 $in=$j+1;
                                            echo('
                                            <tr>
										
                                            	<td><h2 class="table-avatar">
													<a href="profile-client.php?cid='.$cid10[$j].'" class="avatar"><img src="image/'.$cphoto10[$j].'" alt=""></a>
													<a href="profile-client.php?cid='.$cid10[$j].'">'.$firstname10[$j].' '.$lastname10[$j].'</a>
												</h2></td>
                                          
											<td>'.$regid10[$j].'</td>
											<td>'.$jobtype10[$j].'</td>
											<td>'.$period10[$j].'</td>
											<td>'.$salary10[$j].'</td>
											<td>'.$amt10.' </td>
                                            <td><a class="paycid" id="'.$id10[$j].'"><img src="assets/img/icon/accept.png" width="25px"></a></td>
											<td><a class="cancelcid" id="'.$id10[$j].'"><img src="assets/img/icon/cross.png" width="20px"></a></td>								</tr>
										
                                            ');
                                            }
                                            $j++;
                                            $localnum--;
                                        
                                            }
                                           
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->
<div id="editingmodel" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							
							<div class="modal-body" >
								  
                                <form action="paynotification.php" method="post" >
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
     $('.editing').click(function(){  
           var nojid = $(this).attr("id");  
           var tab = $(this).attr("value");  

           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{nojid:nojid,tab:tab},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      });    
    $('.nojidpay').click(function(){  
           var nojid = $(this).attr("id");  
           var col = $(this).attr("value");  

           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{nojid2:nojid,col:col},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      });     $('.canceljidpay').click(function(){  
           var nojid = $(this).attr("id");  
           var col = $(this).attr("value");  

           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{nojid3:nojid,col:col},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      }); 
 $('.editingreg').click(function(){  
           var noregid = $(this).attr("id");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{noregid:noregid},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      });
    $('.noregfullid').click(function(){  
           var noregfullid = $(this).attr("id");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{noregfullid:noregfullid},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      });   
    $('.cancelregid').click(function(){  
           var cancelregid = $(this).attr("id");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{cancelregid:cancelregid},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      });  
    $('.paycid').click(function(){  
           var paycid = $(this).attr("id");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{paycid:paycid},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      }); 
    $('.cancelcid').click(function(){  
           var cancelcid = $(this).attr("id");  
           $.ajax({  
                url:"ajaxcomission.php",  
                method:"post",  
                data:{cancelcid:cancelcid},  
                success:function(data){  
                     $('#editview').html(data);  
                     $('#editingmodel').modal("show");  
                }  
           });  
      }); 

    $('.dtc').DataTable({
			"bFilter": true,
   "autoWidth": false,
            "lengthChange": false,
            "pageLength":5
            
		});    
    </script>
</body>

</html>