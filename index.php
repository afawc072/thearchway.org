<!DOCTYPE html>
    <html style="">

    <head>
<?php session_start() ?>

<?php
header('Cache-Control: max-age=900');
?>
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

    $('#load').click(function() {
    var $this = $(this);
        $this.css({
            'background-color' : 'rgba(219, 86, 86, 0)',
            'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

        })
        $this.fadeOut(1000);
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

    <body class="metro" style="height: 100%;">

        <script></script>

        <noscript></noscript>

            <div class="container" style="min-height: 950px; height: auto !important; margin: 0 auto -100px;">

                <div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

                    <?php include ("templates/header.php"); ?>

                        <div id="isc_3" class="normal" onscroll="return isc_VLayout_0._handleCSSScroll()" style="position: relative;width: 50%; top: 10%; margin: 0 auto; width: 779px;">
        
                 
               


                            <div id="isc_9" class="loginFormUser" style="position: absolute; left: 0px; top: 90px; width: 780px; heig…; box-sizing: border-box; cursor: default;" >

                                <!--  logo  -->

                                <center>
                                <img src="images/archwaylogo.jpg"/>
                                </center>

                                <br>

                                <!--  /logo -->


                            <!--  searchb  -->
                            <center>
                                  <div id="searchResponse"></div>
                     <div class="element input-element" style="align: center; width:780px;">
                                                        <form action="search2.php" id="find" name="find" method="post">
                                                        <div class="input-control text">
                                                        <input type="text" id="searchCourse" name="searchCourse" placeholder="Search resources by course or keyword" style="width:80%;"/><button class="active" id="searchButton" style="padding: 7px 12px;"><img src="images/search-3071e9e44daa3fd755860cfeb35f83e4.png" width="75%" height="75%"/> </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </center> 
                        
                        


                            <div id="isc_A" style="POSITION:relative;display:inline-block;-moz-box-sizing:borde…-align:top;VISIBILITY:inherit;Z-INDEX:200126;CURSOR:default;" >


                            </div>


                             <div id="isc_1Z" style="POSITION:relative;display:inline-block;align: center; width:780px; padding-top: 20px; margin: 0 auto;" >
                                <center>
                                    <p class="generic" style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;">A free and powerful platform that helps uOttawa students to share courses-related documents.</p>
                                </center>
                                
                                <?php include ("templates/login_box.php");?>
    
   

                                	<center>
                                        <p class="generic" style="color: #606B7C; font-family: Sergoe UI Light_, Open Sans Light, Verdana, Arial, Helvetica, sans-serif;font-weight: 400; font-size: 18px;line-height: 1.55em;">
                                        <?php
                                		$myFile = "stats/coursesStats.txt";
                                		$fh = fopen($myFile, 'r');
                                			while(!feof($fh))
                                			{
                                			    $data[] = fgets($fh);     
                                			}
                                		print_r($data[2]);
                                		fclose($fh);
                                        ?>
                                    </p>
                                    </center>
                             </div>
     <center>
    </div>
</div>
</div>

</div>


<?php include ("templates/footer.php"); ?>

</div>
</div>
<script type="text/javascript" src="js/ajax_search.js"></script>
        </body>
    </html>


