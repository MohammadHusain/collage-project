<?php 
	include '..\header2.php';
	 
	try {
		require_once "../GOOGLE_LOGIN/config.php";

		$loginURL = $gClient->createAuthUrl(); 
	} catch (Exception $e) {
		
	}
?>
<script type="text/javascript">
	$('#Login').addClass('active');
</script>
<?php 

	$connect = mysqli_connect('localhost','root','','project');
	if (isset($_SESSION['message'])) {
		echo "<script>alert('".$_SESSION['message']."');</script>";
		unset($_SESSION['message']);
	}
	$txtEmailError;
	$flag1 = false;
	if (isset($_POST['txtEmail'])) {
		$flag1 = true;
		if ($_POST['txtEmail'] == '') {
			$txtEmailError = "*Field Required";
			$flag = false;
		}
		else if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$_POST['txtEmail'] )) {
			$txtEmailError = "*Invalid Email Format";
			$flag1 = false;
		}
	}
	$txtPasswordError;
	$flag2 = false;
	if (isset($_POST['txtPassword'])) {
		$flag2 = true;
		if ($_POST['txtPassword'] == '') {
			$txtPasswordError = "*Field Required";
			$flag = false;
		}
		else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['txtPassword'])) {
			$txtPasswordError = "*Invalid Password Format";
			$flag = false;
		}
	}
	if ($flag1 == true && $flag2 == true) {
		$query = "select * from user where user_email='".$_POST['txtEmail']."' and user_password='".$_POST['txtPassword']."'";
		$result = mysqli_query($connect,$query);
		$numOfRows = mysqli_num_rows($result);
		//echo "$result";
		if ($numOfRows != 1) {
			$loginErrorMessage = "Email and Password doesn't match";
		}
		else{
			$data = mysqli_fetch_array($result);
			$_SESSION['userName'] = $data['user_name'];
			$_SESSION['userId'] = $data['user_id'];
			$_SESSION['userEmail'] = $data['user_email'];
			$_SESSION['isGoogle'] = $data['isGoogle'];
			$_SESSION['userImage'] = $data['user_Image'];

			if (isset($_SESSION['navigateLink'])) {
				header('location:../Link_Pages/'.$_SESSION['navigateLink']);
			}
			else{
				header("location:homePage.php");
			}
		}
	}
?>
<?php 
	if (isset($_COOKIE['userId'])) {
		?>
			<div class="alert alert-danger">
 				<strong>Dear <?php echo $_COOKIE['userName'] ?> ! </strong> Your are already logged. Nothing here
				<?php exit(); ?>
			</div>
		<?php
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
				<i><a href="forgotPassword.php">Forgot Password?</a></i>

			</div>
			<div class="block2">
				<h1 style="margin-bottom: 30px">Login Here</h1>
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
				
				<div class="mt-2 mb-0">
					<input type="password" name="txtPassword" id="txtPassword" class="loginTextbox" placeholder="Password" autocomplete="off">
					<br>
					<span id="txtPassword_check" class="text-danger pl-3">
						<?php 
							if (isset($txtPasswordError)) {
								echo "$txtPasswordError";
							}
						?>
					</span>
				</div>	
				
				<div class="" style="width: 300px">
					<label style="color: rgba(238, 90, 36,1.0)">
						<input type="checkbox" name="" class="showPassword" id="showPasswordCheck"> Show Password
					</label>
				</div>

	
				<span class="text-danger" id="doesntMatchError">
					<?php 
						if (isset($loginErrorMessage)) {
							echo $loginErrorMessage;
						}
					 ?>
				</span>
				<div class="mt-1">
					<button class="btn btn-success" type="submit" name="submit"> Submit </button>
				</div>
				<font color="white">or</font>
				<div>
					<a href="<?php echo $loginURL ?>" class="btn btn-danger google_signupBtn d-flex align-items-center"  style="background-color: #dd4b39;">
						<span>Sign in with </span>&nbsp;&nbsp;<i class="fa fa-google-plus" aria-hidden="true" style="font-size: 25px"></i></i>
					</a>
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

			//password
			var passwordCheck = $('#txtPassword').val();
			passwordCheck = passwordCheck.trim();
			var passwordRegx = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
			if (passwordCheck == '') {
				$('#txtPassword_check').text('*Field Required');
				isValid = false;
				event.preventDefault();
			}
			else if (! passwordRegx.test(passwordCheck)) {
				$('#txtPassword_check').text('*atleast 1 numeric and 8 char. long');
				isValid = false;
				event.preventDefault();
			} 
			else{
				$('#txtPassword_check').text('');
			}

			// if (isValid == true) {
			// 	$.ajax({
			// 		url: 'login_backend.php',
			// 		type: 'POST',
			// 		data: {
			// 			emailCheck: emailCheck,
			// 			passwordCheck: passwordCheck,
			// 			IsValid: true
			// 		},
			// 		success:function(data){						
			// 			if (data == "success") {
			// 				$('#doesntMatchError').text('');
			// 				alert('success');
			// 				a = false;
			// 			}
			// 			else {
			// 				$('#doesntMatchError').text('*Email and Password doesn\'t match');
			// 				alert('error');
			// 				a = true;
			// 			}
			// 		}
			// 	});
			// }	

	});
	$('#showPasswordCheck').change(function() {
		if (this.checked) {
			$('#txtPassword').attr({
				type: 'text'
			});
		}
		else{
			$('#txtPassword').attr({
				type: 'password'
			});
		}
	});
</script>
<?php include '..\footer.php'; ?>