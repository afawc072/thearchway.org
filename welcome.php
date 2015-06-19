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

<div class="container" style="min-height: 2300px; height: auto !important; margin: 0 auto -100px;">

    <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; display: inline-block; outline-style: none;">

    <?php include ("templates/header_sb_0margin.php"); ?>

    <div id="hc-mask2" style="height: 400px; margin-top: 106px;">
        <h1 style="margin: 0px 0px; font-fize: 80px; color: #FFF; letter-spacing: 4px; vertical-align: baseline; font-weight: bold;">
               
        </h1>
    </div>


    <div class="container" style="min-width:720px;">

        
       
 <div id="isc_3" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px;width: 100%; display: inline-block; outline-style: none;">

  <div class="example" style="border: 0px; witdh: 100%; background-color: white !important;">
         <div class="grid fluid">
                <div class="row" style="position:relative;">

                    <div class="span6">
                        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;"><b>Welcome ! /</b> Your account has been activated </p>
                

                        <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                            You can now <a href='#login-box' class='login-window'> sign in </a> to enjoy full access to all the features we provide. Don't forget to stop by at our <a href='upload.php'>upload page </a> when you feel like it !</p>
                        </div>
                    </div>
                </div>
            </div>

<?php include ("templates/login_box.php");?>

   <div class="example" style="border: 0px; witdh: 100%; ">
  <div class="stepper" data-steps="4" data-role="stepper" data-start="6"></div>
        </div>
        <div class="example" style="border: 0px; witdh: 100%; background-color: white !important; top: 10px;">
        <div class="grid fluid">
                <div class="row" style="position:relative;">

                    <div class="span6">
                        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;"><b>1 /</b> Searching Ressources </p>
                

                        <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                             Our databases are growing in size everyday thanks to our loyal users. Use the top search bar to browse intuitively through hundreds of documents organized by <b>course</b> and <b>keyword</b>.
                        </p>
                        </div>

                    <div class="span6">
                        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;"><b>2 /</b> Download </p>
                

                         <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                            Once you signed in and found what you were looking for, simply click any listed file to get your hands on them ! (it's as simple as that) </p>
                        </div>
                    </div>

                                    <div class="row" style="position:relative; top: 10px;">

                    <div class="span6">
                        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;"><b>3 /</b> Contributing </p>
                

                        <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                             Our databases are growing in size everyday thanks to our loyal users. If you have notes related to any uOttawa class and wish to contribute, we encourage you to post them from our <a href='upload.php'>upload page</a>. 
                             <br>Here are the formats we support :
                                             <ul style='color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;'>
                                                <li>Microsoft Word (.doc, .docx)</li>
                                                <li>Microsoft PowerPoint (.ppt, pptx)</li>
                                                <li>PDF documents (.pdf)</li>
                                                <li>Open Office (.odt)</li>
                                                <li>Text (.txt)</li>
                             </p>
                        </div>

                    <div class="span6">
                        <p class="generic" style="color: #3E4252;font-weight: 600;font-family: Segoe UI_,Open Sans,Verdana,Arial,Helvetica,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;"><b>4 /</b> Consult our help page</p>
                

                         <p style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                            Everything you need to know about The Archway can be found there. From  </p>
                        </div>
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

