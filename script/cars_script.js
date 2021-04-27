$(document).ready(function() {
	$('#Cars').addClass('active');
	$('#search_txtCarsCity').keyup(function(event) {
		var search_txtCarsCity = $('#search_txtCarsCity').val();
		if (search_txtCarsCity != '') {
			$.ajax({
				url: '../Link_Pages/getCarData.php',
				type: 'post',
				data: {
					search_txtCarsCity : search_txtCarsCity
				},
				success:function(data){
					$('.autoComplete_CarCity').html(data);
				}
			})
		}
		else{
			$('.autoComplete_CarCity').html('');
		}
	});
	$(document).on('click', '.list_CarCity', function(event) {
		 $('#search_txtCarsCity').val($(this).text());
		 $('.autoComplete_CarCity').html('');
	});
	$(document).on('click', '#addToListBtn', function(event) {
		var addToList_carId = $(this).siblings().val();
		$.ajax({
			url: 'addToListBackend.php',
			type: 'POST',
			data: {
				addToList_carId: addToList_carId
			},
			success:function(data) {
				
				if (data == "login First") {
					window.location.href = "login.php";
				}
				else{
					alert(data);
					window.location.href = "addToList.php";
				}
				
			}
		});
	});
});