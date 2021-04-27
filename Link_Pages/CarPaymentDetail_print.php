<?php
	//session_start();
	include '..\header2.php'; 

	$connect = mysqli_connect('localhost','root','','project');

	date_default_timezone_set("Asia/Calcutta");
	if (!isset($_COOKIE['userId'])) {
		header('location:login.php');
	}
	

	if (isset($_POST['Detail_T_id'])) {

		if (isset($_SESSION['car'])) {
			unset($_SESSION['car']);
		}
		if (isset($_SESSION['cardNumber'])) {
			unset($_SESSION['cardNumber']);
		}


		$query = "select * FROM car_transaction WHERE user_id = ".$_COOKIE['userId']." and id = '".$_POST['Detail_T_id']."'";
		$T_result = mysqli_query($connect,$query);
		$T_data = mysqli_fetch_array($T_result);

		$car_query = " Select * from cars_list where car_id='".$T_data['car_id']."'";
		$car_result = mysqli_query($connect,$car_query);
		$dataOfCar = mysqli_fetch_array($car_result);
		$numOfRows = mysqli_num_rows($car_result);

		if (!$numOfRows == 1) {
			echo "Error while fetching Data";
		}
		else{
				
				?>

				<div class="container mt-4" id="print">
					<table align="center" border="1" width="100%" id="TransactionDetail" class="mt-2">
						<tr style="background-color: grey;">
							<th colspan="4" style="text-align: center;font-size: 20px;color: white!important" class="p-3">Transaction Detail</th>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;" class="p-2">CAR DETAIL:</th>
						</tr>
						<tr>
							<td class="p-1"><b>Car Name :</b></td>
							<td class="p-1"><?php echo $dataOfCar['car_name'] ?></td>
										
							<td class="p-1"><b>Car Number :</b></td>
							<td class="p-1"><?php echo $dataOfCar['car_number'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Car City :</b></td>
							<td class="p-1"><?php echo $dataOfCar['car_city'] ?></td>
									
							<td class="p-1"><b>Car Price/Day :</b></td>
							<td class="p-1"><?php echo $dataOfCar['car_price'] ?></td>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;"class="p-2">Owner Detail :</th>
						</tr>
						<tr>
							<td class="p-1"><b>Owner Name :</b></td>
							<td class="p-1"><?php echo $dataOfCar['owner_name'] ?></td>
							<td class="p-1"><b>Owner Number :</b></td>
							<td class="p-1"><?php echo $dataOfCar['owner_number'] ?></td>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;" class="p-2">Customer Detail :</th>
						</tr>
						<tr>
							<td class="p-1"><b>Customer Name :</b></td>
							<td class="p-1"><?php echo $T_data['Customer_name'] ?></td>
										
							<td class="p-1"><b>Customer Number :</b></td>
							<td class="p-1"><?php echo $T_data['Contact_number']  ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Pickup Location :</b></td>
							<td class="p-1"><?php echo $T_data['Pick_up_location']  ?></td>
							<td class="p-1"><b>Start Date :</b></td>
							<td class="p-1"><?php echo $T_data['Date_start']  ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>End Date :</b></td>
							<td class="p-1"><?php echo $T_data['Date_end']  ?></td>
							<td class="p-1"><b>Number of Days :</b></td>
							<td class="p-1"><?php echo $T_data['No_of_Day']  ?></td>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;" class="p-2">Payment Detail : </th>
						</tr>
						<tr>
							<td class="p-1"><b>Card number:</b></td><td class="p-1"><?php echo "xxxx-xxxx-xxxx-".substr($T_data['Card_number'], -4); ?></td>
							<td class="p-1"><b>Time:</b></td> <td class="p-1"> <?php echo date('m/d/Y H:i:s',$T_data['Trasaction_time'] ); ?></td>
												
						</tr>
						<tr>
							<td class="p-1"><b>Transaction Status :</b></td>  <td class="p-1"><?php echo "Success"?></td>
							<td class="p-1"><b>Booking Agent : </b></td>    <td class="p-1">Booking.in</td>
						</tr>
					</table>
										<br>						
				</div> 
							<center><button class="pl-2 pr-2" id="btnPrint" onclick="printForm()">Print</button></center>
			
		<?php
		}
	}
	else{
		if (!isset($_SESSION['car'])) {
			header('location:rental_car.php');
		}
		
		//unset($_SESSION['Cartransaction_status']);

		$query = "select status from cars_list where car_id =".$_SESSION['carId'];
		$resultOfStatus = mysqli_query($connect,$query);
		$data = mysqli_fetch_array($resultOfStatus);
		if ($data['status'] == "Not-Available") {
			echo "<br><br>Car is Booked.. Go to History Page to verify. <b>Nothing Here</b>";
			$_SESSION['Cartransaction_status'] = "success";
			exit();
		}
		if (!isset($_SESSION['Cartransaction_status'])) {

			$query = "INSERT INTO `car_transaction`(`Customer_name`, `Pick_up_location`, `Contact_number`, `Date_start`, `No_of_Day`, `Date_end`, `car_id`, `Card_number`, `Trasaction_time`, `user_id`) VALUES ('".$_SESSION['car']['Customer_name']."','".$_SESSION['car']['CarPickUpLocation']."','".$_SESSION['car']['Customer_number']."','".$_SESSION['car']['CarStart_date']."','".$_SESSION['car']['CarNumberOfDay']."','".$_SESSION['car']['Finish_date']."','".$_SESSION['carId']."','".$_SESSION['cardNumber']."','".time()."','".$_COOKIE['userId']."')";

			$result = mysqli_query($connect,$query);
			
			if ($result == 1) {
				$_SESSION['Cartransaction_status'] = "success";
				echo "<script>alert('Transaction Successfully done... Please print your Payment Receipt');</script>";
				$query2 = "UPDATE `cars_list` SET `status`='Not-Available' WHERE car_id = ".$_SESSION['carId'];
				
				$result2 = mysqli_query($connect,$query2);
				if ($result2 == 1) {
					//echo "car updated";
					$query = "select * FROM car_transaction WHERE user_id = ".$_COOKIE['userId']." ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($connect,$query);
					$numOfRows = mysqli_num_rows($result);

					if ($numOfRows == 1) {
						$data = mysqli_fetch_array($result);

						$query3 = "select * from cars_list where car_id = ".$data['car_id'];
						$resultOfCar = mysqli_query($connect,$query3);
						$dataOfCar = mysqli_fetch_array($resultOfCar);
						$secureCardNumber = "xxxx-xxxx-xxxx-".substr($_SESSION['cardNumber'], -4); 
						$GeneratedTime = date('m/d/Y H:i:s',$data['Trasaction_time'] );

						 $displayItem = '<div class="container mt-4" id="print">
									<table align="center" border="1" width="100%" id="TransactionDetail" class="mt-2">
										<tr style="background-color: grey;">
											<th colspan="4" style="text-align: center;font-size: 20px;color: white!important" class="p-3">Transaction Detail</th>
										</tr>
										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">CAR DETAIL:</th>
										</tr>
										<tr>
											<td class="p-1"><b>Car Name :</b></td>
											<td class="p-1">'. $dataOfCar['car_name'] .'</td>
										
											<td class="p-1"><b>Car Number :</b></td>
											<td class="p-1">'. $dataOfCar['car_number'] .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Car City :</b></td>
											<td class="p-1">'. $dataOfCar['car_city'] .'</td>
										
											<td class="p-1"><b>Car Price/Day :</b></td>
											<td class="p-1">'. $dataOfCar['car_price'] .'</td>
										</tr>

										<tr>
											<th colspan="4" style="text-align: center;"class="p-2">Owner Detail :</th>
										</tr>
										<tr>
											<td class="p-1"><b>Owner Name :</b></td>
											<td class="p-1">'. $dataOfCar['owner_name'] .'</td>

											<td class="p-1"><b>Owner Number :</b></td>
											<td class="p-1">'. $dataOfCar['owner_number'] .'</td>
										</tr>
										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">Customer Detail :</th>
										</tr>
										<tr>
											<td class="p-1"><b>Customer Name :</b></td>
											<td class="p-1">'. $_SESSION['car']['Customer_name'] .'</td>
											
											<td class="p-1"><b>Customer Number :</b></td>
											<td class="p-1">'. $_SESSION['car']['Customer_number']  .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Pickup Location :</b></td>
											<td class="p-1">'. $_SESSION['car']['CarPickUpLocation']  .'</td>

											<td class="p-1"><b>Start Date :</b></td>
											<td class="p-1">'. $_SESSION['car']['CarStart_date']  .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>End Date :</b></td>
											<td class="p-1">'. $_SESSION['car']['Finish_date']  .'</td>

											<td class="p-1"><b>Number of Days :</b></td>
											<td class="p-1">'. $_SESSION['car']['CarNumberOfDay']  .'</td>
										</tr>
										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">Payment Detail : </th>
										</tr>
										<tr>
											<td class="p-1"><b>Card number:</b></td><td>'. $secureCardNumber .'</td>
											<td class="p-1"><b>Time:</b></td> <td> '. $GeneratedTime .'</td>
											
										</tr>
										<tr>
											<td class="p-1"><b>Transaction Status :</b></td>  <td>'. $_SESSION['Cartransaction_status'].'</td>
											<td class="p-1"><b>Booking Agent : </b></td>    <td>Booking.in</td>
										</tr>
									</table>
									<br>
									
								</div>';
					echo $displayItem;
					?>
					<center><button class="pl-2 pr-2" id="btnPrint" onclick="printForm()">Print</button></center>
					<?php

					$subject = 'Car Booking Acknowledgement';

					include '..\phpMail\index.php'; 
						

					}
					else{
						echo "<br><br>Data Cannot Retrive";
					}
				}
				else{
					echo "<br>car update Error";
					exit();
				}
			}
			else{
				echo "<br>error";
				exit();
			}
		}
		else{
			echo "<br>Your Transaction is SuccessFully done,Go to History Page to verify";
			exit();
		}
	}

?>
<script type="text/javascript">
	function printForm() {
		var backup = document.body.innerHTML;
		var printdata = document.getElementById('print').innerHTML;

		document.body.innerHTML = printdata;
		// $(window).html(printdata);
		 window.print();
		// $(window).html(backup);
		document.body.innerHTML = backup;
	}
</script>
<?php include '..\footer.php'; ?>
