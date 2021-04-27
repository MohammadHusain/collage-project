<!DOCTYPE html>
<?php $connect = mysqli_connect('localhost','root','','project'); 
	if (!$connect) {
		die("Failed to connect with Database");
	}
	if (isset($_COOKIE['AdminLoginStatus'])) {
		header('location:admin_main.php');
	}
?>
	<?php 
		$errorMessage;
		if (isset($_POST['AdminLogin'])) {
			if (!empty($_POST['adminUserName']) && !empty($_POST['adminPassword'])) {
				$query = "select count(id),UserName from admin where Binary UserName ='".$_POST['adminUserName']."' and Binary Password = '".$_POST['adminPassword']."'";
				$result = mysqli_query($connect,$query);
				$data = mysqli_fetch_array($result);
				
				if ($data['count(id)'] == 1) {
					setcookie("AdminLoginStatus","true",time()+80000,'/');
					setcookie("AdminName",$data['UserName'],time()+80000,'/');
					header("location:admin_main.php");
				}
				else{
					$errorMessage = "User Name and Password dosen't match";
				}
			}
		}
	?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		*{padding: 0;margin: 0}
		.adminLoginInput{
			border-radius: 0;
		}
	</style>
</head>
<body>
	<div style="width: 100%;background-color: black;">
		<center>
			<img src="../logo6.png" alt="" style="width: 250px;">
		</center>
	</div>
	<div style="height: 85vh;width: 100%;display: flex;justify-content: center;align-items: center;">
		<form method="post" action="">
			<div style="width: 300px;">
				<h3 class="text-center mb-3">Adminstrator Area</h3>
				<div class="mt-2 mb-0">
						<input type="text" name="adminUserName" id="adminUserName" class="form-control adminLoginInput" placeholder="Username" autocomplete="off">
				</div>
				<div class="mt-2 mb-0">
						<input type="password" name="adminPassword" id="adminPassword" class="form-control adminLoginInput" placeholder="Password" autocomplete="off">
				</div>	

				<Label style="margin-top: 10px;color: red">
					<?php 
						if (isset($errorMessage)) {
							echo $errorMessage;
						}
					 ?>
				</Label>
				<center>
					<button class="form-control adminLoginInput bg-warning mt-2" name="AdminLogin" style="width: 150px;">Log in</button>
				</center>
			</div>
		</form>
	</div>
</body>
</html>