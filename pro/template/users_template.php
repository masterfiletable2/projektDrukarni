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
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Avatar</th>
                                    <th>Nazwa Użytkownika</th>
                                    <th>Email</th>
                                    <th class="type_of_user">Typ Użytkownika</th>
                                    <th>Nr komórkowy</th>
                                    <th>NIP</th>
                                    <th>Nazwa Firmy</th>
                                    <th>Adres Firmy</th>
                                    <th>Data rejestracji</th>
                                    <th>Status</th>
                                    <th>Opcje</th>
                                </tr>
                            </thead>
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
                    <div class="form-group">
                        <label>Nazwa Użytkownika</label>
                        <input type="text" name="username" id="username" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label>Hasło</label>
                        <input type="text" name="password" id="password" class="form-control" required />
                    </div>

                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="form-control" required />
                    </div>
                   

                     <div class="form-group">
                     <label>Typ użytkownika</label>
                     <select name="type_of_user" id="type_of_user" class="form-control" required>
                                <option value="">-</option>
                                <option value="admin">Admin</option>
                                <option value="worker">Pracownik</option>
                                <option value="client">Klient</option>
                    </select>
                  </div>
                   
                   <div class="form-group">
                        <label>Numer komórkowy</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" required />
                     </div>

                     <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" required />
                     </div>

                     <div class="form-group">
                        <label>Nazwa firmy</label>
                        <input type="text" name="company" id="company" class="form-control" required />
                     </div>

                     <div class="form-group">
                        <label>Adres Firmy</label>
                        <input type="text" name="adress" id="adress" class="form-control" required />
                     </div>


                    
                    

                  
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