<?php include '..\index.php' ?>
<div class="video-container">
    <div style="" class="header-background">
    	<video autoplay loop muted class="header_hide">
	       <source src="../Images/banner.mp4" type="video/mp4">
	    </video>
    </div>
    <div class="video_text">
    	<h1 class="display-4 text-warning ">BOOKING.IN</h1>
    	<h2 class="text-light" id="typingAnimation">Book Your&nbsp;</h2>
    	<p>Your Perfect Holiday - Just A Click Away</p>
    </div>
    <div class="homeHeaderBorder"></div>
    <div class="SideHeaderIcon header_hide2">
    	<div class="socialIcon">
    		<li style="background-color: #3b5998">
    			<a href="" style="color: white"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    		</li>
    		<li style="background-color: #dd4b39">
    			<a href="" style="color: white"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    		</li>
    		<li style="background-color: #f8f9fa">
    			<a href="" style="color: #ea4335"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    		</li>
    		<li style="background-color: #1da1f2">
    			<a href="" style="color: white"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    		</li>
    		<li style="background-color: #bd081c">
    			<a href="" style="color: white"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
    		</li>
    	</div>
    </div>
    <div class="headerCut header_hide"></div><div class="headerCut header_hide" style="top: -25px"></div>
</div>

<h1 class="display-4 text-center recommendHeading mt-5" id="ourServices">
	Our Services
</h1>
<div class="underline" style="width: 170px"></div>
<div class="container timeLine mt-3">
	<div class="row" style="position: relative;">

		<div class="timeline-container tc1 mt-4 col-md-6 col-11 pr-5">

			<div class="p-3 timeline-style1" style="background-color: rgb(255, 219, 216)!important;">
				<h3>Car Booking</h3>
				<p>Try to offer safe, trusted, clean and comfortable vehicle as well as upmost satisfactory and best services to our clients to obtain best confident to us from them</p>
				<button class="btn" style="border-radius: 0;background-color: rgb(147, 29, 29);color :white"><a href="rental_car.php" style="text-decoration: none; color: white;"> Let's Go</a></button>
			</div>
			<div class="timeLine-tag"><i class="fa fa-film"></i></div>

		</div>

	</div>
	<div class="row" style="position: relative;">
		<div class="timeline-container tc2 mt-4 offset-6 col-md-6 col-11 pl-5">

			<div class="timeline-style2 p-3" style="background-color:rgb(189, 235, 255)!important">

				<h3>Movie Booking</h3>
				<p>We provide you with the most comfortable, spacious and reclining seats & DOLBY ATMOS surround sound for you to enjoy the best cinematic experience. You can use the lever to tilt your seat & be more comfortable</p>
				<div class="d-flex justify-content-end timeline-2-Button">
					<button class="btn" style="border-radius: 0;background-color: rgb(3, 169, 244);color: white"><a href="movie_link.php" style="text-decoration: none; color: white;"> Let's Go</a></button>
				</div>

			</div>
			<div class="timeLine-tag2"><i class="fa fa-car"></i></div>

		</div>
	</div>
</div>

<div class="homePageWrapper" id="AboutUs">
	<h1>
		Why Booking.in
	</h1>
	<p>
		The leading player in online cab bookings & Movie Booking in India, Booking.in offers great offers on cab fares, exclusive discounts and a seamless online booking experience. Cabs, Bus, Flight, hotel and holiday bookings through the desktop or mobile site is a delightfully customer friendly experience, and with just a few clicks you can complete your booking.
	</p>
</div>

<!-- <h1 class="display-4 text-center recommendHeading mt-5" style="">
	Recommended Movies
</h1>
<div class="underline" style="width: 170px"></div>
<div class="container-fluid">
	<div class="container row m-auto">
		<?php
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
						
							<section class="bg-light" style="border-radius: 5px;">
								<div class="movieIconContainer">

									<img src="../Images/Movie-image/<?php echo $data['image'] ?>" alt="" class="movies_icon">

									<figcaption class="fig_overlay">
										<a href="" class=" text-success p-1" style="font-size: 17px"><i class="fas fa-plus"></i></a>
										<a href="addToListBackend.php?m_id=<?php echo $data['m_id'] ?>" class="btn btn-danger btn m-1" id="movie_addToList">
											<i class="fa fa-plus"></i>  Add to List
										</a>
										<a href="movie_CaptureDetail.php?m_id=<?php echo $data['m_id'] ?>" id="BookButton" class="btn btn-warning text-dark pl-3 pr-3">
											<i class="fa fa-bookmark"></i>  Book Now
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
		?>
	
	</div>
