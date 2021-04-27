<?php include '..\header2.php';  

if (!isset($_COOKIE['userId'])) {
	header('location:login.php');
}
if (isset($_SESSION['History_message'])) {
	echo "<script>alert('".$_SESSION['History_message']."');</script>";
	unset($_SESSION['History_message']);
}

?>

<div style="min-height: 90vh">
	<div class="heading_history">
	<span>History</span>
	<div class="history_navigationLink">
		<button class="naviLink" id="btnCars">CARS</button>
		<button class="naviLink" id="btnMovies">MOVIES</button>
	</div>
	<hr>
</div>
<div id="history_data" class="container">
</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#History').addClass('active');
		$('#btnCars').addClass('naviLink_bgBlack');
		displayCar();
		$('.naviLink').click(function(event) {
			$('.naviLink').removeClass('naviLink_bgBlack');
			$(this).addClass('naviLink_bgBlack');
		});


		$('#btnCars').click(function(event) {			
			displayCar();
		});
		$('#btnMovies').click(function(event) {			
			displayMovie();
		});

		$(document).on('click', '#btnMovieCancel', function(event) {
			var cancelMovieid = $(this).siblings().val();
			var imageLoader = $(this).siblings()[1];  
			imageLoader.setAttribute("src","../Images/Imageloading.gif");
			$(this).hide();
			$.ajax({
				url: 'history_backend.php',
				type: 'post',
				data: {
					cancelMovie: cancelMovieid
				},
				beforeSend:function(argument) {

				},
				success:function(data){
					alert(data); 
					displayMovie();
					imageLoader.setAttribute("src","");
					$(this).show();
				}
			});
		
			
		});
	});
	function displayCar() {
		$.ajax({
			url: 'history_backend.php',
			type: 'post',
			data: {
				btnCars: 'btnCars'
			},
			success:function(data){
				$('#history_data').html(data);
			}
		});
	}
	function displayMovie() {
		$.ajax({
			url: 'history_backend.php',
			type: 'post',
			data: {
				btnMovies: 'btnMovies',
			},
			success:function(data){
				$('#history_data').html(data);
			}
		});
	}


</script>
<?php include '..\footer.php'; ?>