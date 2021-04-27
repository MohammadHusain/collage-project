<?php 
	include '..\header2.php';
	if(isset($_SESSION['car'])){
	 	unset($_SESSION['car']);
	}
?>
	<hr class="bg-light" style="margin: 0;height: 2px;">
	<div class="movie-header pb-5 pl-0" style="height: 27rem;display: flex;">
		<div class="container-fluid header-content">
			<h1 class="display-3 text-center pt-5 pb-2 text-white" id="movie-heading">
				What Next ?
			</h1>
			
			<div class="container-fluid pb-5">
				<div class="row justify-content-center">
					<div class="col-md-6 col-sm-8 col-8" style="margin-right:5px;position: relative; padding: 0">
						<input type="text" class="form-control" id="search-movie" placeholder="Enter City" autocomplete="off">
						<div style="position: absolute;background: rgba(255, 210, 210, 0.7);width: 100%;z-index: 2" id="autofill-city">
							
						</div>
					</div>
					<div class="p-0  col-sm-2 col-3" style="">
						<button class="btn btn-danger w-100" id="search-button">Search</button>
					</div>
				</div>
			</div>
				
		</div>
	</div>

	<div class="container  p-3 " >
		<div style="z-index: 1; margin-top: 20px;">
			<p class="display-4 movieSearchHeader" style="font-size: 40px;text-align: center;">Picks for YOU</p>
			<div class="underline"></div>
		</div>

		<div id="dummy_block" class="m-2">
			
		</div>
		<div class="row" id="main_content">
			
		</div>
	</div>

	<div class="container-fluid m-0 p-0" style="overflow: hidden;">
		<div style="z-index: 1; margin-top: 20px;">
			<p class="display-4" style="font-size: 40px;text-align: center;">Plays & Offers</p>
			<div class="underline" style="width: 170px"></div>
		</div>
		<div class="movieSliderContainer mt-3">
			 <div class="movie_slide">
			 	<img src="../Images/m_slide1.jpg">
			 </div>
			 <div class="movie_slide">
			 	<img src="../Images/m_slide2.webp">
			 </div>
			 <div class="movie_slide">
			 	<img src="../Images/m_slide5.jpg">			 	
			 </div>
			 <div class="movie_slide">
			 	<img src="../Images/m_slide4.webp">
			 </div>
			 <div class="movie_slide">
			 	<img src="../Images/m_slide3.webp">
			 </div>
		</div>
	</div>

	<script type="text/javascript" src="../script/movie_script.js"></script>
<?php include '..\footer.php'; ?>
