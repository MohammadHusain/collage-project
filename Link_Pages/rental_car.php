<?php 
	 include '..\header2.php'; 
	 $connect = mysqli_connect('localhost','root','','project');
	 if ($connect == null) {
	 	echo "Database Error";
	 	exit();
	 }
	 if (isset($_SESSION['Cartransaction_status'])) {
	 	unset($_SESSION['Cartransaction_status']);
	 	unset($_SESSION['car']);
	 }
?>
<div class="rental_car_header">
	<div class="rental_car_header_content text-light col-lg-5 col-md-6 col-sm-12">
		<p>We Are Open 24/7 Including Maxis Holidays</p>
		<h1 class="display-4">Plan Your Trip <br>With Auto Leasing</h1>
		<p>Rent a Car Online Today & Enjoy The Best Deals, Rates & Accessories</p>
		<div class="d-flex mt-5 searchContainer align-items-end">
			<form method="get" style="z-index: 1">
				<table>
					<tr>
						<td>
							<input type="text" id="search_txtCarsCity" name="txtCarSearch" placeholder="Enter Your City" autocomplete="off">
						</td>
						<td>
							<button class="" type="submit">Search</button>
						</td>
					</tr>
					<tr>
						<td style="position: relative;">
							<div class="autoComplete_CarCity" style="position: absolute;width: 100%;">
							</div>
						</td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
	<div class="tyre-animation-container">
		<div class="tyre-animation">
			<div class="tyre-rotate">
				<img src="../Images/tyre.png" alt="" class="w-100">
			</div>
		</div>
	</div>
	
</div>

<?php 
	if (isset($_GET['txtCarSearch']) && $_GET['txtCarSearch'] != "") {
		$city = $_GET['txtCarSearch'];
		$query = "select * from cars_list where car_city = '$city' and status != 'Not-Available' order by RAND()";
		$result = mysqli_query($connect,$query);
		?>
			<div class="container-fluid mt-5">
				<h1 class="display-4 text-center recommendHeading" style="">
						Search Result of <font color="#a11118"><?php echo $_GET['txtCarSearch']; ?></font>
				</h1>
				<div class="underline mb-3"></div>
				<div class="container row m-auto">
		<?php
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					
					<div class=" col-lg-4 col-md-6 col-sm-6 p-1">
							<div class="carSearch_card card p-2 h-100">
									<div class="w-100">
										<img src=" ../Images/car-images/<?php echo $data['car_image']?> " width="100%">
									</div>
									<div class="carSearch_cardContent d-flex flex-column mb-2"  style="position: relative;">
										<span class="pt-1 pb-1" style="font-size: 20px;font-weight: 600;">
											<?php echo $data['car_name']; ?>
										</span>
										<span>
											<u>City</u> : <?php echo $data['car_city']; ?>
										</span>
										<span style="font-size: 13px">
											<u>Condition</u> : <?php echo $data['condition']; ?>
										</span>
										<span>
											<input type="hidden" name="carId" class="addToList_carId" value=" <?php echo $data['car_id'] ?> ">
											<button type="button" class="addOrMinus_car" id="addToListBtn"><i class="fa fa-plus"></i></button>
										</span>
									</div>
									<div class="mt-auto text-danger mb-2" style="font-size: 25px;">
										<span>
											&#x20B9; <?php echo $data['car_price']; ?>/Day
										</span>
									</div>
									<div class=" d-flex justify-content-end">
											<a href="car_BookNow.php?carId=<?php echo $data['car_id'] ?>"class="btn btnBookNow_car">Book Now</a>
										<div>
											
										</div>
									</div>
									
							</div>
					</div>
				<?php
			}
		}
		else{
			?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center text-danger" style="font-size: 20pt">No Record Found </strong>
				</div>
			<?php
		}
		?>
				</div>
			</div>
		<?php
	}
 ?>

