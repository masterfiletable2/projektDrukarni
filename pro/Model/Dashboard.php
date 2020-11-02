<?php
namespace Phppot;

class Dashboard
{


	private $ordersTable = 'orders';
	private $usersTable = 'tbl_member';



    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }






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






public function ordersOfTime($var,$query){
// $sqlQuery = "SELECT count(create_at) as d, DAYNAME(create_at) AS day_of_week, ( COUNT(*) / @total_weeks ) AS avgorders, COUNT(*) AS total_orders FROM orders GROUP BY DAYOFWEEK(create_at)";




$today = "SELECT count(create_at) FROM orders
where day(create_at)=day(CURRENT_DATE)";


$thisWeek = "
SELECT dayname(create_at) as day_of_week, count(create_at) as total_orders from orders
WHERE create_at  between current_date 
        AND 
         current_date + interval 7 day
group by day_of_week
order by create_at
";

$thisMonth = "
select distinct(date(create_at)), count(create_at) from orders 
WHERE create_at >= LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY - INTERVAL 1 MONTH
  AND create_at < LAST_DAY(CURRENT_DATE) + INTERVAL 1 DAY
  
  group by 1

";
		




if($query == "today"){
	$query = $today;
}

if($query == "thisWeek"){
	$query = $thisWeek;
}

if($query == "thisMonth"){
	$query = $thisMonth;
}


	$result = mysqli_query($this->ds->getConnection(), $query);
	
		while($row = mysqli_fetch_array($result)){
			echo "'".$row[$var]."',";

		}


}










public function order($sqlQuery){		
	

$countingOrdersInThisDay = "SELECT count(create_at) as countingOrdersInThisDay FROM orders 
where day(create_at)=day(CURRENT_DATE)  ";

$countingOrdersInThisWeek = "SELECT count(create_at) as countingOrdersInThisWeek from orders WHERE create_at between current_date AND current_date + interval 7 day 
 ";


  
  

$countingOrdersInThisMonth = "SELECT count(create_at) as countingOrdersInThisMonth FROM `orders` as t 
WHERE t.create_at >= DATE_FORMAT(NOW(),'%Y-%m-01')  ";


if($sqlQuery == "countingOrdersInThisDay"){
	$sqlQuery = $countingOrdersInThisDay;
}


if($sqlQuery == "countingOrdersInThisWeek"){
	$sqlQuery = $countingOrdersInThisWeek;
}


if($sqlQuery == "countingOrdersInThisMonth"){
	$sqlQuery = $countingOrdersInThisMonth;
}


if(!$sqlQuery){
	$sqlQuery = "SELECT order_title, username as worker, IF(b.id_worker = id_worker, (SELECT username from ".$this->usersTable." WHERE id_user = id_worker), 'nieworker') as client , order_notes, quantity_of_alert FROM ".$this->ordersTable." as b
	INNER JOIN ".$this->usersTable." as c
	on b.id_user = c.id_user
		WHERE order_status = 'during'";
	}
		 $result = mysqli_query($this->ds->getConnection(), $sqlQuery);

		 return $result;






}






}