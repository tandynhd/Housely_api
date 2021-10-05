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
        
    
       <title> Housely </title>
        
       
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
                    <h2>About Us</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>About us</li>
                    </ul>
                </div>
            </div>
        </section>
       
	   
        
       
        
        
        
       
                <!-- Start: Welcome Section -->
            <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Welcome to Housely</h2>
                                <span class="underline left"></span>
                                <p class="lead">The house you didn't know you had</p>
                                <p>Based in Thailand, we are an established dormitory for students and all since 2010. We don't just give you a room to live in, we give you a house. A house that we look after and aim at making you feel at home. Because the right way to nurture a bird is to build a good nest. Choose your nest wisely.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facts-counter">
                            <ul>
                                <li class="bg-light-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>Countries<strong class="fact-counter">20</strong></span>
                                    </div>
                                </li>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>Branches in Thailand<strong class="fact-counter">790</strong></span>
                                    </div>
                                </li>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Rooms<strong class="fact-counter">450</strong></span>
                                    </div>
                                </li>
                                <li class="bg-blue">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="videos"></i>
                                        </div>
                                        <span>Active Users<strong class="fact-counter">24,000,000</strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->
        
		
		
		
		
      
        <section class="latest-blog section-padding banner">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">What We Look Forward To</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="tabs-container">
                    <div class="tabs-menu">
                        <ul>
                            <li class="active">
                                <a href="#" class="bg-yellow">
                                    <div class="title">
                                        <i class="yellow"></i>
                                        <h3>Goals</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-light-green">
                                    <div class="title">
                                        <i class="light-green"></i>
                                        <h3>Motto</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-blue">
                                    <div class="title">
                                        <i class="blue"></i>
                                        <h3>Vision</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-red">
                                    <div class="title">
                                        <i class="red"></i>
                                        <h3>Team</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-violet">
                                    <div class="title">
                                        <i class="violet"></i>
                                        <h3>Aims</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-green">
                                    <div class="title">
                                        <i class="green"></i>
                                        <h3>Feature</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabs-list">
                        <div class="tab-content active">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">07</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>It uses dictionary over 200 Latin</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
                                    <p>Books are written and printed texts that serve to give information to the reader. Before books are ready for the market they have to go through certain procedures of validation after which they are confirmed to be of market standards.</p>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">06</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>eBooks</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
									<p>Literarium is one the best libraries. You Guys Should Check This Library</p>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">05</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>DVDS</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
									
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">04</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Magazines</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">03</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Audio</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">02</span>
                                            <span class="month">Mar</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 37
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 110
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 180
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>eAudio</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> Adrey Pachai
                                        </a>
                                    </div>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
	   <!-- Start: Newsletter -->
       <section class="newsletter section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="center-content">
                            <h2 class="section-title">Discover Your New Home</h2>
                            <span class="underline center"></span>
                            
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Enter your Email, we will help you find the right fit" id="newsletter" name="newsletter" type="email">
                            <input class="form-control" value="Enter" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Newsletter -->
	   
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
        
       
        <script type="text/javascript" src="js/main.js"></script>
        
    </body>


</html>
