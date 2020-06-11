<?php
include('loginsession.php');

    include_once("db.php");
if(isset($_POST['firstname']))
{
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    
    
    $blood=$_POST['blood'];
    $phno1=$_POST['phno1'];
    $phno2=$_POST['phno2'];
    $phno3=$_POST['phno3'];
    $marrage=$_POST['marrage'];
    $famname=$_POST['famname'];
    $loc=$_POST['loc'];
    $pin=$_POST['pincode'];
    $language=$_POST['lang'];
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
 if($religion=="hindhu" or $religion=="Hindhu")
           {
               $cast=$_POST['casth'];

           }
            else if($religion=="christian" or $religion=="Christian")
           {
               $cast=$_POST['castc'];

           } 
            else if($religion=="muslim" or $religion=="Muslim")
           {
               $cast=$_POST['castm'];

           } else if($religion=="select" or $religion=="Select")
           {
               $cast="";
               $religion="";

           } 
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
    if($blood=="Select")
    {
        $blood="";
    }
for ($k=0;$k<count($language);$k++)
  {
    if($k!=0)
    {
            $lang.=",";

    }
    $lang.=$language[$k];
  }
    for ($k=0;$k<count($jobtype);$k++)
  {
    if($k!=0)
    {
            $job.=",";

    }
    $job.=$jobtype[$k];
  }   
    if($photo=="")
    {
        $photo="demoimage.jpg";
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
        $passport="demoimage.jpg";
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
        $ration="demoimage.jpg";
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
        $adharf="demoimage.jpg";
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
        $adharb="demoimage.jpg";
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
        $licencef="demoimage.jpg";
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
        $licenceb="demoimage.jpg";
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
        $voterf="demoimage.jpg";
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
        $voterb="demoimage.jpg";
    }
    else
    {
           
     $imgext=explode('.',$voterb);
        $imgactulext=strtolower(end($imgext));
         $voterb =  "Evoterb".$dayid.".".$imgactulext;
  	$targetvoterb = "image/".$voterb;
    }
   
    
    
   $checking=mysqli_query($conn,"select * from employe where phno='$no'");
    $count=mysqli_num_rows($checking);
    $currentid=mysqli_fetch_assoc(mysqli_query($conn,"select eid from regids where id=1"));
$currentid=$currentid['eid'];
    $currentid++;
    $year=date("Y");
    $today=date("d/m/Y");
     $ye[0]=$year[2];
    $ye[1]=$year[3];
    $ys=$ye;
    $regid="M".implode($ys)."E".$currentid;
    
    if($count<=0)
    {
    echo $regid;
        
       $sql = "INSERT INTO `employe`( `regid`, `firstname`, `lastname`, `qualification`, `remark`, `phno1`,`phno2`,`phno3`,`marrage`,`famname`,`loc`, `email`, `blood`, `religion`, `cast`, `gender`, `language`, `addressline1`, `addressline2`, `city`, `state`, `country`, `pincode`, `jobtype`, `jobtime`, `nooftslot`, `slot1s`, `slot1e`, `slot2s`, `slot2e`, `slot3s`, `slot3e`, `acname`, `acno`, `ifsc`, `ref1n`, `ref1no`, `ref2n`, `ref2no`, `police`, `photo`, `passport`, `ration`, `adharf`, `adharb`, `voterf`, `voterb`, `licencef`, `licenceb`, `regdate`, `dob`) VALUES('$regid','$fname','$lname','$quali','$remark','$phno1','$phno2','$phno3','$marrage','$famname','$loc','$email','$blood','$religion','$cast','$gender','$lang','$address1','$address2','$city','$state','$country','$pin','$job','$jobtime','$noofslots','$slot1s','$slot1e','$slot2s','$slot2e','$slot3s','$slot3e','$acname','$acno','$ifsc','$ref1n','$ref1no','$ref2n','$ref2no','$police','$photo','$passport','$ration','$adharf','$adharb','$voterf','$voterb','$licencef','$licenceb','$today','$dob')";
        $sql2="update regids set eid=$currentid where id=1";
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
    else
    {
                    $msg="The Employe with same phone number is already registered!";

    }
   
   
}


//selecting Job type 
 $j=0;
    $result=mysqli_query($conn,"select * from jobtype");
    $num=mysqli_num_rows($result);
if($num>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id[$j]=$row['id'];
            $job[$j]=$row['job'];
           
          $j++;
        }
    } 

