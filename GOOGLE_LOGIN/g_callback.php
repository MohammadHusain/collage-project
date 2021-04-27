<?php session_start(); ob_start();
	require_once "config.php";

	function setSESSION($value='')
	{
		$_SESSION['userName'] = $data['user_name'];
		$_SESSION['userId'] = $data['user_id'];
		$_SESSION['userEmail'] = $data['user_email'];
		$_SESSION['isGoogle'] = $data['isGoogle'];
		$_SESSION['userImage'] = $data['user_Image'];
	}

	if (isset($_SESSION['access_token'])) {
		$gClient->setAccessToken($_SESSION['access_token']);
	}
	else if (isset($_GET['code'])) {
		$token = $gClient->authenticate($_GET['code']);
		$_SESSION['access_token'] = $token;
	}
	else{
		header('location:../Link_Pages/login.php');
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	echo "<pre>";
	var_dump($userData);
	echo "<b>";
	echo $userData['email'];
	echo $userData['name'];

	$connect = mysqli_connect('localhost','root','','project');
	$query = "select * from user where user_email = '".$userData['email']."'";
	$result = mysqli_query($connect,$query);
	$result = mysqli_num_rows($result);
	if ($result > 0) {
		
		$query = "select * from user where user_email = '".$userData['email']."' and isGoogle = ".true;
		$result = mysqli_query($connect,$query);
		$numOfRows = mysqli_num_rows($result);
		if ($numOfRows > 0) {
			$data = mysqli_fetch_array($result);
			$_SESSION['userName'] = $data['user_name'];
			$_SESSION['userId'] = $data['user_id'];
			$_SESSION['userEmail'] = $data['user_email'];
			$_SESSION['isGoogle'] = $data['isGoogle'];
			$_SESSION['userImage'] = $data['user_Image'];

			$_SESSION['message'] = $_SESSION['userName'];
			//header("location:../Link_Pages/login.php");
			if (isset($_SESSION['navigateLink'])) {
				header('location:../Link_Pages/'.$_SESSION['navigateLink']);
			}
			else{
				header("location:../Link_Pages/homePage.php");//home
			}
		}
		else{
			$_SESSION['message'] = "Email is Already Registered. Use another Email";
			unset($_SESSION['access_token']);
			$gClient->revokeToken();
			header("location:../Link_Pages/login.php");
		}
	}
	else{
		$query = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`, `isGoogle`, `user_Image`) VALUES ('".$userData['givenName']."','".$userData['email']."','','".true."','".$userData['picture']."')";
		$result = mysqli_query($connect,$query);
		echo "$result";
		if ($result == 1) {
			//$_SESSION['message'] = "Login Successfull";
			
			$query = "select * from user where user_email = '".$userData['email']."'";
			$result = mysqli_query($connect,$query);
			$data = mysqli_fetch_array($result);

			$_SESSION['userName'] = $data['user_name'];
			$_SESSION['userId'] = $data['user_id'];
			$_SESSION['userEmail'] = $data['user_email'];
			$_SESSION['isGoogle'] = $data['isGoogle'];
			$_SESSION['userImage'] = $data['user_Image'];
			//echo $_SESSION['userEmail']."<br>".$_SESSION['userImage'];
			
			
			if (isset($_SESSION['navigateLink'])) {
				header('location:../Link_Pages/'.$_SESSION['navigateLink']);
			}
			else{
				header("location:../Link_Pages/login.php");
			}
		}
		else{
			$_SESSION['message'] = "Login Error";
			header("location:../Link_Pages/login.php");
		}
	}
	ob_flush();
?>