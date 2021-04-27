<?php 
	$connect = mysqli_connect('localhost','root','','project');
	session_start();
	if (!isset($_COOKIE['userId'])) {
		$_SESSION['message'] = "login First";
		echo "login First";
		exit();
	}


	/*--Add to list car--*/
	if (isset($_POST['addToList_carId'])) {
		
		$query = "select COUNT(car_addToList_ID) from car_addtolist where userId ='".$_COOKIE['userId']."'  and car_id ='".$_POST['addToList_carId']."'";
		$result = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($result);
		if ($data['COUNT(car_addToList_ID)'] > 0) {
			echo "Car already in your List";
		}
		else
		{
			$query2 = "INSERT INTO `car_addtolist`(`userId`, `car_id`) VALUES ('".$_COOKIE['userId']."','".$_POST['addToList_carId']."')";
			$result2 = mysqli_query($connect,$query2);

			if ($result2 == 1) {
				echo "Car added to your List.";
			}
			else{
				echo "Error while adding to your List.";
			}
		}
	}

	if (isset($_POST['showcardata'])) {
		$query3 = "SELECT c.* FROM `cars_list` c,`car_addtolist` c2 WHERE c.car_id = c2.car_id and c2.userId ='".$_COOKIE['userId']."'";
		$result3 = mysqli_query($connect,$query3);
		// SELECT c.* FROM `cars_list` c,`car_addtolist` c2 WHERE c.car_id = c2.car_id and c2.userId = 40
		if (mysqli_num_rows($result3) > 0) {
			$temp = 0;
			while ($data3 = mysqli_fetch_array($result3)) {

				$temp = $temp + 1;
				$temp2 = $temp * 50;
				$delay = $temp2."ms";
				?>
					<div class=" col-lg-4 col-md-6 col-sm-6 p-1  animated jackInTheBox fast" style="animation-delay: <?php echo $delay; ?>">
							<div class="carSearch_card card p-2 h-100">
									<div class="w-100">
										<img src=" ../Images/car-images/<?php echo $data3['car_image']?> " width="100%">
									</div>
									<div class="carSearch_cardContent d-flex flex-column mb-2" style="position: relative;">
										<span class="pt-1 pb-1" style="font-size: 20px;font-weight: 600;">
											<?php echo $data3['car_name']; ?>
										</span>
										<span>
											<u>City</u> : <?php echo $data3['car_city']; ?>
										</span>
										<span style="font-size: 13px">
											<u>Condition</u> : <?php echo $data3['condition']; ?>
										</span>
										<span>
											<input type="hidden" name="carId" class="addToList_carId" value=" <?php echo $data3['car_id'] ?> ">
											<button type="button" class="addOrMinus_car" id="removeListBtn_car"><i class="fa fa-minus"></i></button>
										</span>
									</div>
									<div class="mt-auto text-danger mb-2" style="font-size: 25px;">
										<span>
											&#x20B9; <?php echo $data3['car_price']; ?>/Day
										</span>
									</div>
									<div class=" d-flex justify-content-end">
											<a href="car_BookNow.php?carId=<?php echo $data3['car_id'] ?>"class="btn btnBookNow_car">Book Now</a>
									</div>
									
							</div>
					</div>
				<?php
			}
		}
		else{
			?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">No Record Found </strong>
				</div>
			<?php
		}
	}

	/*--Remove AddList_Car--*/
	if (isset($_POST['RemoveCarId'])) {
		$query = "DELETE FROM `car_addtolist` WHERE car_id = '".$_POST['RemoveCarId']."' and userId = '".$_COOKIE['userId']."'";
		$result = mysqli_query($connect,$query);
		if ($result) {
			echo "Car Removed From your List.";
		}
		else{
			echo "Error while Removing car from your List.";
		}
	}


	/*--Add to list movie--*/
	if (isset($_GET['m_id'])) {
		$query = "select COUNT(movie_addtolist_ID) from movie_addtolist where user_id ='".$_COOKIE['userId']."'  and m_id = '".$_GET['m_id']."'";
		$result = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($result);
		if ($data['COUNT(movie_addtolist_ID)'] > 0) {
			$_SESSION['movielistMessage'] = 'Movie is already in your list';
		}
		else{
			$query_movie = "INSERT INTO `movie_addtolist`(`user_id`, `m_id`) VALUES ('".$_COOKIE['userId']."','".$_GET['m_id']."')";
			$result_movie = mysqli_query($connect,$query_movie);
			if ($result_movie == 1) {
				$_SESSION['movielistMessage'] = 'Movie is successfully added to your list';
			}
			else{
				$_SESSION['movielistMessage'] = 'Failed while add to list';
			}
		}
		header('location:addToList.php');
	}

	/*--Add To List Movies---*/

	if (isset($_POST['showMovieData'])) {
		$query = "SELECT m.m_id,m.movie_name,m.Language,m.image FROM `movies_list` m,`movie_addtolist` m2 WHERE m.m_id = m2.m_id and m2.user_id ='".$_COOKIE['userId']."'";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<div class="col-lg-3 col-md-4 col-sm-4 col-6 mt-2 p-1 hover animated  fadeInUp faster">
					
						<section class="bg-light p-1" style="border-radius: 5px;">
							<div class="movieIconContainer">

								<img src="../Images/Movie-image/<?php echo $data['image'] ?>" alt="" class="movies_icon">

								<figcaption class="fig_overlay">
									<!-- <a href="addToListBackend.php?m_id=<?php echo $data['m_id'] ?>" class="btn btn-danger btn m-1">
										<i class="fas fa-plus"></i>  Add to List
									</a> -->
									<a href="movie_CaptureDetail.php?m_id=<?php echo $data['m_id'] ?>" id="BookButton" class="btn btn-warning text-dark pl-3 pr-3">
										<i class="fa fa-bookmark"></i>  Book Now
									</a>
									<!-- <input type="submit" value="Book Now" class="btn btn-warning m-1 text-dark"></input> -->
									<a href="addToListBackend.php?remove_m_id=<?php echo $data['m_id'] ?>" class="removeList">
										<i class="fa fa-times-circle"></i>
									</a>
								</figcaption>
								
							</div>	

								<div class="p-1">
									<p class="text-center m-0 movie-name-style">
									<?php echo $data['movie_name'] ?>
								</p>
								<p class="text-center m-0 movie-name-style" style="font-size: 12px">
									<?php echo $data['Language']; ?>
								</p>
							</div>
							<input type="hidden" value="<?php echo $data['m_id'] ?>">
						</section>
					
						
				</div>
				<?php
			}
		}
		else{
			?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">No Record Found </strong>
				</div>
			<?php
		}
	}

	if (isset($_GET['remove_m_id'])) {
		$query = "delete from movie_addtolist where m_id = '".$_GET['remove_m_id']."' and user_id = '".$_COOKIE['userId']."'";
		$result = mysqli_query($connect,$query);

		if ($result) {
			$_SESSION['movielistMessage'] = "Movie removed from your list";
		}
		else{
			$_SESSION['movielistMessage'] = "Error while removing from your list";
		}
		header('location:addToList.php');
	}
 ?>