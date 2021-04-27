<?php 
	include '..\header2.php';  

	if (!isset($_COOKIE['userId'])) {
		$_SESSION['message'] = "login First";
		$_SESSION['navigateLink'] = "rental_car.php";
		echo "<script>window.location = \"login.php\";</script>";
	}
	 $connect = mysqli_connect('localhost','root','','project');
	 if (! (isset($_REQUEST['carId']) || isset($_SESSION['carId']) ) ) {
	 	exit();
	 }
	 if (isset($_REQUEST['carId'])) {
	 	$_SESSION['carId'] = $_REQUEST['carId'];
	 }
	 if (isset($_SESSION['Cartransaction_status'])) {
	 	unset($_SESSION['Cartransaction_status']);
	 	unset($_SESSION['car']);
	 }
	 /*--unset other session--*/
	 if(isset($_SESSION['movies'])){
	 	unset($_SESSION['movies']);
	 }
	 if (isset($_SESSION['moviesTransaction_status'])) {
	 	unset($_SESSION['moviesTransaction_status']);
	 }
	 /*------Server side validation-------*/
	 $Customer_nameCheck;
	 $CarPickUpLocationCheck;
	 $Customer_phoneCheck;
	 $Customer_dateCheck;
	 $car_bookNowDays;
	 $Finish_date;
	 $Customer_daysCheck;
	 $flag = true;
	 if (isset($_POST['Booknow'])) {

	 	//-----name
	 	if ($_POST['Customer_name'] == '') {
	 		$Customer_nameCheck = "*field must required";
	 		$flag = false;
	 	}
	 	else if(!preg_match("/^[a-zA-Z ]{2,30}$/",$_POST['Customer_name'])){
	 		$Customer_nameCheck = "*Name include alphabet and space";
	 		$flag = false;
	 	}

	 	//-----adderess
	 	if ($_POST['CarPickUpLocation'] == '') {
	 		$CarPickUpLocationCheck = "*field must required";
	 		$flag = false;
	 	}

	 	//-----phone
	 	if ($_POST['Customer_number'] == '') {
	 		$Customer_phoneCheck = "*field must required";
	 		$flag = false;
	 	}
	 	else if(!preg_match("/^[9876][0-9]{9}$/", $_POST['Customer_number'] )){
	 		$Customer_phoneCheck = "*Name include alphabet and space";
	 		$flag = false;
	 	}

	 	// //------Date
	 	// if ($_POST['CarStart_date'] == '') {
	 	// 	$orderdate  =explode("/", $_POST['CarStart_date']);
	 	// 	$newformateDate = $orderdate[2]."/".$orderdate[1]."/".$orderdate[0];

	 	// 	if ($_POST['CarStart_date'] == '') {
	 	// 		$Customer_dateCheck = '*Required Field';
	 	// 		$flag = false;
	 	// 	}
	 	// 	else if (!preg_match("/([0-2][0-9]|(3)[0-1])[-|\/](((0)[0-9])|((1)[0-2]))[-|\/]\d{4}/",$_POST['CarStart_date'])) {
	 	// 		$Customer_dateCheck = '*Invalid Date';
	 	// 		$flag = false;
	 	// 	}

	 	// 	$numberOfDays = $_POST['CarNumberOfDay'] - 1;
	 	// 	$date = date($newformateDate);
	 	// 	$finishDate = date('d/n/Y',strtotime($newformateDate. ' +'.$numberOfDays.' days'));
	 		
	 	// 	if ($_POST['Finish_date'] == '') {
	 	// 		$Finish_date = "Required field";
	 	// 		$flag = false;
	 	// 	}
	 	// 	else if($finishDate != $_POST['Finish_date']){
	 	// 		$Finish_date = "Invalid Date";
	 	// 		$flag = false;
	 	// 	}
	 	// }
	 	// else{
	 	// 	$Customer_dateCheck = '*Required Field';
	 	// 		$flag = false;
	 	// }

	 	if (isset($_POST['CarNumberOfDay'])) {
	 		if ($_POST['CarNumberOfDay'] == '') {
	 			$Customer_daysCheck = '*Required field';
	 			$flag = false;
	 		}
	 		else if ($_POST['CarNumberOfDay'] > 10 || $_POST['CarNumberOfDay'] < 0) {
	 			$Customer_daysCheck = '*Invalid Number';
	 			$flag = false;
	 		}
	 	}
	 	else{
	 		$Customer_daysCheck = '*Required field';
	 			$flag = false;
	 	}

	 	if ($flag) {
	 		$_SESSION['car']['Customer_name'] = $_POST['Customer_name'];
	 		$_SESSION['car']['CarPickUpLocation'] = $_POST['CarPickUpLocation'];
	 		$_SESSION['car']['Customer_number'] = $_POST['Customer_number'];
	 		$_SESSION['car']['CarStart_date'] = $_POST['CarStart_date'];
	 		$_SESSION['car']['CarNumberOfDay'] = $_POST['CarNumberOfDay'];
	 		$_SESSION['car']['Finish_date'] = $_POST['Finish_date'];
	 		header('location:PaymentPage.php');
	 	}
	 	
	}

	 if ($connect == null || is_integer($_SESSION['carId'])) {
	 	echo "Database Error";
	 	exit();
	 }

	$query = "select * from cars_list where car_id = ". $_SESSION['carId']." and status != 'Not-available'";
	$result = mysqli_query($connect,$query);
	if (mysqli_num_rows($result) == 1) {
		$data = mysqli_fetch_array($result);
		?>
			<div class="container-fluid row bg-dark m-0 p-0 carBookNowHeader">
				<div class="col-md-6 col-sm-8 pl-0 pr-3 carheaderBorder">
					<img class="m-auto" src=" ../Images/car-images/<?php echo $data['car_image']?> "  style="">
				</div>

				<div class="col-md-6 col-sm-10 d-flex flex-column justify-content-center carBookNowContent">

					<span class="display-4 carBooknow_carname ">
						<?php echo $data['car_name']; ?>
					</span>
					<span class="carBooknow_carCity mt-1">
						<b>City : </b><?php echo $data['car_city']; ?>
					</span>
					<span class="carBooknow_carCity mt-1">
						<b>Car Number : </b><?php echo $data['car_number']; ?>
					</span>
					<span class="carBooknow_carCity carBooknow_carCondition mt-1">
						<b>Condition : </b><span><?php echo $data['condition']; ?></span>
					</span>
					<span class="carBooknow_carPrice mt-1 mb-3 mr-2">
						<b>&#x20B9; </b><?php echo $data['car_price']; ?>/day
						<?php $_SESSION['car']['car_price'] = $data['car_price']; ?>
					</span>

				</div>
			</div>
		<?php
	}
	else{
	     ?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">Car is Not Available </strong>
				</div>
			<?php
		exit();
	}
