<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location:index.php");
		exit();
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<?php
			$title = basename($_SERVER['PHP_SELF'], '.php');
			$title = explode('-', $title);
			$title = ucfirst($title[1]);
		?>

        <title>YLWF - <?= $title; ?></title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">

        <!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="admin-dashboard.php" class="logo">
						<h2 style="margin-top:10px; color:black;">Admin Panel</h2>
					</a>
					<a href="admin-dashboard.php" class="logo logo-small">
						<img src="assets/img/logo1.png" alt="Logo" width="80" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar.png" width="31" alt="admin"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar.png" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>Hey, <?= $_SESSION['username']; ?></h6>
									<p class="text-muted mb-0">Administrator</p>
								</div>
							</div>
							<a class="dropdown-item" href="assets/php/logout.php">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php')?"active":""; ?>"> 
								<a href="admin-dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php')?"active":""; ?>"> 
								<a href="admin-users.php"><i class="fe fe-users"></i> <span>Active Users</span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-notes.php')?"active":""; ?>"> 
								<a href="admin-notes.php"><i class="fe fe-file"></i> <span>Complaints</span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-resolved-notes.php')?"active":""; ?>"> 
								<a href="admin-resolved-notes.php"><i class="fe fe-file"></i> <span>Resolved Complaints</span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-feedback.php')?"active":""; ?>"> 
								<a href="admin-feedback.php"><i class="fe fe-comment-o"></i> <span>Feedback</span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-notification.php')?"active":""; ?>"> 
								<a href="admin-notification.php"><i class="fe fe-bell"></i> <span>Notification</span> <span id="checkNotification"></span></a>
							</li>
							<li class="<?= (basename($_SERVER['PHP_SELF']) == 'admin-deleteduser.php')?"active":""; ?>"> 
								<a href="admin-deleteduser.php"><i class="fe fe-user-minus"></i> <span>Inactive Users</span></a>
							</li>
							<li> 
								<a href="assets/php/admin-action.php?export=excel"><i class="fe fe-table"></i> <span>Export Users</span></a>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->