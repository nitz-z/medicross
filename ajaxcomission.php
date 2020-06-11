<?php
if(isset($_GET['dcnid']))
{
        include_once("db.php");  
session_start();
    $dcnid=$_GET['dcnid'];
   if( mysqli_query($conn,"update clientneed set status=6 where id='$dcnid'"))
   {
       header("location:jobcard.php");
   }
}
if(isset($_POST['employee_id']))
{
    $eid=$_POST['employee_id'];
    echo 	'<input class="form-control" type="text" hidden value="'.$eid.'" name="eid">';
}
if(isset($_POST['job_id']))
{
    $jid=$_POST['job_id'];
    $enddate=$_POST['enddate'];
    echo 	'
    <label>End date:'.$enddate.'</label><br>

    <label>End date<span class="text-danger">*</span></label>
    <input class="form-control " type="date" name="enddate" required>
    <input class="form-control" type="text" hidden value="'.$jid.'" name="jid">
';
    
}
if(isset($_POST['extendjob_id']))
{
    $jid=$_POST['extendjob_id'];
    $enddate=$_POST['enddate'];
        include_once("db.php");  
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$jid'"));
$nid=$val['nid'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id='$nid'"));
$regperiod=$val['regperiod'];
$startdate=$val['startdate'];
     $dates=$startdate;
    $dates=str_replace("/","-",$dates);
    $periodsr=$regperiod-1;
   $v="+".$periodsr." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    $regenddate=$dates;
    echo 	'
    <label>End date:'.$enddate.'</label><br>
    <label>No of additional days needed<span class="text-danger">*</span></label>
    <input class="form-control" type="number" name="experiod"> 
    <label>Registration Enddate: '.$regenddate.'</label><br>
    <label>Registration Fee <span class="text-danger">*</span></label>
    <input class="form-control" type="number" name="exregfee"> 
    <label>Registration Period<span class="text-danger">*</span></label>
    <input class="form-control" type="number" name="exregper">
    <input class="form-control" type="text" hidden value="'.$jid.'" name="jid">
';
    
}
if(isset($_POST['reid']))
{
    $jid=$_POST['reid'];
        $enddate=$_POST['enddate'];

    echo 	'
    <label>Current Employe End date<span class="text-danger">*</span></label>
    <input class="form-control" type="date" name="enddate" value="'.$enddate.'" >
    <input class="form-control" type="text" hidden value="'.$jid.'" name="jid">
';
    
}
if(isset($_POST['dcid']))
{
    $did=$_POST['dcid'];

    echo 	'
   											<a href="client.php?dcid='.$did.'" class="btn btn-primary continue-btn">Delete</a>

';
    
}
if(isset($_POST['bonamount']))
{
    $days=$_POST['days'];
    $bonamount=$_POST['bonamount'];
    $am=$days*$bonamount;

    echo 	'
                                                   <input type="text" class="form-control" name="bonus" value="'.$am.'">

';
    
}
if(isset($_POST['eneid']))
{
    $eneid=$_POST['eneid'];

    echo 	'
                                                   <input type="text"  name="eneid" value="'.$eneid.'" hidden>
                                                       <label>New Followup date<span class="text-danger">*</span></label>
                                                  <input type="date" class="form-control" name="flo" required>


';
    
}
if(isset($_POST['nojid']))
{
    $nojid=$_POST['nojid'];
    $tab=$_POST['tab'];

    echo 	'
                                                   <input type="text"  name="nojid" value="'.$nojid.'" hidden>
                                                   <input type="text"  name="tab" value="'.$tab.'" hidden>
                                                       <label>Enter Amount<span class="text-danger">*</span></label>
                                                  <input type="number" class="form-control" name="amt" required>


';
    
}
if(isset($_POST['nojid2']))
{
    $nojid2=$_POST['nojid2'];
    $col=$_POST['col'];

    echo 	'
                                                   <input type="text"  name="nojid2" value="'.$nojid2.'" hidden>
                                                   <input type="text"  name="col" value="'.$col.'" hidden>
                                                  <label>Are You Sure?<span class="text-danger"></span></label>

';
    
}
if(isset($_POST['nojid3']))
{
    $nojid3=$_POST['nojid3'];
    $col=$_POST['col'];

    echo 	'
                                                   <input type="text"  name="canceljid" value="'.$nojid3.'" hidden>
                                                   <input type="text"  name="col" value="'.$col.'" hidden>
                                                  <label>Are You Sure?<span class="text-danger"></span></label>



';
    
}

if(isset($_POST['noregid']))
{
    $noregid=$_POST['noregid'];

    echo 	'
                                                   <input type="text"  name="noregid" value="'.$noregid.'" hidden>
                                                       <label>Enter Amount<span class="text-danger">*</span></label>
                                                  <input type="number" class="form-control" name="amt" required>


';
    
}
if(isset($_POST['noregfullid']))
{
    $noregfullid=$_POST['noregfullid'];

    echo 	'
                                                   <input type="text"  name="noregfullid" value="'.$noregfullid.'" hidden>
                                                       <label>Are You Sure?<span class="text-danger"></span></label>


';
    
}
if(isset($_POST['cancelregid']))
{
    $cancelregid=$_POST['cancelregid'];

    echo 	'
                                                   <input type="text"  name="cancelregid" value="'.$cancelregid.'" hidden>
                                                       <label>Are You Sure?<span class="text-danger"></span></label>


';
    
}
if(isset($_POST['paycid']))
{
    $paycid=$_POST['paycid'];

    echo 	'
                                                   <input type="text"  name="paycid" value="'.$paycid.'" hidden>
                                                       <label>Are You Sure?<span class="text-danger"></span></label>


';
    
}
if(isset($_POST['cancelcid']))
{
    $cancelcid=$_POST['cancelcid'];

    echo 	'
                                                   <input type="text"  name="cancelcid" value="'.$cancelcid.'" hidden>
                                                       <label>Are You Sure?<span class="text-danger"></span></label>


';
    
}
if(isset($_POST['prejid']))
{
    $prejid=$_POST['prejid'];
    $preamt=$_POST['preamt'];
    $today=date("d/m/Y");
if($preamt=="")
{
    $preamt=0;
}
    include_once("db.php");  
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id='$prejid'"));
$eid=$val['eid'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobpaynotify where jid='$prejid' "));
$salpay=$val['extamttogivetoemp'];
    if($salpay>$preamt)
    {
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from empmoney where eid='$eid'"));
$emoney=$val['amountsum'];
    $actpre=$preamt+$emoney;
        if($salpay>$actpre)
        {
            $bal=$salpay-$actpre;
            mysqli_query($conn,"update jobpaynotify set amtempgiveback=0 where jid in (select id from jobcard where eid='.$eid.') ");
            mysqli_query($conn,"delete from empmoney where eid='$eid'");
            mysqli_query($conn,"update jobpaynotify set extamttogivetoemp='$bal' where jid='$prejid'");

        }
        else
        {
            $bal=$actpre-$salpay;
            mysqli_query($conn,"update jobpaynotify set amtempgiveback=0 where jid in (select id from jobcard where eid='.$eid.') ");
            mysqli_query($conn,"delete from empmoney where eid='$eid'");
            mysqli_query($conn,"update jobpaynotify set extamttogivetoemp=0 where jid='$prejid'");
            mysqli_query($conn,"INSERT INTO `empmoney`(`date`,`amount`,`eid`) VALUES ('$today','$bal','$eid')");

        }
    }
    else if($salpay==$actpre)
    {
        mysqli_query($conn,"update jobpaynotify set amtempgiveback=0 where jid in (select id from jobcard where eid='.$eid.') ");
            mysqli_query($conn,"update jobpaynotify set extamttogivetoemp=0 where jid='$prejid'");
    }
    else if($salpay<$preamt)
    {
    $actpre=$preamt;
    
      
            $bal=$salpay-$actpre;
            mysqli_query($conn,"update jobpaynotify set amtempgiveback=0 where jid in (select id from jobcard where eid='.$eid.') ");
            mysqli_query($conn,"update jobpaynotify set extamttogivetoemp='$bal' where jid='$prejid'");

        
    }
    echo "Amount has been deducted successfully";
}


?>
                                
