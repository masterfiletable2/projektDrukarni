<?php
use Phppot\Material;
session_start();
require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/material_template.php');
require_once('redirection.php');



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
    





<section class="wrapper">

<div class="app_nav">
    <?php nav() ?>
</div>

<div class="app_dashboard">
    <h2>Lista materiałów</h2>
    <?php material_template($material); ?>
</div>

</section>

    <?php include_scripts() ?>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>
<script src="vendor/material.js"></script>
	

</body>
</html>