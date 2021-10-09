<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
    $StaffName=$_POST['staffname'];
    $StaffTele=$_POST['staffphonenumber'];
    $StaffEmail=$_POST['staffemail'];
    $StaffAddr=$_POST['staffaddress'];
    $StaffSalary=$_POST['staffsalary'];
    $staffContractStart=$_POST['staffcontractstart'];

    
    $sql= "INSERT INTO  staff(StaffName,StaffTele,StaffEmail,StaffAddr,StaffSalary,staffContractStart) 
          VALUES(:StaffName,:StaffTele,:StaffEmail,:StaffAddr,:StaffSalary,:staffContractStart)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':StaffName',$StaffName,PDO::PARAM_STR);
    $query->bindParam(':StaffTele',$StaffTele,PDO::PARAM_STR);
    $query->bindParam(':StaffEmail',$StaffEmail,PDO::PARAM_STR);
    $query->bindParam(':StaffAddr',$StaffAddr,PDO::PARAM_STR);
    $query->bindParam(':StaffSalary',$StaffSalary,PDO::PARAM_STR);
    $query->bindParam(':staffContractStart',$staffContractStart,PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $_SESSION['msg']="Staff added successfully";
        header('location:manage-staff.php');
    }
    else 
    {
        $_SESSION['error']="Something went wrong. Please try again";
        header('location:manage-staff.php');
    }

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
                    <h2>Add Staff</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="reg-customers.php">Admin</a></li>
                        <li>Add Staff</li>
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
                <form role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Staff Name<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="staffname" autocomplete="off"  required />
                    </div>

                    <div class="form-group">
                        <label>Staff Phone Number<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="staffphonenumber" autocomplete="off"  required />
                    </div>

                    <div class="form-group">
                        <label>Staff Email<span style="color:red;">*</span></label>
                        <input class="form-control" type="Email" name="staffemail" autocomplete="off"  required />
                    </div>

                    <div class="form-group">
                        <label>Staff Address<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="staffaddress" autocomplete="off"  required />
                    </div>

                    <div class="form-group">
                        <label>Staff Salary<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" name="staffsalary" autocomplete="off"  required />
                    </div>

                    <div class="form-group">
                        <label>Staff Contract Start<span style="color:red;">*</span></label>
                        <input class="form-control" type="date" name="staffcontractstart" autocomplete="off"  required />
                    </div>

                    <button type="submit" name="create" class="btn btn-primary">Add </button>

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