</div> -->
<div class="container-fluid pb-5 mt-5" style="background-color: rgb(235, 237, 238)!important;" id="Recommand">
	<h1 class="display-4 text-center recommendHeading pt-2">Recommended Movies</h1>
	<div class="underline" style="min-width: 170px;max-width: 200px"></div>

	<div class="container mt-4" style="box-shadow: 2px 2px 14px 2px #909090;">
		
		<div class="row pb-1 bg-white">
			<button class="globalButton  globalTrendingDark mr-4"><strong>Trending</strong> &nbsp;Now</button>
			<span style="font-size: 20px">Lorem ipsum dolor sit amet, consectetur.</span>
		</div>

		<div class="row">
			<div class="col-md-8  m-0 p-0 m-0 p-0">
				<div class="globalTrendingContainer">
					<img src="../Images/globalTrending.jpg" >
					<div class="globalTrendingOverlay">
						<button class="globalButton">Global</button>
						<h2 class="mt-2">Avengers Infinity War</h2>
						<h5 class="font-italic">Globally Trending</h5>

						<p class="mt-3">
							April 17, 2018 
							<span class="ml-4"><i class="fa fa-heart" aria-hidden="true" style="color: red"></i> &nbsp;11,741</span>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4  m-auto p-0 m-0 ">
				<div class="trendingMoviesList bg-white d-flex">

					<span><strong>Trending</strong> Movies</span>
					<span  class="ml-auto"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>

				</div>
				<div class="moviesScrollContainer bg-white">
					
					<?php
						$query = "select * from movies_list where movie_status = 'Trending' order by RAND()";
						$result = mysqli_query($connect,$query);
						if (mysqli_num_rows($result) > 0) {
							while ($data = mysqli_fetch_array($result)) {
								?>
									<div class="movieScrollContent ">
										
										<div class="bg-white p-1 d-flex w-100" style="position: relative;">
											<div class="movieScrollContent_image">
												<img src="../Images/Movie-image/<?php echo $data['image'] ?>">
											</div>
											<div class="movieScrollContent_text">
												<span>MOVIES</span>
												<span style="color: #721c24;;"><?php echo $data['movie_name'] ?></span>
												<span style="font-size: 12px">18 Feb, 2020</span>
											</div>
											<a href="" class="external-link"><i class="fa fa-external-link" aria-hidden="true"></i></a>
										</div>

									</div>
								<?php
							}
						}
						else{

						}
					?>

				</div>
				<div class="trendingMoviesList bg-white d-flex">

					<span class="small">More movies</span>
					<span  class="ml-auto small"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="container mt-5">
	<h1 class="display-4 text-center recommendHeading" style="">
		Recommend for you
	</h1>
	<div class="underline mb-4"></div>
	<div class="row justify-content-center align-items-center">
		<?php 
			$connect = mysqli_connect('localhost','root','','project');
			$query = "SELECT * FROM cars_list WHERE STATUS = 'Promoted' order by RAND() LIMIT 3";
			$result = mysqli_query($connect,$query);
			if (mysqli_num_rows($result)>0) {
				while ($data = mysqli_fetch_array($result)){
					?>
						<div class="col-lg-4 col-sm-6 col-10 p-1 carPromoted_cardContainer">
							<div class="card">
								<div class="carPromoted_card">
									<div class="w-100 image-container">
										<img class="w-100" src="  ../Images/car-images/<?php echo $data['car_image'] ?>" >
										<div>Featured</div>
									</div>
									<div class="carDetail_overlay">
										<span class="carPromoted_name m-1">
											<?php echo $data['car_name']; ?>
										</span>
										<span class="carPromoted_city mb-2">
											<i class="fa fa-map-marker-alt"></i> <?php echo "Available in : ".$data['car_city']; ?>
										</span>
										<hr>
										<span class="carPromoted_detail">
											<i class="fa fa-rupee-sign"></i> <?php echo $data['car_price']."/day"; ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
			}
		?>
	</div>
</div>


<!-- Trendig movies -->





<script type="text/javascript">
	$(document).ready(function() {
		$('#Home').addClass('active');
	});
	$(window).scroll(function(event) {

		var s = $(window).scrollTop();
		var w = $(window).innerWidth();
		if (w<1100) {
			$(".timeline-style1").css({
				opacity : '1',
			});
			$(".timeline-style2").css({
				opacity : '1',
			});
		}
		if (s > 240 && w > 1100) {
			$('.timeline-style1').addClass('animated slideInLeft faster');
		}
		if (s > 450 && w > 1100) {
			$('.timeline-style2').addClass('animated slideInRight faster');
		}
	});

	setInterval(scroller, 3000);
	function scroller() {
		var firstChild = $('.movieScrollContent:first-child');
		var temp = firstChild.html();
		firstChild.fadeTo('600', 0, function() {
			firstChild.slideUp(400,function() {
				firstChild.remove();
			})
		});
		$('.moviesScrollContainer').append('<div class="movieScrollContent">'+temp+'</div>');
	}


</script>
<?php include '..\footer.php'; ?>