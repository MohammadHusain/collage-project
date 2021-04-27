<?php 
	include '..\header2.php';

	/*$path = basename($_SERVER['PHP_SELF'], ".php").".php?m_id=".$_GET['m_id'];
	$_SESSION['UserTracking'] = $path;
	$_SESSION['m_id'] = $_GET['m_id'];*/
	//echo $_SESSION['UserTracking'] ." ".$_SESSION['m_id'];
	
	// if (isset($_SESSION['navigateLink'])) {
	// 	unset($_SESSION['navigateLink']);
	// }
	if (!isset($_COOKIE['userId'])) {
		$_SESSION['message'] = "login First";
		$_SESSION['navigateLink'] = "movie_link.php";
		header('location:login.php');
	}
	if (isset($_SESSION['moviesTransaction_status'])) {
		unset($_SESSION['moviesTransaction_status']);
		unset($_SESSION['movies']);	
	}
	if (isset($_SESSION['OFFSET'])) {
		unset($_SESSION['OFFSET']);
	}
	// unset session
	if (isset($_SESSION['Cartransaction_status'])) {
	 	unset($_SESSION['Cartransaction_status']);
	 	unset($_SESSION['car']);
	 }
	if (isset($_REQUEST['Movie_Booknow'])) {
		if (isset($_SESSION['car'])) {
			unset($_SESSION['car']);
		}
		$_SESSION['movies']['B_name'] = $_REQUEST['B_name'];
		$_SESSION['movies']['B_Phone'] = $_REQUEST['B_Phone'];
		$_SESSION['movies']['SelectCity'] = $_REQUEST['SelectCity'];
		$_SESSION['movies']['selectTheaterName'] = $_REQUEST['selectTheaterName'];
		$_SESSION['movies']['NoOfTicket'] = $_REQUEST['NoOfTicket'];
		$_SESSION['movies']['ShowTime'] = $_REQUEST['ShowTime'];
		$_SESSION['movies']['SeatLevel'] = $_REQUEST['SeatLevel'];
		$_SESSION['movies']['datepicker'] = $_REQUEST['datepicker'];
		$_SESSION['movies']['Movies_TotalPrice'] = $_REQUEST['Movies_TotalPrice'];
		header('location:movie_SelectSeat.php');
		//echo "<script>window.location = \"movie_SelectSeat.php\";</script>";
	}
	$connect = mysqli_connect('localhost','root','','project');
	$query = "select * from movies_list where m_id = ".$_REQUEST['m_id'];
	$result = mysqli_query($connect,$query);

	if (mysqli_num_rows($result) > 0) {
			$data = mysqli_fetch_array($result);
			$m_id = $_REQUEST['m_id'];
			$_SESSION['m_id'] = $_REQUEST['m_id'];
	}
	else{
		echo "error while retriving data";
		exit();
	}
?>

<div class="container-fluid">
	<div class="row bg-light align-items-end movieCapture-header">
		<div class="imageContainer">
			<img src="../Images/Movie-image/<?php echo $data['image'] ?>">
		</div>
		<div class="nameContainer">
			<p class="display-4" style="">
				<?php echo $data['movie_name']; ?>
			</p>
			<p class="detail_type">
				<b>Type : </b><?php echo $data['type']; ?>
			</p>
			<p class="detail_type">
				<b>Language : </b><?php echo $data['Language']; ?>
			</p>
		</div>
	</div>
	<div class="row justify-content-end pb-4 bg-light">
		<div class="OtherDetail">
			<p>
				<b>Description : </b><?php echo $data['description']; ?>
			</p>
			<p>
				<b>IMDB Rating : </b><kbd><?php echo $data['rating']; ?> <i class="fa fa-star"></i></kbd>
			</p>
			<p>
				<b>Cast : </b><?php echo $data['cast']; ?>
			</p>
			<p>
				<b>Director : </b><?php echo $data['director']; ?>
			</p>
			<input type="hidden" name="txtm_id" id="txtm_id" value="<?php echo $m_id ?>">
		</div>
	</div>
</div>

<div class="alert alert-danger alert-dismissible  m-0">
  	<button type="button" class="close" data-dismiss="alert">&times;</button>
  	<strong>Note : </strong> Cancalation of booking is avaliable within 2 hour of booking. To cancel booking goto History page
