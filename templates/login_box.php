<?php             

                                    echo"<div class='container2'>";
                                         echo"<div id='content'>";
                                              
                                             echo"<div id='login-box' class='login-popup'>";
                                                 echo"<a href='#' class='close'><img src='images/close_pop.png' class='btn_close' title='Close Window' alt='Close' /></a>";
                                                    echo"<form id='signin' class='signin' method='post' action='login.php'>";
                                                        echo"<fieldset class='textbox' style='margin: 15px;'>";
                                                        echo"<label class='username'>";
                                                        echo"<span>Email</span>";
                                                        echo"<br>";
                                                        echo"<input id='user' name='user' value='' type='email' autocomplete='on' placeholder='Email Address' style='width: 214px;' required>";
                                                        echo"</label>";
                                                        
                                                        echo"<label class='password'>";
                                                        echo"<span>Password</span>";
                                                        echo"<br>";
                                                        echo"<input id='pass' name='pass' value='' type='password' placeholder='Password' style='width: 214px;' required>";
                                                        echo"</label>";
                                                        
                                                        echo"<input type='submit' id='load' value='Sign In' style='width: 214px; margin-top: 10px;'/>";
                                                                        
                                                        echo"<p style='line-height: 18px; padding-top: 15px;'>";
                                                        echo"<a class='forgot' href='#'>Forgot your password?</a>";
                                                        echo"</p>";
                                                        echo"<div id='flash-notice' name='flash-notice'>";
                                                        echo"</div>";
                                            
                                                        echo"</fieldset>";
                                                    echo"</form>";
                                                echo"</div>";
                                            echo"</div>";
                                     echo"</div>";

?>