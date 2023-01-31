$(document).ready(function(){
	$("#register-link").click(function(){
		$("#login-box").hide();
		$("#register-box").show();
	});
	$("#login-link").click(function(){
		$("#register-box").hide();
		$("#login-box").show();
	});
	$("#forgot-link").click(function(){
		$("#login-box").hide();
		$("#forgot-box").show();
	});
	$("#back-link").click(function(){
		$("#forgot-box").hide();
		$("#login-box").show();
	});

	//Register Ajax Request
	$("#register-btn").click(function(e){
		if($("#register-form")[0].checkValidity()){
			e.preventDefault();
			$("#register-spinner").show();
			if($("#rpassword").val() != $("#cpassword").val()){
				$("#passError").text('* Password did not matched.');
				$("#register-spinner").hide();
			} else {
				$("#passError").text('');
				$.ajax({
					url: 'assets/php/action.php',
					method: 'post',
					data: $("#register-form").serialize()+'&action=register',
					success: function(response){
						$("#register-spinner").hide();
						if (response === 'register') {
							window.location = 'home.php';
						} else {
							$("#regAlert").html(response);
						}
					}
				});
			}
		}
	});

	//Login Ajax Request
	$("#login-btn").click(function(e){
		if($("#login-form")[0].checkValidity()){
			e.preventDefault();
			$("#login-spinner").show();
			$.ajax({
				url: 'assets/php/action.php',
				method: 'post',
				data: $("#login-form").serialize()+'&action=login',
				success: function(response){
					$("#login-spinner").hide();
					if (response === 'login') {
						window.location = 'home.php';
					} else {
						$("#loginAlert").html(response);
					}
				}
			});	
		}
	});

	//Forgot Password Ajax Request
    $("#forgot-btn").click(function(e) {
        if ($("#forgot-form")[0].checkValidity()) {
            e.preventDefault();
            $("#forgot-spinner").show();
            $.ajax({
                url: 'assets/php/action.php',
                method: 'post',
                data: $("#forgot-form").serialize()+'&action=forgot',
                success: function (response) {
                	$("#forgot-spinner").hide();
                	$("#forgot-form")[0].reset();
                	$("#forgotAlert").html(response);
                }
            });
        }
    });
});


function validateAadhaar() {
	var regexp = /^[2-9]{1}[0-9]{3}-[0-9]{4}-[0-9]{4}$/;
	var ano = document.getElementById("uid").value;
	if (regexp.test(ano)) {
		return true;
	} else if (ano == '') {
		Swal.fire("UID is Mandatory", "", "error");
	} else {
		Swal.fire("Invalid UID", "", "error");
		document.getElementById('uid').value = '';
		return false;
	}
}

function addHyphen() {
	let ele = document.getElementById('uid');
	ele = ele.value.split('-').join(''); // Remove dash (-) if mistakenly entered.

	let finalVal = ele.match(/.{1,4}/g).join("-");
	document.getElementById('uid').value = finalVal;
}

function validateMobile() {
	var mobileNumber = document.getElementById("mobile_number").value;
	var expr = /^(0|91)?[6-9][0-9]{9}$/;
	if (!expr.test(mobileNumber)) {
		Swal.fire("Invalid Mobile Number", "", "error");
		document.getElementById('mobile_number').value = '';
	}
}