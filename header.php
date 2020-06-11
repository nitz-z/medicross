<?php
include_once("db.php");
$logname=$_SESSION['logname'];
      $tz  = new DateTimeZone("Asia/Kolkata");

   $today101=date("d-m-Y");
     
 $sql101 = "SELECT * FROM enquiry ";
$i=0;
$rt= mysqli_query($conn,$sql101);
$num101=mysqli_num_rows($rt);
if($num101>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id101[$i]=$check['id'];
     	   $name101[$i]=$check['name'];
    $ce101[$i]=$check['c/e'];
    $phno101[$i]=$check['phno'];
    $followdate101[$i]=$check['followdate'];
$status101[$i]=$check['status'];
$jobtype101[$i]=$check['jobtype'];



 $i++;
 }
} 
$sql101 = "SELECT * FROM clientneed where status=1";
$i=0;
$rt= mysqli_query($conn,$sql101);
$num901=mysqli_num_rows($rt);
if($num901>0)
{
while($check = mysqli_fetch_array($rt)){
     	   $id901[$i]=$check['id'];
     	   $cid901[$i]=$check['cid'];
    $dmocid=$cid901[$i];
     	   $startdate901[$i]=$check['startdate'];
     	   $regperiod901[$i]=$check['regperiod'];
     	   $rper901=$regperiod901[$i];
     	   $regstatus901[$i]=$check['regstatus'];
     	   $jobtype901[$i]=$check['jobtype'];
       $dates=$startdate901[$i];
    $dates=str_replace("/","-",$dates);
    $period901=$rper901-1;
   $v="+".$period901." days";
    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
    $dates = date("d/m/Y",$dates);
    $enddate901[$i]=$dates;
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$dmocid"));
    $firstname901[$i]=$val['firstname'];
    $phno901[$i]=$val['phno1'];

 $i++;
 }
} 
$sql101 = "SELECT * FROM jobcard where status=0";
$i=0;
$rt= mysqli_query($conn,$sql101);
$num701=mysqli_num_rows($rt);
if($num701>0)
{
    echo "in jobcard";
while($check = mysqli_fetch_array($rt)){
     	   $id701[$i]=$check['id'];
     	   $cid701[$i]=$check['cid'];
    $dmocid=$cid701[$i]; 
    $nid701[$i]=$check['nid'];
    $dmonid=$nid701[$i];
     	   $enddate701[$i]=$check['enddate'];
    $enda701=$enddate701[$i];
//       $dates=$enddate701[$i];
//    $dates=str_replace("/","-",$dates);
//    $period701=6;
//   $v="-".$period901." days";
//    $dates = strtotime(date("d-m-Y", strtotime($dates)) . $v);
//    $dates = date("d/m/Y",$dates);
//    $findate701[$i]=$dates;
//  
    $to1111=date("Y-m-d");
        $enda701=str_replace("/","-",$enda701);

$start701=$today101;
    $start701=strtotime($start701);
    $enda701=strtotime($enda701);
  $actualperiod701= ceil(abs($enda701 - $start701) / 86400);
   $acperiod701[$i]=$actualperiod701; 
    
    
     $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from client where id=$dmocid"));
    $firstname701[$i]=$val['firstname'];
    $phno701[$i]=$val['phno1'];
    $val=mysqli_fetch_assoc(mysqli_query($conn,"select * from clientneed where id=$dmonid"));
    $jobtype701[$i]=$val['jobtype'];

 $i++;
 }
}       
        ?>
           
           		<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="index.html" class="logo">
						<img src="assets/img/logo.png" width="40" height="40" alt="">
					</a>
                </div>
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                <div class="page-title-box">
					<h3>Medicross</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="index.php#sidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
				
					<!-- Search -->
					<li class="nav-item">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
						   </a>
							<form action="search.php" method="post">
								<input class="form-control" type="text" placeholder="Search here" name="search">
								<button class="btn" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</li>
					<!-- /Search -->
				
				
				
					<!-- Notifications -->
					<li class="nav-item dropdown">
						<a href="index.php#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<img src="assets/img/icon/ui.png" width="25px"> <span class="badge badge-pill"> <?php
                                        $j=0;
                                    $in=0;
                            $num111=$num701;
                                        while($num111>0)
                                        { 
                                           
                                                $dates101=$enddate701[$j];
                                                $dates101=str_replace("/","-",$dates101);

    $period101=6;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
    $dates202= date("d-m-Y",$dates101);
      $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo2)
                                                {
                                                    $in++;
                                                }
                                        
                                            
                         
                                            $j++;
                                            $num111--;
                                        }
                            echo $in;
                                    ?> </span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Jobcard Enddate</span>
