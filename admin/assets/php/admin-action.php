<?php 

	require_once 'admin-db.php';
	require_once 'create_police_station.php';

	$admin = new Admin();
	session_start();

	//Handle Admin Login Ajax Request
	if (isset($_POST['action']) && $_POST['action'] == 'adminLogin') {
		$username = $admin->test_input($_POST['username']);
		$password = $admin->test_input($_POST['password']);
		$hpassword = sha1($password);
		$loggedInAdmin = $admin->admin_login($username, $hpassword);
		if ($loggedInAdmin != null) {
			echo 'admin_login';
			$_SESSION['username'] = $username;
		} else {
			echo $admin->showMessage('danger', 'Username or Password is incorrect.');
		}
	}

	//Handle Fetch all users ajax request
	if (isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers') {
		$output = '';
		$data = $admin->fetchAllUsers(1);
		$path = '../assets/php/';

		if ($data) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>ID</th>
									<th>Image</th>
									<th>Name</th>
									<th>E-Mail</th>
									<th>Phone</th>
									<th>Gender</th>
									<th>Verified</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
			foreach ($data as $row) {

				if ($row['photo'] != '') {
					$uphoto = $path.$row['photo'];
				} else {
					$uphoto = '../assets/img/profiles/avatar.png';
				}

				$output .= '
								<tr>
									<td>'.$row['id'].'</td>
									<td><img class="avatar-img" src="'.$uphoto.'" width="30"></td>
									<td>'.$row['name'].'</td>
									<td>'.$row['email'].'</td>
									<td>'.$row['phone'].'</td>
									<td>'.$row['gender'].'</td>
									<td>'.$row['verified'].'</td>
									<td>
										<a href="#" id="'.$row['id'].'" title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="'.$row['id'].'" title="Deactivate User" class="text-danger userDeleteIcon"><i class="fa fa-trash"></i></a>
									</td>
								</tr>';
			}	
			$output .= '
							</tbody>
						</table>';		
			echo $output;			
		} else {
			echo "<h3 class='text-center text-secondary'>No Any User Registred Yet!</h3>";
		}
	}



	
