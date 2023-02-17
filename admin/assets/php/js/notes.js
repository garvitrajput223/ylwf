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
				$("#getTitle").text(''+data.title);
				$("#getData").text(''+data.note);
				$("#getLostDate").text(''+data.lostDate);
				//$("#getPlace").text('Location: '+data.city_name);
				$("#getAddress").text(''+data.city_name+', '+data.district_name+', '+data.state_name+' - '+data.pin_code);
				// if(data.photo != ''){
				// 	$("#getImage").html('<img src="../assets/php/'+data.photo+'" class="img-fluid align-self-center" width="280px">');
				// } else {
				// 	$("#getImage").html('<img src="../assets/img/profiles/avatar.png" class="img-fluid align-self-center" width="280px">');
				// }
			}
		});
	});

//POLICE STATIONS USING DROPDOWN
$.ajax({
	url: 'assets/php/get_police_data.php',
	type: 'get',
	dataType: 'json',
	success: function(response) {
		var len = response.length;
		for (var i = 0; i < len; i++) {
			var id = response[i]['id'];
			var name = response[i]['name'];
			$("#policeStations").append("<option value='" + id + "' data-value2='" + name + "'>" + name + "</option>");
			$("#policeStations1").append("<option value='" + id + "' data-value2='" + name + "'>" + name + "</option>");

		}
	}
});


//Complaint Forwarding
$("#forward").click(function(e){
	note_id = $(this).attr('id');
	if($("#forwardComplaint")[0].checkValidity()){
		e.preventDefault();
		$.ajax({
			url:'assets/php/admin-action.php',
			method: 'post',
			data: { note_id: note_id },
			//data:$("#forwardComplaint").serialize()+'&action=forwardComplaint',
			success: function(response){
				Swal.fire({
					title: 'Complaint Forwarded.',
					icon: 'success'
				});
				fetchAllNotes();
			}
		})
	}
})




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