<?php require_once 'assets/php/header.php'; ?>
			
			<!-- Page Wrapper -->
                <div class="content container">
					
					<!-- Page Header -->
					<div class="page-header" style="margin-top:80px ;">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<?php if(!$cphoto): ?>
												<img class="rounded-circle" alt="User Image" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
											<?php else: ?>
												<img class="image" alt="User Image" src="<?= 'assets/php/'.$cphoto; ?>">
											<?php endif; ?>	
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?= $cname; ?></h4>
										<?php if($city): ?>
											<div class="user-Location">
												<i class="fa fa-map-marker"></i> <?= $city; ?>, <?= $country; ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="col-auto profile-btn">
										<a data-toggle="modal" href="#edit_personal_details" class="btn btn-primary">
											Complete Profile
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#MyDocuments">Upload Documents</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div id="verifyEmailAlert"></div>
										</div>
										<div class="col-lg-1"></div>
										<div class="col-lg-7">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span class="mb-4">Personal Details:</span>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9"><?= $cname; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9"><?= $cemail; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Aadhaar Number</p>
														<p class="col-sm-9"><?= $uid; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
														<p class="col-sm-9"><?= $cphone; ?></p>
													</div>
													<div class="row mb-4">
														<p class="col-sm-3 text-muted text-sm-right mb-0">Address</p>
														<?php if($address): ?>
															<p class="col-sm-9 mb-0"><?= $address; ?>,<br>
															<?= $city; ?>,<br>
															<?= $state; ?> - <?= $zipcode; ?>,<br>
															<?= $country; ?>.</p>
														<?php endif; ?>	
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="#" method="post" enctype="multipart/form-data" id="profile-update-form">
																<input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
																<div class="row form-row">
																	<div class="col-12">
																		<div class="form-group">
																			<label for="profilePhoto">Upload Profile Image</label>
																			<input type="file" class="form-control" name="image" id="profilePhoto">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="name">Full Name</label>
																			<input type="text" class="form-control" name="name" id="name" value="<?= $cname; ?>">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="gender">Gender</label>
																			<select class="form-control" name="gender" id="gender">
																				<option value="" disabled <?php if($cgender == null){echo 'selected';} ?> >Select Gender</option>
																				<option value="Male" <?php if($cgender == 'Male'){echo 'selected';} ?> >Male</option>
																				<option value="Female" <?php if($cgender == 'Female'){echo 'selected';} ?> >Female</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="dob">Date of Birth</label>
																			<input type="date" name="dob" id="dob" value="<?= $cdob; ?>" class="form-control">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="phone">Mobile</label>
																			<input type="number" name="phone" id="phone" value="<?= $cphone; ?>" class="form-control" placeholder="Mobile">
																		</div>
																	</div>
																	<div class="col-12">
																		<h5 class="form-title"><span>Address</span></h5>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																		<label for="address">Address</label>
																			<input type="text" name="address" id="address" class="form-control" value="<?= $address; ?>" placeholder="Address">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="city">City</label>
																			<input type="text" name="city" id="city" class="form-control" value="<?= $city; ?>" placeholder="City">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="state">State</label>
																			<!-- <input type="text" name="state" id="state" class="form-control" value="<?//= $state; ?>" placeholder="State"> -->
																			<select name="state" class="form-control" id="state">
																				<option  selected disabled>Select State</option>
																			</select>
																
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="zipcode">Zip Code</label>
																			<input type="number" name="zipcode" id="zipcode" class="form-control" value="<?= $zipcode; ?>"  placeholder="Zip Code">
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label for="country">Country</label>
																			<input type="text" name="country" id="country" class="form-control" value="<?= $country; ?>" placeholder="Country">
																		</div>
																	</div>
																</div>
																<button type="submit" name="profile_update" class="btn btn-primary btn-block" id="profileUpdateBtn">Save Changes&nbsp;<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-profile-spinner"></span></button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

										<div class="col-lg-3">
											
											<!-- Account Status -->
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Is E-Mail Verified: </span>
													</h5>
													
													<?php if($verified == 'Not Verified'){ ?>
														<button class="btn btn-danger" type="button"><i class="fa fa-warning"></i> <?= $verified; ?></button>
														<a href="#" id="verify-email" class="float-right pt-2">Verify Now!</a>
													<?php } else{?>
														<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> <?= $verified; ?></button>
														<?php } ?>
												</div>
											</div>
											<!-- /Account Status -->

											<!-- Skills -->
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>More Info:</span>
													</h5>
													<div class="row">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
														<p class="col-sm-6"><?= $cdob; ?></p>
													</div>
													
													<div class="row">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Gender </p>
														<p class="col-sm-6"><?= $cgender; ?></p>
													</div>
													<div class="row" style="margin-bottom: -0.65rem;">
														<p class="col-sm-6 text-muted text-sm-right mb-0 mb-sm-3">Registred on</p>
														<p class="col-sm-6"><?= $reg_on; ?></p>
													</div>
													
												</div>
											</div>
											<!-- /Skills -->

										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="#" method="post" id="change-pass-form">
														<div class="form-group">
															<label for="curpass">Current Password</label>
															<input type="password" class="form-control" name="curpass" id="curpass" required minlength="6">
														</div>
														<div class="form-group">
															<label for="newpass">New Password</label>
															<input type="password" class="form-control" name="newpass" id="newpass" required minlength="6">
														</div>
														<div class="form-group">
															<label for="cneewpass">Confirm Password</label>
															<input type="password" class="form-control" name="cnewpass" id="cnewpass" required minlength="6">
														</div>
														<button class="btn btn-primary" type="submit" name="changepass" id="changePassBtn">Save Changes&nbsp;<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="change-pass-spinner"></span></button>
													</form>
												</div>
												<div class="col-md-10 col-lg-6" style="margin-top: 125px;">
													<div id="changePassError"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								<!-- MY DOCUMENTS TAB -->
								<div id="MyDocuments" class="tab-pane fade">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Upload or View Your Documents</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="#" enctype="multipart/form-data" method="post" id="uploadDocuments">
													<input type="hidden" name="oldUIDimage" value = "<?=$caadhaar?>">
														<div class="col-12">
															<div class="form-group">
																<label for="profilePhoto">Upload Aadhaar</label>
																<input type="file" class="form-control" name="UIDimage" id="profilePhoto">
															</div>
														</div>
														
														<button class="btn btn-primary" type="submit" name="uploadAadhaar" id="UploadAadhaarButton">Save File <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;" id="edit-profile-spinner"></span></button>
													</form>
													<div class="col-auto profile-image">
														<img class="image" style="width:500px ;"  src="<?='assets/php/'.$caadhaar?>" alt="Document">
													</div>
												</div>
												<div class="col-md-10 col-lg-6" style="margin-top: 125px;">
													<div id="changePassError"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							    <!-- /MY DOCUMENTS TAB -->
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
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		<script src="assets/php/js/profile.js"></script>
		<script src="assets/php/js/upload.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/ventura/profile.html by HTTrack Website Copier/3.x [XR&CO'2017], Sat, 18 Apr 2020 05:51:42 GMT -->
</html>