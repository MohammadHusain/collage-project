<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/brands.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/esm/popper-utils.min.js" integrity="sha256-1N0+7OfEs9pNPY5A9KGrCBvZMLgXF+t2m3AcNjn1pow=" crossorigin="anonymous"></script> -->

<!-- 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	<style>
		*{
			padding: 0;margin: 0;
		}
		.search-list{
			list-style: none;
		}
		.min-width{
			min-width: 1000px
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

	<div class="container-fluid bg-light p-2 min-width" >
		<!-- <div class="form-container"> -->
			<form action="crud_operation.php" method="post" enctype="multipart/form-data">
				<table class=" m-auto">
					<thead class="text-center">
						<th class="p-1" colspan="3" style="font-weight: lighter;font-size: 40px;">Enter Movie Detail
							<hr width="50%" class="m-auto"></th>
					</thead>

					<tr>
						<td class="form-group p-1" width="60%" colspan="2">
							<label>Enter Movie Name:</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="eg: Sholey" autocomplete="off" required>
						</td>
						<td class="form-group p-1" colspan="1">
							<label>Movie Director:</label>
							<input type="text" name="D_name" id="D_name" class="form-control" placeholder="" autocomplete="off" required>
						</td>
					</tr>

					<tr>
						<td class="form-group p-1" colspan="2">
							<label>Description:</label>
							<textarea placeholder="" id="description" cols="" rows="3" class="form-control" name="description" required></textarea>
						</td>
						<td class="form-group p-1" colspan="1">
							<label>Movie Type:</label>
							<textarea placeholder="eg: Drama,Action" id="M_type" cols="" rows="3" class="form-control" name="M_type" required></textarea>
						</td>
					</tr>

					<tr>
						<td class="form-group p-1 align-top" colspan="1">
							<label>Movie Cast:</label>
							<textarea placeholder="" id="cast" cols="30" rows="4" class="form-control" name="cast" required></textarea>
						</td>

						<td class="form-group p-1 align-top" colspan="1">
							<label>Image:</label>
							<input type="file" id="img" name="img" class="form-control-file border" style="height: 100%" required>
							<label>Language:</label>
							<input type="text" class="form-control" name="language" id="language" autocomplete="off" required>
						</td>

						<td class="form-group p-1 align-top" colspan="1">
							<label>IMDB Rating</label>
							<input type="text" id="rating" class="form-control" name="rating" autocomplete="off" required>

							<div class="d-flex mt-4 flex-row-reverse">
								<input type="button" name="cancel" class="btn mt-2 btn-danger" id="cancel" value="Cancel">
								<input type="submit" name="submit" class="btn btn-success mt-2 mr-2" id="submit" value="Insert">
								<input type="button" name="update" class="btn btn-success mt-2 mr-2" id="update" value="Update">
							</div>
							
							<input type="hidden" id="id">

						</td>
					</tr>
				</table>
			</form>
		<!-- </div> -->
	</div>

	
	<br><br>
	<div class="container-fluid p-5 min-width">

			<div class="row m-0" style="justify-content: space-between;align-items: center;">
				<h1 class="text-dark">Table</h1>
				<div class="row m-0 search-list">
					<li><input type="text" class="form-control" placeholder="Search by Name" id="searchName"></li>
					<li class="mr-1"><input type="button" class="btn btn-success" value="Search" id="displayByName"></li>
					<li class="mr-1"><input type="button" class="btn btn-danger" value="Show all" id="display_all"></li>
				</div>
			</div>

			<table class="table table-striped table-bordered text-center" style="">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Type</th>
					<th>Rating</th>
					<th>Cast</th>
					<th>Description</th>
					<th>Director</th>
					<th>lang.</th>
					<th>Image</th>
				</thead>
				<tbody id="table_body">
					
				</tbody>
			</table>
	</div>



	<script type="text/javascript">

		$(document).ready(function() {
			$('#update').attr('disabled','true');
		});

		$('#cancel').click(function(event) {
			$('#update').attr('disabled','true');
			$('#submit').removeAttr('disabled');

			$('#id').val('');
			$('#name').val('');
			$('#D_name').val('');
			$('#description').val('');
			$('#M_type').val('');
			$('#cast').val('');
			$('#rating').val('');
			$('#img').val('');
			$('#language').val('');
		});

		$('#update').click(function(event) {
			var id = $('#id').val();
			var name = $('#name').val();
			var director = $('#D_name').val();
			var description = $('#description').val();
			var type = $('#M_type').val();
			var cast = $('#cast').val();
			var rating = $('#rating').val();
			var language = $('#language').val();
			var update = 'update';
			
			$.ajax({
				url: 'crud_operation.php',
				type: 'post',
				data: {
					id : id,
					name : name,
					director : director,
					description : description,
					type : type,
					cast : cast,
					rating : rating,
					language : language,
					update : update,
				},
				success:function(data,status){
					alert(data);
					$('#update').attr('disabled','true');
					$('#submit').removeAttr('disabled');

					$('#id').val('');
					$('#name').val('');
					$('#D_name').val('');
					$('#description').val('');
					$('#M_type').val('');
					$('#cast').val('');
					$('#rating').val('');		
					$('#language').val('');

					displayAll('displayAll');
				},
			});
			// displayAll('displayAll');
		});

		function displayAll(data) {
			$.ajax({
				url: 'crud_operation.php',
				type: 'POST',
				data:{
					data : data
				},
				success:function(result){
					$('#table_body').html(result);
				}
			});	
		}

		function deleteData(deleteId) {
			var r= confirm("Do you Delete? Click OK to continue");

			if (r == true) {

				$.ajax({
					url: 'crud_operation.php',
					type: 'post',
					data: {
						deleteId : deleteId
					},
					success:function(data,status){
						displayAll('displayAll');
					}
				})
			}				
		}	

		$('#display_all').click(function() {
			$('#searchName').val('');
			displayAll('displayAll');
		});

		$('#displayByName').click(function() {
			var arg = $('#searchName').val();

			if (arg == '') {
				alert('Search box should not be blank')
			}else{
				displayAll(arg);
			}
				
		});

		function getUpdateData(updateId) {
			
			$.post('crud_operation.php', {
				updateId:updateId
			}, function(data, textStatus) {
				
				// alert(data);

				var updateData = JSON.parse(data);
				$('#id').val(updateData.m_id);
				$('#name').val(updateData.movie_name);
				$('#D_name').val(updateData.director);
				$('#description').val(updateData.description);
				$('#M_type').val(updateData.type);
				$('#cast').val(updateData.cast);
				$('#rating').val(updateData.rating);
				$('#language').val(updateData.Language);

				$('#update').removeAttr('disabled');
				$('#submit').attr('disabled','disabled');
			});
		}
		
		
	</script>
</body>
</html>