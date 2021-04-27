<?php include '..\header2.php';?>

<?php
	if (isset($_POST['submit'])) {
		$query = "SELECT count(*) FROM `user` where user_email = '".$_POST['txtEmail']."' and isGoogle != 1";
		$result = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($result);

		$ErrorMessage;
		if ($data['count(*)'] == 1) {
			$_SESSION['ChangePasswordEmail'] = $_POST['txtEmail'];

			$_SESSION['OTP'] = rand(1000,9999);
			$displayItem = '<div style="width: 100%;text-align: center;background-color: #e4e3e3;padding: 20px;margin:0">
	<p>Dear Sir/Madam,</p>
	<p>Use the following OTP</p>
	<h1 style="font-weight: lighter;color: #ec3f32">
		'.$_SESSION['OTP'].'
	</h1>
	<p>To complete your forgot password process</p>
	<p>For Further Inquiry : Email booking.inOfficial@gmail.com</p>
</div>';
			$subject = 'Your OTP (forgot password)';
			include '..\phpMail\index3.php';

		}
		else{
			$ErrorMessage = "Email is not Register";
		}
	}	
?>

<form method="post">
	<div class="container pl-0 pr-0 main">

		<div class="d-flex flex-row justify-content-center p-3 login_container " style="">


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
					<input type="text" name="txtEmail" id="txtEmail" class="loginTextbox" placeholder="Email" autocomplete="off">
					<br>
					<span id="txtEmail_check" class="text-danger pl-3">
						<?php 
							if (isset($txtEmailError)) {
								echo "$txtEmailError";
							}
						?>
					</span>
				</div>
				
				<!-- <div class="mt-2 mb-0">
					<input type="password" name="txtPassword" id="txtPassword" class="loginTextbox" placeholder="Password" autocomplete="off">
					<br>
					<span id="txtPassword_check" class="text-danger pl-3">
						<?php 
							if (isset($txtPasswordError)) {
								echo "$txtPasswordError";
							}
						?>
					</span>
				</div> -->	
				
				<!-- <div class="" style="width: 300px">
					<label style="color: rgba(238, 90, 36,1.0)">
						<input type="checkbox" name="" class="showPassword" id="showPasswordCheck"> Show Password
					</label>
				</div> -->

	
				<span class="text-danger" id="doesntMatchError">
					<?php 
						if (isset($ErrorMessage)) {
							echo $ErrorMessage;
						}
					 ?>
				</span>
				<div class="mt-1">
					<button class="btn btn-success" type="submit" name="submit" style="width: 150px;"> Submit </button>
				</div>
				<font color="white">or</font>
				<div>
					<i><a href="login.php" style="color: white">Already have Account ? LOGIN</a></i>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	$('body').addClass('background');

	$('form').submit(function(event) {

			var isValid = true;
			var a = false;
			//Email
			var emailCheck = $('#txtEmail').val();
			emailCheck = emailCheck.trim();
			var emailRegx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
			if (emailCheck == '') {
				$('#txtEmail_check').text('*Field Required');
				isValid = false;
				event.preventDefault();
			}
			else if (! emailRegx.test(emailCheck)) {
				$('#txtEmail_check').text('*Invalid Email Format');
				isValid = false;
				event.preventDefault();
			}
			else{
				$('#txtEmail_check').text('');
			}

	});
</script>
<?php include '..\footer.php'; ?>