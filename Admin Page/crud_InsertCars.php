<?php 

$connect = mysqli_connect('localhost','root','','project');
session_start();
	if (isset($_POST['submit'])) {
		if ($connect) {
			$txtCarName= $_POST['txtCarName'];
			$txtCarNumber = $_POST['txtCarNumber'];
			$Condition = $_POST['Condition'];
			//$img = $_POST['img'];
			$txtPrice = $_POST['txtPrice'];
			$txtCity = $_POST['txtCity'];
			$txtOwnerName = $_POST['txtOwnerName'];
			$txtOwnerNumber = $_POST['txtOwnerNumber'];
			$status = $_POST['status'];

			$imageName = $_FILES['img']['name'];
			$tmp_name = $_FILES['img']['tmp_name'];

			move_uploaded_file($tmp_name, "../Images/car-images/$imageName"); 
			//change path if file is move

		
			$query = "INSERT INTO `cars_list`(`car_name`, `car_number`, `condition`, `car_image`, `car_price`, `car_city`, `owner_name`, `owner_number`, `status`) VALUES ('$txtCarName','$txtCarNumber','$Condition','$imageName','$txtPrice','$txtCity ','$txtOwnerName ','$txtOwnerNumber','$status')";

			$result = mysqli_query($connect,$query);
			$_SESSION['insert_carMessage'] = "Insert Car Successfully";
			header('location:insert_car.php');
		}
		else{
			echo "ERROR IN DATABASE CONNECTION";
		}
	}
	

	/*---show all car-*/
	if (isset($_POST['car_display_all'])) {
		$query = "select * from cars_list";
		$result_displayAll = mysqli_query($connect,$query);

		while ($data_allCar = mysqli_fetch_array($result_displayAll)) {
			?>
				<tr>
					<td><?php echo $data_allCar['car_id']; ?></td>
					<td><?php echo $data_allCar['car_name']; ?></td>
					<td><?php echo $data_allCar['car_number']; ?></td>
					<td><?php echo $data_allCar['condition']; ?></td>
					<td><?php echo $data_allCar['car_image']; ?></td>
					<td><?php echo $data_allCar['car_price']; ?></td>
					<td><?php echo $data_allCar['car_city']; ?></td>
					<td><?php echo $data_allCar['owner_name']; ?></td>
					<td><?php echo $data_allCar['owner_number']; ?></td>
					<td><?php echo $data_allCar['status']; ?></td>
				</tr>
				<tr>
					<td colspan="10" class="text-right">
						<button class="btn btn-light text-warning" id="car_edit_data" onclick="car_UpdateData( <?php echo $data_allCar['car_id']; ?> )"><i class="fas fa-edit"></i></button>
					<!-- </td>
					<td> -->
						<button class="btn btn-light text-danger" id="car_deleteData" onclick="car_deleteData(<?php echo $data_allCar['car_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
					</td>
				</tr>
			<?php
		}
	}

	/*--edit---*/

	if (isset($_POST['car_UpdateId'])) {
		$query = "select * from cars_list where car_id='".$_POST['car_UpdateId']."'";
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) == 1) {
			$data = mysqli_fetch_array($result);
			$response = array();
			$response = $data;
			echo json_encode($response);
		}
		else{
			echo "Error";
		}
	}

	if (isset($_POST['update'])) {
		$query = "UPDATE `cars_list` SET `car_name`='".$_POST['txtCarName']."',`car_number`='".$_POST['txtCarNumber']."',`condition`='".$_POST['Condition']."',`car_price`='".$_POST['txtPrice']."',`car_city`='".$_POST['txtCity']."',`owner_name`='".$_POST['txtOwnerName']."',`owner_number`='".$_POST['txtOwnerNumber']."',`status`='".$_POST['status']."' where car_id='".$_POST['car_id']."'";
		$result = mysqli_query($connect,$query);
	    if ($result) {
	    	echo"Successfully updated";
	    }
	    else{
	    	echo "Error while updating data";
	    }
	}
