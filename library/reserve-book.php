<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 




if(isset($_POST['issue']))
{
    $servID=$_POST['servID'];
    $custID=$_POST['custID'];
    $roomNum=$_POST['roomNum'];
    $servDate=$_POST['servDate'];
    $servTime=$_POST['servTime'];
    
    $sql="INSERT INTO  bookedservice(servID,custID,roomNum,servDate,servTime) VALUES(:servID,:custID,:roomNum,:servDate,:servTime)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':servID',$servID,PDO::PARAM_STR);
    $query->bindParam(':custID',$custID,PDO::PARAM_STR);
    $query->bindParam(':roomNum',$roomNum,PDO::PARAM_STR);
    $query->bindParam(':servDate',$servDate,PDO::PARAM_STR);
    $query->bindParam(':servTime',$servTime,PDO::PARAM_STR);
    $query->execute();
    $_SESSION['msg']="Book Reserved successfully";
    header('location:services.php');

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Housely</title>
        
       
        <link href="images/favicon.ico" rel="icon" type="image/x-icon" />
   
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
   
    <link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/style1.css" rel="stylesheet" />
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href="assets/css2/font-awesome.min.css" rel="stylesheet" type="text/css" />

     
        <link href="assets/css2/mmenu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css2/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <link href="assets/css2/style.css" rel="stylesheet" type="text/css" />
	
	
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script> 
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
     
<?php include('includes/header.php');?>


        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Confirmation</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="services.php">Services</a></li>
                        <li>Confirmation</li>
                    </ul>
                </div>
            </div>
        </section>
       
		

    
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line"></h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading" id="formheading">
Confirm Your Reservation
</div>
<div class="panel-body">
<form role="form" method="post"enctype="multipart/form-data">

<?php 
                                $ServID=$_GET['servID'];
                                $custID = $_SESSION['custId'];
                                
                                
                                 ?>  

                                        <div class="form-group" method="post" enctype="multipart/form-data">
                                            <label>Service ID</label>
                                            <input class="form-control" type="text" name="servID" value="<?php echo htmlentities($ServID);?>" required />

                                            <label>Customer ID</label>
                                            <input class="form-control" type="text" name="custID" value="<?php echo htmlentities($custID);?>" required />

                                            <label>Room Number</label>
                                            <input class="form-control" type="text" name="roomNum" value=" " required />

                                            <label>Date</label>
                                            <input class="form-control" type="date" name="servDate" value=" " required />

                                            <label>Time</label>
                                            <input class="form-control" type="time" name="servTime" value=" " required />


                                        </div>

                                 
    
                                <button type="submit" name="issue" id="submit" class="btn btn-primary btn-lg btn-block ">Confirm </button>
                                <a href="services.php" class="btn btn-danger btn-lg btn-block " role="button">Cancel</a>

</form>
                            </div>
                        </div>
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
<?php } ?>
