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
        $servBookID=$_GET['servBookID'];

        $servID=$_POST['servID'];
        $custID=$_POST['custID'];
        $roomNum=$_POST['roomNum'];
        $staffID=$_POST['staffID'];
        $servPrice=$_POST['servPrice'];
        $servDate=$_POST['servDate'];
        $servTime=$_POST['servTime'];

        $sql="update  bookedservice set servID=:servID, custID=:custID, roomNum=:roomNum, staffID=:staffID, servPrice=:servPrice, servDate=:servDate, servTime=:servTime where servBookID=:servBookID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':servID',$servID,PDO::PARAM_STR);
        $query->bindParam(':custID',$custID,PDO::PARAM_STR);
        $query->bindParam(':roomNum',$roomNum,PDO::PARAM_STR);
        $query->bindParam(':staffID',$staffID,PDO::PARAM_STR);
        $query->bindParam(':servPrice',$servPrice,PDO::PARAM_STR);
        $query->bindParam(':servBookID',$servBookID,PDO::PARAM_STR);
        $query->bindParam(':servDate',$servDate,PDO::PARAM_STR);
        $query->bindParam(':servTime',$servTime,PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg']="Booked Service information updated successfully";
        header('location:reserved-services.php');

    }
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="staff" content="" />
        <title> Housely </title>
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
                    <h2>Edit Booked Service Information</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="reserved-services.php">Booked Service</a></li>
                        <li>Edit Booked Service Info</li>
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
Booked Service Information 
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<?php 
$servBookID=$_GET['servBookID'];
// echo "<script type='text/javascript'> alert($StaffID); </script>";
$sql = "SELECT * from  bookedservice where servBookID=:servBookID";
$query = $dbh -> prepare($sql);
$query->bindParam(':servBookID',$servBookID,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{             
?>   
        <div class="form-group">
        <label>Service Book ID</label>
        <input class="form-control" type="text" name="servBookID" value="<?php echo htmlentities($result->servBookID);?>" required />
        </div>

        <div class="form-group">
        <label>Service ID</label>
        <input class="form-control" type="text" name="servID" value="<?php echo htmlentities($result->servID);?>" required />
        </div>

        <div class="form-group">
        <label>Customer ID</label>
        <input class="form-control" type="text" name="custID" value="<?php echo htmlentities($result->custID );?>" required />
        </div>

        <div class="form-group">
        <label>Room Number</label>
        <input class="form-control" type="text" name="roomNum" value="<?php echo htmlentities($result->roomNum);?>" required />
        </div>

        <div class="form-group">
        <label>Date</label>
        <input class="form-control" type="date" name="servDate" value="<?php echo htmlentities($result->servDate);?>" required />
        </div>

        <div class="form-group">
        <label>Time</label>
        <input class="form-control" type="time" name="servTime" value="<?php echo htmlentities($result->servTime);?>" required />
        </div>

        <div class="form-group">
        <label>Staff ID</label>
        <input class="form-control" type="text" name="staffID" value="<?php echo htmlentities($result->staffID);?>" required />
        </div>

        <div class="form-group">
        <label>Service Price</label>
        <input class="form-control" type="text" name="servPrice" value="<?php echo htmlentities($result->servPrice);?>" required />
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