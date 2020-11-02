<?php
 use Phppot\Member;
 session_start();

 
require_once('functions.php');
require_once('redirection.php');

require_once('template/nav_template.php');
require_once('template/user-edit_template.php');


 
if (! empty($_POST["modify-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
   $updateUser = $member->updateMember();


   
  
}














?>
<!DOCTYPE html>
<html lang="pl">
<head>
<title>Dashboard</title>
<?php include_styles()?>


</head>
<body>
	
     
   
<section class="wrapper">

<div class="app_nav">
    <?php nav() ?>
</div>

<div class="app_dashboard">
    <?php
    // session_start();
    edit_profile_template();
    session_write_close();
    ?>
</div>

</section>






    <?php
				if (! empty($updateUser["status"])) {
					?>
								<?php
					if ($updateUser["status"] == "error") {
						?>
								<div class="server-response error-msg"><?php echo $updateUser["message"]; ?></div>
								<?php
					} else if ($updateUser["status"] == "success") {
						?>
								<div class="server-response success-msg"><?php echo $updateUser["message"]; ?></div>
								<?php
					}
					?>
							<?php
				}
            ?>
            



    <?php include_scripts() ?>
    
</body>
</html>
