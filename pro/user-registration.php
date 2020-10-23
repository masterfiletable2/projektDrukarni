<?php
use Phppot\Member;

require_once('functions.php');
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}



?>

<!DOCTYPE html>
<html lang="pl">


<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel rejestracji</title>
<?php include_styles(); ?>

</head>

<body>
	<div class="container">
	
	<div class="row justify-content-center">


			
				<form name="sign-up" action="" method="post" onsubmit="return signupValidation()" class="form col-md-6 d-flex flex-column p-3">



				



					<header class="signup-heading mt-2 mb-4"><h2>Panel rejestracji klienta</h2></header>
					
			<?php
				if (! empty($registrationResponse["status"])) {
					?>
								<?php
					if ($registrationResponse["status"] == "error") {
						?>
								<div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
								<?php
					} else if ($registrationResponse["status"] == "success") {
						?>
								<div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
								<?php
					}
					?>
							<?php
				}
			?>

		

				<!-- <div class="error-msg" id="error-msg"></div> -->

				<div class="form-group row">
					<label for="username" class="col-md-5 col-form-label">
						Nazwa użytkownika<span class="required error" id="username-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="username" id="username" placeholder="jankowalski" class="form-control">
						</div>
				</div>
				
					<div class="form-group row">
					<label for="email" class="col-md-5 col-form-label">
						Adres Email<span class="required error" id="email-info"></span></label>
						<div class="col-md-7">
							<input type="email" name="email" id="email" placeholder="jankowalski@outlook.com" class="form-control">
						</div>
					</div>
					
					<div class="form-group row">
					<label for="signup-password" class="col-md-5 col-form-label">
						Hasło<span class="required error" id="signup-password-info"></span></label>
						<div class="col-md-7">
							<input type="password" name="signup-password" id="signup-password" placeholder="bezpieczneHaslo" class="form-control">
						</div>
					</div>	
					
					<div class="form-group row">
					<label for="confirm-password" class="col-md-5 col-form-label">
						Potwierdź hasło<span class="required error" id="confirm-password-info"></span></label>
						<div class="col-md-7">
							<input type="password" name="confirm-password" id="confirm-password" placeholder="bezpieczneHaslo" class="form-control">
						</div>
					</div>


					<div class="form-group row">
					<label for="nip" class="col-md-5 col-form-label">
						NIP<span class="required error" id="nip-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="nip" id="nip" placeholder="0000000000" class="form-control">
						</div>
					</div>

					<div class="form-group row">
					<label for="company" class="col-md-5 col-form-label">
						Nazwa firmy<span class="required error" id="company-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="company" id="company" placeholder="NazwaFirmy" class="form-control">
						</div>
					</div>
					
					
					<div class="form-group row">
					<label for="adress" class="col-md-5 col-form-label">
						Adres firmy(adres korespodencyjny)<span class="required error" id="adress-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="adress" id="adress" placeholder="ul. słoneczna 1" class="form-control">
						</div>
					</div>

					
					<div class="form-group row">
					<label for="mobile" class="col-md-5 col-form-label">
						Numer kontaktowy<span class="required error" id="mobile-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="mobile" id="mobile" placeholder="666666666" class="form-control">
						</div>
					</div>

					
					<div class="buttons d-flex flex-column mt-4">
					<input class="btn btn-primary mt-2 mb-2" type="submit" name="signup-btn" id="signup-btn" value="Zarejestruj">
					<a class="btn btn-secondary mt-2 mb-2" href="./">Zaloguj</a>
					</div>

				</form>


				
			</div>
	
			</div>

<?php include_scripts(); ?>
<script src=".\vendor\register-validation.js"></script>


</body>
</html>
