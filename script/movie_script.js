var noOfTicket=1,selectedSeat = 0;
var btn,ticketPrice=0,totalPrice=0;
$(document).ready(function() {
		selectRendom();
		seatLevelChange();
	$('#Movies').addClass('active');
	$('#search-movie').keyup(function(event) {
		var value = $('#search-movie').val();
		if(value != ''){
			$.ajax({
				url: '../Link_Pages/getMovieData.php',
				type: 'post',
				data: {
					search_value : value
				},
				success:function(data){
					$('#autofill-city').html(data);
				}
			})
		}
		else{
			$('#autofill-city').html('');
		}

	});

	$(document).on('click', '.search-result', function() {
				$('#search-movie').val($(this).text());
				$('#autofill-city').html('');
	});
});

function selectRendom() {
		$.ajax({
				url: '../Link_Pages/getMovieData.php',
				type: 'post',
				data: {
				getRendom:'getRendom',
			},
			success:function(data){
				$('#main_content').html(data);
				$('#main_content').fadeIn('slow');
			}
		})
}

function showall() {
	$.ajax({
		url: '../Link_Pages/getMovieData.php',
		type: 'post',
		data: {
			showall : 'showall'
		},
		success:function(data){
			alert(data);
			$('#main_content').html(data);
		}
	})	
}

$('#search-button').click(function() {
	var value = $('#search-movie').val();
	$('#autofill-city').html('');
	if (value == '') {
		alert('Insert your city first');
	}
	else {
		$.ajax({
			url: '../Link_Pages/getMovieData.php',
			type: 'post',
			data: {
				find_movies : value
			},
			success:function(data){
				$('#body-header').html("Result of : "+value);
				if (data == 'NF') {
					var dummy = '<div class="container text-center p-5"><h6>No Data Found</h6></div><h5>Random Picks</h5><hr>'
					$('#dummy_block').html(dummy);
					selectRendom();
				}
				else{
					$('#dummy_block').html('');
					$('#main_content').html(data);
					$('.movieSearchHeader').html('Movies in <font color="red">'+value+"</font>");
				}
			}
		})
	}
});



$('form').submit(function(event) {
	/*--name--*/
	var nameCheck = $('#B_name').val();
	nameCheck = nameCheck.trim();
	var nameRegx = /^[a-zA-Z ]{2,30}$/;
	var initSpaceRegx = /(?<!\\s+)[\\w\\s&&[^_]]{0,20}/;
	if (nameCheck == '') {
		$('#B_nameCheck').text('*Field Required');
		event.preventDefault();
	}
	else if (! nameRegx.test(nameCheck)) {
		$('#B_nameCheck').text('*Name include alphabet and space');
		event.preventDefault();
	}
	else{
		$('#B_nameCheck').text('');
	}

	/*--phone--*/
	var phoneCheck = $('#B_Phone').val();
	var phoneRegx =/^[9876][0-9]{9}$/;
	phoneCheck = phoneCheck.trim();
	if (phoneCheck == '') {
		$('#B_PhoneCheck').text('*Required field');
		event.preventDefault();
	}
	else if (! phoneRegx.test(phoneCheck) ) {
		$('#B_PhoneCheck').text('*Invalid phone Number');
		event.preventDefault();
	}
	else{
		$('#B_PhoneCheck').text('');
	}

	/*--city--*/
	var selectedCity = $('#SelectCity').val();
	if (selectedCity == null) {
		$('#SelectCityCheck').text('Select any one');
		event.preventDefault();
	}
	else {
		$('#SelectCityCheck').text('');	
	}

	/*--Theater--*/
	var selectedTheater = $('#selectTheaterName').val();
	if (selectedTheater == null) {
		$('#selectTheaterNameC').text('*Select Any One');
		event.preventDefault();
	}
	else {
		$('#selectTheaterNameC').text('');	
	}

	/*--No of Ticket--*/
	var noOfTicket = $('#NoOfTicket').val();
	if (noOfTicket > 5 && noOfTicket < 0) {
		$('#noOfTicketCheck').text('Invalid select');
		event.preventDefault();
	}
	else {
		$('#selectTheaterNameCheck').text('');	
	}

	/*--seat level--*/
	var SeatLevel = $('#SeatLevel').val();
	if (SeatLevel == null) {
		$('#SeatLevelCheck').text('*Select any one');
		event.preventDefault();
	}
	else {
		$('#SeatLevelCheck').text('');	
	}

	/*--Date--*/
	var date = $('#datepicker').val();
	if (date == '') {
		$('#datepickerCheck').text('*Select Date');
		event.preventDefault();
	}
	else {
		$('#datepickerCheck').text('');	
	}

	/*--seat picker--*/
	// if (selectedSeat < noOfTicket) {
	// 	event.preventDefault();
	// }
	// else if(selectedSeat == noOfTicket){
	// 	var selectedSeatstring = '';
	// 	for (var i = 0 ; i < noOfTicket; i++) {
	// 		selectedSeatstring = selectedSeatstring + document.getElementsByClassName('selectedSeat')[i].innerHTML + " , ";
	// 	}
	// 	//alert(selectedSeatstring);
	// 	$('#Movies_seatString').val(selectedSeatstring);
	// }

	$('#Movies_TotalPrice').val(totalPrice);
});

