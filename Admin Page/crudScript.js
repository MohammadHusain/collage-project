$(document).ready(function() {

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
	
			$('#display_all').click(function() {
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

			function deleteData(deleteId) {
				$.ajax({
					url: 'crud_operation.php',
					type: 'post',
					data: {
						deleteId : deleteId,
					},
					success:function(data,status){
						displayAll('displayAll');
						alert(status);
					}
				})				
			}
		});