$(document).ready(function () {

	$.ajax({
		url: 'assets/php/get_data.php',
		type: 'get',
		dataType: 'json',
		success: function(response) {
			var len = response.length;
			for (var i = 0; i < len; i++) {
				var id = response[i]['state_id'];
				var name = response[i]['state_name'];
				$("#state").append("<option value='" + id + "' data-value2='" + name + "'>" + name + "</option>");
			}
		}
	});

	// Retrieve list of districts based on selected state
	$("#state").change(function() {
		var state_id = $(this).val();
		$.ajax({
			url: 'assets/php/get_data.php',
			type: 'get',
			data: { 'state_id': state_id },
			dataType: 'json',
			success: function(response) {
				var len = response.length;
				$("#district").empty();
				$("#city").empty();
				$("#city").append("<option value='' selected disabled>Select Area</option>");
				$("#district").append("<option value='' selected disabled>Select District</option>");
				for (var i = 0; i < len; i++) {
					var id = response[i]['district_id'];
					var name = response[i]['district_name'];
					$("#district").append("<option value='" + id + "'data-value2='" + name + "'>" + name + "</option>");
				}
			}
		});
	});

	// Retrieve list of cities based on selected district
	$("#district").change(function() {
		var district_id = $(this).val();
		$.ajax({
			url: 'assets/php/get_data.php',
			type: 'get',
			data: { 'district_id': district_id},
			dataType: 'json',
			success: function(response) {
				var len = response.length;
				$("#city").empty();
				$("#city").append("<option value='' selected disabled>Select Area</option>");
				for (var i = 0; i < len; i++) {
					var id = response[i]['city_id'];
					var name = response[i]['city_name'];
					$("#city").append("<option value='" + id + "'data-value2='" + name + "'>" + name + "</option>");
				}
			}
		});
	});
	

	//Add New Note Ajax Request
	$("#addNoteBtn").click(function (e) {
		if ($("#add-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#add-note-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#add-note-form").serialize() + '&action=add_note',
				success: function (response) {
					$("#add-note-spinner").hide();
					$("#add-note-form")[0].reset();
					$("#addNoteModal").modal('hide');
					Swal.fire({
						title: 'Complaint Added Successfully.',
						icon: 'success'
					});

					displayAllNotes();
				}
			});
		}
	});




	//Edit note of an user Ajax Request
	$("body").on("click", ".editBtn", function (e) {
		e.preventDefault();
		edit_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: {
				edit_id: edit_id
			},
			success: function (response) {
				data = JSON.parse(response);
				$("#id").val(data.id);
				$("#title").val(data.title);
				$("#note").val(data.note);
			}
		});
	});

	//Update Note of an user Ajax Request
	$("#editNoteBtn").click(function (e) {
		if ($("#edit-note-form")[0].checkValidity()) {
			e.preventDefault();
			$("#edit-note-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#edit-note-form").serialize() + '&action=update_note',
				success: function (response) {
					$("#edit-note-spinner").hide();
					$("#edit-note-form")[0].reset();
					$("#editNoteModal").modal('hide');
					Swal.fire({
						title: 'Complaint Edited Successfully.',
						icon: 'success'
					});

					displayAllNotes();
				}
			});
		}
	});

	//Delete note of an user
	$("body").on("click", ".deleteBtn", function (e) {
		e.preventDefault();
		delete_id = $(this).attr('id');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: 'assets/php/process.php',
					method: 'post',
					data: {
						delete_id: delete_id
					},
					success: function (response) {
						Swal.fire(
							'Deleted!',
							'Complaint Deleted Successfully.',
							'success'
						)

						displayAllNotes();
					}
				});
			}
		});
	});

	//Display note of an user
	$("body").on("click", ".infoBtn", function (e) {
		e.preventDefault();
		info_id = $(this).attr('id');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: {
				info_id: info_id
			},
			success: function (response) {
				data = JSON.parse(response);
				Swal.fire({
					title: '<strong>Complaint : ID(' + data.id + ')</strong>',
					icon: 'info',
					html: '<b>Title: </b>' + data.title + '<br><br><b>Complaint: </b>' + data.note + '<br><br><b>Location: </b>' +data.city_name+ ','+data.district_name+', '+data.state_name+' - '+data.pin_code + '<br><br><b>Lost On: </b>' + data.lostDate + '<br><br><b>Written on: </b>' + data.created_at + '<br><br><b>Updated on: </b>' + data.updated_at,
					showCloseButton: true
				});
			}
		});
	});

	checkNotification();

	function checkNotification() {
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: {
				action: 'checkNotification'
			},
			success: function (response) {
				$("#checkNotification").html(response);
			}
		});
	}


	displayAllNotes();

	function displayAllNotes() {
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: {
				action: 'display_notes'
			},
			success: function (response) {
				$("#showNote").html(response);
				if ($('.datatable').length > 0) {
					$('.datatable').DataTable({
						"bFilter": true,
						"order": [
							[0, "desc"]
						]
					});
				}
			}
		});
	}

	//Checking user logged in or not
	$.ajax({
		url: 'assets/php/action.php',
		method: 'post',
		data: {
			action: 'checkUser'
		},
		success: function (response) {
			if (response === 'bye') {
				window.location = 'index.php';
			}
		}
	});
});