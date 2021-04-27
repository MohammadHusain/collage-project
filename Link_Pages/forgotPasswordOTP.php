<?php include '..\header2.php';?>
<?php
	$txtOPTerror;
	if (isset($_POST['submit'])) {
		if($_POST['txtOTP'] == $_SESSION['OTP']){
			header('location:newPassword.php');
		}
		else{
			$txtOPTerror = "Invalid OTP";
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
					<input type="password" name="txtOTP" id="txtOTP" class="loginTextbox" placeholder="Enter OTP" autocomplete="off" value="<?php if(isset($_POST['txtOTP'])){echo $_POST['txtOTP'];}?>">
					<br>
					<span id="txtEmail_check" class="text-danger pl-3">
						<?php 
							if (isset($txtOPTerror)) {
								echo "$txtOPTerror";
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
			$('#txtOTP').attr({
				type: 'text'
			});
		}
		else{
			$('#txtOTP').attr({
				type: 'password'
			});
		}
	});
</script>

<?php include '..\footer.php'; ?>