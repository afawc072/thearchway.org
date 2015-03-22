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
    <style type="text/css">


a { 
    text-decoration:none; 
    color:#00c6ff;
}

h1 {
    font: 4em normal Arial, Helvetica, sans-serif;
    padding: 20px;  margin: 0;
    text-align:center;
}

h1 small{
    font: 0.2em normal  Arial, Helvetica, sans-serif;
    text-transform:uppercase; letter-spacing: 0.2em; line-height: 5em;
    display: block;
}

h2 {
    color:#bbb;
    font-size:3em;
    text-align:center;
    text-shadow:0 1px 3px #161616;
}
.container2 {width: 960px; margin: 0 auto; overflow: hidden;}

#content {  float: left; width: 100%;}

.post-box { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
    width:460px;
    margin-bottom:20px;
    margin:0 auto;
    padding:20px;
    border-radius:5px;
    background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
    background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
    text-align:center;
    font-size:36px;
    color:#fff;
    text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
    display: none;
    background: #000; 
    position: fixed; left: 0; top: 0; 
    z-index: 10;
    width: 100%; height: 100%;
    opacity: 0.8;
    z-index: 999;
}

.login-popup{
    display:none;
    background: #F3F4F5 !important;
    padding: 10px;  
    border: 2px solid #ddd;
    float: left;
    position: fixed;
    top: 50%; left: 50%;
    z-index: 99999;
    box-shadow: 0px 0px 20px #999;
    -moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
    border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
    float: right; 
    margin: -28px -28px 0 0;
}

fieldset { 
    border:none; 
}

form.signin .textbox label { 
    display:block; 
    padding-bottom:7px; 
}

form.signin .textbox span { 
    display:block;
}

form.signin p, form.signin span { 
    color:#999; 
    font-size:11px; 
    line-height:18px;
} 

form.signin .textbox input { 
    background:#666666; 
    border-bottom:1px solid #333;
    border-left:1px solid #000;
    border-right:1px solid #333;
    border-top:1px solid #000;
    color:#fff; 
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    font:13px Arial, Helvetica, sans-serif;
    padding:6px 6px 4px;
    width:200px;
}

form.signin .textbox input[type="submit"]{
  padding: 4px 12px;
  text-align: center;
  vertical-align: middle !important;
  background-color: #d9d9d9;
  border: 1px transparent solid;
  color: #222222;
  border-radius: 0;
  cursor: pointer;
  display: inline-block;
  outline: none;
  font-family: 'Segoe UI Light_', 'Open Sans Light', Verdana, Arial, Helvetica, sans-serif;
  font-size: 14px;
  line-height: 16px;
  margin: auto;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }

.button { 
    background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
    background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
    background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
    border-color:#000; 
    border-width:1px;
    border-radius:4px 4px 4px 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    color:#333;
    cursor:pointer;
    display:inline-block;
    padding:6px 6px 4px;
    margin-top:10px;
    font:12px; 
    width:214px;
}

.footer, .push {
    height: 100px; /* .push must be the same height as .footer */
}

.button:hover { background:#ddd; }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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

    $('#load').live('click', function() {
    var $this = $(this);
        $this.css({
            'background-color' : 'rgba(219, 86, 86, 0)',
            'background' : 'url("images/loadingbutton.png") no-repeat scroll 0 0 transparent'

        })
        $this.fadeOut(1000);
    });

    
    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').live('click', function() { 
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

            <div class="container" style="min-height: 100%; height: auto !important; height: 100%; margin: 0 auto -100px;">

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
                                  <div class="element input-element" style="align: center; width:780px;">
                                                        <form action="search.php" method="post"> 
                                                        <div class="input-control text">
                                                        <input type="text" id="searchCourse" name="find" placeholder="Search resources by course or keyword" style="width:80%;"/><button class="active" style="padding: 7px 12px;"><img src="images/search-3071e9e44daa3fd755860cfeb35f83e4.png" width="75%" height="75%"/> </button>
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
                                    <div class="container2">
                                         <div id="content">
                                              
                                             <div id="login-box" class="login-popup">
                                                 <a href="#" class="close"><img src="images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
                                                    <form class="signin" method="post" action="login.php">
                                                        <fieldset class="textbox" style="margin: 15px;">
                                                        <label class="username">
                                                        <span>Email</span>
                                                        <br>
                                                        <input id="user" name="user" value="" type="text" autocomplete="on" placeholder="Email Address" style="width: 214px;">
                                                        </label>
                                                        
                                                        <label class="password">
                                                        <span>Password</span>
                                                        <br>
                                                        <input id="pass" name="pass" value="" type="password" placeholder="Password" style="width: 214px;">
                                                        </label>
                                                        
                                                        <input type="submit" id="load" value="Sign In" style="width: 214px; margin-top: 10px;"/>
                                                                        
                                                        <p style="line-height: 18px; padding-top: 15px;">
                                                        <a class="forgot" href="#">Forgot your password?</a>
                                                        </p>
                                            
                                                            </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                     </div>
    
   

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

        </body>
    </html>

$( "#searchCourse" ).autocomplete({source: "suggest_course.php", minLength:2});

