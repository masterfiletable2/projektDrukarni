<?php

namespace Phppot;

class Users
{

	private $usersTable = 'tbl_member';


    
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }




// Users functions
public function getUsersList(){		
    $sqlQuery = "SELECT * FROM ".$this->usersTable." ";
    if(!empty($_POST["search"]["value"])){
        $sqlQuery .= 'WHERE (name LIKE "%'.$_POST["search"]["value"].'%" ';
       		
    }
    if(!empty($_POST["order"])){
        $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    } else {
        $sqlQuery .= 'ORDER BY id DESC ';
    }
    if($_POST["length"] != -1){
        $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }	
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);
    $numRows = mysqli_num_rows($result);
    $usersData = array();	
    while( $users = mysqli_fetch_assoc($result) ) {		
        $usersRows = array();
      
        $usersRows[] = $users['id'];
        $usersRows[] = $users['username'];
        $usersRows[] = $users['type_of_user'];
        $usersRows[] = $users['mobile'];
        $usersRows[] = $users['create_at'];
        $usersRows[] = $users['email'];

			
        $usersRows[] = '<button type="button" name="update" id="'.$users["id"].'" class="btn btn-warning btn-xs update"><i class="fas fa-pen-square"></i></button>';
        $usersRows[] = '<button type="button" name="delete" id="'.$users["id"].'" class="btn btn-danger btn-xs delete" ><i class="fas fa-trash-alt"></i></button>';
        $usersData[] = $usersRows;
    }
    $output = array(
        "draw"				=>	intval($_POST["draw"]),
        "recordsTotal"  	=>  $numRows,
        "recordsFiltered" 	=> 	$numRows,
        "data"    			=> 	$usersData
    );
    echo json_encode($output);
}


public function saveUsers() {		
    $sqlInsert = "
        INSERT INTO ".$this->usersTable."(name) 
        VALUES ('".$_POST['users']."')";		
    mysqli_query($this->ds->getConnection(), $sqlInsert);
    echo 'New Users Added';
}	
public function getUsers(){
    $sqlQuery = "
        SELECT * FROM ".$this->usersTable." 
        WHERE id = '".$_POST["id"]."'";
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);
}
public function updateUsers() {
    if($_POST['users']) {	
        $sqlInsert = "
            UPDATE ".$this->usersTable." 
            SET name = '".$_POST['users']."'
            WHERE id = '".$_POST["id"]."'";	
        mysqli_query($this->ds->getConnection(), $sqlInsert);	
        echo 'Users Update';
    }	
}	
public function deleteUsers(){
    $sqlQuery = "
        DELETE FROM ".$this->usersTable." 
        WHERE id = '".$_POST["id"]."'";		
    mysqli_query($this->ds->getConnection(), $sqlQuery);		
}

}





?>