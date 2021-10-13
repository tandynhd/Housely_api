<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

    if(isset($_POST['update']))
    {
        $rContID=intval($_GET['rContID']);
        $custID=$_POST['custID'];
        $roomNum=$_POST['roomNum'];
        $contSDate=$_POST['contSDate'];
        $contEDate=$_POST['contEDate'];
        $roomPrice=$_POST['roomPrice'];
        $parkingPrice=$_POST['parkingPrice'];
        $InternetPrice=$_POST['InternetPrice'];
        $elecunitprice=$_POST['elecunitprice'];
        $waterunitprice=$_POST['waterunitprice'];
        
        $sql="UPDATE roomcontract SET custID=:custID,roomNum=:roomNum,contSDate=:contSDate,
                contEDate=:contEDate,roomPrice=:roomPrice,parkingPrice=:parkingPrice,InternetPrice=:InternetPrice,
                elecunitprice=:elecunitprice,waterunitprice=:waterunitprice WHERE rContID=:rContID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':custID',$custID,PDO::PARAM_STR);
        $query->bindParam(':roomNum',$roomNum,PDO::PARAM_STR);
        $query->bindParam(':contSDate',$contSDate,PDO::PARAM_STR);
        $query->bindParam(':contEDate',$contEDate,PDO::PARAM_STR);
        $query->bindParam(':roomPrice',$roomPrice,PDO::PARAM_STR);
        $query->bindParam(':parkingPrice',$parkingPrice,PDO::PARAM_STR);
        $query->bindParam(':InternetPrice',$InternetPrice,PDO::PARAM_STR);
        $query->bindParam(':elecunitprice',$elecunitprice,PDO::PARAM_STR);
        $query->bindParam(':waterunitprice',$waterunitprice,PDO::PARAM_STR);
        $query->bindParam(':rContID',$rContID,PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg']="Contract Information updated successfully";
        header('location:contract-price.php');
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="staff" content="" />
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

	
	

</head>
<body>
     
<?php include('includes/header.php');?>



        <section class="page-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Edit Contract Information</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="contract-price.php">Contract</a></li>
                        <li>Edit Contract Information</li>
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
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading" id="formheading">
Contract Information 
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<!--<label>Customer Name</label>-->
<?php 
$rContID =$_GET['rContID']; 
$sql = "SELECT * from  roomcontract where rContID=:rContID";
$query = $dbh -> prepare($sql);
$query->bindParam(':rContID',$rContID,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>   
    <div class="form-group">
        <label>Customer ID</label>
        <input class="form-control" type="text" name="custID" value="<?php echo htmlentities($result->custID);?>" required />
    </div>
    <div class="form-group">
        <label>Room Number</label>
        <input class="form-control" type="text" name="roomNum" value="<?php echo htmlentities($result->roomNum);?>" required />
    </div>
    <div class="form-group">
        <label>Contract Start Date</label>
        <input class="form-control" type="date" name="contSDate" value="<?php echo htmlentities($result->contSDate);?>" required />
    </div>
    <div class="form-group">
        <label>Contract End Date</label>
        <input class="form-control" type="date" name="contEDate" value="<?php echo htmlentities($result->contEDate);?>" required />
    </div>
    <div class="form-group">
        <label>Room Price</label>
        <input class="form-control" type="text" name="roomPrice" value="<?php echo htmlentities($result->roomPrice);?>" required />
    </div>
    <div class="form-group">
        <label>Parking Price</label>
        <input class="form-control" type="text" name="parkingPrice" value="<?php echo htmlentities($result->parkingPrice);?>" required />
    </div>
    <div class="form-group">
        <label>Internet Price</label>
        <input class="form-control" type="text" name="InternetPrice" value="<?php echo htmlentities($result->InternetPrice);?>" required />
    </div>
    <div class="form-group">
        <label>Electric Price</label>
        <input class="form-control" type="text" name="elecunitprice" value="<?php echo htmlentities($result->elecunitprice);?>" required />
    </div>
    <div class="form-group">
        <label>Water Price</label>
        <input class="form-control" type="text" name="waterunitprice" value="<?php echo htmlentities($result->waterunitprice);?>" required />
    </div>
    
    <?php }} ?>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update </button>

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