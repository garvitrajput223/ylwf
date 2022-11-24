$(document).ready(function(){
	
	fetchAllUsers();

	//fetch all users
	function fetchAllUsers(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllUsers' },
			success: function(response){
				$("#showAllUsers").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}

	//Fetch user details
	$("body").on("click", ".userDetailsIcon", function(e){
		e.preventDefault();
		details_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { details_id: details_id },
			success: function(response){
				data = JSON.parse(response);
				$("#getName").text(data.name+' '+'(ID: '+data.id+')');
				$("#getEmail").text('Email : '+data.email);
				$("#getPhone").text('Phone : '+data.phone);
				$("#getUID").text('Aadhaar Number : '+data.uid);
				$("#getDob").text('DOB : '+data.dob);
				$("#getGender").text('Gender : '+data.gender);
				$("#getCreated").text('Joined On : '+data.created_at);
				//$("#getVerified").text('Verified : '+data.verified);
				$("#getAddress").text('Address : '+data.address+', '+data.city+', '+data.state+' - '+data.zip_code+', '+data.country+'.');

				if(data.photo != ''){
					$("#getImage").html('<img src="../assets/php/'+data.photo+'" class="img-fluid align-self-center" width="280px">');
				} else {
					$("#getImage").html('<img src="../assets/img/profiles/avatar.png" class="img-fluid align-self-center" width="280px">');
				}
				if(data.photo != ''){
					$("#getAadhaar").html('<img src="../assets/php/'+data.photo+'" class="img-fluid align-self-center" width="280px">');
				} else {
					$("#getAadhaar").html('<h4>Aadhaar Card Not Uploaded</h4>" class="img-fluid align-self-center" width="280px">');
				}
			}
		});
	});

	//Delete user ajax reqest
	$("body").on("click", ".userDeleteIcon", function(e){
		e.preventDefault();
		delete_id = $(this).attr('id');
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, deactivate it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: { delete_id: delete_id },
					success: function(response){
				    	Swal.fire(
				    		'Deleted!',
				    		'User Deactivated Successfully.',
				    		'success'
				    	)

				    	fetchAllUsers();
					}
				});
			}
		});
	});

	//check notification ajax request
	checkNotification();
	function checkNotification() {
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'checkNotification' },
			success: function(response) {
				$("#checkNotification").html(response);
			}
		});
	}

});