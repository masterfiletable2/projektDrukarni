<?php



function material_template($thisMaterial){

    
    echo '
    
    <div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                	
                		<div class="col-md-2" align="right">
                			<button type="button" name="add" id="addMaterial" class="btn btn-success btn-xs">Dodaj Materiał</button>
                		</div>
                	</div>
                </div>
                <div class="panel-body">
                	<table id="materialList" class="dataTable table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Magazyn</th>
								<th>Nazwa materiału</th>
								<th>Matryca</th>
								<th>Uszlachetnienie</th>
								<th>Ilość</th>
								<th>Uwagi</th>
								<th>Opcje</th>
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>
    <div id="materialModal" class="modal .fade">
    	<div class="modal-dialog">
    		<form method="post" id="materialForm">
    			<div class="modal-content">
    				
    				<div class="modal-body">
						<div class="form-group">
						<label>Wybierz magazyn</label>
    						<select name="inventoryid" id="inventoryid" class="form-control" required>
                                <option value="">Wybierz magazyn</option>';
                                
							echo $thisMaterial->inventoryDropdownList();

                            
                        echo '
                        </select>
    					</div>
    				
						
						<div class="form-group">
							<label>Nazwa materiału</label>
							<input type="text" name="materialname" id="materialname" class="form-control" required />
						</div>

						<div class="form-group">
							<label>Ilość materiału</label>
							<input type="number" min="0" max="999" name="quantity" id="quantity" class="form-control" required />
						</div>

						<div class="form-group">
							<label>Matryca</label>
							<input type="text" name="matrix" id="matrix" class="form-control" required />
						</div>


						<div class="form-group">
							<label>Uszlachetnienie</label>
								<select name="refinement" id="refinement" class="form-control" required>
									<option value="">-</option>
									<option value="Tak">Tak</option>
									<option value="Nie">Nie</option>
								</select>
						</div>


						<div class="form-group">
							<label>Uwagi</label>
							<textarea name="notes" id="notes" class="form-control" required></textarea>
						</div>

    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id_material" id="id_material" />
    					<input type="hidden" name="btn_action_material" id="btn_action_material" />
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

?>