<?php
namespace Phppot;

class Dashboard
{

    private $inventoryTable = 'inventory';
	private $materialTable = 'material';

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }






	public function getMaterialList($elementOfDB){				
		$sqlQuery = "SELECT * FROM ".$this->materialTable." as b 
			INNER JOIN ".$this->inventoryTable." as c ON c.inventoryid = b.inventoryid ";
		
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$numRows = mysqli_num_rows($result);
		$materialData = array();	
		while( $material = mysqli_fetch_assoc($result) ) {			
			
			// $materialRows = array();
			// $materialRows[] = $material['id'];
			// $materialRows[] = $material['name'];
			// $materialRows[] = $material['materialname'];
			// $materialRows[] = $material['matrix'];
			// $materialRows[] = $material['refinement'];
			// $materialRows[] = $material['quantity'];
			// $materialRows[] = $material['notes'].'</div>';

		
		// echo json_encode($materialRows);
   

//wywolanie calego wiersza		echo '<div id="'. $material['id'].'">'.json_encode($material).'</div>';


//wywolanie konkretnego elementu
echo json_encode($material[$elementOfDB]);

    }
}
    





}