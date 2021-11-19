<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
    $AdminUsername=$_POST['username'];
    #md5() for password 
    $AdminPass=md5($_POST['password']);
    $sql ="SELECT AdminUsername,AdminPass FROM admin WHERE AdminUsername=:username and AdminPass=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':username', $AdminUsername, PDO::PARAM_STR);
    $query-> bindParam(':password', $AdminPass, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location ='admin/reg-customers.php'; </script>";
        } else{
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
                    <h2>Admin Log In</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Admin</li>
                    </ul>
                </div>
            </div>
        </section>
       
<div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="signin-main" style="padding-bottom:90px;">
                        <div class="container">
                            <div class="woocommerce">
                                <div class="woocommerce-login">
                                    <div class="company-info signin-register">
                                        <div class="col-md-5 col-md-offset-1 ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="company-detail bg-dark margin-left">
                                                        <div class="signin-head">
                                                            <h2>Sign in</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form class="login" method="post">
                                                            <p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="username" class="input-text" placeholder="Username">
                                                            </p>
                                                            <p class="form-row form-row-last input-required">
                                                                
                                                                <input type="password" id="password" name="password" class="input-text" placeholder="Password"> 
                                                            </p>
                                                            <div class="clear"></div>
                                                            
                                                            <input type="submit" name="login" class="button btn btn-default">
                                                            <div class="clear"></div>
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
                </main>
            </div>
        </div>
    </div>
</div>
     
<?php include('includes/footer.php');?>    
        <script src="assets/js/jquery-1.10.2.js"></script>    
        <script src="assets/js/bootstrap.js"></script>        
        <script src="assets/js/custom.js"></script>
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
