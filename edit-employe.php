<?php
include('loginsession.php');

include_once("db.php");
if(isset($_GET['eid']))
{
   $eid= $_GET['eid'];
 $sql = "SELECT * FROM employe where id='$eid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
$fname[$i]=$check['firstname'];
$lname[$i]=$check['lastname'];
$phno[$i]=$check['phno1'];
$phno2[$i]=$check['phno2'];
$phno3[$i]=$check['phno3'];
$marrage[$i]=$check['marrage'];
$loc[$i]=$check['loc'];
$famname[$i]=$check['famname'];
$photo[$i]=$check['photo'];
$religion[$i]=$check['religion'];
$cast[$i]=$check['cast'];
$qualification[$i]=$check['qualification'];
$remark[$i]=$check['remark'];
$gender[$i]=$check['gender'];
$language[$i]=$check['language'];
$blood[$i]=$check['blood'];
$jobtype[$i]=$check['jobtype'];
$jobtime[$i]=$check['jobtime'];
$nooftslot[$i]=$check['nooftslot'];
$slot1s[$i]=$check['slot1s'];
$slot1e[$i]=$check['slot1e'];
$slot2s[$i]=$check['slot2s'];
$slot2e[$i]=$check['slot2e'];
$slot3s[$i]=$check['slot3s'];
$slot3e[$i]=$check['slot3e'];
$acname[$i]=$check['acname'];
$acno[$i]=$check['acno'];
$ifsc[$i]=$check['ifsc'];
$ref1n[$i]=$check['ref1n'];
$ref1no[$i]=$check['ref1no'];
$ref2n[$i]=$check['ref2n'];
$ref2no[$i]=$check['ref2no'];
$police[$i]=$check['police'];
$passport[$i]=$check['passport'];
$ration[$i]=$check['ration'];
$adharf[$i]=$check['adharf'];
$adharb[$i]=$check['adharb'];
$voterf[$i]=$check['voterf'];
$voterb[$i]=$check['voterb'];
$licencef[$i]=$check['licencef'];
$licenceb[$i]=$check['licenceb'];
$status[$i]=$check['status'];
$dob[$i]=$check['dob'];
$regdate[$i]=$check['regdate'];
$email[$i]=$check['email'];
$city[$i]=$check['city'];
$state[$i]=$check['state'];
$country[$i]=$check['country'];
$pincode[$i]=$check['pincode'];
$addressline1[$i]=$check['addressline1'];
$addressline2[$i]=$check['addressline2'];
$regid[$i]=$check['regid'];
$id[$i]=$check['id'];
      $dates=$dob[$i];
    $dates=str_replace("/","-",$dates);
    $dob[$i]=$dates;
$i++;
 }
    if($status==0)
    {
        $status="<p style='color:red'>Unemployed</p>";
    }
    else{
                $status="<p style='color:green'>Employed</p>";

    }
    $job=explode(",",$jobtype[0]);
    $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("d-m-Y");
$age = date_diff(date_create($dob[0]), date_create($today));
}

    
    }
else
{
    header("location:error-500.php");
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
            $cast[$j]=$row['cast'];
           if($religion[$j]=="hindhu" or $religion[$j]=="Hindhu")
           {
               $hindhu[$h]=$cast[$j];
                         $h++;

           }
            else if($religion[$j]=="christian" or $religion[$j]=="Christian")
           {
               $christian[$c]=$cast[$j];
                          $c++;

           } 
            else if($religion[$j]=="muslim" or $religion[$j]=="Muslim")
           {
               $muslim[$m]=$cast[$j];
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
                            <h3 class="page-title">Employe Edit Form</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employe Edit</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0" style="text-decoration-line:none;">Edit Form</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Personal Information</h4><br><br>




                                <form action="edit.php" method="post" enctype="multipart/form-data">
                                  <input type="text" name="eid" value="<?php echo $eid; ?>" hidden>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="firstname" value="<?php echo $fname[0]; ?>">
                                                </div>
                                            </div>
                                          
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone number 1</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="phno1"  value="<?php echo $phno[0]; ?>">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone number 3</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="phno3" value="<?php echo $phno3[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gender</label>
                                                <?php
                                                if($gender[0]=="male")
                                                {
                                                    echo ('
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
                                                    ');
                                                }
                                                else{
                                                    echo('    <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="male" >
                                                        <label class="form-check-label" for="gender_male">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="female" checked>
                                                        <label class="form-check-label" for="gender_female">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>');
                                                }
                                                ?>
                                            
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">language</label>
                                                <div class="col-lg-9">
                                                    <select class="select " multiple name="lang[]" >

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
                                                    <select class="select" name="blood" >
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
                                                    <input type="text" class="form-control" name="famname" value="<?php echo $famname[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="lastname" value="<?php echo $lname[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone No 2</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="phno2" value="<?php echo $phno2[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email" value="<?php echo $email[0]; ?>">
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Marital status</label>
                                                 <?php
                                                if($gender[0]=="single")
                                                {
                                                    echo ('
                                                      <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage" value="single" checked>
                                                        <label class="form-check-label" >
                                                            Single
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage"  value="married">
                                                        <label class="form-check-label" >
                                                            Married
                                                        </label>
                                                    </div>
                                                </div>
                                                    ');
                                                }
                                                else{
                                                    echo('   
                                                      <div class="col-lg-9">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage" value="single" >
                                                        <label class="form-check-label" >
                                                            Single
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="marrage"  value="married" checked>
                                                        <label class="form-check-label" >
                                                            Married
                                                        </label>
                                                    </div>
                                                </div>
                                                    ');
                                                }
                                                ?>
                                            
                                              
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
                                                    <select class="select" name="cast">
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
                                                    <select class="select" name="cast">
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
                                                    <select class="select" name="cast">
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
                                                    <select class="select" name="cast">
                                                        <option value="">none</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Date Of Birth</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control datetimepicker" name="age" value="<?php echo $dob[0]; ?>">
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
                                                    <input type="text" class="form-control" name="address1" value="<?php echo $addressline1[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address Line 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="address2" value="<?php echo $addressline2[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Location</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="loc" value="<?php echo $loc[0]; ?>" >
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="state" value="<?php echo $state[0]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="city" value="<?php echo $city[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Country</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="country" value="<?php echo $country[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Postal Code</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="pincode" value="<?php echo $pincode[0]; ?>">
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
                                                        <option>select</option>
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
                                                    <input type="text" class="form-control" placeholder="" name="remark" value="<?php echo $remark[0]; ?>">
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
                                                    <select class="select " multiple name="jobtype[]" >

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
                                                        <option value="fulltime">select</option>
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
                                                        <option value="select">select</option>
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
                                                    <input type="text" class="form-control" placeholder="Same as in passbook" name="acname" value="<?php echo $acname[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Account Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="acno" value="<?php echo $acno[0]; ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">IFSC Number</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="ifsc" value="<?php echo $ifsc[0]; ?>"> 
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
                                                    <input type="text" class="form-control" name="ref1n" value="<?php echo $ref1n[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Second reference person name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="ref2n" value="<?php echo $ref2n[0]; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Police Station</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="police" value="<?php echo $police[0]; ?>">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">First reference person Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="ref1no" value="<?php echo $ref1no[0]; ?>" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Second reference person Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="ref2no" value="<?php echo $ref2no[0]; ?>">
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
            if (cat == "Select" ) {
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