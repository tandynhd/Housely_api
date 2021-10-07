<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_POST['update']))
{    
$sid=$_SESSION['stdid'];  
$fname=$_POST['fullname'];
$mobileno=$_POST['mobileno'];

$sql="update students set FullName=:fname,MobileNumber=:mobileno where StudentId=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
        
       
        <title>..:: LITERARIUM ::..</title>
        
       
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
                    <h2>Edit-Profile</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Edit-Profile</li>
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
                                                            <h2>Update My Profile</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form name="signup" class="login" method="post">
														
														
														<?php 
$sid=$_SESSION['stdid'];
$sql="SELECT StudentId,FullName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  students  where StudentId=:sid ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':sid', $sid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
														
														
														
														
														
														<p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="" class="input-text" value="Student ID: <?php echo htmlentities($result->StudentId);?>" readonly>
                                                             </p>
															 <p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="" class="input-text" value="Registered Date: <?php echo htmlentities($result->RegDate);?>" readonly >
                                                             </p>
															 
															 <?php if($result->UpdationDate!=""){?>
															 
															 <p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="" class="input-text" value="Last Updation Date: <?php echo htmlentities($result->UpdationDate);?>" readonly >
                                                             </p>
															 <?php } ?>
														<p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="fullname" class="input-text" value="<?php echo htmlentities($result->FullName);?>" >
                                                             </p>
															 <p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="mobileno" class="input-text" value="<?php echo htmlentities($result->MobileNumber);?>">
                                                             </p>
															 
                                                            <p class="form-row form-row-first input-required">
                                                                
                                                                <input type="text"  id="username" name="email" class="input-text" value="<?php echo htmlentities($result->EmailId);?>" readonly>
                                                             </p>
															 <?php }} ?>

                                                            <div class="clear"></div>
                                                            
                                                            <input type="submit" name="update" class="button btn btn-default">
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
<?php } ?>
