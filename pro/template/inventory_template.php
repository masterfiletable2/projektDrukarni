<?php

function inventory_template(){
    echo '<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="row" align="right">
                         <button type="button" name="add" id="inventoryAdd" data-toggle="modal" data-target="#inventoryModal" class="btn btn-success btn-xs">Dodaj Magazyn</button>   		
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="inventoryList" class=" table table-bordered table-striped">
                            <thead><tr>
                                <th>ID Magazynu</th>
                                <th>Nazwa Magazynu</th>
                                <th>Status</th>
                                <th>Opcje</th>
                            </tr></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="inventoryModal" class="modal .fade">
    <div class="modal-dialog">
        <form method="post" id="inventoryForm">
            <div class="modal-content">
               
                <div class="modal-body">
                    <label>Nazwa Magazynu</label>
                    <input type="text" name="inventory" id="inventory" class="form-control" required />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="inventoryId" id="inventoryId"/>
                    <input type="hidden" name="btn_action_inventory" id="btn_action_inventory"/>
                    <input type="submit" name="action" id="action" class="btn btn-info" value="Dodaj" />
                    <a rel="modal:close" class="btn btn-default close-modal ">Anuluj</a>
                </div>
            </div>
        </form>
    </div>
</div>';
}

?>