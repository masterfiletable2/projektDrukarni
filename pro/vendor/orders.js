$(function(){
	$('#addOrders').click(function(){
		$('#ordersModal').modal({
			showClose: false,
			closeExisting: true,

			fadeDuration: 200,
			fadeDelay: 0.50
		});
		$('#ordersForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Orders");
		$('#action').val('Dodaj');
		$('#btn_action_orders').val('addOrders');

	});
	

	$('#addOrder').click(function(event){
		
		$('#btn_action_orders').val('addOrder');

	});
	









//Processing of table values	
	let nameOfTable

	
	if(location.href.match(/([^\/]*)\/*$/)[1] == "orders")
		nameOfTable = "ordersList" 

		
	else if(location.href.match(/([^\/]*)\/*$/)[1] == "orders-new")
	nameOfTable = "ordersListNew" 

	else if(location.href.match(/([^\/]*)\/*$/)[1] == "orders-inprogress")
	nameOfTable = "ordersListInProgress" 

		else
		nameOfTable = "ordersListClosed";




	let ordersdataTable = $('#'+nameOfTable).DataTable({
		
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:nameOfTable},
			dataType:"json"
		},
		"columnDefs":[
			{
				"orderable":false,
			},
		],
		"language": {
            "lengthMenu": "Wyświetl _MENU_ elementów na stronę",
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
		"lengthMenu": [ 20, 50, 50,  200 ],
	});





	
// function parametrsOfTable(name){
// 	$("#"+name).DataTable(
// 	{

// 		"lengthChange": false,
// 		"processing":true,
// 		"serverSide":true,
// 		"order":[],
// 		"ajax":{
// 			url:"action.php",
// 			type:"POST",
// 			data:{action:name},
// 			dataType:"json"
// 		},
// 		"columnDefs":[
// 			{
// 				"orderable":false,
// 			},
// 		],
// 		"language": {
// 			"lengthMenu": "Wyświetl _MENU_ elementów na stronę",
// 			"zeroRecords": "Nie znaleziono elementów",
// 			"info": "Strona _PAGE_ z _PAGES_",
// 			"infoEmpty": "Elementy nie są dostępne",
// 			"infoFiltered": "(odfiltrowane z _MAX_ wszystkich rekordów)",
// 			"search":" Szukaj",
// 			"paginate": {
// 				"first":      "Pierwszy",
// 				"last":       "Ostatni",
// 				"next":       "Następny",
// 				"previous":   "Poprzedni"
// 			},

// 		},
		
// 		"lengthChange": true,
// 		"lengthMenu": [ 5, 10, 50,  100 ],
// 	})
// }


// parametrsOfTable("ordersList")
// parametrsOfTable("ordersListClosed")

	





	

	$(document).on('submit','#ordersForm', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){	
				$("body").append('<div class="server-response success-msg">Zlecenie zostało dodane pomyślnie</div>')
				$('#ordersForm')[0].reset();
				$('#ordersModal').modal({
					showClose: false,
				});				
				$('#action').attr('disabled', false);
				ordersdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.updateOrdersBtn', function(){
		var id_order = $(this).attr("id");
		var btn_action_orders = 'getOrders';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id_order:id_order, btn_action_orders:btn_action_orders},
			dataType:"json",
			success:function(data){
				$('#ordersModal').modal({
                showClose: false,
                closeExisting: true,

                fadeDuration: 200,
                fadeDelay: 0.50
            });
				$('#order_title').val(data.order_title);
				$('#id_material').val(data.id_material);
				$('#id_user').val(data.id_worker);
				$('#order_status').val(data.order_status);
				$('#order_notes').val(data.order_notes);
				$('#quantity').val(data.quantity);
				$('#quantity_of_excepted').val(data.quantity_of_excepted);
				$('#id_order').val(id_order);
				$('#action').val('Edytuj');
				$('#btn_action_orders').val('updateOrders');
			}
		})
	});




	

	$(document).on('click','.deleteOrdersBtn', function(){
		var id_order = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action_orders = 'deleteOrders';
		if(confirm("Jesteś pewny, że chcesz usunąć Materiał?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id_order:id_order, status:status, btn_action_orders:btn_action_orders},
				success:function(data){					
					ordersdataTable.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
});







