<?php 
	include '..\header2.php';
	$connect = mysqli_connect('localhost','root','','project');

?>

<?php 
	if (!isset($_SESSION['movies'])) {
		header('movie_link.php');
	}
	if (!isset($_SESSION['movies'])) {
		header('location:movie_link.php');
	}
	if (isset($_SESSION['movies']['Movies_seatString'])) {
		unset($_SESSION['movies']['Movies_seatString']);
	}
	if (isset($_POST['Movie_proceed'])) {
		$_SESSION['movies']['Movies_seatString'] = $_POST['Movies_seatString'];
		if (isset($_SESSION['moviesTransaction_status'])) {
			unset($_SESSION['moviesTransaction_status']);
		}
		header('location:PaymentPage.php');
	}
?>

<?php 
	$query = "select seatNumber from seat_tracking where TheaterName = '".$_SESSION['movies']['selectTheaterName']."' and city = '".$_SESSION['movies']['SelectCity']."' and Date = '".$_SESSION['movies']['datepicker']."' and show_time = '".$_SESSION['movies']['ShowTime']."' and m_id = '".$_SESSION['m_id']."'";
	$result = mysqli_query($connect,$query);
	$data = array("0");
	if (mysqli_num_rows($result) > 0) {
		for ($i=0; $i < mysqli_num_rows($result); $i++) { 
			$temp = mysqli_fetch_array($result);
			$data[$i] = $temp['seatNumber'];
		}
	}
?>

<div class="container row m-auto">
	<div class="alert alert-danger alert-dismissible  m-2 w-100">
	  	<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<strong>Note : </strong> Cancalation of booking is avaliable within 2 hour of booking. To cancel booking goto History page
	</div>
	<div class="col-12 mt-2" style="overflow: auto;">
			<?php 
				if (isset($_SESSION['movies']['SeatLevel']) && $_SESSION['movies']['SeatLevel'] == 'Low') {

					?>
					<table id="section1" class="m-auto">
						<tr><th colspan="12" class="text-center alert-success p-2 border border-success">Select Seat</th></tr>
						<tr><td style="padding: 10px"> </td></tr>
						<tr>
							<td colspan="6" class="font-weight-bold">Section A</td>
							<td colspan="6" class="font-weight-bold">Section B</td>
						</tr>
						<tr>
							<?php 
								$margin;
								for ($i=1; $i <= 12; $i++) { 
									if ($i==6) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									}
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=13; $i <= 24; $i++) {
									$margin;
									if ($i==18) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=25; $i <= 36; $i++) { 
									$margin;
									if ($i==30) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=37; $i <= 48; $i++) { 
									$margin;
									if ($i==42) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=50; $i <= 61; $i++) { 
									$margin;
									if ($i==55) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=62; $i <= 73; $i++) { 
									$margin;
									if ($i==67) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
					</table>
					<?php
				}
			?>	

			<?php 
				if (isset($_SESSION['movies']['SeatLevel']) && $_SESSION['movies']['SeatLevel'] == 'Medium') {

					?>
					<table id="section2" class="m-auto">
						<tr><th colspan="12" class="text-center alert-success p-2 border border-success">Select Seat</th></tr>
						<tr><td style="padding: 10px"> </td></tr>
						<tr>
							<?php 
								$margin;
								for ($i=74; $i <= 85; $i++) { 
									if ($i==79) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									}
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=86; $i <= 97; $i++) {
									$margin;
									if ($i==91) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=98; $i <= 109; $i++) { 
									$margin;
									if ($i==103) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=110; $i <= 121; $i++) { 
									$margin;
									if ($i==115) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=122; $i <= 133; $i++) { 
									$margin;
									if ($i==127) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=134; $i <= 145; $i++) { 
									$margin;
									if ($i==139) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
					</table>
					<?php
				}
			?>	

			<?php 
				if (isset($_SESSION['movies']['SeatLevel']) && $_SESSION['movies']['SeatLevel'] == 'High') {

					?>
					<table id="section3" class="m-auto">
						<tr><th colspan="12" class="text-center alert-success p-2 border border-success">Select Seat</th></tr>
						<tr><td style="padding: 10px"> </td></tr>
						<tr>
							<?php 
								$margin;
								for ($i=146; $i <= 157; $i++) { 
									if ($i==151) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									}
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=158; $i <= 169; $i++) {
									$margin;
									if ($i==163) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=170; $i <= 181; $i++) { 
									$margin;
									if ($i==175) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
											</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=182; $i <= 193; $i++) { 
									$margin;
									if ($i==187) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=194; $i <= 205; $i++) { 
									$margin;
									if ($i==199) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
						<tr>
							<?php 
								for ($i=206; $i <= 217; $i++) { 
									$margin;
									if ($i==211) {
										$margin = 'padding-right:50px!important';
									}
									else {
										unset($margin);
									} 
									?>
										<td style="<?php if(isset($margin)){echo $margin;} ?>">
											<?php 
												$disabled;
												if (in_array($i, $data)) {
													$disabled = 'disabled style="background-color:#d1d1d1"';
												}
												else{
													$disabled = '';
												}
											?>
											<button class="seatNumber" type="button" <?php echo $disabled; ?>><?php echo $i; ?></button>
										</td>
									<?php
								}
							?>
						</tr>
					</table>
					<?php
				}
			?>	
	</div>
		<p id="selectSeat_validation" class="text-danger text-center w-100"></p>
	<div class="m-auto">
		<form action="" method="post">
			<input type="hidden" name="Movies_seatString" id="Movies_seatString">
			<button type="submit" name="Movie_proceed" class="btn btn-success mt-2">Proceed</button>
		</form>
	</div>
