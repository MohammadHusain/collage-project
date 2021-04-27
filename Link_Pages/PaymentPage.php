<?php include '..\header2.php';
	if (!isset($_COOKIE['userId'])) {
		$_SESSION['message'] = "login First";
		header('location:login.php');
	}
	else{
		if (isset($_SESSION['moviesTransaction_status']) || isset($_SESSION['Cartransaction_status'])) {
			?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">Nothing hear </strong>
				</div>

			<?php
			exit();
		}
	}
	if (isset($_POST['submit'])) {
		if (isset($_SESSION['car'])) {
			$_SESSION['cardNumber'] = $_POST['cardNumber'];
			header('location:CarPaymentDetail_print.php');
		}
		else if(isset($_SESSION['movies'])){
			$_SESSION['cardNumber'] = $_POST['cardNumber'];
			header('location:MoviePaymentDetail_print.php');
		}
	}

	if (isset($_SESSION['car']['CarNumberOfDay'])) {
		$price = $_SESSION['car']['car_price'] * $_SESSION['car']['CarNumberOfDay'];
	}
	else if (isset($_SESSION['movies']) && isset($_SESSION['movies']['Movies_seatString'])) {
		$price = $_SESSION['movies']['Movies_TotalPrice'];
	}
	else{
		?>
				<div class="mt-1 w-100" style="height: 300px;display: flex;align-items: center;justify-content: center;">
  					<strong class="display-4 text-center" style="font-size: 30pt">Nothing hear </strong>
				</div>
			<?php
			exit();
	}
?>
<form method="post" id="carPayment_form" name="carPayment_form">
	<div class="container-fluid mt-3" style="min-height: 80vh; display: flex; align-items: center;">
		<div class="container card p-0">
			<div class="card-header d-flex align-items-center alert-success">
				<h2 class="payment-amount font-weight-normal mr-auto">Confirm Purchase :</h2>
				<span>
					<b class="paymentText">Amount : </b>
					<br>
					<span class="payment-amount display-4 font-weight-normal" style="font-size: 40px">
						<b>&#x20B9;</b> <?php echo $price ?>/-
					</span>
				</span>
			</div>

			<!-- style at index -->
			<div class="card-body row align-items-center payment-responsive">
				<div class="col-md-5 col-sm-12 part1 mt-4 mb-4">
					<div class="card">
						<img src="../Images/payment3.jpg" class="w-100">
					</div>
				</div>
				<div class="col-md-7 col-sm-12 part2">
					<div class="row">
						<div class="col-sm-8">
							<label>Name on Card :</label>
							<input type="text" name="cardName" id="cardName" class="form-control">
							<span id="cardName_check" class="text-danger"></span>
						</div>
						<div class="col-sm-4">
							<label>Postal Code:</label>
							<input type="text" name="cardPostalCode" id="cardPostalCode" class="form-control">
							<span id="cardPostalCode_check" class="text-danger"></span>
						</div>
						<div class="col-sm-12">
							<label class="pt-3">Card Number(No space or '-')</label>
							<input type="text" name="cardNumber" id="cardNumber" class="form-control">
							<span id="cardNumber_check" class="text-danger"></span>
						</div>
						<div class="col-sm-8">
							<label class="pt-3">Expiration Date :</label>
							<div class="d-flex">
								<input type="text" name="cardExpiryMonth" id="cardExpiryMonth" class="form-control" style="width: 50%!important" placeholder="MM">
								<input type="text" name="cardExpiryYear" id="cardExpiryYear" class="form-control" style="width: 50%!important" placeholder="YY">
							</div>
							<span id="cardExpiry_check" class="text-danger"></span>
						</div>
						<div class="col-sm-4">
							<label class="pt-3">Cvv</label>
							<input type="password" name="cardCvv" id="cardCvv" class="form-control" placeholder="123">
								<span id="cardCvv_check" class="text-danger"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer row m-0 alert-success">
				<div class="col-md-7 offset-5">
					<input class="btn btn-success w-100" type="submit" name="submit" value="Pay Now" style="height: 50px;font-size: 20px;letter-spacing: 1px">
				</div>
			</div>
		</div>
	</div>
</form>


<script type="text/javascript">
	$(document).ready(function($) {
		$('form').submit(function(event) {
			//Name
			var cardName = $('#cardName').val();
			var nameRegx = /^[a-zA-Z ]{2,30}$/;
			if (cardName == '') {
				$('#cardName_check').text('*Field Required');
				event.preventDefault();
			}
			else if (!nameRegx.test(cardName)) {
				$('#cardName_check').text('*Invalid Name');
				event.preventDefault();
			}
			else{
				$('#cardName_check').text('');
			}

			//postal code

			var cardPostalCode = $('#cardPostalCode').val();
			var postalRegx = /^[0-9]{6}$/;

			if (cardPostalCode == '') {
				$('#cardPostalCode_check').text('*Field Required');
				event.preventDefault();
			}
			else if (!postalRegx.test(cardPostalCode)) {
				$('#cardPostalCode_check').text('*Invalid Postal Code');
				event.preventDefault();
			}
			else{
				$('#cardPostalCode_check').text('');
			}

			//card Number

			var cardNumber = $('#cardNumber').val();
			var numberRegx = /^[0-9]{16}$/;

			if (cardNumber == '') {
				$('#cardNumber_check').text('*Field Required');
				event.preventDefault();
			}
			else if (!numberRegx.test(cardNumber)) {
				$('#cardNumber_check').text('*Invalid card number');
				event.preventDefault();
			}
			else{
				$('#cardNumber_check').text('');
			}

			//card expiry month and year

			var cardExpiryMonth = $('#cardExpiryMonth').val();
			var cardExpiryYear = $('#cardExpiryYear').val();
			var expiryRegx = /^(0?[1-9]|1[012])$/;
			var expiryYearRegx = /^[2][0-9]$/;

			if (cardExpiryMonth == '') {
				$('#cardExpiry_check').text('*Month Required');
				event.preventDefault();
			}
			else if (cardExpiryYear == '') {
				$('#cardExpiry_check').text('*Year Required');
				event.preventDefault();
			}
			else if (!expiryRegx.test(cardExpiryMonth)) {
				$('#cardExpiry_check').text('*Invalid month');
				event.preventDefault();
			}
			else if (!expiryYearRegx.test(cardExpiryYear)) {
				$('#cardExpiry_check').text('*Invalid year');
				event.preventDefault();
			}
			else{
				$('#cardExpiry_check').text('');
			}

			//cvv

			var cardCvv = $('#cardCvv').val();
			var cvvRegx = /^[0-9]{3}$/;

			if (cardCvv == '') {
				$('#cardCvv_check').text('*Field Required');
				event.preventDefault();
			}
			else if (!cvvRegx.test(cardCvv)) {
				$('#cardCvv_check').text('*Invalid cvv');
				event.preventDefault();
			}
			else{
				$('#cardCvv_check').text('');
			}

		});
	});
</script>
<?php include '..\footer.php'; ?>