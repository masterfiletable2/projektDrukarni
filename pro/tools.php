<?php
session_start();
require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/tools_template.php');
require_once('redirection.php');





?>


<!DOCTYPE html>
<html lang="pl">
<head>
<title>Narzędzia</title>
<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />

<?php include_styles()?>


</head>
<body>
    




  
<div class="row vh-100 w-100">
       <?php nav() ?>

        <section class="col-md-9 bg-light">
            
            <?php tools_template(); ?>

        </section>
    </div>


    <?php include_scripts() ?>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>
<script src="vendor/orders.js"></script>
	
</div>	

</body>
</html>