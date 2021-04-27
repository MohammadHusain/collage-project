<?php include '..\header2.php'; ?>
<?php 
	$activePage;
	if (!isset($_COOKIE['userId'])) {
		header('location:login.php');
		exit();
	}

	if (isset($_SESSION['movielistMessage'])) {
		$activePage = 'Movie';
		echo "<script>alert('".$_SESSION['movielistMessage']."')</script>";
		unset($_SESSION['movielistMessage']);
	}
?>

<div style="min-height: 90vh">
		<div class="heading_history">
		<span>Added List</span>
		<div class="history_navigationLink">
			<button class="naviLink" id="add_btnCars">CARS</button>
			<button class="naviLink" id="add_btnMovies">MOVIES</button>
		</div>
		<hr>
	</div>
	<div id="add_history_data" class="container m-auto row">
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#addToList').addClass('active');
		$('#add_btnCars').addClass('naviLink_bgBlack');

		$('.naviLink').click(function(event) {
			$('.naviLink').removeClass('naviLink_bgBlack');
			$(this).addClass('naviLink_bgBlack');
		});
		if ('<?php if (isset($activePage)) {echo $activePage;} ?>' == 'Movie') {
			displayAdd_Movie();
		}
		else{
			displayAdd_car();
		}
		// ---cars------//
		$('#add_btnCars').click(function(event) {
			displayAdd_car();
		});

		function displayAdd_car() {
			$.ajax({
				url: 'addToListBackend.php',
				type: 'POST',
				data: {
					showcardata: 'showcardata'
				},
				success:function(data) {
					$('#add_history_data').html(data);
				}
			})
			$('#add_btnCars').addClass('naviLink_bgBlack');
		}

		$(document).on('click', '#removeListBtn_car', function(event) {
			var RemoveCarId = $(this).siblings().val();

			$.ajax({
				url: 'addToListBackend.php',
				type: 'POST',
				data: {RemoveCarId: RemoveCarId},

				success:function(data) {
					alert(data);
					displayAdd_car();
				}
			});
		});

		// ---Movies------//
		$('#add_btnMovies').click(function(event) {
			displayAdd_Movie();
		});

		function displayAdd_Movie() {
			$.ajax({
				url: 'addToListBackend.php',
				type: 'POST',
				data: {
					showMovieData: 'showMovieData'
				},
				success:function(data) {
					$('#add_history_data').html(data);
				}
			})
			$('#add_btnMovies').addClass('naviLink_bgBlack');
			$('#add_btnCars').removeClass('naviLink_bgBlack');
		}

	});
</script>
<?php include '..\footer.php'; ?>