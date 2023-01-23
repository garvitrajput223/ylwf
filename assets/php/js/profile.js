$(document).ready(function(){



	$.ajax({
		url: 'assets/php/get_data.php',
		type: 'get',
		dataType: 'json',
		success: function(response) {
			var len = response.length;
			for (var i = 0; i < len; i++) {
				var id = response[i]['state_id'];
				var name = response[i]['state_name'];
				$("#state").append("<option value='" + id + "'>" + name + "</option>");
			}
		}
	});

	// Retrieve list of districts based on selected state
	$("#state").change(function() {
		var state_id = $(this).val();
		$.ajax({
			url: 'assets/php/get_data.php',
			type: 'get',
			data: {state_id: state_id},
			dataType: 'json',
			success: function(response) {
				$("#district").empty();
				$("#district").append("<option value=''>Select District</option>");
				var len = response.length;
				for (var i = 0; i < len; i++) {
					var id = response[i]['district_id'];
					var name = response[i]['district_name'];
					$("#district").append("<option value='" + id + "'>" + name + "</option>");
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
			data: {district_id: district_id},
			dataType: 'json',
			success: function(response) {
				$("#city").empty();
				$("#city").append("<option value=''>Select City</option>");
				var len = response.length;
				for (var i = 0; i < len; i++) {
					var id = response[i]['city_id'];
					var name = response[i]['city_name'];
					$("#city").append("<option value='" + id + "'>" + name + "</option>");
				}
			}
		});
	});


	
	//Profile Update Ajax Request
	$("#profile-update-form").submit(function(e){
		e.preventDefault();
		$("#edit-profile-spinner").show();
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			processData: false,
			contentType: false,
			cache: false,
			data: new FormData(this),
			success: function(response){
				$("#edit-profile-spinner").hide();
				location.reload();
			}
		});
	});
	
	

	//Change password Ajax Request
	$("#changePassBtn").click(function(e){
		if($("#change-pass-form")[0].checkValidity()){
			e.preventDefault();
			$("#change-pass-spinner").show();
			$.ajax({
				url: 'assets/php/process.php',
				method: 'post',
				data: $("#change-pass-form").serialize()+'&action=change_pass',
				success: function(response){
					$("#changePassError").html(response);
					$("#change-pass-spinner").hide();
					$("#change-pass-form")[0].reset();
				}
			});
		}
	});

	//Verify email ajax request
	$("#verify-email").click(function(e){
		e.preventDefault();
		$(this).text('Please Wait');
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { action: 'verify_email' },
			success: function(response){
				$("#verifyEmailAlert").html(response);
				$("#verify-email").text('Verify Now!');
			}
		});
	});
	
	checkNotification();
	
	function checkNotification() {
		$.ajax({
			url: 'assets/php/process.php',
			method: 'post',
			data: { action: 'checkNotification' },
			success: function(response) {
				$("#checkNotification").html(response);
			}
		});
	}
});