/*----Delete---*/

	if (isset($_POST['deleteId'])){
		$query_image = "select car_image from `cars_list` where car_id='".$_POST['deleteId']."'";
		$result = mysqli_query($connect,$query_image);
		$data = mysqli_fetch_array($result);
		$img = $data['car_image'];

		


		$deleteQuery = "DELETE FROM `cars_list` WHERE car_id='".$_POST['deleteId']."'";
		$resultDelete = mysqli_query($connect,$deleteQuery); 

		if ($resultDelete) {
			echo "Data deleted Successfully";
			if (!unlink('../Images/car-images/'.$img)) {
				echo "Error while deleting data";
				exit();
			}
		}
		else{
			echo "Error while deleting data";
		}
	}

/*--car_booked--*/

	if (isset($_POST['car_booked'])) {
		$query_booked = "select * from cars_list where status = 'Not-Available'";
		$result = mysqli_query($connect,$query_booked);
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $data['car_id']; ?></td>
						<td><?php echo $data['car_name']; ?></td>
						<td><?php echo $data['car_number']; ?></td>
						<td><?php echo $data['condition']; ?></td>
						<td><?php echo $data['car_image']; ?></td>
						<td><?php echo $data['car_price']; ?></td>
						<td><?php echo $data['car_city']; ?></td>
						<td><?php echo $data['owner_name']; ?></td>
						<td><?php echo $data['owner_number']; ?></td>
						<td><?php echo $data['status']; ?></td>
					</tr>
					<tr>
						<td colspan="10" class="text-right">
							<button class="btn btn-light text-warning" id="car_edit_data" onclick="car_UpdateData( <?php echo $data['car_id']; ?> )"><i class="fas fa-edit"></i></button>
						<!-- </td>
						<td> -->
							<button class="btn btn-light text-danger" id="car_deleteData" onclick="car_deleteData(<?php echo $data['car_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>
				<?php
			}
		}
		else{
			echo "No Record Found";
		}
	}

	/*------Promoted Cars-------*/
	if (isset($_POST['car_promoted'])) {
		$query_promoted = "select * from cars_list where status = 'Promoted'";
		$result = mysqli_query($connect,$query_promoted);
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $data['car_id']; ?></td>
						<td><?php echo $data['car_name']; ?></td>
						<td><?php echo $data['car_number']; ?></td>
						<td><?php echo $data['condition']; ?></td>
						<td><?php echo $data['car_image']; ?></td>
						<td><?php echo $data['car_price']; ?></td>
						<td><?php echo $data['car_city']; ?></td>
						<td><?php echo $data['owner_name']; ?></td>
						<td><?php echo $data['owner_number']; ?></td>
						<td><?php echo $data['status']; ?></td>
					</tr>
					<tr>
						<td colspan="10" class="text-right">
							<button class="btn btn-light text-warning" id="car_edit_data" onclick="car_UpdateData( <?php echo $data['car_id']; ?> )"><i class="fas fa-edit"></i></button>
					</tr>
				<?php
			}
		}
		else{
			echo "No Record Found";
		}
	}

	// ////   search by id

	if (isset($_POST['searchById'])) {
		$query_booked = "select * from cars_list where car_id = '".$_POST['searchById']."'";
		$result = mysqli_query($connect,$query_booked);
		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $data['car_id']; ?></td>
						<td><?php echo $data['car_name']; ?></td>
						<td><?php echo $data['car_number']; ?></td>
						<td><?php echo $data['condition']; ?></td>
						<td><?php echo $data['car_image']; ?></td>
						<td><?php echo $data['car_price']; ?></td>
						<td><?php echo $data['car_city']; ?></td>
						<td><?php echo $data['owner_name']; ?></td>
						<td><?php echo $data['owner_number']; ?></td>
						<td><?php echo $data['status']; ?></td>
					</tr>
					<tr>
						<td colspan="10" class="text-right">
							<button class="btn btn-light text-warning" id="car_edit_data" onclick="car_UpdateData( <?php echo $data['car_id']; ?> )"><i class="fas fa-edit"></i></button>
						<!-- </td>
						<td> -->
							<button class="btn btn-light text-danger" id="car_deleteData" onclick="car_deleteData(<?php echo $data['car_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
						</td>
					</tr>
				<?php
			}
		}
		else{
			echo "No Record Found";
		}
	}
 ?>