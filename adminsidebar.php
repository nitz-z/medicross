<div class="sidebar" id="sidebar">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 787px;"><div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 787px;">
					<div class="sidebar-menu">
						<ul>
							<li> 
								<a href="index.php"><i class="la la-home"></i> <span>Back to Home</span></a>
							</li><br><br>
							<li> 
								<a href="paynotification.php">
									
									<span >Payment Details</span>
								</a>
							</li>
							<?php
                            $logjob=$_SESSION['logjob'];
                            if($logjob=="admin")
                            {
                            ?>
							<li> 
								<a href="reportfront.php">
									
									<span >Report</span>
								</a>
							</li>
							<li> 
								<a href="changepass.php">
									
									<span >Password Change</span>
								</a>
							</li>
							<li> 
								<a href="addstaff.php">
									
									<span >Add Staffs</span>
								</a>
							</li>
								
							<li> 
								<a href="edithis.php">
									
									<span >Edit History</span>
								</a>
							</li>
							<?php
                            }
                            ?>
							<li> 
								<a href="staffsalary.php">
									
									<span >Staff Salary</span>
								</a>
							</li>
							<li> 
								<a href="expence.php">
									
									<span >Extra Expence</span>
								</a>
							</li>
					
							
		
						</ul>
					</div>
                </div><div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 671px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>