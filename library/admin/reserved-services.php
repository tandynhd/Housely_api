<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 
    
    if(isset($_GET['inid']))
    {
    $servBookID=$_GET['inid'];
    $servStatus=1;
    $sql = "update bookedservice set servStatus=:servStatus  WHERE servBookID=:servBookID";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':servBookID',$servBookID, PDO::PARAM_STR);
    $query -> bindParam(':servStatus',$servStatus, PDO::PARAM_STR);
    $query -> execute();
    header('location:reserved-services.php');
    }



    
    if(isset($_GET['id']))
    {
    $servBookID=$_GET['id'];
    $servStatus=0;
    $sql = "update bookedservice set servStatus=:servStatus  WHERE servBookID=:servBookID";
    $query = $dbh->prepare($sql);
    $query -> bindParam(':servBookID',$servBookID, PDO::PARAM_STR);
    $query -> bindParam(':servStatus',$servStatus, PDO::PARAM_STR);
    $query -> execute();
    header('location:reserved-services.php');
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
                    <h2>Booked Service</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="reg-customers.php">Admin</a></li>
                        <li>Booked Service</li>
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
     
	 
	 
	 <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong> 
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>
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


   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong> 
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>
	 
	 
	 
	 
	 


        </div>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading"id="tableheading">
                        Booked Service Information
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="content-table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Book ID</th>
                                            <th>Booked Date</th>
                                            <th>Service ID</th>
                                            <th>Customer ID</th>
                                            
                                            <th>Room Number</th>
                                            
                                            <th>Date</th>
                                            <th>Time</th>
                                            
                                            <th>Service Price</th>
                                            <th>Staff ID</th>
                                            <th>Status</th>
                                            <th>Edit Details</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * FROM bookedservice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            
                                            <td class="center"><?php echo htmlentities($result->servBookID);?></td>
                                            <td class="center"><?php echo htmlentities($result->servBookDate);?></td>
                                            <td class="center"><?php echo htmlentities($result->servID);?></td>
                                            <td class="center"><?php echo htmlentities($result->custID	);?></td>
                                            
                                            <td class="center"><?php echo htmlentities($result->roomNum	);?></td>

                                            <td class="center"><?php echo htmlentities($result->servDate);?></td>
                                            <td class="center"><?php echo htmlentities($result->servTime);?></td>
                                            
                                            
                                            <td class="center"><?php echo htmlentities($result->servPrice);?></td>
                                            <td class="center"><?php echo htmlentities($result->staffID);?></td>
                                            
                                            <td class="center">
                                                <?php if($result->servStatus==0)
                                                {?>
                                                <a href="reserved-services.php?inid=<?php echo htmlentities($result->servBookID);?>" onclick="return confirm('Do you want to change the status?');" >  <button class="btn btn-danger"> In Progress </button>
                                                <?php }
                                                else {?>

                                                <a href="reserved-services.php?id=<?php echo htmlentities($result->servBookID);?>" onclick="return confirm('Do you want to change the status?');"><button class="btn btn-primary"> Completed</button> 
                                                <?php } ?>
                                          
                                            </td>
                                            <td class="center">
											

                                            <a href="edit-reserved-services.php?servBookID=<?php echo htmlentities($result->servBookID);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                        
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
