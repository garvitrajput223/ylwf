<?php 
	// session_start();
	// if (isset($_SESSION['username'])) {
	// 	header("Location:admin-dashboard.php");
	// 	exit();
	// }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>YLWF - Admin Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<style type="text/css">
			html, body {
				height: 100%;
			}
			.card-body{
				border-radius: 5px;
			}
		</style>

    </head>
    <body class="bg-dark">
	
		<div class="container h-100">
			<div class="row h-100 align-items-center justify-content-center">
				<div class="col-lg-5">
				
					<div class="card shadow-lg">
					<img src="assets/img/logo1.png" style="width: 50%;margin: auto; display: block;" alt="">
						<div class="card-header">
							<h3 class="m-0  text-center">Police Station Login</h3>
						</div>
						<div class="card-body">
							<div id="adminLoginAlert"></div>
							<form action="#" method="post" class="px-3" id="admin-login-form">
								<div class="form-group">
									<input type="email" name="username" placeholder="E-Mail" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<input type="password" name="password" placeholder="Password" class="form-control" required>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-block btn-primary" name="admin-login" id="adminLoginBtn">Login&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="admin-login-spinner"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="assets/php/js/index.js"></script>
		
    </body>
</html>