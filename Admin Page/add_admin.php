<html>
		<head>
			<title></title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

			<style type="text/css">
				*{padding: 0;margin: 0}
				.adminLoginInput{
					border-radius: 0;
				}
			</style>
		</head>
		<body>
			<?php 
			session_start();
				if (isset($_SESSION['DeleteMsg'])) {
					echo "<script>alert('".$_SESSION['DeleteMsg']."')</script>";
					unset($_SESSION['DeleteMsg']);
				}
			?>
			<nav style="position: sticky;top: 0;z-index: 999">
				<div class="bg-dark d-flex text-light align-items-center p-2 m-0">
					<h1 class="display-4 m-0 text-warning" style="font-size: 35px;">
						Admin Page
					</h1>
					<p class="mt-auto m-0 pl-4">( <?php echo $_COOKIE['AdminName']; ?> )</p>
					<ul class="ml-auto" style="list-style: none; display: flex; padding: 0;margin: 0">
						<li><a href="admin_main.php" class="p-3 text-light ">Dashboard</a></li>
						<li><a href="insert_car.php" class="p-3 text-light ">Insert Car</a></li>
						<li><a href="insert_movies.php" class="p-3 text-light ">Insert Movies</a></li>
						<li><a href="insert_theater.php" class="p-3 text-light ">Insert Theater</a></li>
						<li><a href="add_admin.php" class="p-3 text-light ">Add Admin</a></li>
					</ul>
				
					<a href="admin_logout.php" class="ml-auto bg-warning p-2" style=" border-radius: 30px; border:none;">LogOut</a>
				</div>
			</nav>

<?php 
	if ($_COOKIE['AdminName'] == 'SadikAli') {

			$connect = mysqli_connect('localhost','root','','project'); 
	
			if (!$connect) {
				die("Failed to connect with Database");
			}

			if (!isset($_COOKIE['AdminLoginStatus'])) {
				header('location:admin_Login.php');
			}

			if (isset($_POST['AddAdmin'])) {
				if (!empty($_POST['adminUserName']) && !empty($_POST['adminPassword'])) {

					$adminUserName = $_POST['adminUserName'];
					$adminPassword = $_POST['adminPassword'];

					$query1 = "select count(*) from admin where UserName = '$adminUserName'";
					$result1 = mysqli_query($connect,$query1);
					$data1 = mysqli_fetch_array($result1);

					if ($data1['count(*)'] == 0) {
						$query = "INSERT INTO `admin`(`UserName`, `Password`) VALUES ('$adminUserName','$adminPassword')";
						$result = mysqli_query($connect,$query);
						if ($result) {
							?>
								<script type="text/javascript">
									alert("New Admin Added");
								</script>
							<?php
						}
						else
						{
							?>
								<script type="text/javascript">
									alert("Fail to add Admin");
								</script>
							<?php
						}
					}
				}
				
			}
		?>
		

			<div style="min-height: 100vh;width: 100%;display: flex;flex-direction:column;justify-content: center;align-items: center;">
				<form method="post" action="">
					<div style="width: 300px;" class="p-3">
						<h3 class="text-center mb-3">Add New Admin</h3>
						<div class="mt-2 mb-0">
								<input type="text" name="adminUserName" id="adminUserName" class="form-control adminLoginInput" placeholder="Username" autocomplete="off" required>
						</div>
						<div class="mt-2 mb-0">
								<input type="password" name="adminPassword" id="adminPassword" class="form-control adminLoginInput" placeholder="Password" autocomplete="off" required>
						</div>	

						<!-- <Label style="margin-top: 10px;color: red">
							<?php 
								if (isset($errorMessage)) {
									echo $errorMessage;
								}
							 ?>
						</Label> -->
						<center>
							<button class="form-control adminLoginInput bg-warning mt-2" name="AddAdmin" style="width: 150px;">Add</button>
						</center>
					</div>
				</form>
				<div class="container mt-5">
					<?php
						$query_select = "select * from admin";
						$result_select = mysqli_query($connect,$query_select);
						

					?>
					<table class="table table-striped table-bordered text-center" style="">
							<thead class="bg-dark text-light">
								<th>-</th>
								<th>id</th>
								<th>UserName</th>
								<th>Password</th>
							</thead>

							<?php
								while ($data_select = mysqli_fetch_array($result_select)) {
									?>
										<tr>
											<td style="width: 10px;">
												<a class="btn btn-light text-danger" id="removeAdmin" href="remove_admin.php?adminId=<?php echo $data_select['id'] ?>"> 
													<i class="fas fa-trash-alt"></i>
												</a>
											</td>
											<td><?php echo $data_select['id']?></td>
											<td><?php echo $data_select['UserName']?></td>
											<td><?php echo $data_select['Password']?></td>
										</tr>
										
											
									<?php
								}
							?>
							
					</table>
			</div>
			</div>
			
		</body>
		</html>
	<?php
	}
	else{
		echo '<div style="height:80vh;display:flex;justify-content:center;align-items:center"><p class="display-4">You are not Authorized Admin</p></div>';
	}
	?>
	<script type="text/javascript">
		function car_UpdateData() {
	</script>