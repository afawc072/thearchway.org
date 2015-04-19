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
              $("#login-box").animate({ 
                    'padding-bottom' : 0,
                  }, "slow");
                document.getElementById("flash-notice").innerHTML = "";
                location.reload();
            }
            else{
                $("#login-box").animate({ 
                        'padding-bottom' : '40px',
                      }, "fast");
                setTimeout(function(){
                $("#flash-notice").append("We couldn't sign you in, make sure you have the right credentials");
                $("#flash-notice").fadeIn(30);

                    }, 200);
                   setTimeout(function(){
                     $("#flash-notice").fadeOut(4000);

                    }, 4000);
                   setTimeout(function(){
                      $("#login-box").animate({ 
                            'padding-bottom' : 0,
                          }, "slow");
                     
                    }, 8000);
                $this.css({
                'background-color' : '',
                'background' : ''

                })
            }

        },
        beforeSend:function(){

            document.getElementById("flash-notice").innerHTML = "";
            $("#login-box").css({
                'padding-bottom' : ''
                })
            $this.css({
                'background-color' : 'rgba(219, 86, 86, 0)',
                'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

            })
        }
    });
    return false;
    });

});