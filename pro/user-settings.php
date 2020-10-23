<?php
 use Phppot\Member;

require_once('functions.php');
 
if (! empty($_POST["modify-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
   $updateUser = $member->updateMember();


   
  
}




require_once('template/nav.php');
require_once('template/edit-profile.php');



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


        <?php

// $mysqli = new mysqli('localhost', 'root', '', 'pro'); // add the database name (fourth parameter)


// $query = "SELECT * FROM tbl_member WHERE username = '{$_SESSION['username']}'";
// $result = $mysqli->query($query) or die($mysqli->error);

// if($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {

//         echo "<tr>";
//         echo "<td>".$row['id']."</td>";
//         echo "<td>".$row['username'].$row['lastname']."</td>";
//         echo "<td>".$row['email']."</td>";
//         echo "<td>".$row['nip']."</td>";
//         echo "<td>".$row['company']."</td>";
//         echo "<td>".$row['adress']."</td>";
//         echo "<td>".$row['mobile']."</td>";
//         echo "</tr>";
   
//         foreach($row as $val) {
//             echo "$val <br/>";
//         }
//     }   
// } 

// else {
//     echo 'not found';
// }


?>


    <?php
        // session_start();
        
    edit_profile();
    
    session_write_close();
    
    ?>
        </section>
    </div>




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
