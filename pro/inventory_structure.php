<?php
use Phppot\Material;
use Phppot\Inventory;
session_start();
require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/inventory_template.php');
require_once('template/material_template.php');
require_once('redirection.php');



require_once('./Model/Inventory.php');
$inventory = new Inventory();


require_once('./Model/Material.php');
$material = new Material();

?>


<!DOCTYPE html>
<html lang="pl">
<head>
<title>Magazyn</title>
<?php include_styles()?>

<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />

</head>
<body>
    




  
    <section class="wrapper">

        <div class="app_nav">
            <?php nav() ?>
        </div>

        <div class="app_dashboard">
            <h2>Magazyn</h2>
           <?php inventory_template() ?> 
             <?php material_template($material) ?> 
        </div>
    </section>

    <?php include_scripts() ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="vendor/jquery.dataTables.min.js"></script>
    <script src="vendor/material.js"></script>
    <script src="vendor/inventory.js"></script>


</body>
</html>