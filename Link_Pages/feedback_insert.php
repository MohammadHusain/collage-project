<?php
	if (isset($_POST['feedback'])) {
		$userName;
		if (isset($_COOKIE['userName'])) {
			$userName = $_COOKIE['userName'];
		}
		else{
			$userName = "Guest User";
		}

		$connect = mysqli_connect('localhost','root','','project');

		$query = "INSERT INTO `user_feedback`(`user_name`, `feedback`) VALUES ('$userName','".$_POST['feedback']."')";
		$result = mysqli_query($connect,$query);

		if ($result) {
			echo "Thanks for the Feedback";
		}
		else{
			echo "Error while sending feedback";
		}
	}
 ?>