<!--								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>-->
							</div>
							<div class="noti-content">
								<ul class="notification-list">
								
								 <?php
                                        $j=0;
                                    
                                        while($num701>0)
                                        { 
                                            

                                                $dates101=$enddate701[$j];

                                                $dates101=str_replace("/","-",$dates101);
    $period101=6;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
     $dates202 = date("d-m-Y",$dates101);
                                                  $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo2)
                                                {
                                                                               echo('
                                            
                                        <li class="notification-message">
                                        <a>
											<div class="media">
												<div class="media-body">
													<p class="noti-details">Client <span class="noti-title">'.$firstname701[$j].'</span> with the need of  <span class="noti-title">'.$jobtype701[$j].'</span>The job period ends on <span class="noti-title">'.$enddate701[$j].'</span> only <span class="noti-title">'.$acperiod701[$j].'</span> more days left</p>
													<p class="noti-time">Phno: <span class="noti-title">'.$phno701[$j].' </span></p>
												</div>
											</div>
                                            </a>
									</li>
									
										
                                           ');
                                                }
                                        
                         
                                            $j++;
                                            $num701--;
                                        }
                                    ?>

									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
<!--								<a href="enquiry.php">View all Notifications</a>-->
							</div>
						</div>
					</li>			<!-- Notifications -->
					<li class="nav-item dropdown">
						<a href="index.php#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<img src="assets/img/icon/warning.png" width="25px"> <span class="badge badge-pill"> <?php
                                        $j=0;
                                    $in=0;
                            $num111=$num901;
                                        while($num111>0)
                                        { 
                                           
                                                $dates101=$enddate901[$j];
                                                $regs=$regstatus901[$j];
                                                $dates101=str_replace("/","-",$dates101);

    $period101=3;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
    $dates202= date("d-m-Y",$dates101);
      $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo2 and $regs!=1 )
                                                {
                                                    $in++;
                                                }
                                        
                                            
                         
                                            $j++;
                                            $num111--;
                                        }
                            echo $in;
                                    ?> </span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Registration Fee</span>
<!--								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>-->
							</div>
							<div class="noti-content">
								<ul class="notification-list">
								
								 <?php
                                        $j=0;
                                    
                                        while($num901>0)
                                        { 
                                            

                                                $dates101=$enddate901[$j];
                                                                                            $regs=$regstatus901[$j];

                                                $dates101=str_replace("/","-",$dates101);
    $period101=3;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
     $dates202 = date("d-m-Y",$dates101);
                                                  $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo2 and $regs!=1)
                                                {
                                                                               echo('
                                            
                                        <li class="notification-message">
										<a href="regnotification.php?regnid='.$id901[$j].'">
											<div class="media">
												<div class="media-body">
													<p class="noti-details">Client <span class="noti-title">'.$firstname901[$j].'</span> with the need of  <span class="noti-title">'.$jobtype901[$j].'</span>The registration period ends on </p><p class="noti-details"><span class="noti-title">'.$enddate901[$j].'</span> </p>
													<p class="noti-time">Phno: <span class="noti-title">'.$phno901[$j].' </span></p>
												</div>
											</div>
										</a>
									</li>
									
										
                                           ');
                                                }
                                        
                         
                                            $j++;
                                            $num901--;
                                        }
                                    ?>

									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
<!--								<a href="enquiry.php">View all Notifications</a>-->
							</div>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fa fa-bell-o"></i> <span class="badge badge-pill"> <?php
                                        $j=0;
                                    $in=0;
                            $num111=$num101;
                                        while($num111>0)
                                        { 
                                           
                                                $dates101=$followdate101[$j];
                                                $dates101=str_replace("/","-",$dates101);

    $period101=3;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
    $dates202= date("d-m-Y",$dates101);
                                                  $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
    $flo3=$flo2;
$flo=$dates101;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo3 and $tod101<=$flo2)
                                                {
                                                    $in++;
                                                }
                                        
                                            
                         
                                            $j++;
                                            $num111--;
                                        }
                            echo $in;
                                    ?> </span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Enquiry</span>
