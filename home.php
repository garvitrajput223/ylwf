<?php require_once 'assets/php/header.php'; ?>
			
			<!-- Page Wrapper -->
                <div class="content container" style="padding-top: 5em;">

                	<div class="row">
                		<div class="col-lg-12">
                			<?php if($verified == 'Not Verified'): ?>
                			<div class="alert alert-danger text-center m-2 m-0">
                				<strong>Your E-mail is not verified! We have sent you verification link on your email, check and verify now.</strong>
                			</div>
                			<?php endif; ?>
                			<h4 class="text-center mt-3">Write your complaint here</h4>
                		</div>
                	</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card mt-2">
								<div class="card-header">
									<h4 class="card-title float-left mt-2">All Complaints</h4>
									<a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addNoteModal"><i class="fa fa-plus-circle fa-lg"></i>&nbsp;Add New Complaint</a>
								</div>
								<div class="card-body">
									<div class="table-responsive" id="showNote">
										<h4 class="text-center text-lead mt-2">Please Wait...</h4>
									</div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		<!-- Start Add New Note Modal -->
			<div class="modal fade" id="addNoteModal">
				<div class="modal-dialog modal-dialog-center">
					<div class="modal-content">
						<div class="modal-header bg-danger">
							<h4 class="modal-title text-light">Add New Complaint</h4>
							<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="#" method="post" id="add-note-form" class="px-3">
								<div class="form-group">
									<input type="text" name="title" class="form-control" placeholder="Enter Title" required>
								</div>
								<div class="form-group">
									<textarea name="note" class="form-control" placeholder="Write Your Complaint Here..." rows="6" required></textarea>
								</div>
								<div class="form-group">
									<input name="location" type="text" class="form-control" placeholder="Expected Location (if any)..." ></input>
								</div>
								<div class="form-group">
									<label for="dateLost">Date of Lost</label>
									<input name="lostDate" type="date" class="form-control" placeholder="Date of Lost" ></input>
								</div>
								<div class="form-group" >
									<label for="Documents">Supporting Documents</label> <br> <span style="color: red; line-height:0px;">(Invoice, FIR Copy, Any Image of that item, etc.)</span>
									<input name="document" id="previewDocument" type="file" class="form-control" accept="image/jpeg,image/gif,image/png,application/pdf"  placeholder="" ></input>
								</div>
								<div class="form-group">
									<button type="submit" onclick="validate()" name="addNote" id="addNoteBtn" class="btn btn-block btn-success">Submit&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="add-note-spinner"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- End Add New Note Modal -->

		<!-- Start Edit Note Modal -->
			<div class="modal fade" id="editNoteModal">
				<div class="modal-dialog modal-dialog-center">
					<div class="modal-content">
						<div class="modal-header bg-info">
							<h4 class="modal-title text-light">Edit Note</h4>
							<button type="button" class="close text-light" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form action="#" method="post" id="edit-note-form" class="px-3">
								<input type="hidden" name="id" id="id">
								<div class="form-group">
									<input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
								</div>
								<div class="form-group">
									<textarea name="note" id="note" class="form-control" placeholder="Write Your Note Here..." rows="6" required></textarea>
								</div>
								<div class="form-group">
									<button type="submit" name="editNote" id="editNoteBtn" class="btn btn-block btn-info">Edit Note&nbsp;
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-note-spinner"></span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- End Edit Note Modal -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/datatables.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="assets/php/js/home.js"></script>
		
    </body>

</html>





<script>
	// function validate() {
	// 			var file = $("#previewDocument")[0].files[0]; //fupFileUpload add class to your file upload control
	// 			var fileType = file.type;
	// 			var ValidImageTypes = ["image/gif", "image/jpeg", "image/png", "image/tiff","application/pdf" , "image/bmp"];
	// 			if ($.inArray(fileType, ValidImageTypes) < 0) {
	// 				alert("Please select valid image file."); //set label text if you want to display error message in label
	// 				return false;
	// 			}
	// 			else if( file.size > 1000000){ // file.size is in bytes
	// 				alert("Please select file less than 100 kb.");
	// 				return false;
	// 			}
	// 			$(document).ready(function(){
	// 			$("#add-note-form").submit(function(e){
	// 				e.preventDefault();
	// 				$("#edit-profile-spinner").show();
	// 				$.ajax({
	// 					url: 'assets/php/process.php',
	// 					method: 'post',
	// 					processData: false,
	// 					contentType: false,
	// 					cache: false,
	// 					data: new FormData(this),
	// 					success: function(response){
	// 						$("#edit-profile-spinner").hide();
	// 						location.reload();
	// 					}
	// 				});
	// 			});

	// 		});
	// }
</script>