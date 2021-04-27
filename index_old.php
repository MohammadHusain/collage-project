<!DOCTYPE html>
<?php
	session_start();
	ob_start();
	$connect = mysqli_connect('localhost','root','','project');
	if (isset($_SESSION['userId']) && !isset($_COOKIE['userId'])) {
		setcookie("userId",$_SESSION['userId'],time() + 80000,"/");
		setcookie("userName",$_SESSION['userName'],time() + 80000,"/");
		setcookie("userEmail",$_SESSION['userEmail'],time() + 80000,"/");
		setcookie("isGoogle",$_SESSION['isGoogle'],time() + 80000,"/");
		setcookie("userImage",$_SESSION['userImage'],time() + 80000,"/");
		header('location:'.$_SERVER['PHP_SELF']);
	}
	if (isset($_COOKIE['userId'])) {
		setcookie("userId",$_COOKIE['userId'],time() + 80000,"/");
		setcookie("userName",$_COOKIE['userName'],time() + 80000,"/");
		setcookie("userEmail",$_COOKIE['userEmail'],time() + 80000,"/");
		setcookie("isGoogle",$_COOKIE['isGoogle'],time() + 80000,"/");
		setcookie("userImage",$_COOKIE['userImage'],time() + 80000,"/");
	}
?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" href="../style/movie_style.css">
	<link rel="stylesheet" href="../style/style_HomePage.css">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" href="../style/style_login.css">
	<link rel="stylesheet" href="../style/rental_car.css">
	<link rel="stylesheet" type="text/css" href="../style/style_history.css">
	<link rel="stylesheet" type="text/css" href="../style/style_movieCaptureDetail.css">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="container-fluid pr-0 d-flex" style="">
		<div class="logo mr-5 ml-3">
			<img src="../logo6.png" alt="">
		</div>
		<div class="links-container hide" id="">
			<ul class="navbar navbar-links text-light">
				<li class="nav-item " style=""><a href="" class="nav-link ">Home</a></li>
				<li class="nav-item"><a href="#feedbackContainer" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="" class="nav-link">Contact</a></li>
				<li class="nav-item"><a href="" class="nav-link">Feedback</a></li>
			</ul>
		</div>
		<div class="links-container" style="margin-left: auto">
			<ul class="navbar navbar-links hide2 text-light">
				<li class="nav-item login ">
					<?php 
						if (isset($_COOKIE["userName"])) {
							?>
								<a href="logOut.php" style="display: block;" class="pt-2 pb-2 pl-3 pr-3">LogOut</a>
							<?php
						}
						else{
							?>
								<a href="login.php" style="display: block;" class="pt-2 pb-2 pl-3 pr-3">Login</a>
							<?php
						}
					?>
				</li>
				<li class="nav-item pl-1" style="font-size: 25px;font-weight: bolder;">
					<a href="#"class="nav-link" id="menu"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</div>

		<div id="slide-navbar">
			<div class="slide-navbar-header">
				<?php 
					if (isset($_COOKIE['userId'])) {
						if ($_COOKIE['isGoogle'] == 1) {
							?>
								<img src="<?php echo $_COOKIE['userImage'] ?>" class="userImage" width="100px">
							<?php
						}
						else{
							?>
								<img src="../Images/UserUnknown.png" class="userImage guest" width="100px">
							<?php
						}
					}
					else{
						?>
							<img src="../Images/UserUnknown.png" class="userImage guest" width="100px">
						<?php
					}

					if (isset($_COOKIE['userName'])) {
						?>
							<p class="userName"><?php echo $_COOKIE['userName']; ?></p>
						<?php
					}
					else{
						?>
							<p class="userName"><?php echo "Guest User" ?></p>
						<?php
					}

					if(isset($_COOKIE['userEmail'])){
						?>
							<p class="userEmail"><?php echo $_COOKIE['userEmail']; ?></p>
						<?php
					}
				?>
			</div>
			<div class="nav-link-container">
				<li id="Home">
					<a href="homePage.php"><span><i class="fas fa-home"></i></span> &nbsp;&nbsp;Home</a>
					<span class="hover-style"></span>
				</li>
				<li id="Cars">
					<a href="rental_car.php"><span><i class="fas fa-car"></i></span> &nbsp;&nbsp;Book Cars</a>
					<span class="hover-style"></span>
				</li>
				<li  id="Movies">
					<a href="movie_link.php"><span><i class="fas fa-film"></i></span> &nbsp;&nbsp;Book Movies</a>
					<span class="hover-style"></span>
				</li>
				<li id="addToList">
					<a href="addToList.php"><span><i class="fas fa-list"></i></span> &nbsp;&nbsp;Your List</a>
					<span class="hover-style"></span>
				</li>
				<li id="History">
					<a href="history.php"><span><i class="fas fa-history"></i></span> &nbsp;&nbsp;History</a>
					<span class="hover-style"></span>
				</li>
				<li id="Login">
					<a href="login.php"><span><i class="fas fa-user-alt"></i></span> &nbsp;&nbsp;Login</a>
					<span class="hover-style"></span>
				</li>
				<li>
					<a href="#feedbackContainer"><span><i class="fas fa-comment-dots"></i></span> &nbsp;&nbsp;Feedback</a>
					<span class="hover-style"></span>
				</li>
			</div>
		</div>
	</nav>
	<script type="text/javascript">
		$(document).ready(function() {
			var active;
			// $(window).mousedown(function(event) {
			// 	if (active == true) {
			// 		$('#slide-navbar').css({
			// 			right: '-350px'
			// 		});
			// 	}
			// });
			// $('#menu').mouseup(function() {
			// 	$('#slide-navbar').css({
			// 		right: '0'
			// 	});
			// 	active = true;
			// });

			$('#slide-navbar').click(function() {
				$('#slide-navbar').css({
					right: '-350px'
				});
			});
			$('#menu').mouseup(function() {
				$('#slide-navbar').css({
					right: '0'
				});
			});

			// $(document).scroll(function(event) {
			// 	var scrollValue = $(document).scrollTop();
			// 	if (scrollValue > 10) {
			// 		$('nav').css({
			// 			backgroundColor: 'black',
			// 			transition : '0.3s'
			// 		});
			// 	}
			// 	else{
			// 		$('nav').css({
			// 			backgroundColor : 'rgba(0, 0, 0, 0.31)'
			// 		});
			// 	}
			// });
			
		});
</script>