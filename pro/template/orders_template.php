<?php



function orders_template($thisOrder,$nameOfTypeOrders){


	// $parts = parse_url($_SERVER["REQUEST_URI"]);
	// 		$page_name = basename($parts['path']);

	// 		if($page_name == "orders"){
	// 			echo "KURDE;";
	// 		}


	$thisOrder->updateChckedNotification();



    if (isset($_SESSION["username"]) && $_SESSION['type_of_user'] == "admin" ||  $_SESSION['type_of_user'] == "worker" ||  $_SESSION['type_of_user'] == "client") {

    echo '
    
    <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                	
                		<div class="col-md-2" align="right">
                			<button type="button" name="add" id="addOrders" class="btn btn-success btn-xs">Dodaj Zlecenie</button>
                		</div>
                	</div>
                </div>
				<div class="panel-body">
                	<table id="'.$nameOfTypeOrders.'" class="dataTable table table-bordered table-striped">
						<thead>';
						echo '
							<tr>
								<th>ID</th>
								<th>Tytuł zlecenia</th>
								<th>Użytkownik</th>
								<th>Materiał</th>
								<th>Pracownik</th>
								<th>Status</th>
								<th>Uwagi</th>
								<th>Data utworzenia</th>';


								if($nameOfTypeOrders != "ordersListClosed"){
								echo '<th>Opcje</th>';
								}



								
							echo '	
							</tr>
						</thead>
					</table>
                </div>
            </div>
        </div>
	</div>
	

    <div id="ordersModal" class="modal .fade">
    	<div class="modal-dialog">
		<form method="post" id="ordersForm">
		<div class="modal-content">
			
			<div class="modal-body">
				
				
				<div class="form-group">
					<label>Tytuł zlecenia</label>
					<input type="text" name="order_title" id="order_title" class="form-control" required />
				</div>

				<div class="form-group">
				<label>Wybierz produkt</label>
					<select name="id_material" id="id_material" class="form-control" required>
						<option value="">-</option>';
						
						echo $thisOrder->ordersDropdownList("material","id_material","materialname");

						
					echo '
				</select>
				</div>
			


				<div class="form-group">
				<label>Na stanie magazynowym</label>
				<input type="text"  name="quantity" id="quantity" class="form-control" readonly   />
			</div>




				<div class="form-group">
				<label>Oczekiwana ilość</label>
				<input type="number" name="quantity_of_excepted" id="quantity_of_excepted" class="form-control" required />
			</div>



				<div class="form-group">
				<label>Przypisz praocwnika</label>
					<select name="id_user" id="id_user" class="form-control" required>
						<option value="">-</option>';
						
						echo $thisOrder->ordersDropdownList("tbl_member","id_user","username");

						// echo $thisOrder->ordersDropdownList("orders","id_order","order_status");

						
					echo '
				</select>
				</div>


			
				<div class="form-group">
				<label>Wybierz Status</label>
					<select name="order_status" id="order_status" class="form-control" required>
					  <option value="">-</option>
					  <option value="new">Nowy</option>
					  <option value="during">W trakcie</option>
					 <option value="client-response">Oczekiwanie na reakcję klienta</option>
					 <option value="cancel">Anulowany</option>
					 <option value="closed">Zakończony</option>


					</select>
				</div>



				<div class="form-group">
					<label>Uwagi</label>
					<textarea name="order_notes" id="order_notes" class="form-control" required></textarea>
				</div>

			</div>
			<div class="modal-footer">


						<input type="hidden" name="id_order" id="id_order" />
						<input type="hidden" name="quantity_of_alert" id="quantity_of_alert" />

				
    					<input type="hidden" name="btn_action_orders" id="btn_action_orders" />
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Dodaj" />
                        <a rel="modal:close" class="btn btn-default close-modal ">Anuluj</a>
			</div>
		</div>
	</form>
    			
    	</div>
    </div>
</div>	
    ';
}











// else if (isset($_SESSION["username"]) && $_SESSION['type_of_user'] == "worker") {

//     echo '
    
//     <div class="row">
// 		<div class="col-lg-12">
// 			<div class="panel panel-default">
//                 <div class="panel-heading">
                	
//                 		<div class="col-md-2" align="right">
//                 			<button type="button" name="add" id="addOrders" class="btn btn-success btn-xs">Dodaj Zlecenie</button>
//                 		</div>
//                 	</div>
//                 </div>
//                 <div class="panel-body">
//                 	<table id="'.$nameOfTypeOrders.'" class="dataTable table table-bordered table-striped">
//                 		<thead>
// 							<tr>
// 								<th>ID</th>
// 								<th>Tytuł zlecenia</th>
// 								<th>Użytkownik</th>
// 								<th>Materiał</th>
// 								<th>Pracownik</th>
// 								<th>Status</th>
// 								<th>Uwagi</th>
// 								<th>Data utworzenia</th>';


// 								if($nameOfTypeOrders != "ordersListClosed"){
// 								echo '<th>Opcje</th>';
// 								}
// 							echo '	
// 							</tr>
// 						</thead>
//                 	</table>
//                 </div>
//             </div>
//         </div>
// 	</div>
	

//     <div id="ordersModal" class="modal .fade">
//     	<div class="modal-dialog">
// 		<form method="post" id="ordersForm">
// 		<div class="modal-content">
			
// 			<div class="modal-body">
				
				
// 				<div class="form-group">
// 					<label>Tytuł zlecenia</label>
// 					<input type="text" name="order_title" id="order_title" class="form-control" required />
// 				</div>

// 				<div class="form-group">
// 				<label>Wybierz produkt</label>
// 					<select name="id_material" id="id_material" class="form-control" required>
// 						<option value="">-</option>';
						
// 						echo $thisOrder->ordersDropdownList("material","id_material","materialname");

						
// 					echo '
// 				</select>
// 				</div>
			


// 				<div class="form-group">
// 				<label>Na stanie magazynowym</label>
// 				<input type="text"  name="quantity" id="quantity" class="form-control" readonly   />
// 			</div>




// 				<div class="form-group">
// 				<label>Oczekiwana ilość</label>
// 				<input type="number" name="quantity_of_excepted" id="quantity_of_excepted" class="form-control" required />
// 			</div>



// 				<div class="form-group">
// 				<label>Przypisz praocwnika</label>
// 					<select name="id_user" id="id_user" class="form-control" required>
// 						<option value="">-</option>';
						
// 						echo $thisOrder->ordersDropdownList("tbl_member","id_user","username");

// 						// echo $thisOrder->ordersDropdownList("orders","id_order","order_status");

						
// 					echo '
// 				</select>
// 				</div>


			
// 				<div class="form-group">
// 				<label>Wybierz Status</label>
// 					<select name="order_status" id="order_status" class="form-control" required>
// 					  <option value="">-</option>
// 					  <option value="new">Nowy</option>
// 					  <option value="during">W trakcie</option>
// 					 <option value="client-response">Oczekiwanie na reakcję klienta</option>
// 					 <option value="cancel">Anulowany</option>
// 					 <option value="closed">Zakończony</option>


// 					</select>
// 				</div>



// 				<div class="form-group">
// 					<label>Uwagi</label>
// 					<textarea name="order_notes" id="order_notes" class="form-control" required></textarea>
// 				</div>

// 			</div>
// 			<div class="modal-footer">


// 						<input type="hidden" name="id_order" id="id_order" />

				
//     					<input type="hidden" name="btn_action_orders" id="btn_action_orders" />
//     					<input type="submit" name="action" id="action" class="btn btn-info" value="Dodaj" />
//                         <a rel="modal:close" class="btn btn-default close-modal ">Anuluj</a>
// 			</div>
// 		</div>
// 	</form>
    			
//     	</div>
//     </div>
// </div>	
//     ';
// }




// else{

// 	echo '
    
//     <div class="row">
// 		<div class="col-lg-12">
// 			<div class="panel panel-default">
//                 <div class="panel-heading">
                	
//                 		<div class="col-md-2" align="right">
//                 			<button type="button" name="add" id="addOrders" class="btn btn-success btn-xs">Dodaj Zlecenie</button>
//                 		</div>
//                 	</div>
//                 </div>
//                 <div class="panel-body">
//                 	<table id="ordersList" class="dataTable table table-bordered table-striped">
//                 		<thead>
// 							<tr>
// 								<th>ID</th>
// 								<th>Tytuł zlecenia</th>
// 								<th>Użytkownik</th>
// 								<th>Materiał</th>
// 								<th>Pracownik</th>
// 								<th>Status</th>
								
// 							</tr>
// 						</thead>
//                 	</table>
//                 </div>
//             </div>
//         </div>
// 	</div>
	

//     <div id="ordersModal" class="modal .fade">
//     	<div class="modal-dialog">
// 		<form method="post" id="ordersForm">
// 		<div class="modal-content">
			
// 			<div class="modal-body">
				
				
// 				<div class="form-group">
// 					<label>Tytuł zlecenia</label>
// 					<input type="text" name="order_title" id="order_title" class="form-control" required />
// 				</div>

// 				<div class="form-group">
// 				<label>Wybierz produkt</label>
// 					<select name="id_material" id="id_material" class="form-control" required>
// 						<option value="">-</option>';
						
// 						echo $thisOrder->ordersDropdownList();

						
// 					echo '
// 				</select>
// 				</div>
			


// 				<div class="form-group">
// 					<label>Uwagi</label>
// 					<textarea name="order_notes" id="order_notes" class="form-control" required></textarea>
// 				</div>

// 			</div>
// 			<div class="modal-footer">


// 						<input type="hidden" name="id_order" id="id_order" />

				
//     					<input type="hidden" name="btn_action_orders" id="btn_action_orders" />
//     					<input type="submit" name="action" id="action" class="btn btn-info" value="Dodaj" />
//                         <a rel="modal:close" class="btn btn-default close-modal ">Anuluj</a>
// 			</div>
// 		</div>
// 	</form>
    			
//     	</div>
//     </div>
// </div>	
// 	';
	
	
// }

}

?>