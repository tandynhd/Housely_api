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
        $servName =$_POST['servname'];
        $servDesc=$_POST['servdesc'];
        $servthumbnail = $_FILES["serviceimage"]["name"];
        $extension = substr($servthumbnail,strlen($servthumbnail)-4,strlen($servthumbnail));
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        if(!in_array($extension,$allowed_extensions))
        {
            echo "<script>alert('Service image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        else
        {
            $servthumbnail=md5($servthumbnail).time().$extension;
            move_uploaded_file($_FILES["serviceimage"]["tmp_name"],"images/stn/".$servthumbnail);

            $ServID=$_GET['servID'];
            echo "<script type='text/javascript'> alert($ServID); </script>";
            $sql="UPDATE service SET servName=:servName,servDesc=:servDesc,servthumbnail=:servthumbnail WHERE servID=:ServID";
            // $sql="UPDATE service SET servName=:servName,servDesc=:servDesc WHERE servID=:ServID";
            $query = $dbh->prepare($sql);
            $query->bindParam(':ServID',$ServID ,PDO::PARAM_STR);
            $query->bindParam(':servName',$servName ,PDO::PARAM_STR);
            $query->bindParam(':servDesc',$servDesc,PDO::PARAM_STR);
            $query->bindParam(':servthumbnail',$servthumbnail,PDO::PARAM_STR);
            $query->execute();
            // echo "<script type='text/javascript'> alert($ServID); </script>";
            $_SESSION['updatemsg']="Service information updated successfully";
            header('location:manage-services.php');
            

        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
                    <h2>Edit Service</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="manage-services.php">Manage Services</a></li>
                        <li>Edit Service</li>
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
                            Service Information
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" enctype="multipart/form-data">
                                <?php 
                                $ServID=$_GET['servID'];
                                $sql = "SELECT * from service where servID=:ServID";
                                $query = $dbh -> prepare($sql);
                                $query->bindParam(':ServID',$ServID,PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                    foreach($results as $result)
                                    {               ?>  

                                        <div class="form-group" method="post" enctype="multipart/form-data">

                                            <label>Service ID</label>
                                            <input class="form-control" type="text" name="servname" value="<?php echo htmlentities($result->servID );?>" required />

                                            <label>Service Name</label>
                                            <input class="form-control" type="text" name="servname" value="<?php echo htmlentities($result->servName);?>" required />

                                            <label>Service Description</label>
                                            <input class="form-control" type="text" name="servdesc" value="<?php echo htmlentities($result->servDesc);?>" required />

                                            <label>Service Thumbnail</label>
                                            <input class="form-control" type="file" name="serviceimage" value="<?php echo htmlentities($result->servthumbnail);?>" />

                                        </div>

                                    <?php 
                                    }
                                } ?>
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
