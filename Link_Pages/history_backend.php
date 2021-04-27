<?php 
	session_start();

	/*----CAR----*/
	$connect = mysqli_connect('localhost','root','','project');
	if (isset($_POST['btnCars'])) {
		$query = "SELECT * FROM `car_transaction` where user_id =".$_COOKIE['userId']." order by id desc";
		$result = mysqli_query($connect,$query);
		if (mysqli_num_rows($result) > 0) {
			?>
				<div class="container">
			<?php
					$temp = 0;
					while ($data = mysqli_fetch_array($result)) {
						$temp = $temp + 1;
						$temp2 = $temp * 50;
						$delay = $temp2."ms";
						$query_car = "SELECT * FROM cars_list where car_id =".$data['car_id'];
						$result_car = mysqli_query($connect,$query_car);

						$data_car = mysqli_fetch_array($result_car);

						
						if ($data['Trasaction_time'] + 7200 > time()) {
							?>
								<div class="p-2 row carHistoryContainer_cancelAble mt-2  animated fadeInUp faster" style="animation-delay: <?php echo $delay; ?>;position: relative;">
									<div class="carHistory_image col-lg-3 p-0">

										<img src="../Images/car-images/<?php echo $data_car['car_image'] ?>" width="100%">

									</div>


									<div class="col-lg-8 d-flex p-0 align-items-center justify-content-around">

										<span class="carHistory_carName"><?php echo $data_car['car_name'] ?></span>
										<div class="carHistory_detail">
											<span>
												<b>City : </b><?php echo $data_car['car_city'] ?>&nbsp;&nbsp;
												<b>Car Number : </b><?php echo $data_car['car_number'] ?>
											</span>
											<br>
											<span><b>Start : </b><?php echo $data['Date_start'] ?> &nbsp;&nbsp;  <b>End : </b>  <?php echo $data['Date_end'] ?>  </span>
										</div>
										<div class="carHistory_price cancelAble">
											  <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $data_car['car_price']*$data['No_of_Day']; ?>
										</div>

									</div>

									<div class="d-flex" style="position: absolute;bottom: 0;
									right: 0">

										<form method="post" action="history_backend.php">
											<input type="hidden" name="T_id" value="<?php echo $data['id'] ?>">
											<button  type="submit" name="btnCancel" class="pl-1 pr-1 bg-transparent border-0 text-danger mr-2" style="cursor: pointer;"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel Booking</button>
										</form>

										<form method="post" action="CarPaymentDetail_print.php">
											<input type="hidden" name="Detail_T_id" value="<?php echo $data['id'] ?>">
											<button  type="submit" name="btnPrintCarDetail" class="bg-transparent border-0 text-dark pl-1 pr-1" style="cursor: pointer;">
												<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Show Detail
											</button>
										</form>

									</div>
								</div>
							<?php
						}
						else{
							?>
								<div class="p-2 row carHistoryContainer_notCancelAble mt-2  animated fadeInUp faster" style="animation-delay: <?php echo $delay; ?>;position: relative;">
									<div class="carHistory_image col-lg-3 p-0">
										<img src="../Images/car-images/<?php echo $data_car['car_image'] ?>" width="100%">
									</div>
									<div class="col-lg-8 d-flex p-0 align-items-center justify-content-around">
										<span class="carHistory_carName"><?php echo $data_car['car_name'] ?></span>
										<div class="carHistory_detail">
											<span>
												<b>City : </b><?php echo $data_car['car_city'] ?>&nbsp;&nbsp;
												<b>Car Number : </b><?php echo $data_car['car_number'] ?>
											</span>
											<br>
											<span><b>Start : </b><?php echo $data['Date_start'] ?> &nbsp;&nbsp;  <b>End : </b>  <?php echo $data['Date_end'] ?>  </span>
										</div>
										<div class="carHistory_price cancelAble">
											  <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $data_car['car_price']*$data['No_of_Day']; ?>
										</div>
									</div>
									<div class="d-flex" style="position: absolute;bottom: 0;right: 0">
										<form method="post" action="CarPaymentDetail_print.php" class="mt-1">
											<input type="hidden" name="Detail_T_id" value="<?php echo $data['id'] ?>">
											<button  type="submit" name="btnPrintCarDetail" class="bg-transparent border-0 text-dark pl-1 pr-1 mr-2" style="cursor: pointer;">
												<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Show Detail
											</button>
										</form>
									</div>
								</div>
							<?php
						}

					}
			?>
				</div>
			<?php

		}
		else{
			?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">No Record Found </strong>
				</div>
			<?php
		}
	}

