$(document).ready(function() {

	var request;

$('load').click(function(){

    var $this = $(this);
    $this.css({
        'background-color' : 'rgba(219, 86, 86, 0)',
        'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

    })

    username=$("#user").val();
    password=$("#password").val();
    
    $.ajax({
    	type: "POST",
    	url: "login.php",
    	data: "name="+username+"&pwd="+password,
    	success: function(html){

    		if(html=='true')
    		{
    			$("#login-box").html("<a href='search2.php' id='logout'>Logout</a>");
    		}
    		else{
    			$("#login-box").html("Wrong username or password");
    		}

    	},
    	beforeSend:function(){
    		$("#login-box").html("Loading...");
    	}
    });
    return false;
});

});