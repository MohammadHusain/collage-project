<?php 

	$connect = mysqli_connect('localhost','root','','project');

	if (isset($_POST['submit']) && $_POST['name'] != null) {
		if ($connect) {
			$name = $_POST['name'];
			$rating = $_POST['rating'];
			$cast = $_POST['cast'];
			$type = $_POST['M_type'];
			$director = $_POST['D_name'];
			$description = $_POST['description'];
			$language = $_POST['language'];

			$imageName = $_FILES['img']['name'];
			$tmp_name = $_FILES['img']['tmp_name'];

			move_uploaded_file($tmp_name, "../Images/Movie-image/$imageName"); //change path if file is moved

		
			$query = "INSERT INTO `movies_list`(`movie_name`, `rating`, `cast`, `type`, `director`, `description`,`Language`,`image`) VALUES ('$name','$rating','$cast','$type','$director','$description','$language','$imageName')";

			$result = mysqli_query($connect,$query);
			
			header("location:insert_movies.php");
		}
		else{
			echo "ERROR IN DATABASE CONNECTION";
		}
		
	}
	else
	{
		//header("location:insert_movies.php");
	}


	/*---------------------------------Display Data-------------------------*/

	if (isset($_POST['data'])) {
		if ($_POST['data'] == 'displayAll') {
			$query = "select * from movies_list";
		}
		else {
			$query = "select * from movies_list where movie_name like '%".$_POST['data']."%'";
		}
	
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
			?>
				<tr>
					<td><?php echo $data['m_id']; ?></td>
					<td><?php echo $data['movie_name']; ?></td>
					<td><?php echo $data['type']; ?></td>
					<td><?php echo $data['rating']; ?></td>
					<td><?php echo $data['cast']; ?></td>
					<td><?php echo $data['description']; ?></td>
					<td><?php echo $data['director']; ?></td>
					<td><?php echo $data['Language']; ?></td>
					<td><?php echo $data['image']; ?></td>
				</tr>	
				<tr>
					<td colspan="9" class="text-right">
						<button class="btn btn-light text-warning" id="edit_modal" onclick="getUpdateData( <?php echo $data['m_id']; ?> )"><i class="fas fa-edit"></i></button>
					<!-- </td>
					<td> -->
						<button class="btn btn-light text-danger" id="deleteData" onclick="deleteData(<?php echo $data['m_id'] ?>)"><i class="fas fa-trash-alt"></i></button>
					</td>
			</tr>		
			<?php
			}
		}
		else{
			?>
				<tr>
					<td colspan="8"><?php echo "<br><h2>No Data Found<h2><br>" ?></td>
				</tr>
			<?php
		}
	}


	/*---------------------------------Delete Data-----------------------------------*/

	if (isset($_POST['deleteId'])) {
		$query = "delete from movies_list where m_id =".$_POST['deleteId'];
		$result = mysqli_query($connect,$query);
	}


	/*----------------------------------Update Data----------------------------------------*/



	if (isset($_POST['updateId'])) {
		$query =  "select * from movies_list where m_id=".$_POST['updateId'];				/*------get data for update------*/
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			$response = array();

			$data = mysqli_fetch_array($result);
			$response = $data;
			echo json_encode($response);
		}
		else{
			$response['msg'] = "Error While Updating Data";
		}
	}

	if (isset($_POST['update'])) {
		$connect = mysqli_connect('localhost','root','','project');
		$query = "UPDATE `movies_list` SET `movie_name`= '".$_POST['name']."',`rating`= ".$_POST['rating'].",`cast`= '".$_POST['cast']."',`type`= '".$_POST['type']."',`director`= '".$_POST['director']."',`description`= '".$_POST['description']."' ,`Language`='".$_POST['language']."' WHERE m_id = ".$_POST['id'];
		$result = mysqli_query($connect,$query);

		if ($result) {							/*---------------------Update Data Changes---------------------------*/
			echo "Successfully Updated";
		}
		else{
			echo "Error While Updating Data";
		}
	}



/*------+++-------************---------------Theater Detail--------------******************-------------+++--------*/




	if (isset($_POST['insert_theater_detail'])) {
		

		$query = "select m_id from `movies_list` where m_id='".$_POST['m_id']."'";
		$result = mysqli_query($connect,$query);

				
		if (mysqli_num_rows($result) == 1) {
			$query = "INSERT INTO `theater_list`(`t_name`, `ticket_price`, `m_id`,`city`) VALUES ('".$_POST['t_name']."','".$_POST['ticket_price']."','".$_POST['m_id']."','".$_POST['city']."')";
			$result = mysqli_query($connect,$query);
			if ($result) {
				echo "Data Successfully insert";
			}
			else{
				echo "Error While Insert";
			}
		}
		else
		{
			echo "Movie Id not found";
		}

	}

/*-------------------Show Data---------------------*/

	if (isset($_POST['Tvalue'])) {
		if ($_POST['Tvalue'] == 'displayAllTData') {
			$query = "select T.* , M.movie_name , M.m_id from theater_list T,movies_list M where T.m_id = M.m_id";
		}
		else{
			$query = "select T.* , M.movie_name , M.m_id from theater_list T,movies_list M where T.m_id = M.m_id and t_name like '%".$_POST['Tvalue']."%'";
		}
		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_array($result)) {
				// echo $data['t_name'];
			?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['t_name'] ?></td>
					<td><?php echo $data['movie_name'] ?></td>
					<td><?php echo $data['m_id'] ?></td>
					<td><?php echo $data['city']; ?></td>
					<td><?php echo $data['ticket_price'] ?></td>

					<td colspan="5" >
						<button class="btn bg-transparent text-warning" onclick="GetEditTData(<?php echo $data['id']; ?>)"><i class="fas fa-edit"></i></button>
						<button class="btn bg-transparent text-danger" onclick="deleteTdata(<?php echo $data['id']; ?>)"><i class="fas fa-trash-alt"></i></button>
				</tr>
			<?php
			}
		}

	}

	if (isset($_POST['deleteTdata_ID'])) {
		$query = "DELETE FROM `theater_list` WHERE id =".$_POST['deleteTdata_ID'];
		$result = mysqli_query($connect,$query);
		if ($result) {
			echo "Data Successfully Deleted";
		}
		else
		{
			echo "Error While Deleting data";
		}
	}


	/*------------------------------update--------------------------------*/

	if (isset($_POST['updateT_ID'])) {
		// echo $_POST['updateT_ID'];
		$query =  "select * from theater_list where id=".$_POST['updateT_ID'];				/*------get data for update------*/
		$result = mysqli_query($connect,$query);
 
		if (mysqli_num_rows($result) > 0) {
			$response = array();

			$data = mysqli_fetch_array($result);
			$response = $data;
			echo json_encode($response);
		}
		else{
			$response['msg'] = "Error While Updating Data";
		}
	}


	if (isset($_POST['updateTData'])) {
		$query = "UPDATE `theater_list` SET `t_name`='".$_POST['t_name']."',`ticket_price`='".$_POST['ticket_price']."',`m_id`='".$_POST['m_id']."',`city`='".$_POST['city']."' WHERE id =".$_POST['id'];

		$result = mysqli_query($connect,$query);
		if ($result) {
			echo "Data Successfully Updated";
		}
		else{
			echo "Error While Updtating Data";
		}
	}

?>