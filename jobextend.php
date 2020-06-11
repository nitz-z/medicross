<?php
session_start();
include_once("db.php");
$today=date("d/m/Y");
$tod=date("Y-m-d");
if(isset($_POST['jid']))
{
    $jid=$_POST['jid'];
    $experiod=$_POST['experiod'];
    $exregfee=$_POST['exregfee'];
    $exregper=$_POST['exregper'];
    if($exregfee=="")
    {
        $exregfee=0;
    } 
    if($exregper=="")
    {
        $exregper=0;
    }
    $rexregper=$exregper;
    $rexregfee=$exregfee;
        $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from jobcard where id=$jid"));

    $eid=$val['eid']; 
    $nid=$val['nid']; 
    $cid=$val['cid']; 
    $salary=$val['salary']; 
    $period=$val['period']; 
    $startdate=$val['startdate'];
            $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$nid"));
$regfee=$val['regfee'];
$regperiod=$val['regperiod'];
$rcid=$val['cid'];
    $exregfee=$exregfee+$regfee;
    $exregper=$exregper+$regperiod;
//      echo "nid:".$nid."<br>";
//
//      echo "commition:".$comission."<br>";
//  echo "salary:".$salary."<br>";
//  echo "period:".$period."<br>";
//  echo "startdate:".$startdate."<br>";
    
    $period=$period+$experiod;
    $period1=$period-1;
   $dates=$startdate;
        $dates=str_replace("/","-",$dates);
   $v="+".$period1." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);

 

 $sql = "update clientneed set period='$period',regfee='$exregfee',regperiod='$exregper' where id='$nid'";
 $sql3 = "update jobcard set period='$period',enddate='$dates' where id='$jid'";
//$sql4="insert into gain (amount,date,exid,tab,note) values('$rexregfee','$tod','$nid','clientneed','Need Extending Fee')";
 $sql7 = "insert into regfee (amount,date,nid,cid,period) values('$rexregfee','$today','$nid','$rcid','$rexregper')";


if(mysqli_query($conn,$sql) and  mysqli_query($conn,$sql3) and  mysqli_query($conn,$sql7))
{
            header('location:jobcard.php');

}
    else{
        header('location:error-500.php');
    }
}
?>