//Handle Fetch all stations ajax request
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllStations') {
    $output = '';
    $data = $admin->fetchAllStations(1);
    $path = '../assets/php/';

    if ($data) {
        $output .= '<table class="datatable table table-stripped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Phone</th>
								<th>Address</th>
                            </tr>
                        </thead>
                    <tbody>
                    ';
        foreach ($data as $row) {

            $output .= '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
								<td>'.$row['address'].'</td>
                            </tr>';
        }	
        $output .= '
                        </tbody>
                    </table>';		
        echo $output;			
    } else {
        echo "<h3 class='text-center text-secondary'>No Stations Found</h3>";
    }
}

	
//Handle Fetch all found items
if (isset($_POST['action']) && $_POST['action'] == 'fetchFoundItems') {
    $output = '';
    $data = $admin->fetchFoundItems(1);
    $path = '../assets/php/';

    if ($data) {
        $output .= '<table class="datatable table table-stripped text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Person Name</th>
								<th>Email</th>
								<th>Phone</th>
                            </tr>
                        </thead>
                    <tbody>
                    ';
        foreach ($data as $row) {

            $output .= '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['description'].'</td>
                                <td>'.$row['pname'].'</td>
								<td>'.$row['pemail'].'</td>
								<td>'.$row['phone'].'</td>
                            </tr>';
        }	
        $output .= '
                        </tbody>
                    </table>';		
        echo $output;			
    } else {
        echo "<h3 class='text-center text-secondary'>No Data Found</h3>";
    }
}




	//Complaint Forwarding System
	if(isset($_POST['complain_id'])){
		$station = $admin->test_input($_POST['policeStations1']);
		$id = $admin->test_input($_POST['complain_id']);
		$data = $admin->forwardComplaint($station,$id);
		echo json_encode($data);
	}


	// Creating Station User through Admin Panel
	if (isset($_POST['action']) && $_POST['action'] == 'addStationUser'){
		$station = $admin->test_input($_POST['policeStations1']);
		$email = $admin->test_input($_POST['email']);
		$password = $admin->test_input($_POST['password']);
		$designation = $admin->test_input($_POST['designation']);
		$data = $admin->create_station_user($station,$email,$designation,$password);
		echo json_encode($data);
	}


	//List New Found Item
	if(isset($_POST['action']) && $_POST['action'] == 'add_item'){
		$name = $admin->test_input($_POST['itemName']);
		$description = $admin->test_input($_POST['itemDescription']);
		$pname = $admin->test_input($_POST['pname']);
		$pemail = $admin->test_input($_POST['pemail']);
		$phone = $admin->test_input($_POST['phone']);
		$paddress = $admin->test_input($_POST['paddress']);
		$data = $admin->addLostItem($name, $description, $pname, $pemail, $phone, $paddress);
		echo json_encode($data);
	}


	//Adding New Police Station
	if (isset($_POST['action']) && $_POST['action'] == 'add_station'){
		$name = $admin->test_input($_POST['name']);
		$email = $admin->test_input($_POST['email']);
		$phone = $admin->test_input($_POST['phone']);
		$state = $admin->test_input($_POST['state']);
		$district = $admin->test_input($_POST['district']);
		$address = $admin->test_input($_POST['address']);
		//$pincode = $admin->test_input($_POST['pincode']);
		$data = $admin->create_station($name, $email, $phone,$address,$state, $district);
		echo json_encode($data);
	}

	//Handle view user ajax request
	if (isset($_POST['details_id'])) {
		$id = $_POST['details_id'];
		$data = $admin->fetchUserDetailsById($id);
		echo json_encode($data);
	}
	//Handle View complaint ajax request
	if (isset($_POST['complaint_id'])) {
		$id = $_POST['complaint_id'];
		$data = $admin->fetchComplaint($id);
		echo json_encode($data);
	}

	//Handle delete user ajax request
	if (isset($_POST['delete_id'])) {
		$id = $_POST['delete_id'];
		$admin->userAction($id, 1);
	}

	//Handle show all deleted user ajax request
	if (isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers') {
		$output = '';
		$data = $admin->fetchAllUsers(0);
		$path = '../assets/php/';

		if ($data) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>ID</th>
									<th>Image</th>
									<th>Name</th>
									<th>E-Mail</th>
									<th>Phone</th>
									<th>Gender</th>
									<th>Verified</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
			foreach ($data as $row) {

				if ($row['photo'] != '') {
					$uphoto = $path.$row['photo'];
				} else {
					$uphoto = '../assets/img/profiles/avatar.png';
				}

				$output .= '
								<tr>
									<td>'.$row['id'].'</td>
									<td><img class="avatar-img" src="'.$uphoto.'" width="30"></td>
									<td>'.$row['name'].'</td>
									<td>'.$row['email'].'</td>
									<td>'.$row['phone'].'</td>
									<td>'.$row['gender'].'</td>
									<td>'.$row['verified'].'</td>
									<td>
										<a href="#" id="'.$row['id'].'" title="Restore User" class="text-white badge badge-success restoreUserIcon">Restore User</a>
									</td>
								</tr>';
			}	
			$output .= '
							</tbody>
						</table>';		
			echo $output;			
		} else {
			echo "<h3 class='text-center text-secondary'>No Any User Deleted Yet!</h3>";
		}
	}

	//Handle Deleted User Restore rwquest
	if (isset($_POST['restore_id'])) {
		$id = $_POST['restore_id'];
		$admin->userAction($id, 0);
	}

	//Handle show all notes user ajax request
	if (isset($_POST['action']) && $_POST['action'] == 'fetchAllNotes') {
		$output = '';
		$note = $admin->fetchAllNotes();

		if ($note) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject</th>
									<th>Complaint</th>
									<th>Written On</th>
									<th>Updated On</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
			foreach ($note as $row) {

				$output.= '    <tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['name'].'</td>
									<td>'.$row['email'].'</td>
									<td>'.$row['title'].'</td>
									<td>'.substr($row['note'],0, 50).'....</td>
									<td>'.$row['created_at'].'</td>
									<td>'.$row['updated_at'].'</td>
									<td>
										<a href="#" id="'.$row['id'].'" title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showComplaintDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
										<a href="#" id="'.$row['id'].'" title="Restore User" class="text-white badge badge-success resolveIcon">Resolve Complaint</a>
									</td>
								</tr>';
			}	
			$output .= '
							</tbody> 
						</table>';		
			echo $output;			
		} else {
			echo "<h3 class='text-center text-secondary'>No Any Complaint Yet!</h3>";
		}
	}


	//Handle show all notes user ajax request
	if (isset($_POST['action']) && $_POST['action'] == 'fetchAllResolvedNotes') {
		$output = '';
		$note = $admin->fetchAllResolvedNotes();

		if ($note) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Subject</th>
									<th>Complaint</th>
									<th>Written On</th>
									<th>Updated On</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
			foreach ($note as $row) {

				$output.= '    <tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['name'].'</td>
									<td>'.$row['email'].'</td>
									<td>'.$row['title'].'</td>
									<td>'.substr($row['note'],0, 50).'....</td>
									<td>'.$row['created_at'].'</td>
									<td>'.$row['updated_at'].'</td>
									<td>
										<a href="#" id="'.$row['id'].'" title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showComplaintDetailsModal"><i class="fa fa-info-circle"></i></a>&nbsp;&nbsp;&nbsp;
									</td>
								</tr>';
			}	
			$output .= '
							</tbody>
						</table>';		
			echo $output;			
		} else {
			echo "<h3 class='text-center text-secondary'>No Any Complaint Yet!</h3>";
		}
	}


	//Handle Delete note of an user Ajax Reqest

	if (isset($_POST['note_id'])) {
		$id = $_POST['note_id'];
		$admin->deleteNoteOfUser($id);
	}


	//Handle show all feedback user ajax request
	if (isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedback') {
		$output = '';
		$feedback = $admin->fetchFeedback();

		if ($feedback) {
			$output .= '<table class="datatable table table-stripped text-center">
							<thead>
								<tr>
									<th>FID</th>
									<th>UID</th>
									<th>Username</th>
									<th>User Email</th>
									<th>Subject</th>
									<th>Feedback</th>
									<th>Sent On</th>
									<th>Action</th>
								</tr>
							</thead>
						<tbody>
						';
			foreach ($feedback as $row) {

				$output .= '
								<tr>
									<td>'.$row['id'].'</td>
									<td>'.$row['uid'].'</td>
									<td>'.$row['name'].'</td>
									<td>'.$row['email'].'</td>
									<td>'.$row['subject'].'</td>
									<td>'.$row['feedback'].'</td>
									<td>'.$row['created_at'].'</td>
									<td>
										<a href="#" fid="'.$row['id'].'" id="'.$row['uid'].'" title="Reply" class="text-primary replyFeedbackIcon" data-toggle="modal" data-target="#showReplyModal"><i class="fa fa-reply"></i></a>
									</td>
								</tr>';
			}	
			$output .= '
							</tbody>
						</table>';		
			echo $output;			
		} else {
			echo "<h3 class='text-center text-secondary'>No Any Feedback Written Yet!</h3>";
		}
	}

	//Handle reply Feedback of user Ajax Reqest
	if (isset($_POST['message'])) {
		$uid = $_POST['uid'];
		$message = $admin->test_input($_POST['message']);
		$fid = $_POST['fid'];

		$admin->replyFeedback($uid, $message);
		$admin->feedbackReplied($fid);
	}

	//Handle Fetch Notification Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification'){
    	$notification = $admin->fetchNotification();
    	$output = '';
    	if ($notification) {
    		foreach ($notification as $row) {
    			$output .= '<div class="alert alert-dark" role="alert">
								<button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="alert-heading">New Notification</h4>
								<p class="mb-0 lead">'.$row['message'].' by '.$row['name'].'</p>
								<hr class="my-2">
								<p class="mb-0 float-left"><b>User E-Mail: </b>'.$row['email'].'</p>
								<p class="mb-0 float-right">'.$admin->timeInAgo($row['created_at']).'</p>
								<div class="clearfix"></div>
							</div>';
    		}
    		echo $output;
    	} else {
    		echo '<h3 class="text-center">No any new notifications.</h3>';
    	}
    }

    //check notification
    if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
    	if($admin->fetchNotification()){
    		echo '<span class="badge badge-danger badge-pill">'.$admin->countNotification().'</span>';
    	} else {
    		echo '';
    	}
    }

    //Remove admin Notification
    if(isset($_POST['notification_id'])){
    	$id = $_POST['notification_id'];
    	$admin->removeNotification($id);
    }

    //Handle Export All Users in Excel
    if (isset($_GET['export']) && $_GET['export'] == 'excel') {
    	header("Content-Type: application/xls");
    	header("Content-Disposition: attachment; filename=users.xls");
    	header("Pragma: no-cache");
    	header("Expires: 0");

    	$data = $admin->exportAllUsers();

    	echo '<table border="1" align="center">';
    	echo '<tr>
				<th>ID</th>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>DOB</th>
				<th>Aadhaar</th>
				<th>Joined On</th>
				<th>Verified</th>
				<th>Deleted</th>
    		  </tr>';
    	foreach ($data as $row) {
			echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['dob'].'</td>
					<td>'.$row['uid'].'</td>
					<td>'.$row['created_at'].'</td>
					<td>'.$row['verified'].'</td>
					<td>'.$row['deleted'].'</td>
				  </tr>';
		}

		echo '</table>';
    }

 ?>