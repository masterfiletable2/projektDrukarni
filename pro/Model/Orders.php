<?php
namespace Phppot;

class Orders
{
    private $userTable = 'tbl_member';
    private $materialTable = 'material';
	private $ordersTable = 'orders';
	private $ordersClosedTable = 'orders_closed';

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }





	public function getOrdersList(	$statusname ){				
		// $sqlQuery = "SELECT * FROM ".$this->ordersTable." as b 
		// 	INNER JOIN ".$this->materialTable." as c ON c.id_material = b.id_material
		// 	INNER JOIN ".$this->userTable." as d ON d.id_user = b.id_user 
			
		// 	";

		$sqlQuery = "SELECT id_order, order_title, username,id_worker, IF(b.id_worker = id_worker, (SELECT username from ".$this->userTable." WHERE id_user = id_worker), 'nieworker') as workername, 
		c.id_material, c.materialname, c.quantity, b.quantity_of_excepted,
		order_status, order_notes, b.create_at
		
		FROM  ".$this->ordersTable." as b 
		INNER JOIN ".$this->materialTable." as c ON c.id_material = b.id_material
			INNER JOIN ".$this->userTable." as d ON d.id_user = b.id_user 
			
		"
			;

			
if($statusname){

	$sqlQuery .= "	WHERE order_status ='".$statusname."'";
}


			

		if(!empty($_POST["search"]["value"])){
			$sqlQuery .= 'WHERE b.order_title LIKE "%'.$_POST["search"]["value"].'%" ';
			$sqlQuery .= 'OR c.materialname LIKE "%'.$_POST["search"]["value"].'%" ';
		}
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY b.id_order DESC ';
		}
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}	
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$numRows = mysqli_num_rows($result);

		// $sqlQuery = "SELECT * FROM ".$this->ordersTable." as b 		";
		//INNER JOIN ".$this->materialTable." as c ON c.id_material = b.id_material ";
	// if(!empty($_POST["search"]["value"])){
	// 	$sqlQuery .= 'WHERE b.order_title LIKE "%'.$_POST["search"]["value"].'%" ';
	// 	$sqlQuery .= 'OR c.materialname LIKE "%'.$_POST["search"]["value"].'%" ';
	// }
	// if(!empty($_POST["order"])){
	// 	$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	// } else {
	// 	$sqlQuery .= 'ORDER BY b.id_material DESC ';
	// }
	// if($_POST["length"] != -1){
	// 	$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	// }	
	$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
	$numRows = mysqli_num_rows($result);

		$ordersData = array();	
		while( $orders = mysqli_fetch_assoc($result) ) {			
			
			$ordersRows = array();
			$ordersRows[] = $orders['id_order'];
			$ordersRows[] = $orders['order_title'];
			$ordersRows[] = $orders['username'];

			$ordersRows[] = $orders['materialname']." [".$orders['quantity_of_excepted'].'szt]';

		
			
			$ordersRows[] = $orders['workername'];

			
			$ordersRows[] = $orders['order_status'];
			$ordersRows[] = '<button class="btn btn-info"><i class="fas fa-info-circle"></i></button><div class="info">'.$orders['order_notes'].'</div>';
			$ordersRows[] = $orders['create_at'];
			


		if($orders['order_status'] !="closed"){
			$ordersRows[] = '
			<button type="button" name="update" id="'.$orders["id_order"].'" class="btn btn-warning btn-xs updateOrdersBtn"><i class="fas fa-pen-square"></i></button>
			<button type="button" name="delete" id="'.$orders["id_order"].'" class="btn btn-danger btn-xs deleteOrdersBtn" data-status="'.$orders["order_status"].'"><i class="fas fa-trash-alt"></i></button>
			';
		}

		else{
			$ordersRows[] = 'brak';
		}

			
			$ordersData[] = $ordersRows;
		}


		
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$ordersData
		);
		echo json_encode($output);

    }
    


	public function ordersDropdownList($tablename, $id_element, $elementname){		
		$sqlQuery = "SELECT * FROM `".$tablename."` ";
			
		if($tablename == 'tbl_member'){
		$sqlQuery .= "WHERE `type_of_user` = 'worker'";
		}
			
		// $sqlQuery .= 'ORDER BY 1 ASC';

		
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);	
		$HTMLresult = '';
		while( $allElements = mysqli_fetch_assoc($result)) {
			$HTMLresult .= '<option value="'.$allElements[$id_element].'">'.$allElements[$elementname].'</option>';	
		}
		return $HTMLresult;
	}
	
	public function saveOrders() {		
	$dupa = $_POST["order_status"] == "" ? 'new' : 's';
		$sqlInsert = "
			INSERT INTO ".$this->ordersTable."( order_title, id_material,quantity_of_excepted,id_user,id_worker, order_notes, order_status) 
			VALUES ('".$_POST['order_title']."','".$_POST["id_material"]."','".$_POST["quantity_of_excepted"]."', '".$_SESSION['id_user']."',  '".$_POST["id_user"]."', '".$_POST["order_notes"]."' , '"
			.$dupa."' )";	
			
			
			
//$_POST["order_status"] == " " ? 'btn-test' : 'btn-aha

			// INSERT INTO ".$this->ordersTable."(id_order, order_title,id_user,id_material,notes) 
			// VALUES ('".$_POST["id_order"]."', '".$_POST['order_title']."', '".$_POST['id_user']."', '".$_POST['id_material']."', '".$_POST['notes']."')";	
            mysqli_query($this->ds->getConnection(), $sqlInsert);

			echo "TEST";
		
		echo $sqlInsert;
	}	


	public function getOrders(){
		$sqlQuery = "
			SELECT *, c.quantity FROM ".$this->ordersTable." as b
			INNER JOIN ".$this->materialTable." as c ON c.id_material = b.id_material 
			WHERE id_order = '".$_POST["id_order"]."'";
		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo json_encode($row);
	}	
	public function updateOrders() {		
		if($_POST['id_order']) {	




			//Działa, ale quantity do ogarnięcia
			$sqlUpdate = "UPDATE ".$this->ordersTable." as r INNER JOIN ".$this->materialTable." as c ON c.id_material = r.id_material 
			 SET order_title = '".$_POST['order_title']."', r.id_material ='".$_POST['id_material']."', quantity = '".$_POST['quantity']."', quantity_of_excepted ='".$_POST['quantity_of_excepted']."', id_worker ='".$_POST['id_user']."',order_status ='".$_POST['order_status']."', order_notes='".$_POST['order_notes']."'  ";

			
			//  $sqlUpdate = "UPDATE ".$this->ordersTable." as r INNER JOIN ".$this->materialTable." as c ON c.id_material = r.id_material 
			//  SET order_title = '".$_POST['order_title']."', r.id_material ='".$_POST['id_material']."', quantity_of_excepted ='".$_POST['quantity_of_excepted']."', quantity ='".$_POST['quantity']."', id_worker ='".$_POST['id_user']."',order_status ='".$_POST['order_status']."', order_notes='".$_POST['order_notes']."' WHERE r.id_order = '".$_POST["id_order"]."'";
			$calculation = $_POST["quantity"] - $_POST["quantity_of_excepted"];

			
			if($_POST['order_status'] == 'closed'){
				
			 $sqlUpdate .= " , quantity = '".$calculation."'";
			//  echo " TO JEST KALKULACJA".$calculation;

			
			}

			$sqlUpdate .= " WHERE r.id_order = '".$_POST["id_order"]."'";


			
echo "<br> Quantity: ".$_POST['quantity']." kkkkkkkkkk<br>";

			echo $sqlUpdate;

			echo "Order Updated";

			mysqli_query($this->ds->getConnection(), $sqlUpdate);
			
		}	
	}	
	public function deleteOrders(){
		$sqlQuery = "
			DELETE FROM ".$this->ordersTable." 
			WHERE id_order = '".$_POST["id_order"]."'";	
            mysqli_query($this->ds->getConnection(), $sqlQuery);	
	}















	public function getClosedOrdersList(){				


		$sqlQuery = "SELECT * FROM ".$this->ordersClosedTable." as f
			INNER JOIN ".$this->ordersTable." as d ON d.id_order = f.id_order ";


		// if(!empty($_POST["search"]["value"])){
		// 	$sqlQuery .= 'WHERE b.order_title LIKE "%'.$_POST["search"]["value"].'%" ';
		// 	$sqlQuery .= 'OR c.materialname LIKE "%'.$_POST["search"]["value"].'%" ';
		// }
		// if(!empty($_POST["order"])){
		// 	$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		// } else {
		// 	$sqlQuery .= 'ORDER BY b.id_order DESC ';
		// }
		// if($_POST["length"] != -1){
		// 	$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		// }	



		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
		$numRows = mysqli_num_rows($result);

	
	$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
	$numRows = mysqli_num_rows($result);

		$ordersData = array();	
		while( $orders = mysqli_fetch_assoc($result) ) {			
			
			$ordersRows = array();
			$ordersRows[] = $orders['id_order_closed'];
			$ordersRows[] = $orders['id_order'];
			$ordersRows[] = $orders['data_closed'];
			
			
			$ordersData[] = $ordersRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$ordersData
		);
		echo json_encode($output);

	}
	






}