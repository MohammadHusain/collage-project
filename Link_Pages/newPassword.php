<?php include '..\header2.php';?>
<?php 
	if (isset($_POST['submit'])) {
		$passwordError;
		if ($_POST['newPassword'] == $_POST['ConfirmPassword']) {
			$query = "update user set user_password = '".$_POST['newPassword']."' where user_email = '".$_SESSION['ChangePasswordEmail']."'";
			if (mysqli_query($connect,$query)) {
				$_SESSION['message'] = 'Your new Password is set...Ready to go. Login now';
				unset($_SESSION['ChangePasswordEmail']);
				unset($_SESSION['OTP']);
				header('location:login.php');
			}
			else{
				echo "<script>alert('Fail to set new password');</script>";
			}
		}
		else{
			$passwordError = '*Password doesn\'t match';
		}
	}
?>
<form method="post">
	<div class="container pt-5 mt-2 pb-5 pl-0 pr-0 main" style="">

		<div class="d-flex flex-row align-items-stretch justify-content-center h-100 p-3 login_container" style="min-height: 450px;">

			<div class="block1 d-flex flex-column align-items-start justify-content-center pl-5 ">
				<img src="../Images/login.gif" class="login_image mt-5">
				<h1 class="display-4">
					Here for First Time?
				</h1>
				<a href="signUp.php"class="btn btn-primary mt-2 mb-1 pl-4 pr-4" style="border-radius: 20px;">Sign Up</a>

			</div>
			<div class="block2">
				<h1 style="margin-bottom: 30px;font-size: 30px;font-weight: lighter;">Forgot Password ?</h1>
				
				<div class="mt-2 mb-0">
					<input type="password" name="newPassword" id="newPassword" class="loginTextbox" placeholder="Enter New Password" autocomplete="off" value="<?php if(isset($_POST['newPassword'])){echo $_POST['newPassword'];}?>">
				</div>
				<br>
				<div class="mt-2 mb-0">
					<input type="password" name="ConfirmPassword" id="ConfirmPassword" class="loginTextbox" placeholder="Confirm Password" autocomplete="off" value="<?php if(isset($_POST['ConfirmPassword'])){echo $_POST['ConfirmPassword'];}?>">
					<br>
					<span id="Password_check" class="text-danger pl-3">
						<?php 
							if (isset($passwordError)) {
								echo "$passwordError";
							}
						?>
					</span>
				</div>

				<div class="" style="width: 300px">
					<label style="color: rgba(238, 90, 36,1.0)">
						<input type="checkbox" name="" class="showPassword" id="showPasswordCheck"> Show Password
					</label>
				</div>
				<div class="mt-1">
					<button class="btn btn-success" type="submit" name="submit" style="width: 150px;"> Submit </button>
				</div>
				<font color="white">or</font>
				<div>
					<i><a href="" style="color: white">Already have Account ? LOGIN</a></i>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	$('body').addClass('background');

	$('#showPasswordCheck').change(function() {
		if (this.checked) {
			$('#newPassword , #ConfirmPassword').attr({
				type: 'text'
			});
		}
		else{
			$('#newPassword , #ConfirmPassword').attr({
				type: 'password'
			});
		}
	});

	$('form').submit(function(event) {
		var password = $('#newPassword').val();
		var ConfirmPassword = $('#ConfirmPassword').val();
		var passwordRegx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

		password = password.trim()
		ConfirmPassword = ConfirmPassword.trim();
		if (password == '' || ConfirmPassword == '') {
			$('#Password_check').text('*Field Required');
			event.preventDefault();
		}
		else if (!passwordRegx.test(password) && !passwordRegx.test(ConfirmPassword)) {
			$('#Password_check').text('*Invalid password format');
			event.preventDefault();
		}
		else if (password != ConfirmPassword) {
			$('#Password_check').text('*Password doesn\'t match ');
			event.preventDefault();
		}
		else {
			return true;
		}
	});
</script>
<?php include '..\footer.php'; ?>