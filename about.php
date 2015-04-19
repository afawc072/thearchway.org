<!DOCTYPE html>
    <html style="">

    <head>

<?php session_start() ?>
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify.css" rel="stylesheet">

    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify.js"></script>

    <script src="js/load-metro.js"></script>

    <script src="js/autocomplete/jquery-ui.js"></script>
    <script src="js/autocomplete/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="js/autocomplete/jquery-ui.css">
    <link rel="stylesheet" href="js/autocomplete/jquery-ui.min.css">

    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/start-screen.js"></script>
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
        document.getElementById("user").focus();
        
        return false;
    });


    
    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').click( function() { 
      $('#mask , .login-popup').fadeOut(300 , function() {
        $('#mask').remove();  
    }); 
    return false;
    });


});
</script>

    </head>

    <body class="metro">

<script></script>

<noscript></noscript>

<div class="container" style="min-height: 1300px; height: auto !important; margin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; display: inline-block; outline-style: none;">

    <?php include ("templates/header_sb_0margin.php"); ?>

    <div id="hc-mask" style="height: 400px; margin-top: 106px;">
        <h1 style="margin: 0px 0px; font-fize: 80px; color: #FFF; letter-spacing: 4px; vertical-align: baseline; font-weight: bold;">
                HELP/...
        </h1>
    </div>


    <div class="container" style="margin-top: 50px; min-width:720px;">

        
       
 <div id="isc_3" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px;width: 100%; display: inline-block; outline-style: none;">
 
 <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em; margin-left: 57px;"><b>Help /</b> The Basics</p>

<?php include ("templates/login_box.php");?>

   <div class="example" style="border: 0px; witdh: 100%; ">
                <div class="grid fluid">
                <div class="row" style="text-align:center; position:relative;">
                    <div class="span4">
                        <img src="images/help2.png"/>
                    </div>
                    <div class="span4">
                        <img src="images/help3.png"/>
                    </div>
                    <div class="span4">
                        <img src="images/help4.png"/>
                    </div>
                </div>
            </div>
            <div class="grid fluid">
                <div class="row" style="text-align:center; position:relative;">
                    <div class="span4">
                        <div class="notice1">
                            <div class="fg-grai-fo"><b>CREATE & ACTIVATE YOUR ACCOUNT</b> <br> You will receive an e-mail at the address you provide that contains an account activation link.</div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="notice1">
                            <div class="fg-grai-fo"><b>UPLOAD A FILE</b> <br> Once logged in, click on "upload" from the menu and provide a short file description to help other students in their search.</div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="notice1">
                            <div class="fg-grai-fo"><b>ACCESS NOTES, ASSIGNEMENTS AND EXAMS</b> <br>Browse our database and get your hands on academic ressources to help you improve your grades.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em; margin-left: 57px; margin-top: 49px;"><b>Help /</b> Account Access</p>
                   <div class="example" style="border: 0px; witdh: 100%; background-color: white !important;">
                <div class="grid fluid">
                <div class="row" style="position:relative;">

            <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">If you've forgotten your password, please reset it from <span style="color: #00A255;"><a href="#"> this link</a></span>. You can enter your email address to <br>receive a password reset. If for some reason you don't receive an email from us after submitting a request,<br> please try checking your spam folder.</p>
                        
             

            </div>
        </div>
    </div>

                        
                        






                </div>
            </div>
        </div>
    </div>

            <?php include ("templates/footer.php"); ?>



 



        </body>
    </html>

