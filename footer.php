<html>
    <head>
    <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/lineo-icon/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/nav.css"> -->
    </head>
    <body>
        <div class="site-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="widget">
                                        <h3 class="widget-title">Information</h3>
                                        <ul class="no-bullet">
                                            <li><a href="#">About us</a></li>
                                            <li><a href="#">FAQ</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div> <!-- .widget -->
                                </div> <!-- column -->
                                <div class="col-md-2">
                                    <div class="widget">
                                        <h3 class="widget-title">My Account</h3>
                                        <?php
                                            if(isset($_SESSION['loggedin'])){
                                                if(!$_SESSION['loggedin']){
                                                    echo "<ul class='no-bullet'>";
                                                    echo "<li><a href='#' class='login-button'>Login</a></li>
                                                    <li><a href='#' class='regis-button'>Register</a></li>";
                                                    echo "</ul>";
                                                }
                                                else{
                                                    echo "<ul class='no-bullet'>";
                                                    echo "<li><a href='myaccount.php'>Settings</a></li>
                                                    <li><a href='#'>Cart</a></li>
                                                    <li><a href='logout.php'>Logout</a></li>";
                                                    echo "</ul>";
                                                    // echo $_SESSION['username'];
                                                }
                                            }
                                            else{
                                                echo "<ul class='no-bullet'>";
                                                    echo "<li><a href='#' class='login-button'>Login</a></li>
                                                    <li><a href='#' class='regis-button'>Register</a></li>";
                                                    echo "</ul>";
                                            }
                                            
                                        ?>
                                    </div> <!-- .widget -->
                                </div> <!-- column -->
                                <div class="col-md-6">
                                    <div class="widget">
                                        <h3 class="widget-title">Join our newsletter</h3>
                                        <form action="#" class="newsletter-form">
                                            <input type="text" placeholder="Enter your email...">
                                            <input type="submit" value="Subsribe">
                                        </form>
                                    </div> <!-- .widget -->
                                </div> <!-- column -->
                            </div><!-- .row -->

                            <div class="colophon">
                                <div class="copy">Copyright &copy; 2023 SportsWear. Designed by Bips. All rights reserved.</div>
                                <div class="social-links square">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <!-- <a href="#"><i class="fa fa-google-plus"></i></a> -->
                                    <!-- <a href="#"><i class="fa fa-pinterest"></i></a> -->
                                </div> <!-- .social-links -->
                            </div> <!-- .colophon -->
                        </div> <!-- .container -->
                    </div> <!-- .site-footer -->
                </div>
                <script src="js/jquery-1.11.1.min.js"></script>
                <script src="js/plugins.js"></script>
                <script src="js/app.js"></script>
                </body>
</html>