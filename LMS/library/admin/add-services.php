<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['add']))
{
$bookname=$_POST['bookname'];


$category=$_POST['category'];
$author=$_POST['author'];
$publisher=$_POST['publisher'];
$isbn=$_POST['isbn'];
$noofbooks=$_POST['noofbooks'];
$price=$_POST['price'];

$img = $_FILES["image"]["name"];
$extension = substr($img,strlen($img)-4,strlen($img));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Facility image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$img=md5($img).time().$extension;
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$img);



$sql="INSERT INTO  services(BookName,CatId,AuthorId,PublisherId,ISBNNumber,BookPrice,image,no_of_books) VALUES(:bookname,:category,:author,:publisher,:isbn,:price,:img,:noofbooks)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookname',$bookname,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':author',$author,PDO::PARAM_STR);
$query->bindParam(':publisher',$publisher,PDO::PARAM_STR);
$query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':noofbooks',$noofbooks,PDO::PARAM_STR);
$query->bindParam(':img',$img,PDO::PARAM_STR);
$query->execute();


$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book Listed successfully";
header('location:manage-services.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-services.php');
}
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
                        <h2>Add Services</h2>
                        <span class="underline center"></span>
                        <p class="lead"></p>
                    </div>
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="reg-customer.php">Admin</a></li>
                            <li>Add Services</li>
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
        Service Info
        </div>
        <div class="panel-body">
        <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label>Service Name<span style="color:red;">*</span></label>
        <input class="form-control" type="text" name="bookname" autocomplete="off"  required />
        </div>


        <div class="form-group">
            <label>Service Thumbnail<span style="color:red;">*</span></label>
            <input class="form-control" type="file" name="image" value=""  required />

        </div>


        <div class="form-group">
            <label>Service Category<span style="color:red;">*</span></label>
            <select class="form-control" name="category"  required="required">
                <option value=""> Select Category</option>
                <?php 
                    $status=1;
                    $sql = "SELECT * from  category where Status=:status";
                    $query = $dbh -> prepare($sql);
                    $query -> bindParam(':status',$status, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {               ?>  
                    <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
                <?php }} ?> 
            </select>
        </div>

        <button type="submit" name="add" class="btn btn-primary">Add </button>

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