<?php
include('loginsession.php');

    include_once("db.php");
if(isset($_POST['eid']))
{
        date_default_timezone_set('Asia/Kolkata'); 

        $eid=$_POST['eid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
   $language=$_POST['lang'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $cast=$_POST['cast'];
    $blood=$_POST['blood'];
    $phno1=$_POST['phno1'];
    $phno2=$_POST['phno2'];
    $phno3=$_POST['phno3'];
    $marrage=$_POST['marrage'];
    $famname=$_POST['famname'];
    $loc=$_POST['loc'];
    $pin=$_POST['pincode'];
    $acname=$_POST['acname'];
    $acno=$_POST['acno'];
    $ifsc=$_POST['ifsc'];
    $jobtype=$_POST['jobtype'];
    $ref1n=$_POST['ref1n'];
    $ref1no=$_POST['ref1no'];
    $ref2n=$_POST['ref2n'];
    $ref2no=$_POST['ref2no'];
    $police=$_POST['police'];
    $jobtime=$_POST['jobtime'];
    $noofslots=$_POST['jtslot'];
    $slot1s=$_POST['firsttimes'];
    $slot1e=$_POST['firsttimee'];
    $slot2s=$_POST['secondtimes'];
    $slot2e=$_POST['secondtimee'];
    $slot3s=$_POST['thirdtimes'];
    $slot3e=$_POST['thirdtimee'];
    $quali=$_POST['quali'];
    $remark=$_POST['remark'];
    $religion=$_POST['religion'];
    $photo = $_FILES['photo']['name'];
    $adharf = $_FILES['adharf']['name'];
    $adharb = $_FILES['adharb']['name'];
     $licencef = $_FILES['licencef']['name'];
    $licenceb = $_FILES['licenceb']['name'];
     $voterf = $_FILES['voterf']['name'];
    $voterb = $_FILES['voterb']['name'];
    $passport = $_FILES['passport']['name'];
    $ration = $_FILES['ration']['name'];
    $tz  = new DateTimeZone("Asia/Kolkata");

//$age = DateTime::createFromFormat('d/m/Y',$dob , $tz)
//     ->diff(new DateTime('now', $tz))
//     ->y;
    $dayid=date("dmYhis");
    $lang="";
    $job="";
    $targetphoto="";
    $targetpass="";
    $targetration="";
    $targetadharf="";
    $targetadharb="";
    $targetvoterf="";
    $targetvoterb="";
    $targetlicencef="";
    $targetlicenceb="";
    
if($language=="")
{
      $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id=$eid "));

$lang=$val['language'];
}
else
{
        for ($k=0;$k<count($language);$k++)
  {
    if($k!=0)
    {
            $lang.=",";

    }
    $lang.=$language[$k];
  }
}
    if($jobtype=="")
{
      $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id=$eid "));

$job=$val['jobtype'];
}
else
{
     
    for ($k=0;$k<count($jobtype);$k++)
  {
    if($k!=0)
    {
            $job.=",";

    }
    $job.=$jobtype[$k];
  }
}
    //filling the blank values
    
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from employe where id=$eid "));

    if($religion=="select")
{

$religion=$val['religion'];
$cast=$val['cast'];
}  
if($blood=="select")
{

$blood=$val['blood'];
}
    if($quali=="select")
{

$quali=$val['qualification'];
} 
    if($jobtime=="select")
{

$jobtime=$val['jobtime'];
}
    if($noofslots=="select")
{

$noofslots=$val['nooftslot'];
}

   
    if($photo=="")
    {
            $photo=$val['photo'];
    }
    else
    {
        $imgext1=explode('.',$photo);
        $imgactulext1=strtolower(end($imgext1));
         $photo = "Ephoto".$dayid.".".$imgactulext1;
  	$targetphoto = "image/".$photo;
    }
    if($passport=="")
    {
        $passport=$val['passport'];;
    }
    else
    {
           
     $imgext2=explode('.',$passport);
        $imgactulext2=strtolower(end($imgext2));
         $passport = "Epass".$dayid.".".$imgactulext2;
  	$targetpass = "image/".$passport;
    }
    if($ration=="")
    {
        $ration=$val['ration'];;
    }
    else
    {
           
     $imgext=explode('.',$ration);
        $imgactulext=strtolower(end($imgext));
         $ration =  "Eration".$dayid.".".$imgactulext;
  	$targetration = "image/".$ration;
    }
    if($adharf=="")
    {
        $adharf=$val['adharf'];;
    }
    else
    {
           
     $imgext=explode('.',$adharf);
        $imgactulext=strtolower(end($imgext));
         $adharf =  "Eadharf".$dayid.".".$imgactulext;
  	$targetadharf = "image/".$adharf;
    }
    if($adharb=="")
    {
        $adharb=$val['adharb'];;
    }
    else
    {
           
     $imgext=explode('.',$adharb);
        $imgactulext=strtolower(end($imgext));
         $adharb =  "Eadharb".$dayid.".".$imgactulext;
  	$targetadharb = "image/".$adharb;
    }
    if($licencef=="")
    {
        $licencef=$val['licencef'];;
    }
    else
    {
           
     $imgext=explode('.',$licencef);
        $imgactulext=strtolower(end($imgext));
         $licencef =  "Elicencef".$dayid.".".$imgactulext;
  	$targetlicencef = "image/".$licencef;
    }
    if($licenceb=="")
    {
        $licenceb=$val['licenceb'];;
    }
    else
    {
           
     $imgext=explode('.',$licenceb);
        $imgactulext=strtolower(end($imgext));
         $licenceb =  "Elicenceb".$dayid.".".$imgactulext;
  	$targetlicenceb = "image/".$licenceb;
    }
    if($voterf=="")
    {
        $voterf=$val['voterf'];
    }
    else
    {
           
     $imgext=explode('.',$voterf);
        $imgactulext=strtolower(end($imgext));
         $voterf =  "Evoterf".$dayid.".".$imgactulext;
  	$targetvoterf = "image/".$voterf;
    }
    if($voterb=="")
    {
        $voterb=$val['voterb'];
    }
    else
    {
           
     $imgext=explode('.',$voterb);
        $imgactulext=strtolower(end($imgext));
         $voterb =  "Evoterb".$dayid.".".$imgactulext;
  	$targetvoterb = "image/".$voterb;
    }
   
        
$sql="UPDATE `employe` SET `firstname`='$fname',`lastname`='$lname',`qualification`='$quali',`remark`='$remark',`phno1`='$phno1',`email`='$email',`blood`='$blood',`religion`='$religion',`cast`='$cast',`gender`='$gender',`language`='$lang',`addressline1`='$address1',`addressline2`='$address2',`city`='$city',`state`='$state',`country`='$country',`pincode`='$pin',`jobtype`='$job',`jobtime`='$jobtime',`nooftslot`='$noofslots',`slot1s`='$slot1s',`slot1e`='$slot1e',`slot2s`='$slot2s',`slot2e`='$slot2e',`slot3s`='$slot3s',`slot3e`='$slot3e',`acname`='$acname',`acno`='$acno',`ifsc`='$ifsc',`ref1n`='$ref1n',`ref1no`='$ref1no',`ref2n`='$ref2n',`ref2no`='$ref2no',`police`='$police',`photo`='$photo',`passport`='$passport',`ration`='$ration',`adharf`='$adharf',`adharb`='$adharb',`voterf`='$voterf',`voterb`='$voterb',`licencef`='$licencef',`licenceb`='$licenceb',`dob`='$dob',`phno2`='$phno2',`phno3`='$phno3',`marrage`='$marrage',`loc`='$loc',`famname`='$famname' WHERE id='$eid'";
    date_default_timezone_set('Asia/Kolkata'); 
        $eday=date("d-m-Y");
        $etime=date("h:i:s");
        $editid=$eid;
        $edittab="employe";
   $logname=$_SESSION['logname'];
    $sql2="insert into edithis(date,time,staff,editid,edit) values('$eday','$etime','$logname','$editid','$edittab')";
  if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2)){
  	move_uploaded_file($_FILES['photo']['tmp_name'], $targetphoto);
  	move_uploaded_file($_FILES['passport']['tmp_name'], $targetpass);
  	move_uploaded_file($_FILES['ration']['tmp_name'], $targetration);
  	move_uploaded_file($_FILES['adharf']['tmp_name'], $targetadharf);
  	move_uploaded_file($_FILES['adharb']['tmp_name'], $targetadharb);
  	move_uploaded_file($_FILES['voterf']['tmp_name'], $targetvoterf);
  	move_uploaded_file($_FILES['voterb']['tmp_name'], $targetvoterb);
  	move_uploaded_file($_FILES['licencef']['tmp_name'], $targetlicencef);
  	move_uploaded_file($_FILES['licenceb']['tmp_name'], $targetlicenceb);
      
  		header("location:employe.php");
  	
 }

  	else{
            $msg="Cant Register.Something Went Wrong!.Please Try Again";
    }
        
  
   
   
}
if(isset($_POST['cid']))
{
           date_default_timezone_set('Asia/Kolkata'); 

    $cid=$_POST['cid'];
   $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
  
    $email=$_POST['email'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $landmark=$_POST['landmark'];
    $route=$_POST['route'];
    $phno1=$_POST['phno1'];
    $phno2=$_POST['phno2'];
    $phno3=$_POST['phno3'];
    $pin=$_POST['pincode'];
    $religion=$_POST['religion'];
    $photo = $_FILES['photo']['name'];
    $idcardf = $_FILES['idcardf']['name'];
    $idcardb = $_FILES['idcardb']['name'];
    $tz  = new DateTimeZone("Asia/Kolkata");

//$age = DateTime::createFromFormat('d/m/Y',$dob , $tz)
//     ->diff(new DateTime('now', $tz))
//     ->y;
    $dayid=date("dmYhis");
   
    //filling the blank values
    
$val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$cid "));

    if($religion=="select")
{

$religion=$val['religion'];
}  

   
    if($photo=="")
    {
            $photo=$val['photo'];
    }
    else
    {
          $imgext1=explode('.',$photo);
        $imgactulext1=strtolower(end($imgext1));
         $newimgname1 = "Cphoto".$dayid.".".$imgactulext1;
  	$target1 = "image/".$newimgname1;
    }
    if($idcardf=="")
    {
        $idcardf=$val['idprooff'];;
    }
    else
    {
      
     $imgext=explode('.',$idcardf);
        $imgactulext=strtolower(end($imgext));
         $newimgname = "Cidprooff".$dayid.".".$imgactulext;
  	$target = "image/".$newimgname;
   
    }
    if($idcardb=="")
    {
        $idcardb=$val['idproofb'];;
    }
    else
    {
  $imgext2=explode('.',$idcardb);
        $imgactulext2=strtolower(end($imgext2));
         $newimgname2 = "Cidproofb".$dayid.".".$imgactulext2;
  	$target2 = "image/".$newimgname2;
    }

    
    

    
   
        
$sql="UPDATE `client` SET `firstname`='$fname',`lastname`='$lname',`religion`='$religion',`email`='$email',`addressline1`='$address1',`addressline2`='$address2',`detailedaddress`='$route',`landmark`='$landmark',`city`='$city',`state`='$state',`country`='$country',`photo`='$newimgname1',`idprooff`='$newimgname',`idproofb`='$newimgname2',`phno1`='$phno1',`pincode`='$pin',`phno2`='$phno2',`phno3`='$phno3' WHERE id='$cid'";
    
    date_default_timezone_set('Asia/Kolkata'); 
        $eday=date("d-m-Y");
        $etime=date("h:i:s");
        $editid=$cid;
        $edittab="client";
   $logname=$_SESSION['logname'];
    $sql2="insert into edithis(date,time,staff,editid,edit) values('$eday','$etime','$logname','$editid','$edittab')";
        
  if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql2)){
  		move_uploaded_file($_FILES['photo']['tmp_name'], $target1);
  	move_uploaded_file($_FILES['idcardf']['tmp_name'], $target);
  	move_uploaded_file($_FILES['idcardb']['tmp_name'], $target2);
      
  		header("location:client.php");
  	
 }

  	else{
            $msg="Cant Register.Something Went Wrong!.Please Try Again";
    }
        
  
   
   
}



?>