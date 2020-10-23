<?php
use Phppot\Member;

//clear SessionStorage
echo '<script>';
echo 'sessionStorage.clear();';
echo '</script>';


	require_once('functions.php');
session_start();


if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
	$loginResult = $member->loginMember();
	
}




if (isset($_SESSION["username"])) {

$url = "./dashboard";
header("Location: $url");
session_write_close();
}



?>

<!DOCTYPE html>
<html lang="pl">


<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel rejestracji</title>
<?php include_styles() ?>
</head>

<body>
<div class="container">
		<div class="row justify-content-center">

				<form name="login" action="" method="post" onsubmit="return loginValidation()" class="form col-md-6 d-flex flex-column p-3 login">


				<header class="signup-heading mt-2 mb-4"><h2>Panel logowania</h2></header>

				
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>

				
			
				
		

			<div class="form-group row">
					<label for="username" class="col-md-5 col-form-label">
						Nazwa użytkownika<span class="required error" id="username-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="username" id="username" placeholder="jankowalski" class="form-control">
						</div>
				</div>


				
				<div class="form-group row">
					<label for="login-password" class="col-md-5 col-form-label">
						Hasło<span class="required error" id="login-password-info"></span></label>
						<div class="col-md-7">
							<input type="password" name="login-password" id="login-password" placeholder="bezpieczneHaslo" class="form-control">
						</div>
					</div>	
					
			
					<div class="buttons d-flex flex-column mt-4">
						<input class="btn btn-primary mt-2 mb-2" type="submit" name="login-btn" id="login-btn" value="Zaloguj">
						<a class="btn btn-secondary mt-2 mb-2" href="user-registration.php">Zarejestruj się</a>
					</div>
					
					
				</form>
			</div>
		</div>
	


	<script src=".\vendor\login-validation.js"></script>
	<?php include_scripts() ?>

</body>
</html>