</div>
<form action="movie_CaptureDetail.php" method="POST">
	<div class="container-fluid pt-3">
		<div class="container card p-0">
			<div class="card-header bg-dark text-light text-center m-0">
				Enter Detail
			</div>
			<div class="row card-body">

				<div class="form-group col-md-6 col-sm-12 MovieCaptureinput_style">
			  		<label for="B_name">Name :</label>
			  		<input type="text" name="B_name" id="B_name" class="form-control" placeholder="Name on Ticket">
			  		<span id="B_nameCheck" class="text-danger"></span>
				</div>

				<div class="form-group col-md-6 col-sm-12 MovieCaptureinput_style">
			  		<label for="B_Phone">Phone Number :</label>
			  		<input type="text" name="B_Phone" id="B_Phone" class="form-control" placeholder="">
					<span id="B_PhoneCheck" class="text-danger"></span>
				</div>

				<div class="form-group col-md-6 col-sm-12 MovieCaptureinput_style">
			  		<label for="SelectCity">Select City :</label>
			  			<select class="form-control" name="SelectCity" id="SelectCity">
			    			<option disabled selected>Select</option>
							<?php 
								$query = "select DISTINCT city from theater_list where m_id = '".$_REQUEST['m_id']."'";
								$result = mysqli_query($connect,$query);

								if (mysqli_num_rows($result) > 0) {
									while ($data = mysqli_fetch_array($result)) {
										echo "<option>".$data['city']."</option>";
									}
								}
							?>
							
			  			</select>
			  			<span id="SelectCityCheck" class="text-danger"></span>
				</div>

				<div class="form-group col-md-6 col-sm-12 MovieCaptureinput_style">
			  		<label for="selectTheaterName">Select Theater:</label>
			  		<select class="form-control" name="selectTheaterName" id="selectTheaterName">
						<option selected disabled>Select City first</option>
			  		</select>
			  		<span id="selectTheaterNameC" class="text-danger"></span>
				</div>

				<div class="form-group col-md-3 col-sm-6">
			  		<label for="NoOfTicket">No. of Ticket : </label>
			  			<select class="form-control" name="NoOfTicket" id="NoOfTicket">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
			  			</select>
			  			<span id="NoOfTicketCheck" class="text-danger"></span>
				</div>
				<div class="form-group col-md-3 col-sm-6">
			  		<label for="ShowTime"><i class="fa fa-clock-o" aria-hidden="true"></i> Time : </label>
			  			<select class="form-control" name="ShowTime" id="ShowTime">
							<option selected>10:00 - 12:30</option>
							<option>12:30 - 03:00</option>
							<option>03:00 - 05:30</option>
							<option>05:30 - 08:00</option>
							<option>08:00 - 10:30</option>
			  			</select>
				</div>
				<div class="form-group col-md-3 col-6">
			  		<label for="SeatLevel">Range : </label>
			  			<select class="form-control" name="SeatLevel" id="SeatLevel">
			  				<option selected disabled>select</option>
							<option value="Low">Low</option>
							<option value="Medium">Medium</option>
							<option value="High">High</option>
			  			</select>
			  			<span id="SeatLevelCheck" class="text-danger"></span>
				</div>
				<div class="col-md-3 col-6">
					<label for="datepicker"></i><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Date:  </label>
					
					<input type="text" name="datepicker" id="datepicker" class="form-control bg-white" placeholder="" class="placelolderIcon" readonly="true">
					<span id="datepickerCheck" class="text-danger"></span>
				</div>

				<div class="col-12 d-flex display-4 mt-2 mb-2">
					<span class="ml-auto"><b>Total</b> <i class="fa fa-inr"></i>&nbsp;</span>
					<span id="calculatedPrice" class="mr-auto">_____</span>
					
				</div>
				<input type="hidden" name="Movies_TotalPrice" id="Movies_TotalPrice">
				<!-- <input type="hidden" name="Movies_seatString" id="Movies_seatString"> -->

				<div class="col-12 d-flex">
					<button class="btn btn-danger ml-auto" type="submit" name="Movie_Booknow">Book Now</button>
				</div>
			</div>	
		</div>
	</div>
</form>
<div class="container mt-5 pl-lg-5 pr-lg-5">
	<h1 class="display-4 text-center recommendHeading mt-4">
		Movie Reviews
	</h1>
	<div class="underline mb-3"></div>
	<div class="card pl-lg-5 pr-lg-5 border-0">
		<div class="card-header" style="background-color: rgb(244, 246, 245)">
			<textarea id="txtMovieReview" class="form-control alert-light mt-2" rows="4" placeholder="Enter Your Review:"></textarea>
			<button type="button" id="submitMovieReview" class="btn btn-success mt-2" style="float: right;">Submit</button>
		</div>
		<div id="movieReviews" class="card-body" style="border:4px solid rgb(244, 246, 245)">
		</div>
		<div class="card-footer" style="background-color: rgb(244, 246, 245)">
			<button type="button" id="loadCarReview" class="btn m-auto btn-success">Show More</button>
		</div>
	</div>
