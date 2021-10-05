<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
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
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Krub:wght@200;300;500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Krub:wght@200;300;500&family=Ranchers&display=swap" rel="stylesheet">
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
                    <h2>Services</h2>
                    <span class="underline center"></span>
                    <p class="lead">"Getting a house isn't the hard part, maintaining it is."</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Services</li>
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
                         
                                <section class="search-filters">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>What services are you looking for?</h3>
                                            <form action="" method="get">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="keywords">Search by Service Name</label>
                                                        <input class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search by Service Name" type="text">
                                                    </div>
                                                <!-- </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="catalog" id="catalog" class="form-control">
                                                            <option>Search </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="category" id="category" class="form-control">
                                                            <option>All Categories</option>
                                                            <option>Mechanic</option>
                                                            <option>Maid</option>
                                                            <option>Electrician</option>
                                                            <option>Gardener</option>
                                                            <option>Plumber</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="submit" value="Search"  >
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section> -->
                                <!-- End: Search Section -->
                            </div>
		
        
        <div class="wrapper" > 


                    
                <div class="row" id="myUL">  






				
                                    
<?php 

$sql = "SELECT books.BookName,category.CategoryName,authors.AuthorName,publishers.PublisherName,books.ISBNNumber,books.no_of_books,books.image,books.id as bookid from  books join category on category.id=books.CatId join authors on authors.id=books.AuthorId join publishers on publishers.id=books.PublisherId";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                        

<div class="col-lg-3 col-md-4 col-sm-12" id="card">

<div class="card">
  <img src="admin/images/<?php echo $result->image;?>" >
  <div class="info"  >
    
    <h1 style="font-family:'Lato', Georgia, Times, serif; font-weight:900;"><?php echo htmlentities($result->BookName);?></h1>
    <p><?php echo htmlentities($result->CategoryName);?> </br>Author - <?php echo htmlentities($result->AuthorName);?> </br>Publisher - <?php echo htmlentities($result->PublisherName);?></br>ISBN - <?php echo htmlentities($result->ISBNNumber);?> </p>

  
  <?php if($result->no_of_books!=0)
                                            {?>
                                            
                                             <a href="reserve-book.php?bookid=<?php echo $result->bookid;?>" class="btn"  >Reserve</a>
                                                
                                            <?php } else { ?>
                                             
											  <a href="#" class="btn" disabled >Reserve</a>
                                        
										<?php }
                                            ?>
  
  
  
  
  
  
  
  </div>
  
</div>
</div>


	  








 








              
                                        
                                        
 <?php }} ?>                                      
                                
                              
                    
             
      </div>         
     </div>        

            
    </div>
    </div>
     
<?php include('includes/footer.php');?>
     
	  
	  
	  
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("h1");
	a1 = document.querySelectorAll("#card");
	
    for (i = 0; i < li.length; i++) {
        a = li[i];
        txtValue = a.textContent || a.innerText;
		
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          
			a1[i].style.display = "";
		
		} else {
           a1[i].style.display = "none";
        }
    }
}
</script>
	  
  <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
        
      
        

        
<script type="text/javascript" src="js/bootstrap.min.js"></script>
        
       
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
