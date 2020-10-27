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
				});
				$('#users').val(data.name);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edytuj Użytkownika");
				$('#usersId').val(usersId);
				$('#action').val('Edytuj');
				$('#btn_action').val("updateUsers");
			}
		})
	});	
	$(document).on('click', '.delete', function(){
		var usersId = $(this).attr('id');
		var status = $(this).data("status");
		var btn_action = 'deleteUsers';
		if(confirm("Czy jesteś pewny, że chcesz usunąć Użytkownika?")) {

			$.ajax({
				url:"action.php",
				method:"POST",
				data:{usersId:usersId, status:status, btn_action:btn_action},
				success:function(data) {
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					usersData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
 });
