<?php
namespace Phppot;

class Dashboard
{

    // private $inventoryTable = 'inventory';
	// private $materialTable = 'material';
	private $ordersTable = 'orders';
	private $usersTable = 'tbl_member';



    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }






// 	public function getOrdersList($id_element){				
// 		$sqlQuery = "SELECT * FROM ".$this->ordersTable." WHERE order_status = 'during' ";

		
		
// 		$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
// 		$numRows = mysqli_num_rows($result);
// 		$orderData = array();	
// 		while( $order = mysqli_fetch_assoc($result) ) {			
			
// 			$orderRows = array();
// 			$orderRows[] = $order['id_order'];
// 			$orderRows[] = $order['order_title'];

// 			$orderData[] = $orderRows;



// 		echo "<div><div class='id_order'>".$order['id_order']."</div>
// 		<div class='order_title'>".$order['order_title']."</div></div>";

// 		}

			
// 		$output = array(
// 			"recordsTotal"  	=>  $numRows,
// 			"recordsFiltered" 	=> 	$numRows,
// 			"data"    			=> 	$orderData
// 		);
		


// }
    




public function countOfOrders($warunek){				
	$sqlQuery = "SELECT count(*) FROM ".$this->ordersTable."  ";
	if($warunek){
	$sqlQuery .= 'WHERE order_status = "'.$warunek.'" ';
}
	$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
	$row = $result->fetch_row();
	echo  $row[0];

}


public function name($warunek){				
	$sqlQuery = "SELECT count(*) FROM ".$this->ordersTable."  ";
	if($warunek){
	$sqlQuery .= 'WHERE order_status = "'.$warunek.'" ';
}
	$result = mysqli_query($this->ds->getConnection(), $sqlQuery);
	$row = $result->fetch_row();
	echo  $row[0];

}



public function order(){		
	
	




	$sqlQuery = "SELECT order_title, username as worker, IF(b.id_worker = id_worker, (SELECT username from ".$this->usersTable." WHERE id_user = id_worker), 'nieworker') as client , order_notes FROM ".$this->ordersTable." as b
	INNER JOIN ".$this->usersTable." as c
	on b.id_user = c.id_user
		WHERE order_status = 'during'";
	






		 $result = mysqli_query($this->ds->getConnection(), $sqlQuery);

		 return $result;






}






}