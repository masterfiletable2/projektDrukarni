<?php
use Phppot\Material;
require_once('functions.php');
require_once('template/nav.php');
require_once('template/material_template.php');


session_start();
if (isset($_SESSION["username"])) {


   

    session_write_close();
} else {
 
    session_unset();
    session_write_close();
    $url = "./index";
    header("Location: $url");
}


require_once('./Model/Material.php');
$material = new Material();
?>


<!DOCTYPE html>
<html lang="pl">
<head>
<title>Lista materiałów</title>
<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />

<?php include_styles()?>


</head>
<body>
    




  
<div class="row vh-100 w-100">
       <?php nav() ?>

        <section class="col-md-9 bg-light">
            
            <?php material_template($material); ?>

        </section>
    </div>


    <?php include_scripts() ?>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>
<script src="vendor/material.js"></script>
	
</div>	

</body>
</html>