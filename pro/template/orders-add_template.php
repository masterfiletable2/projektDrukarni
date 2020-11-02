<?php



function orders_add_template($thisOrder){

    
    echo '
    
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
						<label>Oczekiwana ilość</label>
						<input type="number" name="quantity_of_excepted" id="quantity_of_excepted" class="form-control" required />
					</div>


						<div class="form-group">
							<label>Uwagi</label>
							<textarea name="order_notes" id="order_notes" class="form-control" required></textarea>
						</div>

    				</div>
					<div class="modal-footer">

					<input type="hidden" name="id_order" id="id_order" />

						<input type="hidden" name="btn_action_orders" id="btn_action_orders" />

						<input type="submit" name="add" id="addOrder" class="addOrder btn btn-info" value="Dodaj" />

						
    				</div>
    			</div>
    		</form>
    
    ';
}

?>

<!-- <input type="hidden" name="id_order" id="id_order" /> -->
