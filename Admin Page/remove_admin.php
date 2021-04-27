<?php
	$connect = mysqli_connect('localhost','root','','project');
	session_start();

	 if (isset($_GET['adminId'])) {
	 	$adminId = $_GET['adminId'];

	 	$query = "DELETE FROM `admin` WHERE id = '$adminId'";
	 	$result = mysqli_query($connect,$query);

	 	if ($result) {
	 		$_SESSION['DeleteMsg'] = "Admin Successfully Removed";
	 	}
	 	else{
	 		$_SESSION['DeleteMsg'] = "Fail to remove Admin";
	 	}

	 }
	 header('location:add_admin.php');
?>