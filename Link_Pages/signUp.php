<?php include '..\header2.php';?>

	<form method="post" action="signUp_backend.php" class="main">
		<div class="container pt-5 mt-5 pb-5 pl-0 pr-0">

			<div class="d-flex flex-row align-items-stretch justify-content-center h-100 p-3 login_container" style="">

				<div class="block1 d-flex flex-column align-items-start justify-content-center pl-5 ">
					<img src="../Images/login.gif" class="login_image mt-5">
					<h1 class="display-4">
						Already Registered?
					</h1>
					<a href="login.php"class="btn btn-primary mt-2 mb-5 pl-4 pr-4" style="border-radius: 20px;">Login</a>
				</div>
			
					<div class="block2">

						<h1 style="margin-bottom: 50px">SignUp Here</h1>
						<div class="mt-1 mb-0">
							<input type="text" id="txtUserName" name="txtUserName" placeholder="Name" autocomplete="off">
							<br>
							<span class="text-danger" id="txtUserName_check"></span>
						</div>

						<div class="mt-4 mb-0">
							<input type="text" id="txtEmail" name="txtEmail" placeholder="Email" autocomplete="off">
							<br>
							<span class="text-danger" id="txtEmail_check"></span>
						</div>		

						<div class="mt-4 mb-0">
							<input type="password" id="txtPassword" name="txtPassword" placeholder="Password" autocomplete="off">
							<br>
							<span class="text-danger" id="txtPassword_check"></span>
						</div>						

						<div class="mt-4 mb-0">
							<input type="password" id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Confirm Password" autocomplete="off">
							<br>
							<span class="text-danger" id="txtConfirmPassword_check"></span>
						</div>		

						
						<div class="mt-4">
							<button class="btn btn-primary" id="submit" name="submit"> Submit </button>
						</div>
					</div>

			</div>
		</div>
	</form>
<script>
	$('body').addClass('background');
	$(document).ready(function() {
		$('form').submit(function(event) {
			//name
			var nameCheck = $('#txtUserName').val();
			nameCheck = nameCheck.trim();
			var nameRegx = /^[a-zA-Z ]{2,30}$/;
			if (nameCheck == '') {
				$('#txtUserName_check').text('*Field Required');
				event.preventDefault();
			}
			else if (! nameRegx.test(nameCheck)) {
				$('#txtUserName_check').text('*Name include alphabet and space');
				event.preventDefault();
			}
			else{
				$('#txtUserName_check').text('');
			}

			//Email
			var emailCheck = $('#txtEmail').val();
			emailCheck = emailCheck.trim();
			var emailRegx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
			if (emailCheck == '') {
				$('#txtEmail_check').text('*Field Required');
				event.preventDefault();
			}
			else if (! emailRegx.test(emailCheck)) {
				$('#txtEmail_check').text('*Invalid Email Format');
				event.preventDefault();
			}
			else{
				$('#txtEmail_check').text('');
				$.ajax({
					url: 'signUp_backend.php',
					type: 'POST',
					data: {
						emailCheck: emailCheck,
					},
					success:function(data) {
						if (data == 'success') {
							$('#txtEmail_check').text('');
						}
						else {
							$('#txtEmail_check').text(data);
						}
					}
				})
				
			}

			//password
			var passwordCheck = $('#txtPassword').val();
			passwordCheck = passwordCheck.trim();
			var passwordRegx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
			if (passwordCheck == '') {
				$('#txtPassword_check').text('*Field Required');
				event.preventDefault();
			}
			else if (! passwordRegx.test(passwordCheck)) {
				$('#txtPassword_check').text('*atleast 1 numeric and 8 char. long');
				event.preventDefault();
			} 
			else{
				$('#txtPassword_check').text('');
			}

			//confirm password
			var confirmPasswordCheck = $('#txtConfirmPassword').val();
			var passwordCheck = $('#txtPassword').val();
			confirmPasswordCheck = confirmPasswordCheck.trim();
			passwordCheck = passwordCheck.trim();
			if (confirmPasswordCheck == '') {
				$('#txtConfirmPassword_check').text('*Field Required');
				event.preventDefault();
			}
			else if (passwordCheck == '') {
				$('#txtConfirmPassword_check').text('*Enter Password First');
				event.preventDefault();
			} 
			else if (passwordCheck != confirmPasswordCheck){
				$('#txtConfirmPassword_check').text('*Password doesn\'t match');
				event.preventDefault();
			}
			else{
				$('#txtConfirmPassword_check').text('');
			}

		});
	});
</script>
<?php include '..\footer.php'; ?>