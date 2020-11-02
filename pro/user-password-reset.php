


<?php
use Phppot\Users;
use Phppot\Php_Mailer;
session_start();

require_once('functions.php');
require_once('redirection.php');



 

require_once('./Model/Users.php');
$users = new Users();

require_once('./Model/PhpMailer.php');
$phpmailer = new Php_Mailer();



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

				<form name="email-verify" id="email-verify"  method="post" class="form col-md-6 d-flex flex-column p-3 login">


				<header class="signup-heading mt-2 mb-4"><h2>Panel logowania</h2></header>

				
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>

				
			
				
		

			<div class="form-group row">
					<label for="username" class="col-md-5 col-form-label">
						Adres e-mail<span class="required error" id="username-info"></span></label>
						<div class="col-md-7">
							<input type="email" name="email" id="email" placeholder="twojadresemail@outlook.com" class="form-control">
							
						</div>
				</div>
			
			
					
			
					<div class="buttons d-flex flex-column mt-4">
                      	
                        
                   
                    <input type="button" name="email-verify-btn" id="email-verify-btn" class="btn btn-info" value="Wyślij przypomnienie" />


						<a class="btn btn-secondary mt-2 mb-2" href="login">Panel logowania</a>

					</div>
					
					
				</form>
			</div>
		</div>
	
	

	


	<?php include_scripts() ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="vendor/jquery.dataTables.min.js"></script>

<script src="vendor/phpmailer.js"></script>

</body>
</html>






