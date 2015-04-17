$(document).ready(function() {

	var request;

$('signin').submit(function(event){

	if (request){
		request.abort();
	}

	var $form = $(this);

	var $inputs = $form.find("input, select, button, textarea");

	var serializedData = $form.serialize();

	$inputs.prop("disabled", true);

	request = $.ajax({

		url: 'login.php',
		type: 'post',
		data: serializedData 
	});

	request.done(function (response, textStatus, jqXHR){
		console.log("It worked");
	});


    request.fail(function (jqXHR, textStatus, errorThrown){
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

        request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

        event.preventDefault();
	});

});