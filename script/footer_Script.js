$(document).ready(function() {
	$('#feedback_submit').click(function(event) {
		var feedback = $('#feedback').val();

		if (feedback == '') {
			alert("Enter your feedback");
		}
		else {
			$.ajax({
				url: 'feedback_insert.php',
				type: 'post',
				data: {
					feedback: feedback
				},
				success:function(argument) {
					alert(argument);
					$('#feedback').val('');
				}

			})			
		}	
	});
});