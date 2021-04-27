<?php $connect = mysqli_connect('localhost','root','','project'); 
	if (!$connect) {
		echo "Failed to connect with Database";
	}

	if (!isset($_COOKIE['AdminLoginStatus'])) {
		header('location:admin_Login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.dashboard-panel h1{
			font-weight: lighter;
		}
	</style>
</head>
<body>

	<nav style="position: sticky;top: 0;z-index: 999">
		<div class="bg-dark d-flex text-light align-items-center p-2 m-0">
			<h1 class="display-4 m-0 text-warning" style="font-size: 35px;">
				Admin Page
			</h1>
			<p class="mt-auto m-0 pl-4">( <?php echo $_COOKIE['AdminName']; ?> )</p>
			<ul class="ml-auto" style="list-style: none; display: flex; padding: 0;margin: 0">
				<li><a href="insert_car.php" class="p-3 text-light ">Insert Car</a></li>
				<li><a href="insert_movies.php" class="p-3 text-light ">Insert Movies</a></li>
				<li><a href="insert_theater.php" class="p-3 text-light ">Insert Theater</a></li>
				<li><a href="add_admin.php" class="p-3 text-light ">Add Admin</a></li>
			</ul>
		
			<a href="admin_logout.php" class="ml-auto bg-warning p-2" style=" border-radius: 30px; border:none;">LogOut</a>
		</div>
	</nav>


		<div class="container-fluid d-flex mt-3">
			<div class="col-md-3 p-2">
				<div class="bg-danger d-flex justify-content-center flex-column align-items-center pt-5 pb-5 dashboard-panel text-light" style="box-shadow: 5px 5px 10px gray;">
					<span><i class="fas fa-film pb-2" style="font-size: 35px;"></i></span>
					<h1>Total Theaters</h1>
					<strong>
						<h1>
							<?php
								
								$query_totalTheater = "select count(id) from theater_list ";
								$result = mysqli_query($connect,$query_totalTheater);

								if ($result) {
								    $data = mysqli_fetch_array($result);
									echo $data['count(id)'];
								}
								else{
									echo "-";
								}
							?>
						</h1>
					</strong>
				</div>
			</div>
			<div class="col-md-3 p-2">
				<div class="bg-primary d-flex justify-content-center flex-column align-items-center pt-5 pb-5 dashboard-panel text-light" style="box-shadow: 5px 5px 10px gray;">
					<span><i class="fas fa-film pb-2" style="font-size: 35px;"></i></span>
					<h1>Total Movies</h1>
					<strong>
						<h1>
							<?php
								
								$query_totalMovies = "select count(m_id) from movies_list ";
								$result = mysqli_query($connect,$query_totalMovies);

								if ($result) {
								    $data = mysqli_fetch_array($result);
									echo $data['count(m_id)'];
								}
								else{
									echo "-";
								}
							?>
						</h1>
					</strong>
				</div>
			</div>
			<div class="col-md-3 p-2">
				<div class="bg-warning d-flex justify-content-center flex-column align-items-center pt-5 pb-5 dashboard-panel text-light" style="box-shadow: 5px 5px 10px gray;">
					<span><i class="fas fa-car pb-2" style="font-size: 35px;"></i></span>
					<h1>Cars Available</h1>
					<strong>
						<h1>
							<?php
								
								$query_totalCarsAvailable = "select count(car_id) from cars_list where status!='Not-Available' ";
								$result = mysqli_query($connect,$query_totalCarsAvailable);

								if ($result) {
								    $data = mysqli_fetch_array($result);
									echo $data['count(car_id)'];
								}
								else{
									echo "-";
								}
							?>
						</h1>
					</strong>
				</div>
			</div>
			<div class="col-md-3 p-2">
				<div class="bg-success d-flex justify-content-center flex-column align-items-center pt-5 pb-5 dashboard-panel text-light" style="box-shadow: 5px 5px 10px gray;">
					<span><i class="fas fa-car pb-2" style="font-size: 35px;"></i></span>
					<h1>Cars Booked</h1>
					<strong>
						<h1>
							<?php
								
								$query_totalCarsNotAvailable = "select count(car_id) from cars_list where status='Not-Available' ";
								$result = mysqli_query($connect,$query_totalCarsNotAvailable);

								if ($result) {
								    $data = mysqli_fetch_array($result);
									echo $data['count(car_id)'];
								}
								else{
									echo "-";
								}
							?>
						</h1>
					</strong>
				</div>
			</div>
		</div>

		<div class="pt-3 container">
			<h1>Trending Movies:</h1>
			<div class="row">
				<div class="col-md-6 d-flex align-items-start mt-2">
					<select class="form-control m-0" id="allMovies">
						<option disabled selected>select Movie</option>
					</select>
					<button class="form-control w-25 bg-primary text-light" id="btn_trend">Trend It</button>
				</div>
				<div class="col-md-6">
					<table class="table table-striped table-bordered text-center">
						<thead>
							<tr>
								<th style="width: 10%; background-color: rgb(112, 102, 102); color: white">-</th>
								<th style="width: 15%; background-color: rgb(112, 102, 102); color: white">#M_ID</th>
								<th style="width: 60%; background-color: rgb(112, 102, 102); color: white">Movie</th>
							</tr>
						</thead>
						<tbody id="movieTrendingContainer">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<div class="pt-3 container">
			<h1>Feedback:</h1>
			<table class="table table-striped table-bordered text-center" style="">
				<thead>
					<tr>
						<th style="width: 50px; background-color: rgb(112, 102, 102); color: white">-</th>
						<th style="width: 70px; background-color: rgb(112, 102, 102); color: white">#ID</th>
						<th style="width: 30%; background-color: rgb(112, 102, 102); color: white">User Name</th>
						<th style=" background-color: rgb(112, 102, 102); color: white">Feedback</th>
					</tr>
				</thead>
				<tbody id="car_table_body">
					
				</tbody>
			</table>
		</div>
		<script>
			feedbackData();
			showTrendingMovies();
			displayAllMovies();
			 function feedbackData(argument) {
			 	$.ajax({
			 		url: 'feedback-backend.php',
			 		type: 'post',
			 		data: {getFeedback: 'value1'},
			 		success:function(data) {
			 			$('#car_table_body').html(data);
			 		}
			 	})
			 }
			 function showTrendingMovies(argument) {
			 	$.ajax({
			 		url: 'feedback-backend.php',
			 		type: 'post',
			 		data: {showTrendingMovies: 'value1'},
			 		success:function(data) {
			 			$('#movieTrendingContainer').html(data);
			 		}
			 	})
			 }

			function deleteFeedback(argument) {
				$.ajax({
			 		url: 'feedback-backend.php',
			 		type: 'post',
			 		data: {feedbackDeleteId: argument},
			 		success:function(data) {
			 			alert(data);
			 			feedbackData();
			 		}
			 	})
			}
			function deleteTrending(argument) {
				$.ajax({
					url: 'feedback-backend.php',
					type: 'post',
					data: {TrendingMoviesDeleteId: argument},
					success:function (data) {
						if (data == 'success') {
							alert('Movies status successfully updated');
							displayAllMovies();
							showTrendingMovies();
						}
						else {
							alert('Movies status cannot updated');
						}
					}
				})				
			}
			function displayAllMovies(argument) {
				$.ajax({
			 		url: 'feedback-backend.php',
			 		type: 'post',
			 		data: {displayAllMovies: 'argument'},
			 		success:function(data) {
			 			$('#allMovies').html(data);
			 		}
			 	})
			}
			$('#btn_trend').click(function(event) {
				
				var val = $('#allMovies').val();
				if (val == null) {return;}

				$.ajax({
					url: 'feedback-backend.php',
					type: 'post',
					data: {movie_id: val},
					success:function(argument) {
						if (argument == 'success') {
							alert("Movie is set as Trending");
							showTrendingMovies();
							displayAllMovies();
							feedbackData();
						}				
						else {
							alert("Movie fail to set as Trending");		
						}		
					}
				})
				
			});
		</script>
</body>
</html>