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
        $StaffID=$_GET['staffID'];
        $StaffName=$_POST['staffname'];
        $StaffTele=$_POST['stafftele'];
        $StaffAddr=$_POST['staffaddr'];
        $StaffSalary=$_POST['staffsala'];
        $StaffEmail=$_POST['staffemail'];

        $sql="update  staff set StaffName=:StaffName, StaffTele=:StaffTele, StaffAddr=:StaffAddr, StaffSalary=:StaffSalary, StaffEmail=:StaffEmail where StaffID=:StaffID";
        $query = $dbh->prepare($sql);
        $query->bindParam(':StaffName',$StaffName,PDO::PARAM_STR);
        $query->bindParam(':StaffID',$StaffID,PDO::PARAM_STR);
        $query->bindParam(':StaffTele',$StaffTele,PDO::PARAM_STR);
        $query->bindParam(':StaffEmail',$StaffEmail,PDO::PARAM_STR);
        $query->bindParam(':StaffAddr',$StaffAddr,PDO::PARAM_STR);
        $query->bindParam(':StaffSalary',$StaffSalary,PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg']="Staff info updated successfully";
        header('location:manage-staff.php');

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
                    <h2>Edit Staff Info</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="manage-staff.php">Manage Staff</a></li>
                        <li>Edit Staff Info</li>
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
Staff Information 
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<?php 
$StaffID=$_GET['staffID'];
// echo "<script type='text/javascript'> alert($StaffID); </script>";
$sql = "SELECT * from  staff where StaffID=:StaffID";
$query = $dbh -> prepare($sql);
$query->bindParam(':StaffID',$StaffID,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{             
      ?>   
    <div class="form-group">
        <label>Staff Name</label>
        <input class="form-control" type="text" name="staffname" value="<?php echo htmlentities($result->StaffName);?>" required />

        <label>Staff Tele</label>
        <input class="form-control" type="text" name="stafftele" value="<?php echo htmlentities($result->StaffTele);?>" required />

        <label>Staff Email</label>
        <input class="form-control" type="text" name="staffemail" value="<?php echo htmlentities($result->StaffEmail);?>" required />

        <label>Staff Address</label>
        <input class="form-control" type="text" name="staffaddr" value="<?php echo htmlentities($result->StaffAddr);?>" required />

        <label>Staff Salary</label>
        <input class="form-control" type="text" name="staffsala" value="<?php echo htmlentities($result->StaffSalary);?>" required />
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