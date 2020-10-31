<?php
use Phppot\Dashboard;

require_once('functions.php');
require_once('template/nav_template.php');
require_once('template/dashboard_template.php');


session_start();
if (isset($_SESSION["username"])) {


   

    session_write_close();
} else {
 
    session_unset();
    session_write_close();
    $url = "./index";
    header("Location: $url");
}


require_once('./Model/Dashboard.php');
$order = new Dashboard();

?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>Dashboard</title>
<?php include_styles()?>


</head>
<body>
	
     
    <div class="row vh-100 w-100">
       <?php nav() ?>

        <section class="col-md-9 bg-light">

        <?php dashboard_template($order); ?>
        </section>
    </div>


    <?php include_scripts() ?>



    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>
<script src="vendor/order.js"></script>


</body>
</html>
