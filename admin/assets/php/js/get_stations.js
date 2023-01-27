$(document).ready(function () {

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
			}
		}
	});
	// $("#policeStations").change(function() {
	// 	var station_id = $(this).val();
	// 	$.ajax({
	// 		url: 'assets/php/get_police_data.php',
	// 		type: 'get',
	// 		data: { 'id': station_id },
	// 		dataType: 'json',
	// 		success: function(response) {
	// 			var len = response.length;
	// 			$("#pincodes").append("<option value='' selected disabled>Select Area</option>");
	// 			for (var i = 0; i < len; i++) {
	// 				var id = response[i]['district_id'];
	// 				var name = response[i]['district_name'];
	// 				$("#pincodes").append("<option value='" + id + "'data-value2='" + name + "'>" + name + "</option>");
	// 			}
	// 		}
	// 	});
	// });
});