<?php
	session_start();
	if(isset($_SESSION['user'])){
		header("Location:home.php");
	}
	include_once 'assets/php/config.php';
	$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>You Lost We Found</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!--Login Main Wrapper -->
        <div class="main-wrapper login-body" id="login-box">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo1.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1 class="mb-4">Login</h1>
								<!-- Form -->
								<form action="#" method="post" id="login-form">
									<div id="loginAlert"></div>
									<div class="form-group">
										<input class="form-control" type="email" name="email" id="email" placeholder="Email" required value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>">
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" id="password" placeholder="Password" required minlength="6" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
									</div>
									<div class="form-group">
										<div class="checkbox float-left">
											<label>
												<input type="checkbox" name="rem"<?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>> Remember Me
											</label>
										</div>
										<div class="float-right forgotpass"><a href="#" id="forgot-link">Forgot Password?</a></div>
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" id="login-btn">Login&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="login-spinner"></span></button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<div class="text-center dont-have">Don’t have an account? <a href="#" id="register-link">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Login Main Wrapper -->

		<!--Register Main Wrapper -->
        <div class="main-wrapper login-body" id="register-box" style="display: none;">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo1.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1 class="mb-4">Register</h1>
								
								<!-- Form -->
								<form action="#" method="post" id="register-form">
									<div id="regAlert"></div>
									<div class="form-group">
										<input class="form-control" type="text" name="name" id="name" placeholder="Full Name" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" id="remail" type="email" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input class="form-control" name="uid" id="uid" type="number" placeholder="Aadhaar Card Number" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="password" id="rpassword" placeholder="Password" minlength="6" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" minlength="6" required>
									</div>
									<div class="form-group">
										<div id="passError" class="text-center text-danger font-weight-bold"></div>
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit" id="register-btn">Register&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="register-spinner"></span></button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<div class="text-center dont-have">Already have an account? <a href="#" id="login-link">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Register Main Wrapper -->

		<!--Forgot Main Wrapper -->
        <div class="main-wrapper login-body" id="forgot-box" style="display: none;">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="assets/img/logo1.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form action="#" method="post" id="forgot-form">
									<div id="forgotAlert"></div>
									<div class="form-group">
										<input class="form-control" type="email" name="email" id="femail" placeholder="Email" required>
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit" id="forgot-btn">Reset Passowrd&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="forgot-spinner"></span></button>
									</div>
								</form>
								<!-- /Form -->

								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<div class="text-center dont-have">Go back to <a href="#" id="back-link">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Forgot Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Form Validation JS -->
        <script src="assets/js/form-validation.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

		<script src="assets/php/js/index.js"></script>
		
    </body>

</html>