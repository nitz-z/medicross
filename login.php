<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Re-Queue</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		

    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
<!--				<a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a>-->
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<img src="assets/img/logo.png" alt="">
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
					<div class="text-center" id="errorshow" style="color:red"></div><br>

								<div class="form-group">
									<label>Email Address</label>
									<input class="form-control user" type="text">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
<!--
										<div class="col-auto">
											<a class="text-muted " href="forgot-password.html">
												Forgot password?
											</a>
										</div>
-->
									</div>
									<input class="form-control pass" type="password">
								</div>
								<div class="form-group text-center">
									<a class="btn btn-primary account-btn logsub"  id="">Login</a>
								</div>
<!--
								<div class="account-footer">
									<p>Don't have an account yet? <a href="register.html">Register</a></p>
								</div>
-->
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		<script>
            $('.logsub').click(function(){  
                            var user = $('.user').val();
            var pass = $('.pass').val();
            if(user=="" )
                {
                    $("#errorshow").html("Username or Password canot be empty!");
                }
                else if(pass=="")
                    {
                                            $("#errorshow").html("Username or Password canot be empty!");

                    }
            else{
            
           $.ajax({  
                url:"ajaxlogin.php",  
                method:"post",  
                data:{user:user,pass:pass},  
                 success:function(data){
                    var msg = "";
                    if(data == 1){
                        window.location = "index.php";
                    }else{
                        msg = "Invalid username or password!";
                    }
                    $("#errorshow").html(msg);
                }
           });
            }

      }); 

        </script>
    </body>
</html>