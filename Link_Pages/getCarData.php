<?php
	$connect = mysqli_connect('localhost','root','','project');

	if (isset($_POST['search_txtCarsCity']) && $_POST['search_txtCarsCity'] != '') {
		$query = "select DISTINCT car_city from cars_list where car_city like '%".$_POST['search_txtCarsCity']."%'";

		$result = mysqli_query($connect,$query);

		if (mysqli_num_rows($result)>0) {
			while ($data = mysqli_fetch_array($result)) {
				?>
					<li class="list_CarCity list_CarCityUnstyle"><?php echo $data['car_city']; ?></li>
				<?php
			}
		}
		else
		{
			?>
					<li class="list_CarCityUnstyle"><?php echo "No result found..."; ?></li>
			<?php
		}
	}
?>