$('.seatNumber').click(function(event) {
 		noOfTicket = $('#NoOfTicket').val();
 		btn = $(this);
 		var color = this.style.backgroundColor;
 		if (noOfTicket > selectedSeat && color != 'rgb(255, 0, 0)') {
 			btn.css({
 				backgroundColor : 'red',
 			});
 			selectedSeat++;
 			btn.addClass('selectedSeat');
 		}
 		else if (color == 'rgb(255, 0, 0)') {
 			btn.css({
 				backgroundColor : 'white',
 			});
			selectedSeat--;
			btn.removeClass('selectedSeat');
		}
});
$('#NoOfTicket').change(function(event) {
	selectedSeat = 0;
	noOfTicket = $('#NoOfTicket').val();
	$('.seatNumber').css({
		backgroundColor: 'white'
	});
	calculatePrice();
});
$('#selectTheaterName').change(function(event) {
	var selectTheaterName = $('#selectTheaterName').val();
	var city = $('#SelectCity').val();
	//alert(selectTheaterName)
	$.ajax({
		url: 'movie_CaptureDetail_Data.php',
		type: 'post',
		data: {
			selectTheaterName : selectTheaterName,
			city : city,
		},
		success:function(data) {
			ticketPrice = data;
			calculatePrice();
		}
	});
	
});
$('#SeatLevel').change(function(event) {

		// var selectedValue = $('#SeatLevel').val();
		// if (selectedValue == 'Low') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section1').show('1000');
		// }
		// if (selectedValue == 'Medium') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section2').show('1000');
		// }
		// if (selectedValue == 'High') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section3').show('1000');
		// }
		seatLevelChange();
		calculatePrice();
		
});	
function seatLevelChange() {
	var selectedValue = $('#SeatLevel').val();
	if (selectedValue != null) {
		// if (selectedValue == 'Low') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section1').show('1000');
		// }
		// if (selectedValue == 'Medium') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section2').show('1000');
		// }
		// if (selectedValue == 'High') {
		// 	$('#section1,#section2,#section3').hide();
		// 	$('#section3').show('1000');
		// }
		calculatePrice();
	}
}
function calculatePrice() {
	var NoOfTicket = $('#NoOfTicket').val();
	var range = $('#SeatLevel').val();

	if (ticketPrice == 0) {return;}

	if (range == 'Medium') {
		var newPrice = parseInt(ticketPrice) + 20;
	}
	else if (range == 'High'){
		var newPrice = parseInt(ticketPrice) + 40;
	}
	else if (range == 'Low'){
		var newPrice = parseInt(ticketPrice);
	}
	else {
		return;
	}
	totalPrice = newPrice*parseInt(NoOfTicket);
	$('#calculatedPrice').text(newPrice*parseInt(NoOfTicket));
}

