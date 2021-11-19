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
    <?php
    $con = "SELECT availrooms FROM availrooms
            WHERE id=1;";

    $query = $dbh->prepare($con);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $result)
        {    
        $availrooms=($result -> availrooms);
        }
    }
    ?>
    <body>

<?php include('includes/header.php');?>
        
        <!-- Start: Slider Section -->
        <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">
            
            <!-- Carousel slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v1/front-appartment.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>Join Us, Feel at home!</h3>
                            <h2>Feel Right at Home</h2>
                            <p>Everything you need to do to feel at home is find the right place to live in. Choose us, choose the right place.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <figure>
                        <img alt="Home Slide" src="images/header-slider/home-v1/inside-apartment.jpg" />
                    </figure>
                    <div class="container">
                        <div class="carousel-caption">
                            <h3>You Found The Right Place!</h3>
                            <h2>Register Today</h2>
                            <p>Nothing is pleasanter than finding a right dorm.</p>
                            <div class="slide-buttons hidden-sm hidden-xs">    
                                <a href="signup.php" class="btn btn-primary">Register Now</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controls -->
            <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
            <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
        </div>
        <!-- End: Slider Section -->
        
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
                                <p>Based in Thailand, we are an established dormitory for students and all since 2010. We don't just give you a room to live in,
                                    we give you a house. A house that we look after and aim at making you feel at home.
                                    Because the right way to nurture a bird is to build a good nest. Choose your nest wisely.</p>
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
                                        <span><strong class="fact-counter"><?php echo $availrooms; ?></strong> Available Rooms</span>
                                    </div>
                                </li>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>Close to<strong class="fact-counter">25</strong> University</span>
                                    </div>
                                </li>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Members<strong class="fact-counter">57,000</strong></span>
                                        
                                    </div>
                                </li>
                                <li class="bg-blue">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="videos"></i>
                                        </div>
                                        <span>Awards<strong class="fact-counter">5</strong></span>
                                        
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
        
        <!-- Start: Category Filter -->
        <section class="category-filter section-padding">
            <div class="container">
                <div class="center-content">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h2 class="section-title">Our Facilities</h2>
                            <span class="underline center"></span>
                            <p class="lead"></p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="category-filter">
                <ul class="category-list">
                    <li class="category-item health-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/fitness-img-01.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Fitness</h4>
                                    <p>Housely has excellent fully equipped and modern indoor Gymnasium for those who are into health and fitness.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    
                    <li class="category-item security-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/front-desk-img-02.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Front Desk</h4>
                                    <p>Our front desk handles the every transactions related to our members. The staff receives the customers, handles their requests, and strikes the primary impression about the dormitory.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item security-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/lobby-img-03.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Front Security Gate</h4>
                                    <p>Our front door security gate designs is enhanced by highly secure locks that are difficult to disrupt.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item activity-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/library-img-04.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Library</h4>
                                    <p>Housely Library Services supports learning and teaching.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item health-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/pool-img-05.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Swimming Pool</h4>
                                    <p>Swimming pool, Kid's pool and Sauna room</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>

                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item activity-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/game-img-06.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Game Room</h4>
                                    <p>Pool table and Social club.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item convenient-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/laundry-img-07.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Laundry Room</h4>
                                    <p>At Housely, we can take your dormitory’s laundry room to the next level with a variety of payment system options, including both coin, credit card and online banking.</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li class="category-item activity-facilities">
                        <figure>
                            <img src="images/category-filter/home-v1/working-img-08.jpg" alt="Facilities" />
                            <figcaption class="bg-orange">
                                <div class="info-block">
                                    <h4>Co-Working Spaces</h4>
                    
                                    <p>Co-working space, Kid play zone and Multipurpose play ground (Half court baseketball, Volleyball and Badminton)</p>
                                    <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                    
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                </ul>
                <div class="center-content">
                    <a href="#" class="btn btn-primary">View More</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Start: Category Filter -->
        
        <!-- Start: Features -->
        <section class="features">
            <div class="container">
                <ul>
                    <li class="bg-yellow">
                        <div class="feature-box">
                            <i class="yellow"></i>
                            <h3>Edible Backyard</h3>
                            <p> More green space</p>
                            <a class="yellow" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-light-green">
                        <div class="feature-box">
                            <i class="light-green"></i>
                            <h3>market DELIVERY</h3>
                            <p>Delivers groceries from the stores you love to your doorstep in as little as one hour!</p>
                            <a class="light-green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-blue">
                        <div class="feature-box">
                            <i class="blue"></i>
                            <h3>LIVING PRIVILEGES</h3>
                            <p>Special discount for our lovely members.</p>
                            <a class="blue" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-red">
                        <div class="feature-box">
                            <i class="red"></i>
                            <h3>Cleaning services</h3>
                            <p>Service that is serious about getting your home as clean as it can be.</p>
                            <a class="red" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-violet">
                        <div class="feature-box">
                            <i class="violet"></i>
                            <h3>LAUNDRY SERVICE</h3>
                            <p>Professional Laundry Service that takes all the hassle out of keeping your clothes looking their best.</p>
                            <a class="violet" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                    <li class="bg-green">
                        <div class="feature-box">
                            <i class="green"></i>
                            <h3>MOVING SERVICES</h3>
							<p>Our team can offer a simple, stress-free moving experience. We can always ensure a friendly, good value service that will suit your specific needs.</p>

                            <a class="green" href="#">
                                View Selection <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End: Features -->

        <!-- Start: Latest Blog -->
        <section class="latest-blog section-padding banner">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title">Latest Update form our staff</h2>
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
                                        <h3>Edible Backyard</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-light-green">
                                    <div class="title">
                                        <i class="light-green"></i>
                                        <h3>market DELIVERY</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-blue">
                                    <div class="title">
                                        <i class="blue"></i>
                                        <h3>LIVING PRIVILEGES</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-red">
                                    <div class="title">
                                        <i class="red"></i>
                                        <h3>Cleaning services</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-violet">
                                    <div class="title">
                                        <i class="violet"></i>
                                        <h3>LAUNDRY SERVICE</h3>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="bg-green">
                                    <div class="title">
                                        <i class="green"></i>
                                        <h3>MOVING SERVICES</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabs-list">

                    <!-- Start: living privilage -->
                        <div class="tab-content active">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/01.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">07</span>
                                            <span class="month">Oct</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 23
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 164
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 999
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Our garden is ready for harvest!</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
                                    <p>Fresh watermelon and pumkin is ready to be picked.</p>
                                    <a class="btn btn-dark-gray">Read More</a>
                                </div>
                            </article>
                        </div>

                        <!-- Start: MARKET DELIVERY -->
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/02.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">06</span>
                                            <span class="month">Oct</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 56
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 230
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 1800
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Our newest service</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
									<p> free divery coupoun for our members </p>
                                    <a class="btn btn-dark-gray">Redeem now</a>
                                </div>
                            </article>
                        </div>

                        <!-- Start: living privilage -->
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/03.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">05</span>
                                            <span class="month">Oct</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 23
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 400
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 1800
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>DM HOME ULTRA LUXURY & LIFESTYLE PRODUCT</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
									<p>Get on top discount up to 15% when purchase 1MB up (Discount 10% when purchase THB650,000 up)</p>
                                    <a class="btn btn-dark-gray">Redeem now</a>
                                </div>
                            </article>
                        </div>

                        <!-- Start: cleaning services -->
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/04.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">04</span>
                                            <span class="month">Oct</span>
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
                                                <i class="fa fa-thumbs-o-up"></i> 360
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 1900
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Special Discount for Members</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
                                    <p>Get 30% discount for yearly packages.</p>
                                    <a class="btn btn-dark-gray">Redeem now</a>
                                </div>
                            </article>
                        </div>

                        <!-- Start: laundary services -->
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/05.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">03</span>
                                            <span class="month">Oct</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 100
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 800
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 2200
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Special Discount for Members</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
                                    <p>Get 20% discount for monthly packages.</p>
                                    <a class="btn btn-dark-gray">Redeem now</a>
                                </div>
                            </article>
                        </div>

                        <!-- Start: moving services -->
                        <div class="tab-content">
                            <article>
                                <figure>
                                    <img src="images/latest-blog-img/06.jpg" alt="Latest Blog">
                                    <figcaption>
                                        <a href="#.">
                                            <span class="date">02</span>
                                            <span class="month">Oct</span>
                                        </a>
                                    </figcaption>
                                </figure>
                                <div class="post-detail">
                                    <div class="info-bar">
                                        <div class="comments">
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 99
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a href="#">
                                                <i class="fa fa-thumbs-o-up"></i> 450
                                            </a>
                                        </div>
                                        <div class="viewed">
                                            <a href="#">
                                                <i class="fa fa-eye"></i> 3200
                                            </a>
                                        </div>
                                        <div class="share">
                                            <a href="#">
                                                <i class="fa fa-share-alt"></i> Share
                                            </a>
                                        </div>
                                    </div>
                                    <h4>Special Discount for Members</h4>
                                    <div class="author">
                                        <a href="#">
                                            <i class="fa fa-user"></i> service staff
                                        </a>
                                    </div>
                                    <p>Discount 50% for pick up or delivery</p>
                                    <a class="btn btn-dark-gray">Redeem now</a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End: Latest Blog -->
        
        <!-- Start: Our Community Section -->
        <section class="community-testimonial">
            <div class="container">

                <div class="text-center">
                    <h2 class="section-title">Words From our Community</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>

                <div class="owl-carousel">

                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/member-img/01.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Homesick has never happened to me!
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                                Kim Yeri <small>(Student)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/member-img/02.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    Staff is really nice! you can literally ask anything from them.
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                            Shon Seung-wan <small>(Student)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/member-img/03.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    I have never think about moving since I'm here.
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                            Bae Joo-hyun <small>(Baker)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/member-img/04.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    I don't have to worry about anything. They provide every services you can think of.
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                            Park Soo-young  <small>(Doctor)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="single-testimonial-box">
                        <div class="top-portion">
                            <img src="images/member-img/05.jpg" alt="Testimonial Image" />
                            <div class="user-comment">
                                <div class="arrow-left"></div>
                                <blockquote cite="#">
                                    This is my second home to me!
                                </blockquote>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bottom-portion">
                            <a href="#" class="author">
                            Kang Seul-gi  <small>(Dancer)</small>
                            </a>
                            <div class="social-share-links">
                                <ul>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    
                    <div class="clearfix"></div>
                    </div>

        </section>
        <!-- End: Our Community Section -->
        <!-- Start: News & Event -->
        <section class="news-events section-padding banner">
            <div class="container">
                <div class="center-content">
                    <h2 class="section-title c-light">NEWS &amp; ACTIVITIES</h2>
                    <span class="underline center"></span>
                    <p class="lead c-light"></p>
                </div>
                <div class="news-events-list">
                    <div class="single-news-event">
                        <figure>
                            <img src="images/news-event/01.jpg" alt="News & Event" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">NEW</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            October 05, 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-clock-o"></i>
                                            10:15 AM 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                            Thailand
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">SMART ACCESS QR CODE</a></h3>
                                <p> Member can generate QR code for visitor via application now </p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-news-event">
                        <figure>
                            <img src="images/news-event/02.jpg" alt="News & Event" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">NEW</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            October 13, 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-clock-o"></i>
                                            01:00 PM - 03:00 PM
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                                Bangkok, Thailand
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">Swimming pool under service</a></h3>
                                <p> We have to close the swimming pool for maintanance. Sorry for any inconvenience this may cause. </p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-news-event">
                        <figure>
                            <img src="images/news-event/03.jpg" alt="News & Event" />
                        </figure>
                        <div class="content-block">
                            <div class="member-info">
                                <div class="content_meta_category">
                                    <span class="arrow-right"></span>
                                    <a href="#." rel="category tag">EVENT</a>
                                </div>
                                <ul class="news-event-info">
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-calendar"></i>
                                            October 01, 2021
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank">
                                            <i class="fa fa-map-marker"></i>
                                            Thailand
                                        </a>
                                    </li>
                                </ul>
                                <h3><a href=".html#">Dormitory Philanthropy 2021</a></h3>
                                <p>The offerings for the monks in the ceremony were food, fruits, and soft drinks.</p>
                                <a class="btn btn-primary" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </section>
        <!-- End: News & Event -->
        
        <!-- Start: Social Network -->
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
                                <i class="fa fa-google"></i>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="rss" href="#" target="_blank">
                            <span>
                                <i class="fa fa-instagram "></i>
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
        
        <!-- Mobile Menu -->
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