<?php 
	if (!isset($_GET['txtCarSearch'])) {
		?>
			<div class="container-fluid pb-3">
				<h1 class="display-4 text-center recommendHeading mt-4">
					Our Premium Services
				</h1>
				<div class="underline mb-3"></div>
				<div class="container" style="font-family: 'Open Sans', sans-serif;">
					<div class="row align-items-center">
						<div class="col-lg-4 col-sm-6">
							<div>
								<div class="float-left p-3 text-warning" style="font-size: 35px;">
									<i class="fa fa-car"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px" class="text-danger">
										Luxury Cars
									</h3>
									<div class="d-flex align-items-center" style="margin-top: -10px">
										<hr>
										<li style="font-size: 25px" class="text-warning"> </li>
									</div>
									<div>
										 We provide high-end luxury cars at reasonable price for our customers to make their riding experience better.
									</div>
								</div>
							</div>

							<div class="mt-2">
								<div class="float-left p-3 text-warning" style="font-size: 35px;">
									<i class="fa fa-briefcase"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px" class="text-danger">
										Insurance
									</h3>
									<div class="d-flex align-items-center" style="margin-top: -10px">
										<hr>
										<li style="font-size: 25px" class="text-warning"> </li>
									</div>
									<div>
										 Our all cars having insuranca policy, so there is no more documentation headache for customers.
									</div>
								</div>
							</div>

							<div class="mt-2">
								<div class="float-left p-3 text-warning" style="font-size: 35px;">
									<i class="fa fa-binoculars"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px" class="text-danger">
										640+ Cars Available
									</h3>
									<div class="d-flex align-items-center" style="margin-top: -10px">
										<hr>
										<li style="font-size: 25px" class="text-warning"> </li>
									</div>
									<div>
										 We have more than 650 cars available including 2 seaters sports car to 8 seaters cars for our customers.
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 Car_hide">
							<img src="../Images/Car_services.png" width="100%">
						</div>
						<div class="col-lg-4 col-sm-6">
							<div>
								<div class="float-right p-3 text-warning" style="font-size: 35px;">
									<i class="fa fa-map-marker"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px;text-align:right" class="text-danger">
										Any Location
									</h3>
									<div class="d-flex align-items-center" style="margin-top: -10px">
										<li style="font-size: 25px; transform: rotate(-180deg);"  class="text-warning"> </li>										
										<hr>
									</div>
									<div class="text-right">
										 You can book the rental car in the available cities on our website from any location throught out cities.
									</div>
								</div>
							</div>

							<div class="mt-2">
								<div class="float-right p-3 text-warning " style="font-size: 35px;">
									<i class="fa fa-tint"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px;text-align:right" class="text-danger">
										Cleaning Included
									</h3>
									<div class="d-flex align-items-center text-warning" style="margin-top: -10px">
										<li style="font-size: 25px;transform: rotate(-180deg);" class="text-warning"> </li>
										<hr>
									</div>
									<div class="text-right">
										 We are giving our car at service station before give it to our customer. So, no more rubbish in car.
									</div>
								</div>
							</div>

							<div class="mt-2">
								<div class="float-right p-3 text-warning" style="font-size: 35px;">
									<i class="fa fa-clock-o" aria-hidden="true"></i>
								</div>
								<div class="p-2 d-flex flex-column">
									<h3 style="font-size: 25px;text-align:right" class="text-danger">
										Online 24/7 Support
									</h3>
									<div class="d-flex align-items-center" style="margin-top: -10px">
										<li style="font-size: 25px;transform: rotate(-180deg);" class="text-warning"> </li>
										<hr>
									</div>
									<div class="text-right">
										 If you have any problems then we are always 24/7 online for our customer to support.<br>So, Don't worry, call hurry.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
?>
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
											<i class="fa fa-map-marker"></i></i> <?php echo "Available in : ".$data['car_city']; ?>
										</span>
										<hr>
										<span class="carPromoted_detail">
											<i class="fa fa-inr"></i> <?php echo $data['car_price']."/day"; ?>
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
<div class="container-fluid p-0 mt-5">
	<div class="row m-0 p-0">
		<div class="col-lg-7 col-sm-12 p-0">
				<div class="skew-section1">
					
					<div class="m-auto skew-section1-content">
						<div class="c1">
							Come before 21st Feb
						</div>
						<div class="c2">
							<span>Get</span> Upto 30% Rewards
						</div>
						<div class="c3">
							<p>
								Auto Painting & Collision Repair Shop. We help you turn the car you drive back into the car you love!
							</p>
						</div>
						<button class="c4">CLAIM REWARD</button>
					</div>
				</div>
				<div class="CarOfferBackgroundImage">
					<img src="../Images/blog1.jpg" alt="">	
				</div>
		</div>
		<div class="col-lg-5 col-sm-12 d-flex p-0 align-items-center" >
			<div style="" class=" skew-section2-container">
				<div class="skew-section2">
					<div class="skew-section2-content">
						<div class="c1">
							<span>About</span> Automobil
						</div>
						<div class="c2">
							Most of the vehicles get damaged just because of maintenance neglect you take. get damaged
						</div>
						<div class="c3">
							<ul class="">
								<li>The vehicles get damaged just because of mainte</li>
								<li>The Big Oxmox advised her not to do vehicles</li>
								<li>The Little Blind Text didn’t listen herself</li>
								<li>Alphabet Village and the subline of</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="CarOfferImage" style="">
					<img src="../Images/CarofferImage.png">
				</div>
			</div>
			
		</div>
	</div>			
</div>
<script type="text/javascript" src="../script/cars_script.js"></script>

<?php include '..\footer.php'; ?>