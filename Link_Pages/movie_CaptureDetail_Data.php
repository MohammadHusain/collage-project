<?php 
	session_start();
	$connect = mysqli_connect('localhost','root','','project');

	if ($connect == null) {
		exit();
	}
	if (isset($_REQUEST['SelectedCity']) && $_REQUEST['SelectedCity'] != null && isset($_REQUEST['m_id']) && $_REQUEST['m_id'] != null) 
	{
		// echo $_REQUEST['SelectedCity'];
		$query = "select t_name from theater_list where m_id ='".$_REQUEST['m_id']."' AND city = '".$_REQUEST['SelectedCity']."'";
		echo "$query";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				echo "<option>".$data['t_name']."</option>";
			}
		}
	}

	if (isset($_POST['selectTheaterName'])) {
		$query = "select ticket_price from theater_list where  t_name = '".$_POST['selectTheaterName']."' and city = '".$_POST['city']."' and m_id = '".$_SESSION['m_id']."'";
		$result = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($result);
		echo $data['ticket_price'];
	}
?>