// -------------canncel-----------
	if (isset($_POST['btnCancel'])) {
		$query = "select Trasaction_time from car_transaction where id = ".$_POST['T_id'];
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			$data = mysqli_fetch_array($result);

			if ($data['Trasaction_time'] + 7200 > time()) {

				$query_delete = "DELETE FROM `car_transaction` WHERE id = ".$_POST['T_id'];

				$query_status = "SELECT car_id from car_transaction where id = ".$_POST['T_id'];
				$resultCarId = mysqli_query($connect,$query_status);
				$data = mysqli_fetch_array($resultCarId);

				$result = mysqli_query($connect,$query_delete);
				echo "$result";
				if ($result) {
					//$_SESSION['History_message'] = ""

					echo $data['car_id'];
					$query_status = "UPDATE `cars_list` SET status = 'Available' where car_id = ".$data['car_id'];
					$resultDelete = mysqli_query($connect,$query_status);
					if ($resultDelete) {
						$_SESSION['History_message'] = "Your booking is Canceled...Payment will credited soon";
						$displayItem = "Your Booking is been <b>Cancled</b><br><br>Transaction".$_POST['T_id'];
						$subject = 'Booking Cancellation Acknowledgement';
						$page = "cancelCar";
						include '..\phpMail\index2.php';
						header("location:history.php");
					}
					else
					{
						$_SESSION['History_message'] = "Cancelation failed";
						header("location:history.php");
					}
				}
				else{
					$_SESSION['History_message'] = "Cancelation failed";
					header("location:history.php");
				}
			}
			else{
				$_SESSION['History_message'] = "Cancelation is available within 2 hour";
				header("location:history.php");
			}
		}
	}

	/*---MOVIES---*/
	if (isset($_POST['btnMovies']))
	{
		$query_MovieTransaction = "select * from movies_transaction where  user_id =".$_COOKIE['userId']." order by MTransaction_id  desc";
		$result_MovieTransaction = mysqli_query($connect,$query_MovieTransaction);
		?>
			<div class="row justify-content-center">
		<?php
				if (mysqli_num_rows($result_MovieTransaction) > 0) {
					$temp = 0;
					while ($data_MovieTransaction = mysqli_fetch_array($result_MovieTransaction)) {
						if ($data_MovieTransaction['Trasaction_time'] + 30200 > time()) {
						
							$query_MovieDetail = "select movie_name , image from movies_list where m_id = '".$data_MovieTransaction['m_id']."' ";

							$result_MovieDetail = mysqli_query($connect,$query_MovieDetail);

							$data_MovieDetail = mysqli_fetch_array($result_MovieDetail);

							$temp = $temp + 1;
							$temp2 = $temp * 50;
							$delay = $temp2."ms";


							?>
								<div class="col-lg-5 p-1 animated jackInTheBox fast" style="animation-delay: <?php echo $delay; ?>">
									<div class="card p-1 carHistoryContainer_cancelAble">
										<div class="d-flex">
											<div class="w-50">
												<img src="../Images/Movie-image/<?php echo $data_MovieDetail['image'] ?>" class="w-100" alt="">
											</div>
											<div class="w-50 p-1 d-flex flex-column justify-content-between">
												<span class="display-4" style="font-size: 30px">
													<?php echo $data_MovieDetail['movie_name'] ?>
												</span>
												
												<span>
													<b>City : </b><?php echo $data_MovieTransaction['city'] ?>
												</span>
												
												<span>
													<b>Theater : </b><?php echo $data_MovieTransaction['TheaterName'] ?>
												</span>											
												
												<span>
													<b>Show Time : </b><?php echo $data_MovieTransaction['ShowTime'] ?>
												</span>
												
												<span>
													<b>Date : </b><?php echo $data_MovieTransaction['date'] ?>
												</span>
												
												<span>
													<b>No. of Tickets : </b><?php echo $data_MovieTransaction['NoOfTicket'] ?>
												</span>
												
												<span>
													<b>Total Price : </b><?php echo $data_MovieTransaction['TotalPrice'] ?>
												</span>
												
												<span>
													<b>Seat No. : </b><?php echo $data_MovieTransaction['SeatString'] ?>
												</span>
												<form action="MoviePaymentDetail_print.php" class="ml-auto" method="post">
													
													<input type="hidden" name="M_transaction_id" value="<?php echo $data_MovieTransaction['MTransaction_id'] ?>">

													<img src="" class="loadingImage">

													<button type="button" id="btnMovieCancel" class="pl-1 pr-1 bg-transparent border-0 text-danger" style="cursor: pointer;">
														<i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel Booking
													</button>

													<button  type="submit" name="btnPrintCarDetail" class="pr-1 pl-1 m-auto bg-transparent border-0 text-danger" style="cursor: pointer;">
														<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Show Detail
													</button>
												</form>

											</div>
										</div>
									</div>
								</div>
							<?php
						}
						else{
							$query_MovieDetail = "select movie_name , image from movies_list where m_id = '".$data_MovieTransaction['m_id']."' ";

							$result_MovieDetail = mysqli_query($connect,$query_MovieDetail);

							$data_MovieDetail = mysqli_fetch_array($result_MovieDetail);
							$temp = $temp + 1;
							$temp2 = $temp * 50;
							$delay = $temp2."ms";
							?>
								<div class="col-lg-5 p-1 animated jackInTheBox fast" style="animation-delay: <?php echo $delay; ?>">
									<div class="card p-1 carHistoryContainer_notCancelAble">
										<div class="d-flex">
											<div class="w-50">
												<img src="../Images/Movie-image/<?php echo $data_MovieDetail['image'] ?>" class="w-100" alt="">
											</div>
											<div class="w-50 p-2 d-flex flex-column justify-content-between">
												<span class="display-4" style="font-size: 30px">
													<?php echo $data_MovieDetail['movie_name'] ?>
												</span>
												
												<span>
													<b>City : </b><?php echo $data_MovieTransaction['city'] ?>
												</span>
												
												<span>
													<b>Theater : </b><?php echo $data_MovieTransaction['TheaterName'] ?>
												</span>											
												
												<span>
													<b>Show Time : </b><?php echo $data_MovieTransaction['ShowTime'] ?>
												</span>
												
												<span>
													<b>Date : </b><?php echo $data_MovieTransaction['date'] ?>
												</span>
												
												<span>
													<b>No. of Tickets : </b><?php echo $data_MovieTransaction['NoOfTicket'] ?>
												</span>
												
												<span>
													<b>Total Price : </b><?php echo $data_MovieTransaction['TotalPrice'] ?>
												</span>
												
												<span>
													<b>Seat No. : </b><?php echo $data_MovieTransaction['SeatString'] ?>
												</span>
												<form action="MoviePaymentDetail_print.php" method="post" class="ml-auto">
													
													<input type="hidden" name="M_transaction_id" value="<?php echo $data_MovieTransaction['MTransaction_id'] ?>">
													<button  type="submit" name="btnPrintCarDetail" class="pr-1 pl-1 m-auto bg-transparent border-0 text-danger" style="cursor: pointer;">
														<i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Show Detail
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php
						}
					}
				}
				else{
					?>
						<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
		  					<strong class="display-4 text-center" style="font-size: 30pt">No Record Found </strong>
						</div>
					<?php
				}
		?>
			</div>
		<?php
	}

	if (isset($_POST['cancelMovie'])) {
		$SendMailFlag = 0;
		$query_checkAvailability = "Select Trasaction_time from movies_transaction where MTransaction_id ='".$_POST['cancelMovie']."'";
		$ResultcheckAvailability = mysqli_query($connect,$query_checkAvailability);
		$DatacheckAvailability = mysqli_fetch_array($ResultcheckAvailability);
		if ($DatacheckAvailability['Trasaction_time'] + 7200 > time()) {

			$selectforEmail = "Select * from movies_list where m_id in (Select m_id from movies_transaction where MTransaction_id = '".$_POST['cancelMovie']."')";
			$EmailResult = mysqli_query($connect,$selectforEmail);
			$dataForEmail = mysqli_fetch_array($EmailResult);

			$queryDelete = "DELETE FROM `movies_transaction` WHERE MTransaction_id = '".$_POST['cancelMovie']."'";
			$queryDeleteSeat = "DELETE FROM `seat_tracking` WHERE MTransaction_id = '".$_POST['cancelMovie']."'";

			$flag = mysqli_query($connect,$queryDeleteSeat);
			$flag = mysqli_query($connect,$queryDelete);
			if ($flag) {
				echo "Cancel Successfull";
				$SendMailFlag = 1;
			}
			else{
				echo "Error While Cancelation";
			}
		}
		else{
			echo "Cancelation is available within 2 hour of booking";
		}
		if ($SendMailFlag) {
			$displayItem = "Your Booking is been <b>Cancled</b><br><br>Transaction ID :".$_POST['cancelMovie']."<br>Movie Name: {$dataForEmail['movie_name']}";
			$subject = 'Booking Cancellation Acknowledgement';
			include '..\phpMail\index2.php';
		}
	}
?>