<?php if($_SESSION['login'])
{
?> 
<!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="home.php">
                                                <img class = "logo" src="includes/housely-logo-100.png" alt=" HOUSELY"/>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                <a href="tel:+66-3-8376-6284"><i class="fa fa-phone"></i>+66-3-8376-6284</a>
                                                <span>/</span>
                                                <a href="mailto:support@housely.com"><i class="fa fa-envelope"></i>support@housely.com@fun</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="topbar-links">
                                                <a href="logout.php"><i class="fa fa-lock"></i>Log Out</a>|
												<a href="change-password.php"><i class="fa fa-key"></i>Change Password</a>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li >
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="home.php">Home</a>
                                            
                                        </li>

                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="profile.php">Profile</a>                                          
                                        </li>

                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="services.php">Services</a>
                                            
                                        </li>
                                        
                                        
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="aboutus.php">About Us</a>
                                        </li>
                                        
                                        <li><a href="contactus.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li >
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="home.php">Home</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="catalog.php">Rooms</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Profile</a>
											<ul class="dropdown-menu">
												<li><a href="profile.php">View Profile</a></li>
                                                <li><a href="edit-profile.php">Edit Profile</a></li>
                                                
                                            </ul>
                                            
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="aboutus.php">About Us</a>
                                            
                                        </li>
                                        
                                        <li><a href="contactus.php">Contact Us</a></li>
                                        <li><a href="change-password.php">Change Password</a></li>
										<li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
		
	<?php } else { ?>	
		
		
		<!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="home.php">
                                                <img class = "logo" src="includes/housely-logo-100.png" alt=" HOUSELY"/>
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                                <a href="tel:+61-3-8376-6284"><i class="fa fa-phone"></i>+66-87-536-6363</a>
                                                <span>/</span>
                                                <a href="mailto:support@housely.com"><i class="fa fa-envelope"></i>support@housely.com</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="topbar-links">
                                                <a href="index.php"><i class="fa fa-lock"></i>Log In</a>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li >
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="home.php">Home</a>
                                            
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="aboutus.php">About Us</a>                
                                        </li>
                                        <li><a href="contactus.php">Contact Us</a></li>
										
										<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="signup.php">Register</a>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="adminlogin.php">Admin</a>
                                            
                                        </li>
                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                <li >
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="home.php">Home</a>
                                            
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="aboutus.php">About Us</a>
                                            
                                        </li>
                                        
                                        <li><a href="contactus.php">Contact Us</a></li>
										<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="index.php">Login</a>
                                            
                                        </li>
										
										
										<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="signup.php">Register</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="adminlogin.php">Admin</a>
                                            
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->
		
		
		
		
<?php } ?>
		