<!DOCTYPE html>
    <html style="">

    <head>

<?php session_start() ?>
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="iconFont.css" rel="stylesheet">
    <link href="docs.css" rel="stylesheet">
    <link href="prettify.css" rel="stylesheet">

    <script src="jquery.min.js"></script>
    <script src="jquery.widget.min.js"></script>
    <script src="jquery.mousewheel.js"></script>
    <script src="prettify.js"></script>

    <script src="load-metro.js"></script>

    <script src="docs.js"></script>
    <script src="github.info.js"></script>
    <script src="start-screen.js"></script>

    </head>

    <body class="metro" style="height: 100%;">

<script></script>

<noscript></noscript>

<div class="container">

<div id="isc_2" class="normal" onscroll="return isc_VLayout_2._handleCSSScroll()" style="position: absolute; left: 0px; top: 0px; width: 100%; heig…cursor: default; display: inline-block; outline-style: none;">

<?php include ("templates/header.php"); ?>

    <div id="isc_3" class="normal" onscroll="return isc_VLayout_0._handleCSSScroll()" style="position: relative;width: 50%; top: 10%; margin: 0 auto; width: 779px;">
        
                 
               


<div id="isc_9" class="loginFormUser" style="position: absolute; left: 0px; top: 90px; width: 780px; heig…; box-sizing: border-box; cursor: default;" >

<!--  logo  -->

<center>
<img src="images/archwaylogo.png"/>
</center> 

<br>

<!--  /logo -->


<!--  searchb  -->
<center>
      <div class="element input-element" style="align: center; width:700px;">
                            <form action="search.php" method="post"> 
                            <div class="input-control text">
                            <input type="text" placeholder="Search resources by course or keyword" style="width:80%;"/><button class="active" style="padding: 7px 12px;"><img src="images/search-3071e9e44daa3fd755860cfeb35f83e4.png" width="75%" height="75%;> </button>
                        </div>

                    </form>
                </div>  
            </center> 
                        
                        


    <div id="isc_A" style="POSITION:relative;display:inline-block;-moz-box-sizing:borde…-align:top;VISIBILITY:inherit;Z-INDEX:200126;CURSOR:default;" >


</div>


    
    <div id="isc_1Z" style="POSITION:relative;display:inline-block; padding-top: 10%;" >
        <p class="generic" style="color: #606B7C; font-family: Open Sans,helvetica,arial,sans-serif;font-weight: 400; font-size: 24px;line-height: 1.55em;">A free and powerful platform that helps uOttawa students to share courses-related documents.</p>

	<center><?php
		$myFile = "stats/coursesStats.txt";
		$fh = fopen($myFile, 'r');
			while(!feof($fh))
			{
			    $data[] = fgets($fh);     
			}
		print_r($data[2]);
		echo '<br/>';
		print_r($data[3]);
		echo '<br/>';
		print_r($data[4]);
		echo '<br/>';


		fclose($fh);
        ?></center>
</div>
</div>
</div>


</div>
</div>

        </body>
    </html>

