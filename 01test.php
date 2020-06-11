<?php
include_once("db.php");
//$today=date("d/m/Y");
//$d1="2020-02-15";
//$d5="2020-01-01";
//$d2="21-03-2020";
//$d3="2020-03-25";
//$d4="2020/03/24";
//  $val=mysqli_fetch_assoc(mysqli_query($conn,"select sum(amount) as 'amountsum' from gain  WHERE date between '$d5' AND '$d1'"));
////  $val=mysqli_fetch_assoc(mysqli_query($conn,"SELECT  sum(amount) as 'amountsum' from gain  WHERE   date >= '$d5' AND date   <= '$d1'"));
//
//
//    $sum=$val['amountsum']; 
//echo $sum;
//
//    $flo="01/05/1876";
// $flo2="";
//   
//        
//        $flo2[2]=$flo[8];
//        $flo2[3]=$flo[9];
//        $flo2[4]="-";
//        $flo2[7]="-";
//            $flo2[1]=$flo[7];
//            $flo2[0]=$flo[6];
//            $flo2[6]=$flo[4];
//            $flo2[9]=$flo[1];
//            $flo2[8]=$flo[0];
//            $flo2[5]=$flo[3];
//echo $flo2;
//for ($i = 1; $i <= 6; $i++) 
//{
//   $months[] = date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"));
//   $monthe[] = date("Y-m-t", strtotime( date( 'Y-m-01' )." -$i months"));
//       $mont[] = date("M", strtotime( date( 'Y-m-01' )." -$i months"));
//
//}
//echo $months[0]."kkkkkkkkkkkkkkkkkkk".$monthe[0];
//var_dump($months);
//var_dump($monthe);
//var_dump($mont);
//
//$sql101 = "SELECT * FROM clientneed ";
//$i=0;
//$rt= mysqli_query($conn,$sql101);
//$num901=mysqli_num_rows($rt);
//if($num901>0)
//{
//while($check = mysqli_fetch_array($rt)){
//     	   $id901[$i]=$check['id'];
//     	   $cid901[$i]=$check['cid'];
//    $dmocid=$cid901[$i];
//     	   $startdate901[$i]=$check['startdate'];
//     	   $regperiod901[$i]=$check['regperiod'];
//     	   $rper901=$regperiod901[$i];
//     	   $regstatus901[$i]=$check['regstatus'];
//     	   $jobtype901[$i]=$check['jobtype'];
//       $dates=$startdate901[$i];
//    $dates=str_replace("/","-",$dates);
//    $period901=$rper901-1;
//   $v="+".$period901." days";
//    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
//    $dates = date("d/m/Y",$dates);
//    $enddate901[$i]=$dates;
//     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$dmocid"));
//    $firstname901[$i]=$val['firstname'];
//    $phno901[$i]=$val['phno1'];
//
// $i++;
// }
//}     
//var_dump($enddate901);
   $to1111=date("d-m-Y");
$enda701="18/03/2020";
        $enda701=str_replace("/","-",$enda701);

$start701=$to1111;
    $start701=strtotime($start701);
    $enda701=strtotime($enda701);
  $actualperiod701= ceil(abs($enda701 - $start701) / 86400);
    $actualperiod701++;
   $acperiod701[0]=$actualperiod701; 
    echo implode($acperiod701);
?>
  
   