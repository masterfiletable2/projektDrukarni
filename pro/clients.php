<?php
use Phppot\Users;
session_start();
require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/users_template.php');
require_once('redirection.php');



require_once('./Model/Users.php');
$users = new Users();



?>


<!DOCTYPE html>
<html lang="pl">
<head>
<title>Użytkownicy - pracownicy</title>
<?php include_styles()?>

<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css" />



</head>
<body>
    




<section class="wrapper">

<div class="app_nav">
    <?php nav() ?>
</div>

<div class="app_dashboard">
    <h2>Klienci</h2>
    <?php users_template($users) ?>
</div>

</section>


    <?php include_scripts() ?>

	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>

<script src="vendor/users.js"></script>



	

</body>
</html>