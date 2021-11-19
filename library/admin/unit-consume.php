<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

    if(isset($_GET['del']))
    {
        $roomrecID=$_GET['del'];
        $sql = "delete from roomrecord WHERE roomrecID=:roomrecID";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':roomrecID',$roomrecID, PDO::PARAM_STR);
        $query -> execute();
        $_SESSION['delmsg']="The record is deleted scuccessfully ";
        header('location:unit-consume.php');
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
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                    <h2>Unit Record</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="reg-customers.php">Admin</a></li>
                        <li>Unit Record</li>
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
            <?php if($_SESSION['updatemsg']!="")
            {?>
            <div class="col-md-6">
            <div class="alert alert-success" >
            <strong>Success :</strong> 
            <?php echo htmlentities($_SESSION['updatemsg']);?>
            <?php echo htmlentities($_SESSION['updatemsg']="");?>
            </div>
            </div>
            <?php } ?>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" id="tableheading">
                        Unit Recorded Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="content-table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room Record ID</th>
                                            <th>Room Number</th>
                                            <th>Electricity Unit</th>
                                            <th>Water Unit</th>
                                            <th>Date</th>
                                            <th>Action</th>		
                                        </tr>
                                    </thead>
                                    <tbody>

<?php $sql = "SELECT * from roomrecord";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            
                                            <td class="center"><?php echo htmlentities($result->roomrecID);?></td>
                                            <td class="center"><?php echo htmlentities($result->roomNum);?></td>
                                            <td class="center"><?php echo htmlentities($result->electricityUnit );?></td>
                                            <td class="center"><?php echo htmlentities($result->waterUnit);?></td>
                                            <td class="center"><?php echo htmlentities($result->dRecord);?></td>
                                            
                                            <td class="center">
                                            <a href="edit-unit-consume.php?roomrecID=<?php echo htmlentities($result->roomrecID);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                            <a href="unit-consume.php?del=<?php echo htmlentities($result->roomrecID);?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Remove </button>
                                            </td>
                                        </tr>
<?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
    </div>
    </div>

<?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>    
    <script src="assets/js/bootstrap.js"></script>    
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>      
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
