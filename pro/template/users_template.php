<?php

function users_template(){
    echo '<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                    <div class="row" align="right">
                         <button type="button" name="add" id="usersAdd" data-toggle="modal" data-target="#usersModal" class="btn btn-success btn-xs">Dodaj Użytkownika</button>   		
                    </div>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="usersList" class=" table table-bordered table-striped">
                            <thead><tr>
                                <th>ID Użytkownika</th>
                                <th>Nazwa Użytkownika</th>
                                <th>Typ Użytkownika</th>
                                <th>Email</th>
                                <th>Nr komórkowy Użytkownika</th>
                                <th>Data utworzenia konta</th>
                                <th>Edytuj</th>
                                <th>Usuń</th>
                                
                            </tr></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="usersModal" class="modal .fade">
    <div class="modal-dialog">
        <form method="post" id="usersForm">
            <div class="modal-content">
               
                <div class="modal-body">
                    <label>Nazwa Użytkownika</label>
                    <input type="text" name="users" id="users" class="form-control" required />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="usersId" id="usersId"/>
                    <input type="hidden" name="btn_action" id="btn_action"/>
                    <input type="submit" name="action" id="action" class="btn btn-info" value="Dodaj" />
                    <a rel="modal:close" class="btn btn-default close-modal ">Anuluj</a>
                </div>
            </div>
        </form>
    </div>
</div>';
}

?>