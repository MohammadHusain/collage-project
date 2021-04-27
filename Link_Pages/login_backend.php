<?php 
	$connect = mysqli_connect('localhost','root','','project');
	session_start();

		if (!isset($_POST['txtEmail'])) {
			header('location:homePage.php');
			exit();
		}
		if (!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$_POST['txtEmail'] )) {
			echo "Invalid Email formate. Please Try again";
			exit();
		}
		if (!isset($_POST['txtPassword'])) {
			header('location:homePage.php');
			exit();
		}
		if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST['txtPassword'])) {
			echo "Invalid Password formate";
			exit();
		}

		$query = "select user_id from user where user_email='".$_POST['txtEmail']."' and user_password='".$_POST['txtPassword']."'";
		$result = mysqli_query($connect,$query);
		$numOfRows = mysqli_num_rows($result);
		echo "$result";
		if ($numOfRows != 1) {
			$_SESSION['loginErrorMessage'] = "Email and Password doesn't match";
			header('location:login.php');
		}
		else{
			$_SESSION['loginErrorMessage'] = "Email and Password match";
			header('location:login.php');
		}

	// if (isset($_POST['IsValid'])) {
	// 	$query = "select user_id from user where user_email='".$_POST['emailCheck']."' and user_password='".$_POST['passwordCheck']."'";
	// 	$result = mysqli_query($connect,$query);
	// 	$result = mysqli_num_rows($result);
	// 	if ($result == 1) {
	// 		echo "success";
	// 	}
	// }

?>