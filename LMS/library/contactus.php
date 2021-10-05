<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>



<!DOCTYPE html>
<html lang="zxx">
    

<head>        

       
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

      
        <title> Contact Housely</title>
        
       
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />

        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        
        <link href="css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

     
        <link href="style.css" rel="stylesheet" type="text/css" />


    </head>


    <body>

        <?php include('includes/header.php');?>

        
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Contact Us</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        
        
       
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="contact-main">
                        <div class="contact-us">
                            <div class="container">
                                <div class="contact-location">
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> Office Address</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    <li> SIIT, Thammasat University</li>
                                                    <li>99 Moo 18 Khlong Nueng, Khlong Luang District</li>
                                                    <li>Pathum Thani 12121</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul>
                                                    <li> SIIT, Thammasat University</li>
                                                    <li>99 Moo 18 Khlong Nueng, Khlong Luang District</li>
                                                    <li>Pathum Thani 12121</li>
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> Office Address</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    <li><a href="tel:+66-87-536-6363 ">Local: +66-87-536-6363 </a></li>
                                                    <li><a href="tel:+66-97-456-7890">Local: +66-97-456-7890</a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul><li><a href="tel:+66-87-536-6363">Local: +66-87-536-6363 </a></li>
                                                    <li><a href="tel:+66-97-456-7890">Local: +66-97-456-7890</a></li>
                                                    
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-fax" aria-hidden="true"></i> Phone</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="flipcard">
                                        <div class="front">
                                            <div class="top-info">
                                                <span><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</span>
                                            </div>
                                            <div class="bottom-info">
                                                <span class="top-arrow"></span>
                                                <ul>
                                                    
                                                    <li>support@housely.com</li>
                                                    <li>info@housely.com</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <div class="bottom-info orange-bg">
                                                <span class="bottom-arrow"></span>
                                                <ul>
                                                    
                                                    <li>support@housely.com</li>
                                                    <li>info@housely.com</li>
                                                </ul>
                                            </div>
                                            <div class="top-info dark-bg">
                                                <span><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</span>
                                            </div>                                                
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                    <div class="contact-area">
                                        <div class="container">
                                            <div class="col-md-5 col-md-offset-1 border-gray-left">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-map bg-light margin-left">
                                                            <div class="company-map" id="map"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 border-gray-right">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="contact-form bg-light margin-right">
                                                            <h2>Send us a message</h2>
                                                            <span class="underline left"></span>
                                                            <div class="contact-fields">
                                                                <form id="contact" name="contact" action="http://libraria.demo.presstigers.com/contact.html" method="post" >
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="First Name" name="first-name" id="first-name" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="Last Name" name="last-name" id="last-name" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Email" name="email" id="email" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6">
                                                                            <div class="form-group">
                                                                                <input class="form-control" type="text" placeholder="Phone Number" name="phone" id="phone" size="30" value="" aria-required="true" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <textarea class="form-control" placeholder="Your message" id="message" aria-required="true"></textarea>
                                                                                <div class="clearfix"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group form-submit">
                                                                                <input class="btn btn-default" id="submit-contact-form" type="button" name="submit" value="Send Message"  />
                                                                            </div>
                                                                        </div>
                                                                        <div id="success">
                                                                            <span>Your message was sent successfully! Our team will contact you soon.</span>
                                                                        </div>

                                                                        <div id="error">
                                                                            <span>Something went wrong, try refreshing and submitting the form again.</span>
                                                                        </div>
                                                                    </div>
                                                                </form> 
                                                            </div>                                                                   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
        <section class="social-network section-padding">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Follow Us</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <ul>
                    <li>
                        <a class="facebook" href="#" target="_blank">
                            <span>
                                <i class="fa fa-facebook-f"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="twitter" href="#" target="_blank">
                            <span>
                                <i class="fa fa-twitter"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="google" href="#" target="_blank">
                            <span>
                                <i class="fa fa-google-plus"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-rss"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="#" target="_blank">
                            <span>
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="youtube" href="#" target="_blank">
                            <span>
                                <i class="fa fa-youtube"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
     

<?php include('includes/footer.php');?>
        

        
        <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
        
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
       
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

       
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
      
        <script type="text/javascript" src="js/mmenu.min.js"></script>
        
      
        <script type="text/javascript" src="js/harvey.min.js"></script>
        
       
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        
        <script type="text/javascript" src="js/facts.counter.min.js"></script>

       
        <script type="text/javascript" src="js/mixitup.min.js"></script>

        
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        
       
        <script type="text/javascript" src="js/accordion.min.js"></script>
        
      
        <script type="text/javascript" src="js/responsive.tabs.min.js"></script>
        
       
        <script type="text/javascript" src="js/responsive.table.min.js"></script>
        
        
        <script type="text/javascript" src="js/masonry.min.js"></script>
        
       
        <script type="text/javascript" src="js/carousel.swipe.min.js"></script>
        
    
        <script type="text/javascript" src="js/bxslider.min.js"></script>
        
        
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT5k-RhvFSVIuCALkpHhKgQx6SJUd9gpI"></script>

       
        <script type="text/javascript" src="js/google.map.js"></script>

       
        <script type="text/javascript" src="js/main.js"></script>

    </body>


</html>
