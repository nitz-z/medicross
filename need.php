<?php
include('loginsession.php');
    include_once("db.php");
$flag=0;
if(isset($_POST['job']) or isset($_GET['cid']) )
{
    
if(isset($_POST['job']))
{
    $ncid=$_SESSION['needcid'];
    $job=$_POST['job'];
    $salary=$_POST['salary'];
    $rp=$_POST['rp'];
    $religion=$_POST['religion'];
    $regfee=$_POST['regfee'];
    $gender=$_POST['gender'];
    $noofslots=$_POST['noofslots'];
    $period=$_POST['period'];
    $stype=$_POST['stype'];
    $jobtime=$_POST['jobtime'];
    $regfee=$_POST['regfee'];
    $slot1s=$_POST['slot1s'];
    $slot1e=$_POST['slot1e'];
    $slot2s=$_POST['slot2s'];
    $slot2e=$_POST['slot2e'];
    $slot3s=$_POST['slot3s'];
    $slot3e=$_POST['slot3e'];
    $language=$_POST['language'];
    $qualification=$_POST['qualification'];
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

           } else if($religion=="select" or $religion=="select")
           {
               $cast="";
               $religion="";

           } 
   if($jobtime=="fulltime")
   {
    $slot1s="";
    $slot1e="";
    $slot2s="";
    $slot2e="";
    $slot3s="";
    $slot3e="";
   }
    for ($k=0;$k<count($language);$k++)
  {
    if($k!=0)
    {
            $langu.=",";

    }
    $langu.=$language[$k];
  }
    $today=date("d/m/Y");
    $tod=date("Y-m-d");

   

        
       $sql = "insert into clientneed(`cid`,`jobtype`,`jobtime`,`salary`,`qualification`,`language`,`noofslots`,`slot1s`,`slot1e`,`slot2s`,`slot2e`,`slot3s`,`slot3e`,`dateadded`,`period`,`regperiod`,`religion`,`cast`,`gender`,`regfee`,`stype`) 
     values('$ncid','$job','$jobtime','$salary','$qualification','$langu','$noofslots','$slot1s','$slot1e','$slot2s','$slot2e','$slot3s','$slot3e','$today','$period','$rp','$religion','$cast','$gender','$regfee','$stype')";
 
  if(mysqli_query($conn,$sql)) {
             $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed order by id desc"));
$nid=$val['id'];
//    $sql3="insert into gain (amount,date,exid,tab,note) values('$regfee','$tod','$nid','clientneed','Registration Fee')";
       $sql7 = "insert into regfee (amount,date,nid,cid,period) values('$regfee','$today','$nid','$ncid','$rp')";  
//      $sql7 = "INSERT INTO `regfee`(`date`, `amount`, `nid`, `cid`, `period`) VALUES ('$today','$regfee',$nid','$ncid','$rp')";
      

        if( mysqli_query($conn,$sql7)){

$_SESSION['error']="Successfully entered Need";
  		header("location:client.php");
        }
 }

  
    else
    {
                  $_SESSION['error']="Something went wrong Please try again";
  		header("location:jobcard.php");

    }
   
   
}
if(isset($_GET['cid']))
{
    $cid=$_GET['cid'];
$_SESSION['needcid']=$cid;
//    $feecheck=mysqli_fetch_assoc(mysqli_query($conn,"select * from regfeeclient where cid=$cid"));
//    
//    $enddate=$feecheck['longtermend'];
//    $startdate=$feecheck['longtermstart'];
//    $period=$feecheck['timeperiod'];
//    $dates=$feecheck['regdate'];
//    if($period!="longterm")
//    {
//        $v="+".$period." month";
//    $dates = strtotime(date("d/m/Y", strtotime($dates)) . $v);
//    $dates = date("d/m/Y",$dates);
//    }
//    else{
//        $dates=$enddate;
//    }
//
//    $day=date("d/m/Y");
//    if($day<=$dates)
//    {
//        
//    
//
//
//        
//        
//          }
//    else
//    {
//       $flag=1;
//        $msg="This clients registration period ended on ".$enddate." please pay registration fee to continue";
//    }
        
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
}
else{
   header(" location:error-500.php");
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
                            <h3 class="page-title">Request employe</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Need</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Enter the job Specifics </h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Job Details</h4>





                                <form action="need.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Job Type</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="job">

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
                                                <label class="col-lg-3 col-form-label">Salary</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="salary" required>

                                                </div>
                                            </div>
                                           
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gender</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="gender">
                                                        <option value="any">any</option>
                                                        <option value="male">male</option>
                                                        <option value="femail">female</option>
                                                    </select> </div>
                                            </div>   
                                          
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Registration Fees</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="regfee" required>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Registration Period</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="rp" required>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Job Time</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="jobtime" id="jt">
                                                        <option value="fulltime">Full Time</option>
                                                        <option value="parttime">part time</option>
                                                    </select> </div>
                                            </div>
                                            <div class="form-group row" id="timeslot">
                                                <label class="col-lg-3 col-form-label">Choose No Of Slots</label>
                                                <div class="col-lg-9"> <select class="select " name="noofslots" id="noslot">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select> </div>
                                            </div>



                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Language</label>
                                                <div class="col-lg-9">
                                                    <select class="any select" multiple name="language[]" required>

                                                        <?php
                                                        $s=0;
                                                        $num3=$num2;
                                                        while($num3>0)
                                                        {
                                                           echo('
                                                        
                                                       <option>'.$lang[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num3--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Salary Type</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="stype">
                                                        <option value="monthly">monthly</option>
                                                        <option value="full">full</option>
                                                    </select> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Qualification</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="qualification">
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
                                                    </select> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Period</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="period" required>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Religion</label>
                                                <div class="col-lg-9">
                                                    <select class="select reli" name="religion" required>
                                                        <option>any</option>
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

                                            <div class="form-group row" id="timeslot1">
                                                <label class="col-lg-3 col-form-label">Enter the first Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot1s"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot1e"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="timeslot2">
                                                <label class="col-lg-3 col-form-label">Enter the second Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot2s"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot2e"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row" id="timeslot3">
                                                <label class="col-lg-3 col-form-label">Enter the third Start time and End time</label>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot3s"></div>
                                                        <div class="col-lg-6"><input type="time" class="form-control" name="slot3e"></div>
                                                    </div>
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


            <!--
       
       	
			<div class="modal custom-modal fade" id="paymodel" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Client</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
-->
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
