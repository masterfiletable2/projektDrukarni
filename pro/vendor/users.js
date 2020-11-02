$(function(){


	
	var usersData = $('#usersList').DataTable({
		
		"processing":true,
		"serverSide":true,
		stateSave: true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'usersList'},
			dataType:"json"
		},
	
		"language": {
            "lengthMenu": "Wyświetl _MENU_ elementy na stronę",
            "zeroRecords": "Nie znaleziono elementów",
            "info": "Strona _PAGE_ z _PAGES_",
            "infoEmpty": "Elementy nie są dostępne",
			"infoFiltered": "(odfiltrowane z _MAX_ wszystkich rekordów)",
			"search":" Szukaj",
			"paginate": {
				"first":      "Pierwszy",
				"last":       "Ostatni",
				"next":       "Następny",
				"previous":   "Poprzedni"
			},
		},
		
		"lengthChange": true,
		"lengthMenu": [ 5, 10, 50,  100 ],
		
		// drawCallback:function(){
			
		// 	$(this).find("td:contains('client')").hide()
		// $(this).find("td:contains('client')").hide()

			
			
		// 	}
	});	
	$(document).on('submit','#usersForm', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data) {
				$('#usersForm')[0].reset();
				$('#usersModal').modal({
					showClose: false,
				});
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				usersData.ajax.reload();
			}
		})
	});	

	$('#usersAdd').click(function(){
		$('#usersForm')[0].reset();
		$('#usersModal').modal({
			showClose: false,
			closeExisting: true,

			fadeDuration: 200,
  			fadeDelay: 0.50
		});
		$('.modal-title').html("<i class='fa fa-plus'></i> Dodaj Użytkownika");
		$('#btn_action').val('usersAdd');
	});		
	

	
	$(document).on('click', '.update', function(){
		var usersId = $(this).attr("id");
		var btnAction = 'getUsers';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{usersId:usersId, btn_action:btnAction},
			dataType:"json",
			success:function(data) {
				$('#usersModal').modal({
					showClose: false,
			closeExisting: true,

			fadeDuration: 200,
  			fadeDelay: 0.50
				});


				
				$('#username').val(data.username);

				$('#email').val(data.email);
				$('#type_of_user').val(data.type_of_user);
				$('#mobile').val(data.mobile);
				$('#nip').val(data.nip);
				$('#company').val(data.company);
				$('#adress').val(data.adress);


				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edytuj Użytkownika");
				$('#usersId').val(usersId);
				$('#action').val('Edytuj');
				$('#btn_action').val("updateUsers");




				
			}
		})



	});	





	
	$(document).on('click', '.delete', function(){
		var usersId = $(this).attr('id');
		var btn_action = 'deleteUsers';
		if(confirm("Czy jesteś pewny, że chcesz usunąć Użytkownika?")) {

			$.ajax({
				url:"action.php",
				method:"POST",
				data:{usersId:usersId,btn_action:btn_action},
				success:function(data) {
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					usersData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	


	$(document).on('click', '.status', function(){
		var usersId = $(this).attr('id');
		var status = $(this).val();
		var btn_action = 'toggleStatus';
		

			$.ajax({
				url:"action.php",
				method:"POST",
				data:{usersId:usersId, status:status, btn_action:btn_action},
				success:function(data) {
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					usersData.ajax.reload();
					
				}
			})
		
	});	
















	
//Separation of users Types Roles


$( document ).ajaxComplete(function() {


  function getTypeOfUser(typeOfUser){
    var type_of_user = $(".type_of_user").index() +1

    $("td:nth-child("+type_of_user+")").each(function(){


    if($(this).text() == typeOfUser) {
    $(this).parent().remove()
    }
    })
  }


  getTypeOfUser("admin")
  
  
if(window.location.pathname.split("/").pop() == "workers"){
  getTypeOfUser("client")
$("#usersAdd").remove()

}

if(window.location.pathname.split("/").pop() == "clients"){
  getTypeOfUser("worker")
$("#usersAdd").remove()

}


})


















/* user-template - chowanie hasła przy zmianie*/

$("#usersModal #showPasswordContent").click(function(){
	$(".content-password").toggle();
	$("#showPasswordContent").show();
  
  
	if($(".content-password").css("display") == "block"){
	$(".content-password #password").attr("required","")
  
  
	}
	else{
	$(".content-password #password").removeAttr("required")
	
  
	}
  })
  
  
  $( document ).ajaxComplete(function() {
  
	
  
  
  
	$("#usersAdd").click(function(){
	  $(".content-password").show();
	  $("#showPasswordContent").hide();
	  $(".content-password #password").attr("required","")
  
	})
  
  
  
  
	$(".update").click(function(){
	  $(".content-password #password").removeAttr("required")
  
	  $("#showPasswordContent").show();
	$(".content-password").hide();
	$("#showPasswordContent").show();
	})
  })
  
})