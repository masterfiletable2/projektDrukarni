<?php

namespace Phppot;

class Inventory
{

	private $inventoryTable = 'inventory';


    
    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }




// Inventory functions
public function getInventoryList(){		
    $sqlQuery = "SELECT * FROM ".$this->inventoryTable." ";
    if(!empty($_POST["search"]["value"])){
        $sqlQuery .= 'WHERE (name LIKE "%'.$_POST["search"]["value"].'%" ';
        $sqlQuery .= 'OR status LIKE "%'.$_POST["search"]["value"].'%") ';			
    }
    if(!empty($_POST["order"])){
        $sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
    } else {
        $sqlQuery .= 'ORDER BY inventoryid DESC ';
    }
    if($_POST["length"] != -1){
        $sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }	
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);
    $numRows = mysqli_num_rows($result);
    $inventoryData = array();	
    while( $inventory = mysqli_fetch_assoc($result) ) {		
        $inventoryRows = array();
        $status = '';
        if($inventory['status'] == 'active')	{
            $status = '<span class="label label-success">Aktywny</span>';
        } else {
            $status = '<span class="label label-danger">Nieaktywny</span>';
        }
        $inventoryRows[] = $inventory['inventoryid'];
        $inventoryRows[] = $inventory['name'];
        $inventoryRows[] = $status;			
        $inventoryRows[] = '
        <button type="button" name="update" id="'.$inventory["inventoryid"].'" class="btn btn-warning btn-xs updateInventoryBtn"><i class="fas fa-pen-square"></i></button>
        <button type="button" name="delete" id="'.$inventory["inventoryid"].'" class="btn btn-danger btn-xs deleteInventoryBtn" ><i class="fas fa-trash-alt"></i></button>
        ';
        
        $inventoryData[] = $inventoryRows;
    }
    $output = array(
        "draw"				=>	intval($_POST["draw"]),
        "recordsTotal"  	=>  $numRows,
        "recordsFiltered" 	=> 	$numRows,
        "data"    			=> 	$inventoryData
    );
    echo json_encode($output);
}
public function saveInventory() {		
    $sqlInsert = "
        INSERT INTO ".$this->inventoryTable."(name) 
        VALUES ('".$_POST['inventory']."')";		
    mysqli_query($this->ds->getConnection(), $sqlInsert);
    echo 'New Inventory Added';
}	
public function getInventory(){
    $sqlQuery = "
        SELECT * FROM ".$this->inventoryTable." 
        WHERE inventoryid = '".$_POST["inventoryId"]."'";
    $result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);
}
public function updateInventory() {
    if($_POST['inventory']) {	
        $sqlInsert = "
            UPDATE ".$this->inventoryTable." 
            SET name = '".$_POST['inventory']."'
            WHERE inventoryid = '".$_POST["inventoryId"]."'";	
        mysqli_query($this->ds->getConnection(), $sqlInsert);	
        echo 'Inventory Update';
    }	
}	
public function deleteInventory(){
    $sqlQuery = "
        DELETE FROM ".$this->inventoryTable." 
        WHERE inventoryid = '".$_POST["inventoryId"]."'";		
    mysqli_query($this->ds->getConnection(), $sqlQuery);		
}

}

?>