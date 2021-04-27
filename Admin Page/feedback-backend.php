<?php 
		$connect = mysqli_connect('localhost','root','','project'); 
		if (isset($_POST['getFeedback'])) {
			$query = "select * from user_feedback";
			$result =mysqli_query($connect,$query);
			?>
				<?php
				while ($data = mysqli_fetch_array($result)) {
					?>
	 					<tr>
	 						<td><button onclick="deleteFeedback(<?php echo $data['id']; ?>)"  style="background-color:transparent;border: none"><i class="fas fa-trash-alt"></i></button></td>
							<td style="width:70px">#<?php echo $data['id']; ?></td>
							<td><?php echo $data['user_name']?></td>
							<td><?php echo $data['feedback']?></td></td>
						</tr>
		
					<?php
				}
		}

		if (isset($_POST['feedbackDeleteId'])) {
			$query = "Delete from user_feedback where id='".$_POST['feedbackDeleteId']."'";
			$result =mysqli_query($connect,$query);

			if ($result) {
			      echo "feedback deleted successfully";
			}
			else{
				echo "Error while deleting feedback";
			}
		}

		//////////////////////////////////////////////////
		/////////////////trending Movies//////////////////
		//////////////////////////////////////////////////

		if (isset($_POST['showTrendingMovies'])) {
			$query = "select m_id, movie_name from movies_list where movie_status = 'Trending'";
			$result = mysqli_query($connect,$query);
			while ($data = mysqli_fetch_array($result)) {
				?>
				<
					<tr>
						<td style="width: 60px;"><button onclick="deleteTrending(<?php echo $data['m_id']; ?>)"  style="background-color:transparent;border: none"><i class="fas fa-trash-alt"></i></button></td>
						<td><?php echo $data['m_id']; ?></td>
						<td><?php echo $data['movie_name']; ?></td>
					</tr>
				<?php
			}
		}

		if (isset($_POST['TrendingMoviesDeleteId'])) {
			$query = "UPDATE `movies_list` SET `movie_status`= '' where m_id = '".$_POST['TrendingMoviesDeleteId']."'";
			$result = mysqli_query($connect,$query);
			if ($result == 1) {
				echo "success";
			}
			else{
				echo "error";
			}
		}

		if (isset($_POST['displayAllMovies'])) {
			$query = "select m_id,movie_name from movies_list where movie_status !='Trending'";
			$result = mysqli_query($connect,$query);
			echo "<option selected disabled value=''>Select Movies</option>";
			while ($data = mysqli_fetch_array($result)) {
				?>
					<option value="<?php echo($data['m_id']) ?>"><?php echo $data['movie_name'] ?></option>
				<?php
			}

		}



		// Trend it

		if (isset($_POST['movie_id'])) {
			$query = "UPDATE `movies_list` SET `movie_status`= 'Trending' where m_id = '".$_POST['movie_id']."'";
			$result = mysqli_query($connect,$query);

			if ($result) {
				echo "success";
			}
			else{
				echo "error";
			}
		}

?>