<!--								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>-->
							</div>
							<div class="noti-content">
								<ul class="notification-list">
								
								 <?php
                                        $j=0;
                                    
                                        while($num101>0)
                                        { 
                                            

                                                $dates101=$followdate101[$j];
                                                $dates101=str_replace("/","-",$dates101);
    $period101=2;
   $v="-".$period101." days";
    $dates101 = strtotime(date("d-m-Y", strtotime($dates101)) . $v);
     $dates202 = date("d-m-Y",$dates101);
                                                                                        $tod101=date("Y-m-d");                                          
                                            
$flo=$dates202;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
    $flo3=$flo2;
$flo=$dates101;
 $flo2="";
   
        
        $flo2[2]=$flo[8];
        $flo2[3]=$flo[9];
        $flo2[4]="-";
        $flo2[7]="-";
            $flo2[1]=$flo[7];
            $flo2[0]=$flo[6];
            $flo2[6]=$flo[4];
            $flo2[9]=$flo[1];
            $flo2[8]=$flo[0];
            $flo2[5]=$flo[3];
                                                if($tod101>=$flo3 and $tod101<=$flo2)
                                                {
                                                                               echo('
                                            
                                        <li class="notification-message">
										<a href="enquiry.php?enqid='.$id101[$j].'">
											<div class="media">
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">'.$name101[$j].'</span> looking for a <span class="noti-title">'.$jobtype101[$j].'</span></p><p class="noti-details">The follow up date is <span class="noti-title">'.$followdate101[$j].'</span> </p>
													<p class="noti-time">Phno: <span class="noti-title">'.$phno101[$j].' </span></p>
												</div>
											</div>
										</a>
									</li>
									
										
                                           ');
                                                }
                                        
                         
                                            $j++;
                                            $num101--;
                                        }
                                    ?>

									
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="enquiry.php">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- Message Notifications -->
<!--
					<li class="nav-item dropdown">
						<a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Messages</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="chat.html">
											<div class="list-item">
												<div class="list-left">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-09.jpg">
													</span>
												</div>
												<div class="list-body">
													<span class="message-author">Richard Miles </span>
													<span class="message-time">12:28 AM</span>
													<div class="clearfix"></div>
													<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="chat.html">
											<div class="list-item">
												<div class="list-left">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-02.jpg">
													</span>
												</div>
												<div class="list-body">
													<span class="message-author">John Doe</span>
													<span class="message-time">6 Mar</span>
													<div class="clearfix"></div>
													<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="chat.html">
											<div class="list-item">
												<div class="list-left">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-03.jpg">
													</span>
												</div>
												<div class="list-body">
													<span class="message-author"> Tarah Shropshire </span>
													<span class="message-time">5 Mar</span>
													<div class="clearfix"></div>
													<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="chat.html">
											<div class="list-item">
												<div class="list-left">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-05.jpg">
													</span>
												</div>
												<div class="list-body">
													<span class="message-author">Mike Litorus</span>
													<span class="message-time">3 Mar</span>
													<div class="clearfix"></div>
													<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="chat.html">
											<div class="list-item">
												<div class="list-left">
													<span class="avatar">
														<img alt="" src="assets/img/profiles/avatar-08.jpg">
													</span>
												</div>
												<div class="list-body">
													<span class="message-author"> Catherine Manseau </span>
													<span class="message-time">27 Feb</span>
													<div class="clearfix"></div>
													<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="chat.html">View all Messages</a>
							</div>
						</div>
					</li>
-->
					<!-- /Message Notifications -->

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="index.html#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
							<span class="status online"></span></span>
							<span><?php echo $logname; ?></span>
						</a>
						<div class="dropdown-menu">
<!--
							<a class="dropdown-item" href="profile.html">My Profile</a>
							<a class="dropdown-item" href="settings.html">Settings</a>
-->
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="index.html#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
<!--
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="settings.html">Settings</a>
-->
						<a class="dropdown-item" href="">Logout</a>
					</div>
				</div>
				<!-- /Mobile Menu -->
				
            </div>
			<!-- /Header -->