</div>
		
<div class="container d-flex flex-column align-items-center mt-4" >
	<table>
		<tr>
			<td>
				<div class="mt-2">
					<button type="button" class="dummySeat">00</button>
					&nbsp;&nbsp; <span style="color:rgb(98, 95, 95);">Seat Available for Booking.</span>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="mt-2">
					<button type="button" class="dummySeat" style="background-color: red">00</button>
					&nbsp;&nbsp; <span style="color:rgb(98, 95, 95);">Your Selected Seat.</span>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="mt-2">
					<button type="button" class="dummySeat" style="background-color: grey">00</button>
					&nbsp;&nbsp;<span style="color:rgb(98, 95, 95);">Seat Already Booked.</span>
				</div>
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript">
	var selectedSeat = 0;
	var noOfTicket = <?php echo $_SESSION['movies']['NoOfTicket']; ?>;
	$('.seatNumber').click(function(event) {
		 		
		 		btn = $(this);
		 		var color = this.style.backgroundColor;
		 		if (noOfTicket > selectedSeat && color != 'rgb(255, 0, 0)') {
		 			btn.css({
		 				backgroundColor : 'rgb(255, 0, 0)',
		 			});
		 			selectedSeat++;
		 			btn.addClass('selectedSeat');
		 		}
		 		else if (color == 'rgb(255, 0, 0)') {
		 			btn.css({
		 				backgroundColor : 'white',
		 			});
		 			selectedSeat--;
		 			btn.removeClass('selectedSeat');
		 		}
	});

	$('form').submit(function(event) {
			if (selectedSeat < noOfTicket) {
			event.preventDefault();
			$('#selectSeat_validation').text("*Select the seat to proceed");
		}
		else if(selectedSeat == noOfTicket){
			var selectedSeatstring = '';
			for (var i = 0 ; i < noOfTicket; i++) {
				var s = document.getElementsByClassName('selectedSeat')[i].innerHTML;
				s.trim();
				selectedSeatstring = selectedSeatstring +s+ ",";
			}
			$('#Movies_seatString').val(selectedSeatstring);
		}
	});
</script>
<?php include '..\footer.php'; ?>