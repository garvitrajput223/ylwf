$(document).ready(function(){
          $(".create-police-station").click(function(){
          $("#addPoliceStations").show();
		  $("#allStations").hide();
		  $("#addUsersForm").hide();
		  $("#assignNewPincode").hide();

        });
        $(".add-users").click(function(){
            $("#addUsersForm").show();
			$("#allStations").hide();
			$("#addPoliceStations").hide();
			$("#allStations").hide();
			$("#assignNewPincode").hide();
          });
      
          $(".assign-pincodes").click(function(){
            $("#assignNewPincode").show();
			$("#allStations").hide();
			$("#addPoliceStations").hide();
            $("#addUsersForm").hide();
          });

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

    //Creating new Police Station
    $("#addStnBtn").click(function(e){
        if($("#stnForm")[0].checkValidity()){
            e.preventDefault();
            $.ajax({
                url:'assets/php/admin-action.php',
                method: 'post',
                data: $("#stnForm").serialize()+'&action=add_station',
                success: function(response){
                    Swal.fire({
						title: 'Station Added Successfully.',
						icon: 'success'
					});
                }
            })
        }
    });


	//CREATING STATION USERS THROUGH ADMIN PANEL
	$("#createStationUser").click(function(e){
        if($("#UserAddForm")[0].checkValidity()){
            e.preventDefault();
            $.ajax({
                url:'assets/php/admin-action.php',
                method: 'post',
                data: $("#UserAddForm").serialize()+'&action=addStationUser',
                success: function(response){
                    Swal.fire({
						title: 'User Created Successfully.',
						icon: 'success'
					});
                }
            })
        }
    })
	//Assigning Pincodes to Stations
});