<?php

require_once('functions.php');
require_once('template/nav.php');
require_once('template/content.php');


session_start();
if (isset($_SESSION["username"])) {


   

    session_write_close();
} else {
 
    session_unset();
    session_write_close();
    $url = "./index";
    header("Location: $url");
}

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
        <?php content() ?>
        </section>
    </div>


    <?php include_scripts() ?>
</body>
</html>