?>

<div class="alert alert-danger alert-dismissible mt-1">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Note : </strong> Cancelation of booking is avaliable within 2 hour of booking
</div>

<div class=" container-fluid m-0 CarDetailBox">
	
	<form method="post" id="CarCustomer_DetailForm" name="CarCustomer_DetailForm">
	
		<div class="container p-0 card bg-transparent">
	
			<div class="card-header blackTransperent">
				Book your CAR now
			</div>
	
			<div class="row form-group card-body m-0 align-items-end">

				<div class="col-lg-4 col-sm-6 col-12">

					<div class="font-weight-bold">
						Name : 
					</div>
					
					<input type="text" id="Customer_name" class="form-control "  name="Customer_name"
					value="<?php if(isset($_POST['Customer_name'])){echo $_POST['Customer_name'];}?>">
					
					<span id="Customer_nameCheck" class="car_fieldAlert">
						<?php 
							if (isset($Customer_nameCheck)) {
								echo $Customer_nameCheck;
							}
						?>
					</span>
				
				</div>

				<div class="col-lg-4 col-sm-6 col-12">
				
					<div class="font-weight-bold">
						Phone Number : 
					</div>
				
					<input type="text" id="Customer_number" class="form-control " name="Customer_number" value="<?php if(isset($_POST['Customer_number'])){echo $_POST['Customer_number'];}?>">
				
					<span id="Customer_phoneCheck" class="car_fieldAlert">
						<?php 
							if (isset($Customer_phoneCheck)) {
								echo $Customer_phoneCheck;
							}
						?>
					</span>
				
				</div>

				<div class="col-lg-4 col-sm-6 col-12">
					
					<div class="font-weight-bold">
						Pick up location : 
					</div>
					
					<input type="text" class="form-control " id="CarPickUpLocation" name="CarPickUpLocation" value="<?php if(isset($_POST['CarPickUpLocation'])){echo $_POST['CarPickUpLocation'];}?>">
					
					<span id="CarPickUpLocationCheck" class="car_fieldAlert">
						<?php 
							if (isset($CarPickUpLocationCheck)) {
								echo $CarPickUpLocationCheck;
							}
						?>
					</span>
				
				</div>
				
				
				<div class="col-lg-3 mt-2 col-sm-6 col-12">
					
					<div class="mt-2 font-weight-bold">
						<i class="far fa-calendar-alt text-dark" style="font-size: 23px;"></i>&nbsp; Date: 
					</div>
					
					<input type="text" id="datepicker" placeholder="" class="placelolderIcon form-control bg-white" readonly="true" name="CarStart_date">
					
					<span id="Customer_dateCheck" class="car_fieldAlert"></span>
				
				</div>

				<div class="col-lg-3 mt-2 col-sm-6 col-12">

					<div class="mt-2 font-weight-bold">
						For how many days:
					</div>

					<select id="car_bookNowDays" class="form-control" name="CarNumberOfDay">
						<option value="select" disabled selected> select </option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>

					<span id="Customer_daysCheck" class="car_fieldAlert">
						<?php 
							if (isset($Customer_daysCheck)) {
								echo $Customer_daysCheck;
							}
						?>
					</span>

				</div>

				<div class="col-lg-3 mt-2 col-sm-6 col-12">

					<div class="mt-2 font-weight-bold">
						<i class="far fa-calendar-alt text-dark" style="font-size: 23px;"></i>&nbsp; Finished Date : 
					</div>

					<input  type="text" id="finishedDate" class="form-control bg-white" readonly="true" name="Finish_date">

					<span class="car_fieldAlert">
						<?php 
							if (isset($Finish_date)) {
								echo $Finish_date;
							}
						?>
					</span>
				</div>

				<div class="col-lg-3 mt-2 col-sm-6 col-12">
					<label class="car_BookNowFileds_Caption mb-0 font-weight-bold">Total Amount :</label>
					<br>
					<label id="TotalAmount" class="TotalCarAmountStyle">&#x20B9;</label>
				</div>

				<input type="hidden" name="car_id" value=" <?php echo $data['car_id'] ?> ">

				<div class="col-lg-3 mt-2 ml-auto">
					<div class="d-flex h-100">
						<!-- <button class="btn ml-auto mt-auto">Book Now</button> -->
						<input type="submit" name="Booknow" class="ml-auto mt-auto bookNowButton" value="Book Now" >
					</div>
				</div>
			</div>
			
		</div>
	</form>
</div>
<br><br><br>
</div>

  
<?php include '../script/carBookNow_script.php'?>
 	

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include '..\footer.php'; ?>