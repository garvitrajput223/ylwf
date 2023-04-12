<?php
	require_once 'assets/php/admin-header.php';
	require_once 'assets/php/admin-db.php';
	$count = new Admin();
?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-primary">Total Users</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-primary"><?= $count->totalUserCount('users'); ?></h1>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-warning">Verified Users</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-warning"><?= $count->verified_users(1); ?></h1>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-danger">Unverified Users</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-danger"><?= $count->verified_users(0); ?></h1>
										</div>
									</div>
								</div>
								
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-danger">Total Unresolved Complaints</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-secondary"><?= $count->totalCount('notes'); ?></h1>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-secondary">Total Resolved Complaints</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-secondary"><?= $count->totalResolveCount(); ?></h1>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-primary">Total Found Items</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-secondary"><?= $count->countFoundItems(); ?></h1>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-info">Total Feedback</div>
										<div class="card-body">
											<h1 class="display-4 text-center text-info"><?= $count->totalCount('feedback'); ?></h1>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
					<!-- <div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-xl-6 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-sucess">Male/Female User's Percentage</div>
										<div class="card-body">
											 <div id="chartGender"></div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-sm-4 col-12">
									<div class="card">
										<div class="card-header lead text-center text-danger">Verified/Unverified User's Percentage</div>
										<div class="card-body">
											<div id="chartVerified"></div>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div> -->
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
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </body>
</html>