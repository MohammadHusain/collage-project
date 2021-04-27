<script type="text/javascript">
	$(document).ready(function() {
 		$('#Customer_nameCheck').hide();
 		$('#CarPickUpLocationCheck').hide();
 		$('#Customer_phoneCheck').hide();
 		$('#Customer_dateCheck').hide();

 		$('#datepicker').val('');
 		//$('#car_bookNowDays').val('');

	  	var date = new Date();
	  	date.setDate(date.getDate() + 15);
	  	var maxDate = date.getDate()+"/" + (date.getMonth()+1) + "/" + date.getFullYear();
	  	<?php 
	  		$date1 = getDate();
	  		$date1 = $date1['mday'].'/'.$date1['mon'].'/'.$date1['year'];
	  		//$date1 = date_format($date1,"d/m/Y");
	  	?>
	  	var startDate = new Date('<?php echo $date1; ?>');
	  	var minDate = (startDate.getMonth()+1)+ "/" + startDate.getDate() + "/" + startDate.getFullYear();

	    $( "#datepicker" ).datepicker({
	    	showAnim : 'drop',
	    	numberOfMonth : 1,
	    	dateFormat : 'dd/mm/yy',
	    	minDate : minDate,
	    	maxDate : maxDate,
	    	onSelect : function(data){
	    		var selectedDays = $('#car_bookNowDays').val();
	    		
	    		if ( selectedDays != null) {
	    			countDate(selectedDays , data);
	    		}
	    	}
	    }); 

	    $('#car_bookNowDays').change(function(event) {
	    	var selectedValue = $(this).val();
	    	var startDate = $('#datepicker').val();
	    	
	    	if (startDate != "" && startDate.length == 10) {
	    		countDate(selectedValue , startDate);
	    	}
	    });

	   	function countDate(selectedDays, selectedDate) {
	   		selectedDate = selectedDate.split("/").reverse().join("-");
	   		var pricePerDay = <?php echo $data['car_price']; ?>;
	    	var date = new Date(selectedDate);
	    	date.setDate( date.getDate() + parseInt(selectedDays-1) );
	    	//$('#finishedDate').val(date.getDate() +"/"+ (date.getMonth()+1) +"/"+ date.getFullYear());
	    	$('#finishedDate').attr({
	    		value: date.getDate() +"/"+ (date.getMonth()+1) +"/"+ date.getFullYear(),
	    	});
	    	$('#TotalAmount').text("Rs. "+parseInt(pricePerDay) * parseInt(selectedDays) +"/-");
	   	}

		$('form').submit(function(event) {
			/*--name--*/
			var nameCheck = $('#Customer_name').val();
			nameCheck = nameCheck.trim();
			var nameRegx = /^[a-zA-Z ]{2,30}$/;
			var initSpaceRegx = /(?<!\\s+)[\\w\\s&&[^_]]{0,20}/;
			if (nameCheck == '') {
				$('#Customer_nameCheck').show();
				$('#Customer_nameCheck').text('*Field Required');
				event.preventDefault();
			}
			else if (! nameRegx.test(nameCheck)) {
				$('#Customer_nameCheck').show();
				$('#Customer_nameCheck').text('*Name include alphabet and space');
				event.preventDefault();
			}
			else{
				$('#Customer_nameCheck').text('');
				$('#Customer_nameCheck').hide();
			}


			/*--address--*/
			var addressCheck = $('#CarPickUpLocation').val();
			addressCheck = addressCheck.trim();
			if (addressCheck == '') {
				$('#CarPickUpLocationCheck').show();
				$('#CarPickUpLocationCheck').text('*Field Required');
				event.preventDefault();
			}
			else{
				$('#CarPickUpLocationCheck').text('');
				$('#CarPickUpLocationCheck').hide();
			}

			/*--phone--*/
			var phoneCheck = $('#Customer_number').val();
			var phoneRegx =/^[9876][0-9]{9}$/;
			phoneCheck = phoneCheck.trim();
			if (phoneCheck == '') {
				$('#Customer_phoneCheck').show();
				$('#Customer_phoneCheck').text('*Required field');
				event.preventDefault();
			}
			else if (! phoneRegx.test(phoneCheck) ) {
				$('#Customer_phoneCheck').show();
				$('#Customer_phoneCheck').text('*Invalid phone Number');
				event.preventDefault();
			}
			else{
				$('#Customer_phoneCheck').text('');
				$('#Customer_phoneCheck').hide();
			}

			/*--date----*/
			var dateCheck = $('#datepicker').val();
			dateCheck = dateCheck.trim();
			if (dateCheck == '') {
				$('#Customer_dateCheck').show();
				$('#Customer_dateCheck').text('*Required field');
				event.preventDefault();
			}
			else {
				$('#Customer_dateCheck').text('');
				$('#Customer_dateCheck').hide();
			}

			/*----days----*/
			var daysCheck = $('#car_bookNowDays').val();
			//daysCheck = daysCheck.trim();
			
			if (daysCheck == null) {
				$('#Customer_daysCheck').show();
				$('#Customer_daysCheck').text('*Required field');
				event.preventDefault();
			}
			else {
				$('#Customer_daysCheck').text('');
				$('#Customer_daysCheck').hide();
			}
		});	 
 	});

</script>