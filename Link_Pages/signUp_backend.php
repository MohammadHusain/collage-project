<?php 
	$connect = mysqli_connect('localhost','root','','project');
	session_start();
	if ($connect == null) {
		exit();
	}
	if (isset($_POST['submit'])) {
		$flag = false;
		if (!preg_match("/^[a-zA-Z ]{2,30}$/", $_POST['txtUserName'])) {
			echo "<br>Invalid Name formate";
			$flag = true;
		}

		if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $_POST['txtEmail'])) {
			echo "<br>Invalid Email formate";
			$flag = true;
		}

		if ($_POST['txtPassword'] == '') {
			echo "<br>Password Should not Empty";
			$flag = true;
		}
		else if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['txtPassword'])) {
			echo "<br>Invalid Password formate";
			$flag = true;
		}

		if ($_POST['txtConfirmPassword'] == '') {
			echo "<br>Confirm Password Should not Empty";
			$flag = true;
		}
		else if ($_POST['txtPassword'] != $_POST['txtConfirmPassword']) {
			echo "<br>Confirm Password doesn't match";
			$flag = true;
		}

		$query = "select user_id from user where user_email = '".$_POST['txtEmail']."'";
		$result = mysqli_query($connect,$query);
		$numOfRows = mysqli_num_rows($result);
		if ($numOfRows > 0) {
			echo "<br> Email already registered ";
			$flag = true;
		}

		if ($flag) {
			exit();
		}
		else{
			$query = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`,`isGoogle`,`user_Image`) VALUES ('".$_POST['txtUserName']."','".$_POST['txtEmail']."','".$_POST['txtPassword']."','0','null')";
			$result = mysqli_query($connect,$query);
			if ($result == 1) {
				$_SESSION['message'] = 'successfully sign up... Please Login now';
				header('location:login.php');
			}
			else{

			}
		}
	}

	
	

	if (isset($_POST['emailCheck'])) {
		$query = "select user_id from user where user_email = '".$_POST['emailCheck']."'";
		$result = mysqli_query($connect,$query);
		$numOfRows = mysqli_num_rows($result);
		if ($numOfRows > 0) {
			echo "Email already registered";
		}
		else{
			echo "success";
		}
	}
 ?>