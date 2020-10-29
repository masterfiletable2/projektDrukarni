$(function(){

	var inventoryData = $('#inventoryList').DataTable({
	
		"processing":true,
		"serverSide":true,
		stateSave: true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'inventoryList'},
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
	$(document).on('submit','#inventoryForm', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data) {
				$('#inventoryForm')[0].reset();
				$('#inventoryModal').modal({
					showClose: false,
				});
				$('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
				$('#action').attr('disabled', false);
				inventoryData.ajax.reload();
			}
		})
	});	

	$('#inventoryAdd').click(function(){
		$('#inventoryForm')[0].reset();
		$('#inventoryModal').modal({
			showClose: false,
			closeExisting: true,

			fadeDuration: 200,
  			fadeDelay: 0.50
		});
		$('.modal-title').html("<i class='fa fa-plus'></i> Dodaj Magazyn");
		$('#btn_action_inventory').val('inventoryAdd');
	});		
	
	$(document).on('click', '.updateInventoryBtn', function(){
		var inventoryId = $(this).attr("id");
		var btn_action_inventory_inventory = 'getInventory';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{inventoryId:inventoryId, btn_action_inventory:btn_action_inventory_inventory},
			dataType:"json",
			success:function(data) {
				$('#inventoryModal').modal({
					showClose: false,
					closeExisting: true,
		
					fadeDuration: 200,
					  fadeDelay: 0.50
				});
				$('#inventory').val(data.name);
				$('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edytuj Magazyn");
				$('#inventoryId').val(inventoryId);
				$('#action').val('Edytuj');
				$('#btn_action_inventory').val("updateInventory");
			}
		})
	});	
	$(document).on('click', '.deleteInventoryBtn', function(){
		var inventoryId = $(this).attr('id');
		var status = $(this).data("status");
		var btn_action_inventory = 'deleteInventory';
		if(confirm("Czy jesteś pewny, że chcesz usunąć Magazyn?")) {

			$.ajax({
				url:"action.php",
				method:"POST",
				data:{inventoryId:inventoryId, status:status, btn_action_inventory:btn_action_inventory},
				success:function(data) {
					$('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
					inventoryData.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
});