//Selecting language
$j=0;
    $result=mysqli_query($conn,"select * from language");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $lid[$j]=$row['id'];
            $lang[$j]=$row['lang'];
           
          $j++;
        }
    }
//Selecting qualification
$j=0;
    $result=mysqli_query($conn,"select * from qualification");
    $num4=mysqli_num_rows($result);
if($num4>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $qid[$j]=$row['id'];
            $qualification[$j]=$row['qualification'];
           
          $j++;
        }
    }
//Selecting Religion
$j=0;
$h=0;
$c=0;
$m=0;
    $result=mysqli_query($conn,"select * from Religion");
    $num5=mysqli_num_rows($result);
if($num5>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $rid[$j]=$row['id'];
            $religion[$j]=$row['religion'];
            $cast2[$j]=$row['cast'];
           if($religion[$j]=="hindhu" or $religion[$j]=="Hindhu")
           {
               $hindhu[$h]=$cast2[$j];
                         $h++;

           }
            else if($religion[$j]=="christian" or $religion[$j]=="Christian")
           {
               $christian[$c]=$cast2[$j];
                          $c++;

           } 
            else if($religion[$j]=="muslim" or $religion[$j]=="Muslim")
           {
               $muslim[$m]=$cast2[$j];
                          $m++;

           }
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

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <link rel="stylesheet" href="assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .card-title {
            text-decoration-line: underline;
            text-decoration-color: #ff9b44;
        }
    </style>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Employe Registration Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employe register</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0" style="text-decoration-line:none;">Registration Form</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Personal Information</h4><br><br>




                                <form action="registeremploye.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="firstname" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone number 1</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone number 3</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno3">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gender</label>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" checked>
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female">
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">language</label>
                                                <div class="col-lg-9">
                                                    <select class="select " multiple name="lang[]">

                                                        <?php
                                                        $s=0;
                                                        $num3=$num2;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option value="'.$lang[$s].'">'.$lang[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Blood Group</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="blood">
                                                        <option>Select</option>
                                                        <option>A+</option>
                                                        <option>A-</option>
                                                        <option>O+</option>
                                                        <option>O-</option>
                                                        <option>B+</option>
                                                        <option>B-</option>
                                                        <option>AB+</option>
                                                        <option>AB-</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">father/ husband Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="famname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="lastname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 2</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno2">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Marital status</label>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage" value="single" checked>
                                                        <label class="form-check-label">
                                                            Single
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage" value="married">
                                                        <label class="form-check-label">
                                                            Married
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Religion</label>
                                                <div class="col-lg-9">
                                                    <select class="select reli" name="religion">
                                                        <option>Select</option>
                                                        <option value="hindhu">Hindhu</option>
                                                        <option value="christian">Christian</option>
                                                        <option value="muslim">Muslim</option>
                                                        <option value="intercast">Intercast</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Cast</label>
                                                <div class="col-lg-9" id="hhide">
                                                    <select class="select" name="casth">
                                                        <?php
                                                        $s=0;
                                                        $num3=$h;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option value="'.$hindhu[$s].'">'.$hindhu[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-9" id="chide">
                                                    <select class="select" name="castc">
                                                        <?php
                                                        $s=0;
                                                        $num3=$c;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option value="'.$christian[$s].'">'.$christian[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-9" id="mhide">
                                                    <select class="select" name="castm">
                                                        <?php
                                                        $s=0;
                                                        $num3=$m;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option value="'.$muslim[$s].'">'.$muslim[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-9" id="nohide">
                                                    <select class="select" name="castn">
                                                        <option value="">none</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Date Of Birth</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control datetimepicker" name="age">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="card-title">Address</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 1</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address1">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address2">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Location</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="loc">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="state">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="city">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="country" value="india">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="pincode">
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <br>
                                    <h4 class="card-title">Qualification</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Qualification</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="quali">
                                                        <option>any</option>
                                                        <?php
                                                        $s=0;
                                                        $num3=$num4;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option>'.$qualification[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Remark</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" name="remark">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                                    <h4 class="card-title">Job Details</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Job Type</label>
                                                <div class="col-lg-9">
                                                    <select class="select " multiple name="jobtype[]" required>

                                                        <?php
                                                        $s=0;
                                                        $num1=$num;
                                                        while($num1>0)
                                                        {
                                                           echo('
                                                        
                                                       <option value="'.$job[$s].'">'.$job[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num1--;
                                                        }
                                                        ?>
                                                    </select>


                                                </div>


                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Job Time</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="jobtime" id="jt" required>
                                                        <option value="fulltime">Full Time(24hr)</option>
                                                        <option value="parttime">part time</option>
                                                    </select> </div>
                                            </div>


                                            <div class="form-group row" id="timeslot2">
                                                <label class="col-lg-3 col-form-label">Enter the Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="secondtimes"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="secondtimee"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">

                                            <div class="form-group row" id="timeslot">
                                                <label class="col-lg-3 col-form-label">Choose No Of Slots</label>
                                                <div class="col-lg-9"> <select class="select " name="jtslot" id="noslot">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select> </div>
                                            </div>



                                            <div class="form-group row" id="timeslot1">
                                                <label class="col-lg-3 col-form-label">Enter the Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="firsttimes"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="firsttimee"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="timeslot3">
                                                <label class="col-lg-3 col-form-label">Enter the Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="thirdtimes"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="thirdtimee"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <br>
                                    <h4 class="card-title">Bank Details</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Account Holder name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" placeholder="Same as in passbook" name="acname">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Account Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="acno">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">IFSC Number</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="ifsc">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                                    <h4 class="card-title">Proofs</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First reference person name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="ref1n">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Second reference person name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="ref2n">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Police Station</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="police">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First reference person Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="ref1no">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Second reference person Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="ref2no">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <br>
                                    <h4 class="card-title">Proofs Images</h4><br><br>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">photo</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Adhar Card front</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="adharf">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Voter ID Front</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="voterf">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Licence Front</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="licencef">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Passport front</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="passport">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Ration Card</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="ration">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Adhar Card Back</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="adharb">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Voter ID Back</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="voterb">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Licence Back</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="licenceb">
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

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('#hhide').hide();
        $('#chide').hide();
        $('#mhide').hide();

        $('.reli').on('change', function() {
            var cat = $(this).val();
            if (cat == "hindhu") {
                $('#hhide').show();
                $('#chide').hide();
                $('#mhide').hide();
                $('#nohide').hide();

            }
            if (cat == "christian") {
                $('#chide').show();
                $('#hhide').hide();
                $('#mhide').hide();
                $('#nohide').hide();

            }
            if (cat == "muslim") {
                $('#mhide').show();
                $('#chide').hide();
                $('#hhide').hide();
                $('#nohide').hide();


            }
            if (cat == "Select") {
                $('#nohide').show();
                $('#chide').hide();
                $('#mhide').hide();
                $('#hhide').hide();

            }
            if (cat == "intercast") {
                $('#nohide').show();
                $('#chide').hide();
                $('#mhide').hide();
                $('#hhide').hide();

            }


        });





        $("#timeslot").hide();
        $("#timeslot1").hide();
        $("#timeslot2").hide();
        $("#timeslot3").hide();


        $("#jt").on('change', function() {
            var jtime = $("#jt").val();
            if (jtime == "parttime") {


                $("#timeslot").show();
                $("#timeslot1").show();

            } else if (jtime == "fulltime") {
                $("#timeslot").hide();
                $("#timeslot1").hide();
                $("#timeslot2").hide();
                $("#timeslot3").hide();
            }

        });

        $("#noslot").on('change', function() {

            var jtslot = $("#noslot").val();
            if (jtslot == "select") {
                $("#timeslot1").show();
                $("#timeslot2").hide();
                $("#timeslot3").hide();


            } else if (jtslot == "1") {
                $("#timeslot1").show();
                $("#timeslot2").hide();
                $("#timeslot3").hide();

            } else if (jtslot == "2") {
                $("#timeslot1").show();
                $("#timeslot2").show();
                $("#timeslot3").hide();

            } else if (jtslot == "3") {
                $("#timeslot1").show();
                $("#timeslot2").show();
                $("#timeslot3").show();

            }

        });
    </script>
</body>

</html>