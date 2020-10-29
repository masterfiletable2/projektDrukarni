$(function(){
	$('#addMaterial').click(function(){
		$('#materialModal').modal({
			showClose: false,
			closeExisting: true,

			fadeDuration: 200,
			fadeDelay: 0.50
		});
		$('#materialForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Material");
		$('#action').val('Dodaj');
		$('#btn_action_material').val('addMaterial');

	});
	




	







	var materialdataTable = $('#materialList').DataTable({
		
		"lengthChange": false,
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"action.php",
			type:"POST",
			data:{action:'listMaterial'},
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
		"lengthMenu": [ 5, 10, 50,  100 ],
	});

	$(document).on('submit','#materialForm', function(event){
		event.preventDefault();
		$('#action').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#materialForm')[0].reset();
				$('#materialModal').modal({
					showClose: false,
				});				
				$('#action').attr('disabled', false);
				materialdataTable.ajax.reload();
			}
		})
	});

	$(document).on('click', '.updateMaterialBtn', function(){
		var id = $(this).attr("id");
		var btn_action_material = 'getMaterial';
		$.ajax({
			url:'action.php',
			method:"POST",
			data:{id:id, btn_action_material:btn_action_material},
			dataType:"json",
			success:function(data){
				$('#materialModal').modal({
                showClose: false,
                closeExisting: true,

                fadeDuration: 200,
                fadeDelay: 0.50
            });
				$('#inventoryid').val(data.inventoryid);
				$('#materialname').val(data.materialname);
				$('#quantity').val(data.quantity);
				$('#matrix').val(data.matrix);
				$('#refinement').val(data.refinement);
				$('#notes').val(data.notes);

				$('#id').val(id);
				$('#action').val('Edytuj');
				$('#btn_action_material').val('updateMaterial');
			}
		})
	});

	$(document).on('click','.deleteMaterialBtn', function(){
		var id = $(this).attr("id");
		var status  = $(this).data('status');
		var btn_action_material = 'deleteMaterial';
		if(confirm("Jesteś pewny, że chcesz usunąć Materiał?")) {
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, status:status, btn_action_material:btn_action_material},
				success:function(data){					
					materialdataTable.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
});







