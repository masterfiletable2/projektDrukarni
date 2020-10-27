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
								<th>ID Materiału</th>
								<th>Magazyn</th>
								<th>Ilość materiału</th>
								<th>Status</th>
								<th>Edytuj</th>
								<th>Usuń</th>
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
    						<select name="inventoryid" id="inventoryid" class="form-control" required>
                                <option value="">Wybierz magazyn</option>';
                                
							echo $thisMaterial->inventoryDropdownList();

                            
                        echo '
                        </select>
    					</div>
    					<div class="form-group">
							<label>Wprowadź ilość materiału</label>
							<input type="number" min="1" max="999" name="materialname" id="materialname" class="form-control" required />
						</div>
    				</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
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