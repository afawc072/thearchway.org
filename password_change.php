<!DOCTYPE html>
    <html>

    <head>

<?php 
session_start();
?>
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">
    <link href="css/smoothnessui.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/jquery/jqueryui.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/ga.js"></script>
    <script src="js/ajax_login.js"></script>


    <script type="text/javascript">
    
$(document).ready(function() {


    $('a.login-window').click(function() {
        
        // Getting the variable's value from a link 
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2; 
        var popMargLeft = ($(loginBox).width() + 24) / 2; 
        
        $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        
        return false;
    });

    
    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').click( function() { 
      $('#mask , .login-popup').fadeOut(300 , function() {
        $('#mask').remove();  
    }); 
    return false;
    });

    // Making sure user writes matching passwords
    $("#signinform").submit(function(){
        var hasError = false;
        var passwordVal = $("#passwordInput").val();
        var checkVal = $("#passwordInputConfirm").val();

        if(passwordVal != checkVal){
            $("#passwordInputConfirm").val('');
            $("#passwordInput").val('');
            hasError = true;
        }

        if(hasError == true) {return false;}

    });


});
</script>


    <style type="text/css">
        #siginform form{
    opacity: 0;
    -webkit-transition: opacity 0.5s ease-in;
    -moz-transition: opacity 0.5s ease-in;
    -o-transition: opacity 0.5s ease-in;
    -ms-transition: opacity 0.5s ease-in;
    transition: opacity 0.5s ease-in;
    }
    #siginform form.load {
    opacity: 1;
    }

    .metro input[type="submit"]:hover{
    background-color: #00A255 !important;
    }
    

    </style>

    </head>

<body class="metro" style="height: 100%;">

<script></script>

<noscript></noscript>

<div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

    <?php include ("templates/header_sb.php"); ?>

    <div class="container" style="margin-top :116px;">

    <?php include ("templates/login_box.php");?>
    

        <div id="signinformDiv" name="signinformDiv" class="example" style="top: 50px; background-color: white !important; border: none;">
            <form action="resetpwd.php" method="post" id="resetpwd"
             enctype="multipart/form-data">
                <fieldset>
                    <legend>Modify Password</legend>

                    <label>Password</label>
                    <div id="passwordInputDiv" name="passwordInputDiv" class="input-control text" data-role="input-control">
                        <input id="passwordInput" name="passwordInput" required type='password' pattern=".{6,}" placeholder="Minimum of 6 characters" title="Your password must be at least 6 characters long">
                    </div>
                    <label>Re-type password</label>
                    <div id="passwordInputDiv" name="passwordInputConfirmDiv" class="input-control text" data-role="input-control">
                        <input id="passwordInputConfirm" name="passwordInputConfirm" required type='password' placeholder="Passwords must match">
                    </div>
                    <br>
                    <legend style="margin-top: 14px;"></legend>
                    <input id="submitbutton" type="submit" name="submitbutton" value="RESET PASSWORD" style="padding: 15px 22px; background-color: #4A4A4A; color: #FFF; margin-right: 30px;">


                </fieldset>
            </form>
        </div>
        </div>

    </div>
    </div>
    <?php include ("templates/footer.php"); ?>

</body></center>
</html> 
