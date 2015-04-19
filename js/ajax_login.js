$(document).ready(function() {

$('#signin').submit(function(){

    var $this = $("#load");

    username=$("#user").val();
    password=$("#pass").val();
    
    $.ajax({
        type: "POST",
        url: "login.php",
        data: "name="+username+"&pwd="+password,
        success: function(html){

            if(html==1)
            {
                location.reload();
            }
            else{
                $("#login-box").html("WRONG USER NAME OR PASSWORD");
                $this.css({
                'background-color' : 'rgba(219, 86, 86, 100)',
                'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

            })
            }

        },
        beforeSend:function(){
            $this.css({
                'background-color' : 'rgba(219, 86, 86, 0)',
                'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

            })
        }
    });
    return false;
    });

});