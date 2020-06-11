<?php
include_once("db.php");

include('loginsession.php');
if(isset($_SESSION["error"]))
{
    $msg=$_SESSION["error"];
}
else
{
    $msg="";
}



  $tz  = new DateTimeZone("Asia/Kolkata");
    $today = date("Y-m-d");


    if(isset($_GET['nid']))
{
    $nid=$_GET['nid'];

 $sql = "SELECT * FROM clientneed where id='$nid'";
$i=0;
$rt= mysqli_query($conn,$sql);
$nums=mysqli_num_rows($rt);
if($nums>0)
{
while($check = mysqli_fetch_array($rt)){
     
    $id[$i]=$check['id'];
     	   $jobtype=$check['jobtype'];
     	   $jobtime=$check['jobtime'];
     	   $salary=$check['salary'];
     	   $gender=$check['gender'];
     	   $qualification=$check['qualification'];
     	   $language=$check['language'];
     	   $noofslots=$check['noofslots'];
     	   $slot1s=$check['slot1s'];
     	   $slot1e=$check['slot1e'];
     	   $slot2s=$check['slot2s'];
     	   $slot2e=$check['slot2e'];
     	   $slot3s=$check['slot3s'];
     	   $slot3e=$check['slot3e'];
     	   $status=$check['status'];
     	   $dateadded=$check['dateadded'];
     	   $startdate=$check['startdate'];
     	   $period=$check['period'];
     	   $advance=$check['advance'];
     	   $religion=$check['religion'];
     	   $cast=$check['cast'];
   
 $i++;
 }
}       if($gender!="any")
{
           if($qualification=="any" and $religion=="any"  )
    {
             $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and gender='$gender' and status=0";

    }else if($qualification!="any" and $religion!="any" )
    {
    
            if($cast=="select")
           {
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification' and religion='$religion' and gender='$gender' and status=0 ";
           }
           else{
                           $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification' and religion='$religion' and cast='$cast' and gender='$gender' and status=0";

           }

    } 
       else if($qualification!="any" and $religion=="any")
    {
             $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification' and gender='$gender' and status=0";

    } else if($qualification=="any" and $religion!="any")
    {
           if($cast=="select")
           {
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and religion='$religion' and gender='$gender' and status=0";

           }
           else{
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and religion='$religion' and cast='$cast' and gender='$gender' and status=0";

           }

    }
    
}else if($gender=="any")
{
           if($qualification=="any" and $religion=="any"  )
    {
             $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and status=0";

    }else if($qualification!="any" and $religion!="any")
    {
    
            if($cast=="select")
           {
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification' and religion='$religion'  and status=0 ";
           }
           else{
                           $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification' and religion='$religion' and cast='$cast'  and status=0";

           }

    } 
       else if($qualification!="any" and $religion=="any")
    {

             $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and qualification='$qualification'  and status=0";

    } else if($qualification=="any" and $religion!="any")
    {
           if($cast=="select")
           {
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and religion='$religion' and status=0";

           }
           else{
                            $sql = "select * from employe where jobtype like '%$jobtype%' and jobtime='$jobtime' and language like '%$language%' and religion='$religion' and cast='$cast' and status=0";

           }

    }
}
 
$i=0;
$rt= mysqli_query($conn,$sql);
$num2=mysqli_num_rows($rt);
if($num2>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id2[$i]=$check['id'];
     	   $regid2[$i]=$check['regid'];
     	   $jobtype2[$i]=$check['jobtype'];
     	   $jobtime2[$i]=$check['jobtime'];
     	   $firstname2[$i]=$check['firstname'];
     	   $lastname2[$i]=$check['lastname'];
     	   $phno2[$i]=$check['phno1'];
     	   $qualification2[$i]=$check['qualification'];
     	   $language2[$i]=$check['language'];
     	   $gender2[$i]=$check['gender'];
     	   $email2[$i]=$check['email'];
        $addressline12[$i]=$check['addressline1'];
    $addressline22[$i]=$check['addressline2'];
    $city2[$i]=$check['city'];
     	   $photo2[$i]=$check['photo'];
     	   $nooftslot2[$i]=$check['nooftslot'];
     	   $slot1s2[$i]=$check['slot1s'];
     	   $slot1e2[$i]=$check['slot1e'];
     	   $slot2s2[$i]=$check['slot2s'];
     	   $slot2e2[$i]=$check['slot2e'];
     	   $slot3s2[$i]=$check['slot3s'];
     	   $slot3e2[$i]=$check['slot3e'];
     	   $religion2[$i]=$check['religion'];
     	   $cast2[$i]=$check['cast'];
       $dob[$i]=$check['dob'];
     $dob[$i]=str_replace("/","-",$dob[$i]);

$val = date_diff(date_create($dob[$i]), date_create($today));
    $age2[$i]=$val->format('%y');
   
 $i++;
 }
   
}   
             $sql = "select * from employe where jobtype like '%$jobtype%'and jobtime='$jobtime'and status=0";
