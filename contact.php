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
        <div class="example" style="margin: 0px 0px 0px;background-color: white !important; border: none;">

            <p class='generic' style='color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 10px;'>
                <b>Contact Archway /</b>...</p>
            <p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 15px;line-height: 1.55em;'>
            We're here to help with any questions or comments. </p>
            <legend></legend>
            <p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>


            Email our support staff at<span style="color: #00A255;"> support@archway.ca </span>and we will be happy to help you out.
            <br><br><b>What's in a great support request?</b><br>
                <ul style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;'>
                <li>Provide us with as much essential information as possible.</li>
                <li>Let us know the name of the user or repository you're having trouble with.</li>
                <li>Include any screenshots or links that are related to your problem.</li>
            </ul>
            <br>
<p style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;'>

            For tips such as finding the ressources you are looking for, please visit our <a href='about.php'>help page</a>.</p>
                                   
            </div>

        </div>

    </div>
    </div>
    <?php include ("templates/footer.php"); ?>

</body></center>
</html> 
