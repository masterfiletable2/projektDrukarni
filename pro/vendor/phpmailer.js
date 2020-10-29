
$(function(){
	$('#email-verify-btn').click( function(){



    let email = $("#email").val();
	const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;


	if (email == "") {
        $("body").append(`<div class="server-response error-msg">Popraw adres e-mail</div>`)

            return false;
        
	
	} else if (email.trim() == "") {
        $("body").append(`<div class="server-response error-msg">Popraw adres e-mail</div>`)

            return false;
        

	} else if (!emailRegex.test(email)) {
        $("body").append(`<div class="server-response error-msg">Popraw adres e-mail</div>`)
        
            return false;
    }   
    
    else{
        $("body").append(`<div class="server-response success-msg">Trwa wysyłanie maila</div>`)

    }

		var usersId = $(this).attr('id');
        var btn_action = 'emailVerify';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{usersId:usersId, btn_action:btn_action, email:email},
			success:function(data) {

                $("body").append(`<div class="server-response success-msg">Hasło zostało przesłane na podany adres email: ${email}</div>`)



                    
			}
		})
	});	


    






    
})