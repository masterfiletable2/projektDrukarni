<?php
use Phppot\Inventory;
use Phppot\Material;

session_start();




// Inventory management


require_once __DIR__ . '/Model/Inventory.php';
	$inventory = new Inventory();



if(!empty($_POST['action']) && $_POST['action'] == 'inventoryList') {
	$inventory->getInventoryList();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'inventoryAdd'){
	$inventory->saveInventory();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'getInventory'){
	$inventory->getInventory();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateInventory'){
	$inventory->updateInventory();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteInventory'){
	$inventory->deleteInventory();
}






// Material management

require_once __DIR__ . '/Model/Material.php';
	$material = new Material();


if(!empty($_POST['action']) && $_POST['action'] == 'listMaterial') {
	$material->getMaterialList();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addMaterial'){
	$material->saveMaterial();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'getMaterial'){
	$material->getMaterial();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateMaterial'){
	$material->updateMaterial();
}
if(!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteMaterial'){
	$material->deleteMaterial();
}