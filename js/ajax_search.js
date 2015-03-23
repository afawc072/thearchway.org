$(document).ready(function() {

$('#searchResponse').hide();

$('#searchButton').click(function(e) {

	e.preventDefault();
	var valid = '';
	var searchCourse = $('#searchCourse').val();
	if (searchCourse == ""){
		valid="<p><b>You forgot to enter a search term</b></p>";
		//$('#searchResponse').append("<p>HEY</p>" + valid);
                $('#searchResponse').html(valid);
		$('#searchResponse').show();
		    setTimeout( "$('#searchResponse').hide();",4000 );

	}
	else {
		     $('#find').submit();
		// var formData = $('form').serialize();
		// submitForm(formData);
	}

  });

});

// function submitForm(formData){

// 	// $.ajax({

//  // 			type: 'POST',
//  // 			url: 'search.php',
//  // 			data: formData,
//  // 			cache: false,
//  // 			timeout: 10000
// 	// 	   });

// };