$i=0;
$rt= mysqli_query($conn,$sql);
$num3=mysqli_num_rows($rt);
if($num3>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id3[$i]=$check['id'];
     	   $regid3[$i]=$check['regid'];
     	   $jobtype3[$i]=$check['jobtype'];
     	   $jobtime3[$i]=$check['jobtime'];
     	   $firstname3[$i]=$check['firstname'];
     	   $lastname3[$i]=$check['lastname'];
     	   $phno3[$i]=$check['phno1'];
     	   $qualification3[$i]=$check['qualification'];
     	   $language3[$i]=$check['language'];
        $addressline13[$i]=$check['addressline1'];
    $addressline23[$i]=$check['addressline2'];
    $city3[$i]=$check['city'];
     	   $gender3[$i]=$check['gender'];
     	   $email3[$i]=$check['email'];
     	   $photo3[$i]=$check['photo'];
     	   $nooftslot3[$i]=$check['nooftslot'];
     	   $slot1s3[$i]=$check['slot1s'];
     	   $slot1e3[$i]=$check['slot1e'];
     	   $slot2s3[$i]=$check['slot2s'];
     	   $slot2e3[$i]=$check['slot2e'];
     	   $slot3s3[$i]=$check['slot3s'];
     	   $slot3e3[$i]=$check['slot3e'];
     	   $religion3[$i]=$check['religion'];
     	   $cast3[$i]=$check['cast'];
       $dob[$i]=$check['dob'];
      $dob[$i]=str_replace("/","-",$dob[$i]);

$val = date_diff(date_create($dob[$i]), date_create($today));
    $age3[$i]=$val->format('%y');
   
   
 $i++;
 }
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

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

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
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Jobcard Client</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Jobcard Client</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">

                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="profile-info-left">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Job type:</div>
                                                            <div class="text"><a href=""><?php echo $jobtype;?></a></div>
                                                        </li>
                                                        <br>
                                                        <li>
                                                            <div class="title">Job time:</div>
                                                            <div class="text"><a href=""><?php echo $jobtime;?></a></div>
                                                        </li><br>



                                                        <li>
                                                            <div class="title">Language:</div>
                                                            <div class="text"><?php echo $language;?></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Religion:</div>
                                                            <div class="text"><?php echo $religion;?></div>
                                                        </li>
                                                        <?php
                                                            if($jobtime!="fulltime")
                                                            {
                                                                if($noofslots==1)
                                                                {
                                                                echo ('
                                                                 <li>
														    	<div class="title"> Firstslot:</div>
															<div class="text">'.$slot1s."-".$slot1e.'</div>
														</li>
                                                                ');
                                                            }
                                                                else if($noofslots==3)
                                                                {
                                                                echo ('
                                                                 <li>
														    	<div class="title"> Firstslot:</div>
															<div class="text">'.$slot1s."-".$slot1s.'</div>
														</li>  
                                                        <li>
														    	<div class="title"> Third slot:</div>
															<div class="text">'.$slot3s."-".$slot3e.'</div>
														</li>
                                                                ');
                                                            } else if($noofslots==2)
                                                                {
                                                                echo ('
                                                                 <li>
														    	<div class="title"> Firstslot:</div>
															<div class="text">'.$slot1s."-".$slot1s.'</div>
														</li>  
                                                       
                                                                ');
                                                            }
                                                            }
                                                            ?>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Salary:</div>
                                                        <div class="text"><a href=""><?php echo $salary;?></a></div>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <div class="title">Qualification:</div>
                                                        <div class="text"><a href=""><?php echo $qualification;?></a></div>
                                                    </li><br>


                                                    <li>
                                                        <div class="title">Startdate:</div>
                                                        <div class="text"><?php echo $startdate;?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">cast:</div>
                                                        <div class="text"><?php echo $cast;?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">gender:</div>
                                                        <div class="text"><?php echo $gender;?></div>
                                                    </li>
                                                    <?php
                                                            if($jobtime!="fulltime")
                                                            {
                                                                if($noofslots==2)
                                                                {
                                                                echo ('
                                                                 <li>
														    	<div class="title"> Second slot:</div>
															<div class="text">'.$slot2s."-".$slot2e.'</div>
														</li>
                                                                ');
                                                            } else  if($noofslots==3)
                                                                {
                                                                echo ('
                                                                 <li>
														    	<div class="title"> Second slot:</div>
															<div class="text">'.$slot2s."-".$slot2e.'</div>
														</li>
                                                                ');
                                                            }
                                                             
                                                            }
                                                            ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href=""><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br><br>

<?php if($num2>0)
{ ?>
                <h3 class="text-center" style="color:orange">Puarly Filtered</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table  datatable ">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Employe ID</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Job Type</th>
                                        <th>Job Time</th>
                                        <th>Religion</th>
                                        <th>Cast</th>
                                        <th>Qualification</th>
                                        <th>Language</th>
                                        <th>Slot 1</th>
                                        <th>Slot 2</th>
                                        <th>Slot 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        while($num2>0)
                                        {
                                            echo('
                                            <tr>
											<td>
												<h2 class="table-avatar">
													<a href="javascript:void(0)" class="view_data avatar" id="'.$id2[$j].'" ><img src="image/'.$photo2[$j].'" alt=""></a>
													<a href="javascript:void(0)"  class=" view_data" id="'.$id2[$j].'">'.$firstname2[$j].' '.$lastname2[$j].'</a>
												</h2>
											</td>
											<td>'.$regid2[$j].'</td>
											<td>'.$phno2[$j].'</td>
                                            <td>'.$addressline12[$j].','.$addressline22[$j].','.$city2[$j].'</td>

											<td>'.$gender2[$j].'</td>
											<td>'.$age2[$j].'</td>
											<td>'.$jobtype2[$j].'</td>
											<td>'.$jobtime2[$j].'</td>
											<td>'.$religion2[$j].'</td>
											<td>'.$cast2[$j].'</td>
											<td>'.$qualification2[$j].'</td>
                                            <td>'.$language2[$j].'</td>
                                            <td>'.$slot1s2[$j].'-'.$slot1e2[$j].'</td>
                                            <td>'.$slot2s2[$j].'-'.$slot2e2[$j].'</td>
                                            <td>'.$slot3s2[$j].'-'.$slot3e2[$j].'</td>
                                        
											
											
										</tr>
										
                                            ');
                                            $j++;
                                            $num2--;
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><br><br>

<?php }
                ?>

                <h3 class="text-center" style="color:orange">Partialy Filtered</h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable   display responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Employe ID</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Job Type</th>
                                        <th>Job Time</th>
                                        <th>Religion</th>
                                        <th>Cast</th>
                                        <th>Qualification</th>
                                        <th>Language</th>
                                        <th>Slot 1</th>
                                        <th>Slot 2</th>
                                        <th>Slot 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        while($num3>0)
                                        {
                                            echo('
                                            <tr>
											<td>
												<h2 class="table-avatar">
													<a href="javascript:void(0)" class=" view_data avatar" id="'.$id3[$j].'"><img src="image/'.$photo3[$j].'" alt=""></a>
													<a href="javascript:void(0)"  class=" view_data" id="'.$id3[$j].'">'.$firstname3[$j].' '.$lastname3[$j].'</a>
												</h2>
											</td>
											<td>'.$regid3[$j].'</td>
											<td>'.$addressline13[$j].','.$addressline23[$j].','.$city3[$j].'</td>
											<td>'.$phno3[$j].'</td>
											<td>'.$gender3[$j].'</td>
											<td>'.$age3[$j].'</td>
											<td>'.$jobtype3[$j].'</td>
											<td>'.$jobtime3[$j].'</td>
											<td>'.$religion3[$j].'</td>
											<td>'.$cast3[$j].'</td>
											<td>'.$qualification3[$j].'</td>
                                            <td>'.$language3[$j].'</td>
                                              <td>'.$slot1s3[$j].'-'.$slot1e3[$j].'</td>
                                            <td>'.$slot2s3[$j].'-'.$slot2e3[$j].'</td>
                                            <td>'.$slot3s3[$j].'-'.$slot3e3[$j].'</td>
											
											
										</tr>
										
                                            ');
                                            $j++;
                                            $num3--;
                                        }
                                        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div id="assign-model" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Comission Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="jobcardassign.php" method="post">
                            <div class="form-scroll">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" value="<?php echo $nid; ?>" hidden name="nid">
                                                    <label>Start Date<span class="text-danger">*</span></label>

                                                    <input class="form-control datetimepicker" type="text" name="stdate" required>
                                                    <label>Comission<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="comission" required>
                                                    
                                                    <div id="comview">

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

        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS -->
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- Datatable JS -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/dataTables.bootstrap4.min.js"></script>

        <!-- Select2 JS -->
        <script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Custom JS -->
        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('.view_data').click(function() {
                    var employee_id = $(this).attr("id");
                    $.ajax({
                        url: "ajaxcomission.php",
                        method: "post",
                        data: {
                            employee_id: employee_id
                        },
                        success: function(data) {
                            $('#comview').html(data);
                            $('#assign-model').modal("show");
                        }
                    });
                });
            });

        </script>


</body>

</html>
