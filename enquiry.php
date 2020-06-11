<?php
include('loginsession.php');
    include_once("db.php");




if(isset($_GET['enqid']) or isset($_POST['eneid']) or isset($_POST['type']))
{
    if(isset($_GET['enqid']) )
{
    $enqid=$_GET['enqid'];
    //selecting enqueiry
 $j=0;
    $result=mysqli_query($conn,"select * from enquiry where id='$enqid' ");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id2[$j]=$row['id'];
            $jobtype2[$j]=$row['jobtype'];
            $ce2[$j]=$row['c/e'];
            $name2[$j]=$row['name'];
            $phno2[$j]=$row['phno'];
            $day2[$j]=$row['day'];
            $status2[$j]=$row['status'];
            $note2[$j]=$row['note'];
            $followdate2[$j]=$row['followdate'];


          $j++;
        }
    }
}
if(isset($_POST['eneid']))
{
    $eneid=$_POST['eneid'];
    $flo=$_POST['flo'];
    $flo2="";


        $flo2[0]=$flo[8];
        $flo2[1]=$flo[9];
        $flo2[2]="/";
        $flo2[5]="/";
            $flo2[3]=$flo[5];
            $flo2[4]=$flo[6];
            $flo2[6]=$flo[0];
            $flo2[7]=$flo[1];
            $flo2[8]=$flo[2];
            $flo2[9]=$flo[3];
   if(mysqli_query($conn,"update enquiry set followdate = '$flo2' where id='$eneid'"))
   {

   }
    else{
        header("location:error-500.php");
    }


    //selecting enqueiry
 $j=0;
    $result=mysqli_query($conn,"select * from enquiry order by id desc");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id2[$j]=$row['id'];
            $jobtype2[$j]=$row['jobtype'];
            $ce2[$j]=$row['c/e'];
            $name2[$j]=$row['name'];
            $phno2[$j]=$row['phno'];
            $day2[$j]=$row['day'];
            $status2[$j]=$row['status'];
            $note2[$j]=$row['note'];
            $followdate2[$j]=$row['followdate'];


          $j++;
        }
    }
}
if(isset($_POST['type']))
{
    $type=$_POST['type'];
        $day=date("d/m/Y");

    $note=$_POST['note'];
    $status=$_POST['status'];
    $phno=$_POST['no'];
    $name=$_POST['name'];
  $jobtype=$_POST['jobtype'];
    $follow=$_POST['follow'];
    $job="";
     for ($k=0;$k<count($jobtype);$k++)
  {
    if($k!=0)
    {
            $job.=",";

    }
    $job.=$jobtype[$k];
  }


       $sql = "insert into enquiry(`name`,`day`,`phno`,`followdate`,`jobtype`,`c/e`,`note`,`status`)  values('$name','$day','$phno','$follow','$job','$type','$note','$status')";
  if(mysqli_query($conn,$sql) ){
                  $msg="Successfully Added";


 }

  	else{
            $msg="Cant Register.Something Went Wrong!.Please Try Again";

    }




    //selecting enqueiry
 $j=0;
    $result=mysqli_query($conn,"select * from enquiry order by id desc");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id2[$j]=$row['id'];
            $jobtype2[$j]=$row['jobtype'];
            $ce2[$j]=$row['c/e'];
            $name2[$j]=$row['name'];
            $phno2[$j]=$row['phno'];
            $day2[$j]=$row['day'];
            $status2[$j]=$row['status'];
            $note2[$j]=$row['note'];
            $followdate2[$j]=$row['followdate'];


          $j++;
        }
    }

    }
}
else
{

    //selecting enqueiry
 $j=0;
    $result=mysqli_query($conn,"select * from enquiry order by id desc");
    $num2=mysqli_num_rows($result);
if($num2>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            $id2[$j]=$row['id'];
            $jobtype2[$j]=$row['jobtype'];
            $ce2[$j]=$row['c/e'];
            $name2[$j]=$row['name'];
            $phno2[$j]=$row['phno'];
            $day2[$j]=$row['day'];
            $status2[$j]=$row['status'];
            $note2[$j]=$row['note'];
            $followdate2[$j]=$row['followdate'];


          $j++;
        }
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
            $id3[$j]=$row['id'];
            $job3[$j]=$row['job'];

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
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">


    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <link rel="stylesheet" href="assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript">
        window.onload = function() {

            var ale = "<?php echo $msg; ?>";
            if (ale != "") {
                    alert("<?php echo $msg; ?>");

            }



        }
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
                            <h3 class="page-title">Enquiry</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Enquiry</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Enquiry Form</h4>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Information</h4>




                                <form action="enquiry.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Client/Emp</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="type">
                                                        <option value="client">Client</option>
                                                        <option value="employe">Employee</option>

                                                    </select> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Phone Number</label>
                                                <div class="col-lg-9">
                                                    <input type="number" class="form-control" name="no">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Status</label>
                                                <div class="col-lg-9">
                                                    <select class="select " name="status">
                                                        <option>Interested</option>
                                                        <option>Not Interested</option>

                                                    </select> </div>
                                            </div>



                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Job Type</label>
                                                <div class="col-lg-9">
                                                    <select class="select " multiple name="jobtype[]">

                                                        <?php
                                                        $s=0;
                                                        $num1=$num;
                                                        while($num1>0)
                                                        {
                                                           echo('

                                                       <option value="'.$job3[$s].'">'.$job3[$s].'</option>
                                                       ') ;
                                                            $s++;
                                                            $num1--;
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">follow up date</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control datetimepicker" name="follow">
                                                </div>
                                            </div>
                                               <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Notes</label>
                                                <div class="col-lg-9">
                                                    <textarea type="text" class="form-control" name="note"></textarea>
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
                </div><br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Client/Emp</th>
                                        <th>Job Type</th>
                                        <th>Enquiry Date</th>
                                        <th>Follow up date</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $j=0;
                                        while($num2>0)
                                        {
                                            echo('
                                            <tr>
											<td>'.$name2[$j].'</td>
											<td>'.$phno2[$j].'</td>
											<td>'.$ce2[$j].'</td>
											<td>'.$jobtype2[$j].'</td>
											<td>'.$day2[$j].'</td>
											<td>'.$followdate2[$j].'</td>
											<td>'.$status2[$j].'</td>
											<td>'.$note2[$j].'</td>
											<td><a class="btn btn-success editing" id="'.$id2[$j].'">Edit</a></td>
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
                </div>




            </div>
            <!-- /Page Content -->
	<div id="editingmodel" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">

							<div class="modal-body" >

                                <form action="enquiry.php" method="post" >
									<div class="form-scroll">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">

															<div id="editview">

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
		<script src="assets/js/jquery.dataTables.min.js"></script>

    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
		<script src="assets/js/moment.min.js"></script>

    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script>
     $('.editing').click(function(){
           var eneid = $(this).attr("id");

           $.ajax({
                url:"ajaxcomission.php",
                method:"post",
                data:{eneid:eneid},
                success:function(data){
                     $('#editview').html(data);
                     $('#editingmodel').modal("show");
                }
           });
      });
    </script>
</body>

</html>
