<?php

function edit_profile_template(){


//comparison SESSION -> POST
$results = array();
$tmp = $_SESSION;

$b = 1;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$tmp = $_POST;
}
else{
	$b= $b +1;
}

foreach ($tmp as $key => $value) {
    ${$key} = $value ;
     $_POST[$key] = $value;


  $results[] = $value;



 

}

?>



<?php 


?> 

<div class="container">
	
	<div class="row justify-content-center">

		
				<form name="modify-up" action="" method="post"  onsubmit="return signupValidation()" class="form col-md-6 d-flex flex-column p-3 editForm">



				


					<header class="signup-heading mt-2 mb-4"><h2>Twój profil</h2></header>
					
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
<?php //echo $_POST['avatar']; ?>


				<div class="form-group row">
					<label for="username" class="col-md-5 col-form-label">
						Avatar<span class="required error" id="username-info"></span></label>
						<div class="col-md-7">
							<img class="col-md-12 avatar urlAvatar" src="<?php echo $_POST['avatar']; ?>" >
							
							
							<input type="hidden" name="avatar" class="urlAvatar" value="<?php echo $_SESSION['avatar']; ?>">
								<input type="file"  id="avatar" >
								
						</div>
				</div>



				<div class="form-group row">
					<label for="username" class="col-md-5 col-form-label">
						Nazwa użytkownika<span class="required error" id="username-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="username" id="username" class="form-control" value="<?php echo $_SESSION["username"] ?>" disabled>
						</div>
				</div>
				
					<div class="form-group row">
					<label for="email" class="col-md-5 col-form-label">
						Adres Email<span class="required error" id="email-info"></span></label>
						<div class="col-md-7">
							<input type="email" name="email" id="email"  value="<?php echo  $results[$b+0]  ?>"   class="form-control">
						</div>
					</div>
					
				


					<div class="form-group row">
					<label for="nip" class="col-md-5 col-form-label">
						NIP<span class="required error" id="nip-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="nip" id="nip"  value="<?php echo $results[$b+1] ?>" class="form-control">
						</div>
					</div>

					<div class="form-group row">
					<label for="company" class="col-md-5 col-form-label">
						Nazwa firmy<span class="required error" id="company-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="company" id="company"  value="<?php echo $results[$b+2] ?>"  class="form-control">
						</div>
					</div>
					
					
					<div class="form-group row">
					<label for="adress" class="col-md-5 col-form-label">
						Adres firmy(adres korespodencyjny)<span class="required error" id="adress-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="adress" id="adress"  value="<?php echo $results[$b+3] ?>"  class="form-control">
						</div>
					</div>

					
					<div class="form-group row">
					<label for="mobile" class="col-md-5 col-form-label">
						Numer kontaktowy<span class="required error" id="mobile-info"></span></label>
						<div class="col-md-7">
							<input type="text" name="mobile" id="mobile" value="<?php echo $results[$b+4] ?>"  class="form-control">
						</div>
					</div>

					
					<div class="buttons d-flex flex-column mt-4">
					<input class="btn btn-primary mt-2 mb-2" type="submit" name="modify-btn" id="modify-btn" value="Modyfikuj">
					</div>

				</form>


				
			</div>
	
			</div>

<?php include_scripts(); ?>
<script src=".\vendor\register-validation.js"></script>



<!-- 

<script>
$(function(){
// this is the id of the form
$(".editForm").submit(function(e) {


    var form = $(this);
    var url = form.attr('action');
    
    $.ajax({
           type: "POST",
           url: url,
		   data: {message: $(".urlAvatar").val() } ,
		   dataType: "html",
           success: function(data)
           {
		   alert("Success")
		   $(".row").html("<div>"+data+"</div>")
           }
         });

    
});

})

</script>	 -->

<?php
}
?>