</div>
<script type="text/javascript">
		$(document).ready(function() {
			// var noOfTicket,selectedSeat = 0;
			// var btn;
			window.onpageshow = function (event) {
       			 if (event.persisted) {
            		window.location.reload();
        		}
    		};

			GetTheaterName();
			
			$('#section1,#section2,#section3').hide();
			var date = new Date();
	  		date.setDate(date.getDate() + 15);
	  		var maxDate = date.getDate()+"/" + (date.getMonth()+1) + "/" + date.getFullYear();
	  		<?php 
	  			$date1 = getDate();
	  			$date1 = $date1['mday'].'/'.$date1['mon'].'/'.$date1['year'];
	  			//$date1 = date_format($date1,"d/m/Y");
	  		?>
	  		var startDate = new Date('<?php echo $date1; ?>');
	  		var minDate = (startDate.getMonth()+1)+ "/" + startDate.getDate() + "/" + startDate.getFullYear();
		 	$( "#datepicker" ).datepicker({
	    		showAnim : 'drop',
	    		numberOfMonth : 1,
	    		dateFormat : 'dd/mm/yy',
	    		minDate : minDate,
	    		maxDate : maxDate
	   		});

		 	// $('.seatNumber').click(function(event) {
		 	// 	noOfTicket = $('#NoOfTicket').val();
		 	// 	btn = $(this);
		 	// 	var color = this.style.backgroundColor;
		 	// 	if (noOfTicket > selectedSeat && color != 'rgb(255, 0, 0)') {
		 	// 		btn.css({
		 	// 			backgroundColor : 'red',
		 	// 		});
		 	// 		selectedSeat++;
		 	// 		btn.addClass('selectedSeat');
		 	// 	}
		 	// 	else if (color == 'rgb(255, 0, 0)') {
		 	// 		btn.css({
		 	// 			backgroundColor : 'white',
		 	// 		});
		 	// 		selectedSeat--;
		 	// 		btn.removeClass('selectedSeat');
		 	// 	}
		 	// });
		 	showMoviewReview();
		}); 
	$('#SelectCity').change(function(event) {
		// var SelectedCity = $('#SelectCity').val();
		// var m_id = $('#txtm_id').val();
		// // alert(a);


		// $.ajax({
		// 	url: 'movie_CaptureDetail_data.php',
		// 	type: 'POST',
		// 	data: {
		// 		m_id: m_id,
		// 		SelectedCity: SelectedCity
		// 	},
		// 	success:function(data){
		// 		$('#selectTheaterName').html('<option selected disabled>Select</option>'+data);
		// 	}
		// })
		GetTheaterName();
	});
	function GetTheaterName(argument) {
		var SelectedCity = $('#SelectCity').val();
		var m_id = $('#txtm_id').val();
		// alert(a);

		if (SelectedCity != null) {
			$.ajax({
				url: 'movie_CaptureDetail_data.php',
				type: 'POST',
				data: {
					m_id: m_id,
					SelectedCity: SelectedCity
				},
				success:function(data){
					$('#selectTheaterName').html('<option selected disabled>Select</option>'+data);
				}
			})
		}
	}
	$('#submitMovieReview').click(function(event) {
		var txtMovieReview = $('#txtMovieReview').val();
		txtMovieReview = txtMovieReview.trim();
		if (txtMovieReview == '') {
			alert('Enter Review');
		}
		else {
			$.ajax({
				url: 'ReviewBackend.php',
				type: 'post',
				data: {
					txtMovieReview: txtMovieReview
				},
				success:function(data) {
					if (data == 'success') {
						$('#movieReviews').html('clear');
						$('#loadCarReview').show();
						$('#txtMovieReview').val('');
						alert('Thanks for Your Review');
						showMoviewReview();
					}
				}
			})			
		}
	});
	$('#loadCarReview').click(function(event) {
		showMoviewReview();
	});
	function showMoviewReview() {
		$.ajax({
			url: 'ReviewBackend.php',
			type: 'post',
			data: {
				showMoviewReview: 'showMoviewReview'
			},
			success:function(data) {
				if (data == 'khatam') {
					$('#loadCarReview').hide();
				}
				else {
					var movieReviews = $('#movieReviews').html();
					if (movieReviews == '') {
						$('#movieReviews').html();
					}
					else if (movieReviews == 'clear' || movieReviews == 'Be the First Reviewer') {
						$('#movieReviews').html('');
						$('#movieReviews').html(data);
					}
					else {
						$('#movieReviews').html( movieReviews + data);
					}
				}
			}
		})
		
	}
<?php ob_end_flush(); ?>

	
</script>

<script type="text/javascript" src="../script/movie_script.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php include '..\footer.php'; ?>
