<?php
	session_start();
	$connect = mysqli_connect('localhost','root','','project');
	if (isset($_POST['txtMovieReview'])) {
		$query = "INSERT INTO `movies_reviews`(`user_name`, `m_id`, `review`) VALUES ('".$_COOKIE['userName']."','".$_SESSION['m_id']."','".$_POST['txtMovieReview']."')";
		$result = mysqli_query($connect,$query);
		if ($result) {
			echo "success";
			unset($_SESSION['OFFSET']);
		}
		else{
			echo "error";
		}
	}

	if (isset($_POST['showMoviewReview'])) {
		
		if (isset($_SESSION['OFFSET'])) {
			$_SESSION['OFFSET'] = $_SESSION['OFFSET'] + 5;
		}
		else{
			$_SESSION['OFFSET'] = 0;
		}
		$query = "SELECT * FROM `movies_reviews` where m_id = '".$_SESSION['m_id']."' ORDER BY id desc LIMIT 5 OFFSET ".$_SESSION['OFFSET'];
		$result = mysqli_query($connect,$query);
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<div class="reviewStyle">
						<div class="reviewStyle_header">
							<?php echo $data['user_name']; ?>
						</div>
						<div class="reviewStyle_body">
							<?php echo $data['review']; ?>
						</div>
						<div class="edge"></div>
					</div>
				<?php
			}
		}
		else{
			if ($_SESSION['OFFSET'] != 0) {
				echo "khatam";
			}
			else{
				echo "Be the First Reviewer";
			}
		}
	}
?>