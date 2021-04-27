<?php 
	$connect = mysqli_connect('localhost','root','','project');
	if ($connect == null) {
		exit();
	}
	session_start();

	/*--------------------------get rendon data----------------------------*/
	if (isset($_POST['getRendom']) && $connect) {
		$query = "select * from movies_list order by RAND() LIMIT 6";

		$result = mysqli_query($connect,$query);
		if (mysqli_num_rows($result)>0) {
			$temp = 0;
			while ($data = mysqli_fetch_array($result)) {
				$temp = $temp + 1;
				$temp2 = $temp * 50;
				$delay = $temp2."ms";
				?>
				<div class="col-lg-2 col-md-4 col-sm-4 col-6 mt-2 p-1 hover animated fadeInUp faster" style="animation-delay: <?php echo $delay; ?>">
					
						<section class=" bg-light" style="border-radius: 5px;">
							<div class="movieIconContainer">

								<img src="../Images/Movie-image/<?php echo $data['image'] ?>" alt="" class="movies_icon">

								<figcaption class="fig_overlay">
									<!-- <a href="" class=" text-success p-1" style="font-size: 17px"><i class="fas fa-plus"></i></a> -->
									<a href="addToListBackend.php?m_id=<?php echo $data['m_id'] ?>" class="btn btn-danger btn m-1" id="movie_addToList">
										<i class="fa fa-plus"></i>  Add to List
									</a>
									<a href="movie_CaptureDetail.php?m_id=<?php echo $data['m_id'] ?>" id="BookButton" class="btn btn-warning text-dark pl-3 pr-3">
										<i class="fa fa-bookmark"></i>  Book Now
									</a>
								</figcaption>
 
							</div>	

								<div class="p-1">
									<p class="text-center m-0 movie-name-style" style="">
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
	}

	/*----------------showall-----------------*/

	if (isset($_POST['showall']) && $connect) {
		$query = "select * from movies_list";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
				<div class="col-lg-2 col-md-4 col-sm-4 col-6 mt-2 hover">
					<form action="">
						<section class="" style="border-radius: 5px;">
							<div class="movieIconContainer">

								<img src="../Images/Movie-image/<?php echo $data['image'] ?>" alt="" class="movies_icon">

								<figcaption class="fig_overlay">
									<a href="" class=" text-danger p-1" style="font-size: 17px"><i class="fa fa-plus"></i></a>
									<button class=" btn btn-success text-white">Book Now</button>
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
					</form>
						
				</div>
				<?php
			}
		}
	}



	if (isset($_POST['search_value'])) {
		$query = "select DISTINCT city from theater_list where city like '%".$_POST['search_value']."%'";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<li class="search-result"><?php echo $data['city']; ?></li>
				<?php
			}
		}
		else
		{
			?>
					<li class="list-unstyled"><?php echo "No result found..."; ?></li>
			<?php
		}
	}


	if (isset($_POST['find_movies'])) 
	{

		$query = "SELECT DISTINCT M.* FROM `movies_list`M , `theater_list` T WHERE M.m_id = T.m_id && T.city = '".$_POST['find_movies']."'";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {

			//$_SESSION['movie_city'] = $_POST['find_movies'];

			while ($data = mysqli_fetch_array($result)) {
				?>
				<div class="col-lg-3 col-md-4 col-sm-4 col-6 mt-2 p-2 hover animated  fadeInUp faster">
					
						<section class="p-1" style="border-radius: 5px;box-shadow:2px 2px 10px grey;overflow: hidden;">
							<div class="movieIconContainer">

								<img src="../Images/Movie-image/<?php echo $data['image'] ?>" alt="" class="movies_icon">

								<figcaption class="fig_overlay">
									<a href="addToListBackend.php?m_id=<?php echo $data['m_id'] ?>" class="btn btn-danger btn m-1">
										<i class="fa fa-plus"></i>  Add to List
									</a>
									<a href="movie_CaptureDetail.php?m_id=<?php echo $data['m_id'] ?>" id="BookButton" class="btn btn-warning text-dark pl-3 pr-3">
										<i class="fa fa-bookmark"></i>  Book Now
									</a>
									<!-- <input type="submit" value="Book Now" class="btn btn-warning m-1 text-dark"></input> -->
								</figcaption>

							</div>	

								<div class="">
									<p class="text-center m-0 movie-name-style" style="font-size: 18px;">
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
			echo "NF";
		}
	}
?>