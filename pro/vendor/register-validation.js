
function signupValidation() {
	var valid = true;

	$("#username,#email,#password,#confirm-password").removeClass("error-field");


	var UserName = $("#username").val();
	var email = $("#email").val();
	var Password = $('#signup-password').val();
	var ConfirmPassword = $('#confirm-password').val();
	var NIP = $('#nip').val();
	var Adress = $('#adress').val();
	var Mobile = $('#mobile').val();
	var Company = $('#company').val();

	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#username-info,email-info").html("").hide();


	function errorLog(elementName){
		$(elementName+'-info').html("<br>wymagane").css("color", "#ee0000").show();
		// $(elementName).addClass("error-field");
		valid = false;
	}
	if (UserName.trim() == "") {
		errorLog("#username")
	
	}
	if (email == "") {
		errorLog("#email")
	
	} else if (email.trim() == "") {
		errorLog("#email")

	} else if (!emailRegex.test(email)) {
		errorLog("#email")

	}
	if (Password.trim() == "") {
		errorLog("#signup-password")
	
	}
	if (ConfirmPassword.trim() == "") {
		errorLog("#nip")
	}


	if (ConfirmPassword.trim() == "") {
		errorLog("#adress")
	}


	if (ConfirmPassword.trim() == "") {
		errorLog("#mobile")
	}


	if (ConfirmPassword.trim() == "") {
		errorLog("#company")
	}


	if(Password != ConfirmPassword){
        $("#error-msg").html("Hasła muszą być takie same.").show();
        valid=false;
    }
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}