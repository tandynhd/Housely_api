<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['signup']))
{
    $custname=$_POST['fullname'];
    $custTele=$_POST['mobileno'];
    $custEmail =$_POST['email']; 
    $custAddr=$_POST['Address'];
    $password=md5($_POST['password']);
    $sql="INSERT INTO  customer(custname,custTele,custEmail,custPass,custAddr) VALUES(:custname,:custTele,:custEmail,:password,:custAddr)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':custname',$custname,PDO::PARAM_STR);
    $query->bindParam(':custTele',$custTele,PDO::PARAM_STR);
    $query->bindParam(':custEmail',$custEmail,PDO::PARAM_STR);
    $query->bindParam(':custAddr',$custAddr,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again');</script>";
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
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Fields do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>    

</head>


<body>
    <?php include('includes/header.php');?>
        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Register</h2>
                    <span class="underline center"></span>
                    <p class="lead">"Join Us."</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Register</li>
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
                                                            <h2>Sign Up</h2>
                                                            <span class="underline left"></span>
                                                        </div>
                                                        <form class="login" method="post">
                                                            
                                                            <p class="form-row form-row-first input-required">
                                                                <input type="text"  id="username" name="fullname" class="input-text" placeholder="Full Name">
                                                            </p>
															<p class="form-row form-row-first input-required">
                                                                <input type="text"  id="username" name="mobileno" class="input-text" placeholder="Mobile Number">
                                                            </p>
                                                            <p class="form-row form-row-first input-required">                                                                
                                                                <input type="email"  id="username" name="email" class="input-text" placeholder="Email">
                                                            </p>
                                                            <p class="form-row form-row-first input-required">
                                                                <input type="text"  id="username" name="Address" class="input-text" placeholder="Adddress">
                                                            </p>
                                                            <p class="form-row form-row-last input-required">                                                                
                                                                <input type="password" id="password" name="password" class="input-text" placeholder="Password"> 
                                                            </p>
															<p class="form-row form-row-last input-required">                                                                
                                                                <input type="password" id="password" name="confirmpassword" class="input-text" placeholder="Confirm Password"> 
                                                            </p>
                                                        
                                                            <div class="clear"></div>                                                            
                                                                <input type="submit" name="signup" class="button btn btn-default">
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
