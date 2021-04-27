<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/brands.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		*{margin: 0;padding:0;}
		.min-width{
			min-width: 1000px!important;
		}
	</style>
</head>
<body>

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

	<div class="container-fluid min-width bg-light pb-3">
		<table class="m-auto">
			<thead>
				<th class="text-center" style="font-weight: lighter;font-size: 40px;" colspan="3">Enter Theater Detail</th>
			</thead>
			<tbody>
				<tr>
					<td class="form-group p-1" colspan="2" width="60%">
						<label for="">Theater Name:</label>
						<input type="text" class="form-control" id="t_name">
					</td>
					<td class="form-group p-1" colspan="1">
						<label for="">Movie ID</label>
						<input type="text" class="form-control" id="m_id">
					</td>
				</tr>
				<tr>
					<td class="form-group p-1" colspan="1">
						<label for="">Movie Price:</label>
						<input type="text" class="form-control" id="ticket_price" placeholder="&#8377;">
					</td>
					<td>
						<label for="">City:</label>
						<input type="text" class="form-control" id="city" autocomplete="off">
					</td>
					<td class="form-group p-1 align-bottom">
						<div class="d-flex justify-content-end">
							<input type="button" value="Cancel" id="cancel" class="ml-1 btn btn-secondary">
							<input type="button" value="Insert" id="insert" class="ml-1 btn btn-success">
							<input type="button" value="Update" id="update" class="ml-1 btn btn-danger">
						</div>
						<input type="hidden" name="" id="id">
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<h1>Table</h1>
			<div class="d-flex">
				<input type="text" class="form-control" id="searchTName">
				<input type="button" name="" value="Search" id="displayByTName" class="btn btn-success">
				<input type="button" name="" value="Show All" id="showAll" class="ml-1 btn btn-danger">
			</div>
		</div>
		<table class="table table-striped text-center">
			<thead>
				<th>Id</th>
				<th>Name</th>	
				<th>Movie Name</th>
				<th>Movie Id</th>
				<th>Ticket Price</th>
				<th>City</th>
				<th></th>
			</thead>
			<tbody id="displayData">
				
			</tbody>
		</table>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#update').attr('disabled','true');
		});

		/*-----------------Insert----------------*/

		$('#insert').click(function(event) {
			var t_name = $('#t_name').val();
			var m_id = $('#m_id').val();			
			var ticket_price = $('#ticket_price').val();
			var city = $('#city').val();
			var insert_theater_detail = 'insert';

			// alert(t_name+m_id+ticket_price);

			$.ajax({
				url: 'crud_operation.php',
				type: 'post',
				data: {
					t_name : t_name,
					m_id : m_id,
					ticket_price : ticket_price,
					city : city,
					insert_theater_detail : insert_theater_detail
				},
				success:function(data,status){
					alert(data);
					displayTData('displayAllTData');
				},
			})
		});

			function displayTData(data) {
				$.ajax({
					url: 'crud_operation.php',
					type: 'post',
					data: {
						Tvalue : data,
					},
					success:function(data,status){
						$('#displayData').html(data);
					}
				})

			}	


		$('#showAll').click(function(){
			$('#searchTName').val('');
			displayTData('displayAllTData');
		});

		$('#displayByTName').click(function() {
			var value = $('#searchTName').val();
			if (value == '') {
				alert('Search box should not be blank');
			}
			else{
				displayTData(value);
			}
		});

		function deleteTdata(argument) {
			var a =confirm('Do you want to delete ?');
			if (a == true) {
				$.ajax({
					url: 'crud_operation.php',
					type: 'post',
					data: {
					deleteTdata_ID : argument,
					},
					success:function(data){
						alert(data);
						displayTData('displayAllTData');
					}
				})			
			}
		}

		function GetEditTData(argument) {
			$.post('crud_operation.php', {
				updateT_ID:argument,
			}, function(data, textStatus) {

				var updateData = JSON.parse(data);
				$('#t_name').val(updateData.t_name);
				$('#m_id').val(updateData.m_id);
				$('#ticket_price').val(updateData.ticket_price);
				$('#id').val(updateData.id);
				$('#city').val(updateData.city);

				$('#update').removeAttr('disabled');
				$('#insert').attr('disabled','true');
			});
		}

		$('#update').click(function() {
			var id = $('#id').val();
			var t_name = $('#t_name').val();
			var m_id = $('#m_id').val();
			var ticket_price = $('#ticket_price').val();
			var city = $('#city').val();

			$.ajax({
				url: 'crud_operation.php',
				type: 'post',
				data: {
					id : id,
					t_name : t_name,
					m_id : m_id,
					ticket_price : ticket_price,
					city : city,
					updateTData : 'updateTData'
				},
				success : function(data){
					alert(data);

					$('#id').val('');
					$('#t_name').val('');
					$('#m_id').val('');
					$('#ticket_price').val('');
					$('#city').val('');

					$('#update').attr('disabled','true');
					$('#insert').removeAttr('disabled');


					displayTData('displayAllTData');

				}
			})			
		});

		$('#cancel').click(function(event) {
			$('#id').val('');
			$('#t_name').val('');
			$('#m_id').val('');
			$('#ticket_price').val('');
			$('#city').val('');

			$('#update').attr('disabled','true');
			$('#insert').removeAttr('disabled');
		});
	</script>
</body>
</html>