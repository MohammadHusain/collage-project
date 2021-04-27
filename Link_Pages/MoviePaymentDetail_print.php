<?php 
	include '..\header2.php'; 
	date_default_timezone_set("Asia/Calcutta");
	$connect = mysqli_connect('localhost','root','','project');
	if (!isset($_COOKIE['userId'])) {
		header('location:login.php');
	}
	

    /////////print////////

    if (isset($_POST['M_transaction_id'])) {

    	if (isset($_SESSION['movies'])) {
    		unset($_SESSION['movies']);
    	}
    	if (isset($_SESSION['cardNumber'])) {
    		unset($_SESSION['cardNumber']);
    	}
		
		$query = "select * FROM movies_transaction WHERE user_id = ".$_COOKIE['userId']." and MTransaction_id = '".$_POST['M_transaction_id']."'";

		$T_result = mysqli_query($connect,$query);
		$T_data = mysqli_fetch_array($T_result);

		$movie_query = " Select * from movies_list where m_id='".$T_data['m_id']."'";
		$movie_result = mysqli_query($connect,$movie_query);
		$dataOfMovie = mysqli_fetch_array($movie_result);
		$numOfRows = mysqli_num_rows($movie_result);

		if (!$numOfRows == 1) {
			echo "Error while fetching Data";
		}
		else{
			$secureCardNumber = "xxxx-xxxx-xxxx-".substr($T_data['Card_number'], -4); 
			$GeneratedTime = date('m/d/Y H:i:s',$T_data['Trasaction_time'] );
			?>
			<div class="container mt-4" id="print">
					<table align="center" border="1" width="100%" id="TransactionDetail" class="mt-2">
						<tr style="background-color: grey;">
							<th colspan="4" style="text-align: center;font-size: 20px;color: white!important" class="p-3">Transaction Detail</th>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;" class="p-2">MOVIE DETAIL:</th>
						</tr>
						<tr>
							<td class="p-1"><b>Movie Name :</b></td>
							<td class="p-1"><?php echo $dataOfMovie['movie_name'] ?></td>
										
							<td class="p-1"><b>Movie Type :</b></td>
							<td class="p-1"><?php echo $dataOfMovie['type'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Cast :</b></td>
							<td class="p-1"><?php echo $dataOfMovie['cast'] ?></td>
									
							<td class="p-1"><b>IMDB Rating :</b></td>
							<td class="p-1"><?php echo $dataOfMovie['rating'] ?></td>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;"class="p-2">BOOKING DETAIL :</th>
						</tr>
						<tr>
							<td class="p-1"><b>Person Name :</b></td>
							<td class="p-1"><?php echo $T_data['B_name']?></td>	

							<td class="p-1"><b>Phone Number :</b></td>
							<td class="p-1"><?php echo $T_data['B_Phone'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>City :</b></td>
							<td class="p-1"><?php echo $T_data['city']?></td>

							<td class="p-1"><b>Theater Name:</b></td>
							<td class="p-1"><?php echo $T_data['TheaterName'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Number of Tickets :</b></td>
							<td class="p-1"><?php echo $T_data['NoOfTicket']  ?></td>

							<td class="p-1"><b>Show Time :</b></td>
							<td class="p-1"><?php echo $T_data['ShowTime'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Date :</b></td>
							<td class="p-1"><?php echo $T_data['date'] ?></td>

							<td class="p-1"><b>Total Price :</b></td>
							<td class="p-1"><?php echo $T_data['TotalPrice'] ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Seat Number :</b></td>
							<td class="p-1" colspan="4"><?php echo $T_data['SeatString'] ?></td>
						</tr>
						<tr>
							<th colspan="4" style="text-align: center;" class="p-2">Payment Detail : </th>
						</tr>
						<tr>
							<td class="p-1"><b>Card number:</b></td><td><?php echo $secureCardNumber;?></td>
							<td class="p-1"><b>Time:</b></td> <td> <?php echo $GeneratedTime; ?></td>
						</tr>
						<tr>
							<td class="p-1"><b>Transaction Status :</b></td>  <td><?php echo "Success"?></td>
							<td class="p-1"><b>Booking Agent : </b></td>    <td>Booking.in</td>
										
					</table>
										<br>						
				</div> 
							<center><button class="pl-2 pr-2" id="btnPrint" onclick="printForm()">Print</button></center>
			<?php
		}
    } 
    else{
  		
		if (!isset($_SESSION['movies'])) {
			header('location:movie_link.php');
		}

		$SeatString = trim($_SESSION['movies']['Movies_seatString'],",");
		$SeatArray = explode(",",$SeatString);
		//unset($_SESSION['moviesTransaction_status']);
		if (!isset($_SESSION['moviesTransaction_status'])) {

			$query = "INSERT INTO `movies_transaction`(`B_name`, `B_Phone`, `city`, `TheaterName`, `NoOfTicket`, `ShowTime`, `SeatLevel`, `date`, `TotalPrice`, `SeatString`, `m_id`, `Card_number`, `Trasaction_time`, `user_id`) VALUES ('".$_SESSION['movies']['B_name']."','".$_SESSION['movies']['B_Phone']."','".$_SESSION['movies']['SelectCity']."','".$_SESSION['movies']['selectTheaterName']."','".$_SESSION['movies']['NoOfTicket']."','".$_SESSION['movies']['ShowTime']."','".$_SESSION['movies']['SeatLevel']."','".$_SESSION['movies']['datepicker']."','".$_SESSION['movies']['Movies_TotalPrice']."','".$SeatString."','".$_SESSION['m_id']."','".$_SESSION['cardNumber']."','".time()."','".$_COOKIE['userId']."')";

			 $result = mysqli_query($connect,$query);


			 if ($result == 1) {
			 	$query2 = "Select * from movies_transaction where user_id = '".$_COOKIE['userId']."' order by MTransaction_id desc LIMIT 1";
			 	// echo $query2;
			 	$result2 = mysqli_query($connect,$query2);
			 	$data2 = mysqli_fetch_array($result2);

			 	if (mysqli_num_rows($result2) > 0) {
			 		
			 		for ($i=0; $i < count($SeatArray); $i++) { 
			 			$query3 = "INSERT INTO `seat_tracking`(`seatNumber`, `TheaterName`,`city`,`Date`,`show_time`, `m_id`, `MTransaction_id`) VALUES (".$SeatArray[$i].",'".$_SESSION['movies']['selectTheaterName']."','".$_SESSION['movies']['SelectCity']."','".$_SESSION['movies']['datepicker']."','".$_SESSION['movies']['ShowTime']."','".$_SESSION['m_id']."','".$data2['MTransaction_id']."')";

			 			$r = mysqli_query($connect,$query3);
			 			if ($r) {
			 				$_SESSION['moviesTransaction_status'] = 'success';
			 			}
			 			else{
			 				unset($_SESSION['moviesTransaction_status']);
			 				echo "error";
			 				exit();
			 			}
			 		}

			 		if ($_SESSION['moviesTransaction_status'] == 'success') {
			 			echo "<script>alert('Your Transaction has been Successfully done...')</script>";
			 			$query_movie = "select * from movies_list where m_id='".$data2['m_id']."'";
			 			$result_movie = mysqli_query($connect,$query_movie);
			 			$dataOfMovie = mysqli_fetch_array($result_movie);
			 			$secureCardNumber = "xxxx-xxxx-xxxx-".substr($_SESSION['cardNumber'], -4); 
			 			$GeneratedTime = date('m/d/Y H:i:s',$data2['Trasaction_time'] );

						$displayItem = '<div class="container mt-4" id="print">
									<table align="center" border="1" width="100%" id="TransactionDetail" class="mt-2">
										<tr style="background-color: grey;">
											<th colspan="4" style="text-align: center;font-size: 20px;color: white!important" class="p-3">Transaction Detail</th>
										</tr>
										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">MOVIE DETAIL:</th>
										</tr>
										<tr>
											<td class="p-1"><b>Movie Name :</b></td>
											<td class="p-1">'.$dataOfMovie['movie_name']."(".$dataOfMovie['Language'].")" .'</td>
										
											<td class="p-1"><b>Movie Type :</b></td>
											<td class="p-1">'. $dataOfMovie['type'] .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Cast :</b></td>
											<td class="p-1">'. $dataOfMovie['cast'] .'</td>
										
											<td class="p-1"><b>IMDB Rating :</b></td>
											<td class="p-1">'. $dataOfMovie['rating'] .'</td>
										</tr>

										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">Booking Detail :</th>
										</tr>
										<tr>
											<td class="p-1"><b>Person Name :</b></td>
											<td class="p-1">'. $_SESSION['movies']['B_name'] .'</td>
											
											<td class="p-1"><b>Phone Number :</b></td>
											<td class="p-1">'. $_SESSION['movies']['B_Phone'] .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>City :</b></td>
											<td class="p-1">'. $_SESSION['movies']['SelectCity'] .'</td>

											<td class="p-1"><b>Theater Name:</b></td>
											<td class="p-1">'. $_SESSION['movies']['selectTheaterName']  .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Number of Tickets :</b></td>
											<td class="p-1">'. $_SESSION['movies']['NoOfTicket']  .'</td>

											<td class="p-1"><b>Show Time :</b></td>
											<td class="p-1">'. $_SESSION['movies']['ShowTime'] .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Date :</b></td>
											<td class="p-1">'. $_SESSION['movies']['datepicker'] .'</td>

											<td class="p-1"><b>Total Price :</b></td>
											<td class="p-1">'. $_SESSION['movies']['Movies_TotalPrice'] .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Seat Number :</b></td>
											<td class="p-1" colspan="4">'. $_SESSION['movies']['Movies_seatString'] .'</td>
										</tr>
										<tr>
											<th colspan="4" style="text-align: center;" class="p-2">Payment Detail : </th>
										</tr>
										<tr>
											<td class="p-1"><b>Card number:</b></td><td>'.$secureCardNumber.'</td>
											<td class="p-1"><b>Time:</b></td> <td> '. $GeneratedTime .'</td>
										</tr>
										<tr>
											<td class="p-1"><b>Transaction Status :</b></td>  <td>'. $_SESSION['moviesTransaction_status'].'</td>
											<td class="p-1"><b>Booking Agent : </b></td>    <td>Booking.in</td>
										</tr>
									</table>
									<br>
									
								</div>';
								echo $displayItem;
							?> 
								<center><button class="pl-2 pr-2" id="btnPrint" onclick="printForm()">Print</button></center>
			 			<?php
			 				$subject = 'Movie Booking Acknowledgement';
							include '..\phpMail\index.php';
			 		}
			 		
			 	}
			 }
			// $query = "INSERT INTO `movies_transaction`(`B_name`, `B_Phone`, `city`, `TheaterName`, `NoOfTicket`, `ShowTime`, `SeatLevel`, `date`, `TotalPrice`, `SeatString`, `m_id`, `Card_number`, `Trasaction_time`, `user_id`) VALUES ('".$_SESSION['movies']['B_name']."','".$_SESSION['movies']['B_Phone']."','".$_SESSION['movies']['SelectCity']."','".$_SESSION['movies']['selectTheaterName']."','".$_SESSION['movies']['NoOfTicket']."','".$_SESSION['movies']['ShowTime']."','".$_SESSION['movies']['SeatLevel']."','".$_SESSION['movies']['datepicker']."','".$_SESSION['movies']['Movies_TotalPrice']."','".$SeatString."','".$_SESSION['m_id'].";
			//echo $query;
		}
		else{
			?>
				<div style="height: 90vh">
					<div class="mt-2 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
	  					<strong class="display-4 text-center" style="font-size: 30pt">Transaction Successfully, Go to History...Nothing Here </strong>
					</div>
				</div>

			<?php
			
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
