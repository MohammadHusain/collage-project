<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/brands.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		session_start();
		if (isset($_SESSION['insert_carMessage'])) {
			?>
				<script>alert('<?php echo $_SESSION['insert_carMessage'] ?>')</script>
			<?php
			unset($_SESSION['insert_carMessage']); 	
		}
	?>
	<nav style="position: sticky;top: 0;z-index: 999">
		<div class="bg-dark d-flex text-light align-items-center p-2 m-0">
			<h1 class="display-4 m-0 text-warning" style="font-size: 35px;">
				Admin Page
			</h1>
			<p class="mt-auto m-0 pl-4">( <?php echo $_COOKIE['AdminName']; ?> )</p>
			<ul class="ml-auto" style="list-style: none; display: flex; padding: 0;margin: 0">
				<li><a href="admin_main.php" class="p-3 text-light ">Dashboard</a></li>
				<li><a href="insert_car.php" class="p-3 text-light ">Insert Car</a></li>
				<li><a href="insert_movies.php" class="p-3 text-light ">Insert Movies</a></li>
				<li><a href="insert_theater.php" class="p-3 text-light ">Insert Theater</a></li>
			</ul>
		
			<a href="admin_logout.php" class="ml-auto bg-warning p-2" style=" border-radius: 30px; border:none;">LogOut</a>
		</div>
	</nav>

	<div class="container-fluid bg-light p-2">
		<div class="container">
			<h1 class="display-4 text-center" style="font-size: 40px">
				Enter Car Detail :
			</h1>
			<hr width="50%" class="m-auto p-2"></th>
			<form method="POST" action="crud_insertCars.php" enctype="multipart/form-data">
				<table width="100%">
					<tr>
						<td colspan="3">
							<label>
								Car Name :
							</label>
							<input type="text" name="txtCarName" placeholder="Enter Car Name :" class="form-control" id="txtCarName" required>
						</td>
						<td colspan="3">
							<label>
								Car Number :
							</label>
							<input type="text" name="txtCarNumber" placeholder="Enter Car Number :" class="form-control" id="txtCarNumber" required>
						</td>
					</tr>
					<tr style="vertical-align: top;">
						
						<td>
							<label>Condition :</label>
							<textarea placeholder="" id="Condition" cols="30" rows="4" class="form-control" name="Condition" required></textarea>
						</td>
						<td colspan="2">
							<label>
								Image :
							</label>
							<input type="file" name="img" placeholder="" class="form-control-file border" id="img" required>
						
							<label class="pt-2">
								Price per Day :
							</label>
							<input type="text" name="txtPrice" placeholder="Enter Price :" class="form-control" id="txtPrice" required>
						</td>
						<td colspan="2">
							<label>
								City :
							</label>
							<input type="text" name="txtCity" placeholder="Enter City :" class="form-control" id="txtCity" required>
						</td>
					</tr>
					<tr>
						<td colspan="6" >
							<br>
							<h1 class="display-4 text-center" style="font-size: 40px">
								Owner's Detail :
							</h1>
							<hr width="50%" class="m-auto p-2"></th>
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<label>
								Owner Name :
							</label>
							<input type="text" name="txtOwnerName" placeholder="Enter Owner Name :" class="form-control" id="txtOwnerName" required>
						</td>
						<td colspan="3">
							<label>
								Owner Mobile Number :
							</label>
							<input type="text" name="txtOwnerNumber" placeholder="Enter Mobile Number :" class="form-control" id="txtOwnerNumber" required>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label>
								Status :
							</label>
							<select class="form-control" name="status" id="status">
								<option>Available</option>
								<option>Not-Available</option>
								<option>Promoted</option>
							</select>
						</td>
						<td colspan="4">
							<div class="d-flex mt-4 flex-row-reverse justify-content-start" >
								<input type="button" name="cancel" class="btn mt-2 btn-danger" id="car_cancel" value="Cancel" onclick="clearAll()">
								<input type="submit" name="submit" class="btn btn-success mt-2 mr-2" id="car_submit" value="Insert">
								<input type="button" name="update" class="btn btn-success mt-2 mr-2" id="car_update" value="Update">
							</div>

						</td>
						<input type="hidden" id="car_id">
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="container-fluid p-5 min-width">

			<div class="row m-0" style="justify-content: space-between;align-items: center;">
				<h1 class="text-dark">Table</h1>
				<div class="row m-0 search-list">
					<li style="list-style: none;">
						<input type="text" class="form-control" placeholder="Search by id" id="searchById">
					</li>
					<li class="mr-1" style="list-style: none;">
						<input type="button" class="btn btn-success" value="Search" id="btn_searchById">
					</li>
					<li class="mr-1" style="list-style: none;">
						<input type="button" class="btn btn-danger" value="Show all" id="car_display_all">
					</li>
					<li class="mr-1" style="list-style: none;">
						<input type="button" class="btn btn-primary" value="Booked Cars" id="car_booked">
					</li>
					<li class="mr-1" style="list-style: none;">
						<input type="button" class="btn btn-warning" value="Promoted Cars" id="car_promoted">
					</li>
				</div>
			</div>

			<table class="table table-striped table-bordered text-center" style="">
				<thead class="">
					<th>car_id</th>
					<th>car_name</th>
					<th>car_number</th>
					<th>condition</th>
					<th>car_image</th>
					<th>car_price</th>
					<th>car_city</th>
					<th>owner_name</th>
					<th>owner_number</th>
					<th>status</th>
				</thead>
				<tbody id="car_table_body">
					
				</tbody>
			</table>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#car_update').attr('disabled','true');
		});

		$('#cancel').click(function(event) {
			$('#update').attr('disabled','true');
			$('#submit').removeAttr('disabled');

			$('#txtCarName').val('');
			$('#txtCarNumber').val('');
			$('#Condition').val('');
			$('#img').val('');
			$('#txtPrice').val('');
			$('#txtCity').val('');
			$('#txtOwnerName').val('');
			$('#txtOwnerNumber').val('');
			$('#status').val('');
		});


		$('#car_display_all').click(function(event) {
			car_displayAll();			
		});
		function car_displayAll(argument) {
			$.ajax({
					url: 'crud_insertCars.php',
					type: 'post',
					data: {
						car_display_all: 'car_display_all'
					},
					success:function (data) {
						$('#car_table_body').html(data);
					}
				})
		}
		function car_UpdateData(argument) {
			$.ajax({
				url: 'crud_insertCars.php',
				type: 'post',
				data: {
					car_UpdateId: argument
				},
				success:function(data) {
					if (data == "Error") {
						alert("Error while fetching data");
					}
					else{
						var updateData = JSON.parse(data);
						$('#car_id').val(updateData.car_id);
						$('#txtCarName').val(updateData.car_name);
						$('#txtCarNumber').val(updateData.car_number);
						$('#Condition').val(updateData.condition);
						$('#txtCity').val(updateData.car_city);
						$('#txtPrice').val(updateData.car_price);
						$('#txtOwnerName').val(updateData.owner_name);
						$('#txtOwnerNumber').val(updateData.owner_number);
						$('#status').val(updateData.status);

						$('#car_update').removeAttr('disabled');
						$('#car_submit').attr('disabled', 'true');
					}
				}
			})
			
		}
		function car_deleteData(argument) {
			$.ajax({
				url: 'crud_insertCars.php',
				type: 'post',
				data: {
					deleteId: argument
				},
				success:function(data) {
					alert(data);
					car_displayAll();
				}
			})
			
		}
		
		$('#car_update').click(function(event) {
			var car_id = $('#car_id').val();
			var txtCarName = $('#txtCarName').val();
			var txtCarNumber = $('#txtCarNumber').val();
			var Condition = $('#Condition').val();
			var txtPrice = $('#txtPrice').val();
			var txtCity = $('#txtCity').val();
			var txtOwnerName = $('#txtOwnerName').val();
			var txtOwnerNumber = $('#txtOwnerNumber').val();
			var status = $('#status').val();
			var update = 'update';
			
			$.ajax({
				url: 'crud_insertCars.php',
				type: 'post',
				data: {
					car_id : car_id,
					txtCarName : txtCarName,
					txtCarNumber : txtCarNumber,
					Condition : Condition,
					txtPrice : txtPrice,
					txtCity : txtCity,
					txtOwnerName : txtOwnerName,
					txtOwnerNumber : txtOwnerNumber,
					status : status,
					update : update,
				},
				success:function(data){
					alert(data);
					car_displayAll();
					clearAll();
				}
			});
		});

		function clearAll() {
			$('#txtCarName').val('');
			$('#txtCarNumber').val('');
			$('#Condition').val('');
			$('#txtPrice').val('');
			$('#txtCity').val('');
			$('#txtOwnerName').val('');
			$('#txtOwnerNumber').val('');
			$('#status').val('');
			$('#img').val('');
			$('#car_submit').removeAttr('disabled');
			$('#car_update').attr('disabled', 'true');
		}

	/*-----current booked cars----*/
	$('#car_booked').click(function(event) {
		$.ajax({
			url: 'crud_insertCars.php',
			type: 'POST',
			data: {car_booked: 'value1'},
			success:function (data) {
				if(data == 'No Record Found'){
					alert(data);
				}
				else{
					$('#car_table_body').html(data);
				}
			}
		})
		
	});

	/*-----Promoted Cars-------*/
	$('#car_promoted').click(function(event) {
		$.ajax({
			url: 'crud_insertCars.php',
			type: 'POST',
			data: {car_promoted: 'value1'},
			success:function (data) {
				if(data == 'No Record Found'){
					alert(data);
				}
				else{
					$('#car_table_body').html(data);
				}
			}
		})
		
	});

	/*-----search By Id-------*/
	$('#btn_searchById').click(function(event) {
		var searchById = $('#searchById').val();
		if (searchById.trim() == '') {
			alert('Enter Car ID');
			return;
		}
		$.ajax({
			url: 'crud_insertCars.php',
			type: 'POST',
			data: {searchById: searchById},
			success:function (data) {
				if(data == 'No Record Found'){
					alert(data);
				}
				else{
					$('#car_table_body').html(data);
				}
			}
		})
		
	});

	</script>
</body>
</html>