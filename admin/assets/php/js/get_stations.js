$(document).ready(function () {


	//FETCHING ALL POLICE STATIONS 
	fetchAllStations();

	function fetchAllStations(){
		$.ajax({
			url: 'assets/php/admin-action.php',
			method: 'post',
			data: { action: 'fetchAllStations' },
			success: function(response){
				$("#showAllStations").html(response);
				if ($('.datatable').length > 0) {
			        $('.datatable').DataTable({
			            "bFilter": true,
			            "order": [[ 0, "desc" ]]
			        });
			    }	
			}
		});
	}



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

	//PINCODES BASED ON DISTRICT ID OF POLICE STATIONS
	$("#policeStations").change(function() {
		var id = $(this).val();
		$.ajax({
			url: 'assets/php/get_police_data.php',
			type: 'get',
			data: { 'id': id },
			dataType: 'json',
			success: function(response) {
				var len = response.length;
				$("#pincodes").empty();
				$("#pincodes").append("<option value='' selected disabled>Select Pincode</option>");
				for (var i = 0; i < len; i++) {
					var pin_code = response[i]['pin_code'];
					$("#pincodes").append("<option value='" + pin_code + "'>" + pin_code + "</option>");
				}
			}
		});
	});
	
});