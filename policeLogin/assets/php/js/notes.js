$(document).ready(function(){
	
	fetchAllNotes();

	//fetch all users notes
	function fetchAllNotes(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllNotes' },
			success: function(response){
				$("#showAllNotes").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}
	
	//Fetch complaint details
	$("body").on("click", ".userDetailsIcon", function(e){
		e.preventDefault();
		complaint_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { complaint_id: complaint_id },
			success: function(response){
				data = JSON.parse(response);
				$("#getTitle").text('Title: '+data.title);
				$("#getData").text('Complaint/Item: '+data.note);
				$("#getLostDate").text('Lost Date: '+data.lostDate);
				//$("#getPlace").text('Location: '+data.city_name);
				$("#getAddress").text('Location : '+data.city_name+','+data.district_name+', '+data.state_name+' - '+data.pin_code);
				// if(data.photo != ''){
				// 	$("#getImage").html('<img src="../assets/php/'+data.photo+'" class="img-fluid align-self-center" width="280px">');
				// } else {
				// 	$("#getImage").html('<img src="../assets/img/profiles/avatar.png" class="img-fluid align-self-center" width="280px">');
				// }
			}
		});
	});

	//Delete user note ajax reqest
	$("body").on("click", ".resolveIcon", function(e){
		e.preventDefault();
		note_id = $(this).attr('id');
		Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, resolve it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: { note_id: note_id },
					success: function(response){
				    	Swal.fire(
				    		'Success!',
				    		'Complaint Resolved Successfully.',
				    		'success'
				    	)
				    	fetchAllNotes();
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