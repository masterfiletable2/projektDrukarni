<?php
use Phppot\Users;

use Phppot\Inventory;
use Phppot\Material;
use Phppot\Orders;

use Phppot\Php_Mailer;



session_start();






// Users management

require_once __DIR__ . '/Model/Users.php';
	$users = new Users();


if(!empty($_POST['action']) && $_POST['action'] == 'usersList') {
	$users->getUsersList();

}


if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'usersAdd'){
	$users->saveUsers();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'getUsers'){
	$users->getUsers();
	
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateUsers'){
	$users->updateUsers();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteUsers'){
	$users->deleteUsers();
}

if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'toggleStatus'){
	$users->toggleStatus();
}




// Inventory management


require_once __DIR__ . '/Model/Inventory.php';
	$inventory = new Inventory();



if(!empty($_POST['action']) && $_POST['action'] == 'inventoryList') {
	$inventory->getInventoryList();
}
if(!empty($_POST['btn_action_inventory']) && $_POST['btn_action_inventory'] == 'inventoryAdd'){
	$inventory->saveInventory();
}
if(!empty($_POST['btn_action_inventory']) && $_POST['btn_action_inventory'] == 'getInventory'){
	$inventory->getInventory();
}
if(!empty($_POST['btn_action_inventory']) && $_POST['btn_action_inventory'] == 'updateInventory'){
	$inventory->updateInventory();
}
if(!empty($_POST['btn_action_inventory']) && $_POST['btn_action_inventory'] == 'deleteInventory'){
	$inventory->deleteInventory();
}






// Material management

require_once __DIR__ . '/Model/Material.php';
	$material = new Material();


if(!empty($_POST['action']) && $_POST['action'] == 'listMaterial') {
	$material->getMaterialList();
}
if(!empty($_POST['btn_action_material']) && $_POST['btn_action_material'] == 'addMaterial'){
	$material->saveMaterial();
}
if(!empty($_POST['btn_action_material']) && $_POST['btn_action_material'] == 'getMaterial'){
	$material->getMaterial();
}
if(!empty($_POST['btn_action_material']) && $_POST['btn_action_material'] == 'updateMaterial'){
	$material->updateMaterial();
}
if(!empty($_POST['btn_action_material']) && $_POST['btn_action_material'] == 'deleteMaterial'){
	$material->deleteMaterial();
}











// Orders management

require_once __DIR__ . '/Model/Orders.php';
	$orders = new Orders();

// all Listings
if(!empty($_POST['action']) && $_POST['action'] == 'ordersList') {
	if($_SESSION["type_of_user"] == "admin"){
	$orders->getOrdersList("");

	}

	else if($_SESSION["type_of_user"] == "client"){
		$orders->getOrdersList("");

	}
		else{
		$orders->getOrdersList("");
	}
}


// all New Listings
if(!empty($_POST['action']) && $_POST['action'] == 'ordersListNew') {
	$orders->getOrdersList("new","","");
}


// all In progress Listings
if(!empty($_POST['action']) && $_POST['action'] == 'ordersListInProgress') {
	$orders->getOrdersList("during","","");
}


// all closed listings
if(!empty($_POST['action']) && $_POST['action'] == 'ordersListClosed') {
	$orders->getOrdersList("closed","","");
}



if(!empty($_POST['btn_action_orders']) && $_POST['btn_action_orders'] == 'addOrder'){
	$orders->saveOrders();
}



if(!empty($_POST['btn_action_orders']) && $_POST['btn_action_orders'] == 'addOrders'){
	$orders->saveOrders();
}
if(!empty($_POST['btn_action_orders']) && $_POST['btn_action_orders'] == 'getOrders'){
	$orders->getOrders();
	
}
if(!empty($_POST['btn_action_orders']) && $_POST['btn_action_orders'] == 'updateOrders'){
	$orders->updateOrders();
}
if(!empty($_POST['btn_action_orders']) && $_POST['btn_action_orders'] == 'deleteOrders'){
	$orders->deleteOrders();
}

// if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'toggleStatus'){
// 	$orders->toggleStatus();
// }





require_once __DIR__ . '/Model/PhpMailer.php';
	$phpmailer = new Php_Mailer();



if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'emailVerify'){
	$phpmailer->emailVerify();
}
