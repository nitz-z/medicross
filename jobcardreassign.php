<?php
session_start();
include_once("db.php");
$today=date("d/m/Y");
$tod=date("Y-m-d");
if(isset($_POST['nid']))
{
    $nid=$_POST['nid'];
    $eid=$_POST['eid'];
    $nstartdate=$_POST['nstartdate'];
    $nperiod=$_POST['nperiod'];
    $nregfee=$_POST['nregfee'];
    $nregper=$_POST['nregper'];
    $comission=$_POST['comission'];

    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$nid"));
$cid=$val['cid']; 
$salary=$val['salary']; 
$advance=$val['advance']; 
 $dates=$nstartdate;
        $dates=str_replace("/","-",$dates);
    $period=$nperiod-1;
   $v="+".$period." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
        $mon1=$nstartdate[3].$nstartdate[4];
    $mon2=$dates[3].$dates[4];
    if($mon1==$mon2)
    {
         $dates=$nstartdate;
        $dates=str_replace("/","-",$dates);
         $period1=$period-1;
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    }
    else{
         $dates=$nstartdate;
        $dates=str_replace("/","-",$dates);
                $period1=$period-1;
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    }
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard order by id desc limit 1"));
        $jiddmo=$val['id'];
    $jiddmo++;
//    echo "<br>".$dates;
     $sql = "update clientneed set status=1,startdate='$nstartdate',period='$nperiod',regfee='$nregfee',regperiod='$nregper',regstatus=0 where id='$nid'";
 $sql2 = "update employe set status=1 where id='$eid'";
 $sql4 = "insert into comission (amount,date,eid,nid,cid) values('$comission','$today','$eid','$nid','$cid')";
 $sql7 = "insert into regfee (amount,date,nid,cid,period) values('$nregfee','$today','$nid','$cid','$nregper')";
    $sql5="insert into jobcard (cid,eid,nid,comission,startdate,enddate,period,salary,advance) values('$cid','$eid','$nid','$comission','$nstartdate','$dates','$nperiod','$salary','$advance') ";
//        $sql3="insert into gain (amount,date,exid,tab,note) values('$nregfee','$tod','$nid','clientneed','Clent Reassign Registration fee')";

   $sql6="update cpayment set jid='$jiddmo',status=2 where cid='$cid' and nid='$nid' and status=1";

    if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2) and mysqli_query($conn,$sql4) and mysqli_query($conn,$sql5)  and mysqli_query($conn,$sql7) and mysqli_query($conn,$sql6))
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
