<?php
session_start();
include_once("db.php");
$today=date("d/m/Y");
if(isset($_POST['nid']))
{
    $nid=$_POST['nid'];
    $eid=$_POST['eid'];
    $comission=$_POST['comission'];
    $startdate=$_POST['stdate'];
mysqli_query($conn,"update clientneed set startdate='$startdate' where id='$nid'");
 $sql = "update clientneed set status=1 where id='$nid'";
 $sql2 = "update employe set status=1 where id='$eid'";
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$nid"));
$cid=$val['cid']; 
$salary=$val['salary']; 
$advance=$val['advance']; 
$period=$val['period']; 
$startdate=$val['startdate']; 
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard order by id desc limit 1"));
        $jiddmo=$val['id'];
    $jiddmo++;
    $dates=$startdate;
    $dates=str_replace("/","-",$dates);
    $period1=$period;
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    $mon1=$startdate[3].$startdate[4];
    $mon2=$dates[3].$dates[4];
    if($mon1==$mon2)
    {
         $dates=$startdate;
    $dates=str_replace("/","-",$dates);
         $period1=$period-1;
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    }
    else{
          $dates=$startdate;
    $dates=str_replace("/","-",$dates);
                $period1=$period-1;
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    }
 $sql4 = "insert into comission (amount,date,eid,nid,cid) values('$comission','$today','$eid','$nid','$cid')";
    $sql5="insert into jobcard (cid,eid,nid,comission,startdate,enddate,period,salary) values('$cid','$eid','$nid','$comission','$startdate','$dates','$period','$salary') ";
$sql6="update cpayment set jid='$jiddmo',status=2 where cid='$cid' and nid='$nid' and status=0";
    if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2) and mysqli_query($conn,$sql4) and mysqli_query($conn,$sql5) and mysqli_query($conn,$sql6))
    {
              		header("location:jobcard.php");

    }
    else
    {
              		header("location:error-500.php");

    }

}
else
{
      		header("location:error-500.php");

}

?>
