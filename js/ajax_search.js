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

	}

  });

});