<?php require_once 'assets/php/admin-header.php'; ?>

<head>
	<link rel="stylesheet" href="assets/css/station.css">
</head>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
						<li class="breadcrumb-item active">Complaints</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Total Complaints</h4>
					</div>
					<div class="card-body">

						<div class="table-responsive" id="showAllNotes">
							<h4 class="text-center text-lead mt-2">Please Wait...</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /Page Wrapper -->

</div>

</div>
<!-- /Main Wrapper -->
<div class="modal fade" id="showComplaintDetailsModal">
	<div class="modal-dialog modal-dialog-centered mw-100 w-50">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="getTitle"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="card-deck">
					<div class="card border-primary">
						<div class="card-body">
							<form action="#" id="forwardComplaint">
								<h3 class="text-center">COMPLAINT DETAILS</h3>
								<p style="text-align:justify; color:red">Lost Date</p>
								<h4 id="getLostDate"></h4>
								<p style="text-align:justify; color:red">Details</p>
								<h4 id="getData"></h4>
								<p style="text-align:justify; color:red">Location</p>
								<h4 id="getAddress"></h4>
								<h6>Select Station to Forward</h6>
								<select id="policeStations1" name="policeStations1">
									<option value="" selected disabled>Select Police Station</option>
								</select>
								<button type="button" class="btn btn-primary" id="forward">Forward To Concerned Station</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Datatables JS -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
<script src="assets/php/js/notes.js"></script>
</body>

</html>