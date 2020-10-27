<?php
use Phppot\Inventory;
require_once('functions.php');
require_once('template/nav.php');
require_once('template/inventory_template.php');


session_start();
if (isset($_SESSION["username"])) {


   

    session_write_close();
} else {
 
    session_unset();
    session_write_close();
    $url = "./index";
    header("Location: $url");
}



require_once('./Model/Inventory.php');
$inventory = new Inventory();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
<title>Lista Magazynów</title>
<?php include_styles()?>

<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />

</head>
<body>
    




  
<div class="row vh-100 w-100">
       <?php nav() ?>

        <section class="col-md-9 bg-light">
            <?php inventory_template(); ?>

        </section>
    </div>


    <?php include_scripts() ?>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>
<!-- <script src="vendor/dataTables.bootstrap.min.js"></script>	 -->

<script src="vendor/common.js"></script>

<script src="vendor/inventory.js"></script>
	
</div>	

</body>
</html>