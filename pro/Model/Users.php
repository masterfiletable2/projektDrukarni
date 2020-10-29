<?php

namespace Phppot;


class Users
{

	private $usersTable = 'tbl_member';


    public $avatar;

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
        $sqlQuery .= 'ORDER BY id_user
         DESC ';
    }
    if($_POST["length"] != -1){
        $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }	
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);
    $numRows = mysqli_num_rows($result);
    $usersData = array();	


    while( $users = mysqli_fetch_assoc($result) ) {		
        
        $usersRows = array();
        $usersRows[] = $users['id_user'];
        $usersRows[] = "<img style='width:50px' src='".$users['avatar']."'/>";
        $usersRows[] = $users['username'];
        $usersRows[] = $users['email'];
        $usersRows[] = $users['type_of_user'];
        $usersRows[] = $users['mobile'];
        $usersRows[] = $users['nip'];
        $usersRows[] = $users['company'];
        $usersRows[] = $users['adress'];
        $usersRows[] = $users['create_at'];

       

    
        $whichStatus = $users['status'] == 'active' ? 'btn-success' : 'btn-danger row-disabled'; 
        $translateStatus = $users['status'] == 'active' ? 'Aktywny' : 'Nieaktywny'; 
 

        $usersRows[] = '<button type="button" name="status" id="'.$users["id_user"].'" class="btn btn-xs status btn-success '.$whichStatus. '" value="'.$users['status'].'">'. $translateStatus.'</button>';

        
        $usersRows[] = '
        <button type="button" name="update" id="'.$users["id_user"].'" class="btn btn-warning btn-xs update"><i class="fas fa-pen-square"></i></button>
        <button type="button" name="delete" id="'.$users["id_user"].'" class="btn btn-danger btn-xs delete" ><i class="fas fa-trash-alt"></i></button>
        ';
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


// public function saveUsers() {		
//     $sqlInsert = "
//         INSERT INTO ".$this->usersTable."(name) 
//         VALUES ('".$_POST['users']."')";		
//     mysqli_query($this->ds->getConnection(), $sqlInsert);
//     echo 'New Users Added';
// }	


// public function typeOfUserDropdownList(){		
//     $sqlQuery = "
//      SELECT * FROM ".$this->usersTable." 
//         ORDER BY type_of_user ASC";	
//     $result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
//     $typeOfUser = '';
//     while( $users = mysqli_fetch_assoc($result)) {
//         $typeOfUser .= '<option value="'.$users["id_user"].'">'.$users["type_of_user"].'</option>';	
//     }
//     return $typeOfUser;
// }


public function saveUsers() {		
    $sqlInsert = "
        INSERT INTO ".$this->usersTable."(id_user,avatar,username,password,email,type_of_user,mobile,nip,company,adress,status) 
        VALUES ('".$_POST["id_user"]."','".$this->ds->avatar."','".$_POST["username"]."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."',  '".$_POST['email']."', '".$_POST['type_of_user']."', '".$_POST['mobile']."','".$_POST['nip']."','".$_POST['company']."','".$_POST['adress']."','active')";		
        mysqli_query($this->ds->getConnection(), $sqlInsert);
    echo 'New User Added';
}	


public function getUsers(){
    $sqlQuery = "
        SELECT * FROM ".$this->usersTable." 
        WHERE id_user = '".$_POST["usersId"]."'";
        
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);


}


// public function updateUsers() {		
//     if($_POST['usersId']) {	
//         $sqlUpdate = "UPDATE ".$this->usersTable." SET username = '".$_POST['username']."', email='".$_POST['email']."', type_of_user='".$_POST['type_of_user']."' WHERE id = '".$_POST["usersId"]."'";
//             mysqli_query($this->ds->getConnection(), $sqlUpdate);
//         echo 'User Update';
//         echo $_POST['usersId'];
//     }	
// }	




public function updateUsers() {		
    if($_POST['usersId']) {	
        $sqlUpdate = "UPDATE ".$this->usersTable." SET username = '".$_POST['username']."', password = '".password_hash($_POST["password"], PASSWORD_DEFAULT)."',  email='".$_POST['email']."', type_of_user='".$_POST['type_of_user']."', mobile='".$_POST['mobile']."', nip='".$_POST['nip']."', company='".$_POST['company']."', adress='".$_POST['adress']."' WHERE id_user = '".$_POST["usersId"]."'";
            mysqli_query($this->ds->getConnection(), $sqlUpdate);
        echo 'User Update';
    }	
}	

// public function updateMaterial() {		
//     if($_POST['id']) {	
//         $sqlUpdate = "UPDATE ".$this->materialTable." SET materialname = '".$_POST['materialname']."', inventoryid='".$_POST['inventoryid']."', quantity='".$_POST['quantity']."'  WHERE id = '".$_POST["id"]."'";
//             mysqli_query($this->ds->getConnection(), $sqlUpdate);
//         echo 'Material Update';
//     }	
// }	


public function deleteUsers(){
    $sqlQuery = "
        DELETE FROM ".$this->usersTable." 
        WHERE id_user = '".$_POST["usersId"]."'";	
   
    mysqli_query($this->ds->getConnection(), $sqlQuery);		
}




public function toggleStatus(){
    if($_POST['usersId']) {	
        if($_POST['status'] == "active"){
          $sqlUpdate = "UPDATE  ".$this->usersTable." SET status = 'inactive' WHERE id_user = '".$_POST['usersId']."'";
        }
        else {
          $sqlUpdate = "UPDATE ".$this->usersTable." SET status = 'active' WHERE id_user = '".$_POST['usersId']."'";

        }
    }
   
    
    mysqli_query($this->ds->getConnection(), $sqlUpdate);
    echo 'User Update Status';
}











}







?>