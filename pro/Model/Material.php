<?php
namespace Phppot;

class Material
{

    private $inventoryTable = 'inventory';
	private $materialTable = 'material';

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }




	public function getMaterialList(){				
		$sqlQuery = "SELECT * FROM ".$this->materialTable." as b 
			INNER JOIN ".$this->inventoryTable." as c ON c.inventoryid = b.inventoryid ";
		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'WHERE b.materialname LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= 'OR c.name LIKE "%'.$_POST["search"]["value"].'%" ';
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY b.id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$materialData = array();	
		while( $material = mysqli_fetch_assoc($result) ) {			
			
			$materialRows = array();
			$materialRows[] = $material['id'];
			$materialRows[] = $material['name'];
			$materialRows[] = $material['materialname'];
			$materialRows[] = $material['quantity'];;
			$materialRows[] = '
			<button type="button" name="update" id="'.$material["id"].'" class="btn btn-warning btn-xs updateMaterialBtn"><i class="fas fa-pen-square"></i></button>
			<button type="button" name="delete" id="'.$material["id"].'" class="btn btn-danger btn-xs deleteMaterialBtn" data-status="'.$material["status"].'"><i class="fas fa-trash-alt"></i></button>
			';
			
			
			$materialData[] = $materialRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$materialData
		);
		echo json_encode($output);
    }
    


	public function inventoryDropdownList(){		
		$sqlQuery = "SELECT * FROM `".$this->inventoryTable."` 
			WHERE status = 'active' 
			ORDER BY name ASC";	
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
		$inventoryHTML = '';
		while( $inventory = mysqli_fetch_assoc($result)) {
			$inventoryHTML .= '<option value="'.$inventory["inventoryid"].'">'.$inventory["name"].'</option>';	
		}
		return $inventoryHTML;
	}
	public function saveMaterial() {		
		$sqlInsert = "
			INSERT INTO ".$this->materialTable."(inventoryid, materialname,quantity) 
			VALUES ('".$_POST["inventoryid"]."', '".$_POST['materialname']."', '".$_POST['quantity']."')";		
            mysqli_query($this->ds->getConnection(), $sqlInsert);
		echo 'New Material Added';
	}	
	public function getMaterial(){
		$sqlQuery = "
			SELECT * FROM ".$this->materialTable." 
			WHERE id = '".$_POST["id"]."'";
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}	
	public function updateMaterial() {		
		if($_POST['id']) {	
			$sqlUpdate = "UPDATE ".$this->materialTable." SET materialname = '".$_POST['materialname']."', inventoryid='".$_POST['inventoryid']."', quantity='".$_POST['quantity']."'  WHERE id = '".$_POST["id"]."'";
				mysqli_query($this->ds->getConnection(), $sqlUpdate);
			echo 'Material Update';
		}	
	}	
	public function deleteMaterial(){
		$sqlQuery = "
			DELETE FROM ".$this->materialTable." 
			WHERE id = '".$_POST["id"]."'";	
            mysqli_query($this->ds->getConnection(), $sqlQuery);	
	}













}