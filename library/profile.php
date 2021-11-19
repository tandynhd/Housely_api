<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
    {   
    header('location:index.php');
    }
else{ 
    $custID = $_SESSION['custID'];
    if(isset($_POST['payment']))
    {
        $receipt = $_FILES["paymentreceipt"]["name"];
        $extension = substr($receipt,strlen($receipt)-4,strlen($receipt));
        echo "<script type='text/javascript'> alert($extension); </script>";
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        if(!in_array($extension,$allowed_extensions))
        {
            echo "<script>alert('Receipt image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        else
        {
            $receipt=md5($receipt).time().$extension;
            move_uploaded_file($_FILES["paymentreceipt"]["tmp_name"],"images/pr/".$receipt);

            // What the procedure `paybill` does:    
            // $sql="UPDATE bill SET evidenceurl = :receipt 
            //                 where rContID = (
            //                                 SELECT DISTINCT r.rContID 
            //                                 FROM customer c, roomcontract r, bill b
            //                                 WHERE c.custID = r.custID AND
            //                                 r.rContID = b.rContID AND
            //                                 c.custID = :custID);";
            $sql = "CALL `paybill`(:receipt, :custID);";
            $query = $dbh->prepare($sql);
            $query->bindParam(':receipt',$receipt ,PDO::PARAM_STR);
            $query->bindParam(':custID',$custID ,PDO::PARAM_STR);
            $query->execute();
    
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                $_SESSION['msg']="Service Listed successfully";
                header('location:home.php');
            }
            else 
            {
                $_SESSION['error']="Something went wrong. Please try again";
                header('location:profile.php');
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
                    <h2>Profile</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
        </section>

    <!-- Start: Welcome Section -->
    <?php
    // What the procedure `details` calls:
    // $con = "SELECT rc.roomPrice, rc.parkingPrice, rc.internetPrice, rr.electricityUnit, rr.waterUnit, c.custName, b.paidStatus
    //         FROM roomrecord rr, roomcontract rc, customer c, bill b
    //         WHERE rr.roomNum = rc.roomNum AND
    //             rc.custID = c.custID AND
    //             c.custID = :custID AND
    //             b.rcontID = rc.rcontID;";
    $con = "CALL `details`(:custID);";
    $query2 = $dbh->prepare($con);
    $query2->bindParam(':custID',$custID ,PDO::PARAM_STR);
    $query2->execute();
    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query2->rowCount() > 0)
    {
        foreach($results2 as $result)
        {    
        $rPrice=($result -> roomPrice);
        $pPrice=($result -> parkingPrice);
        $iPrice=($result -> internetPrice);
        $eUnit=($result -> electricityUnit);
        $wUnit=($result -> waterUnit);
        $custName=($result -> custName);
        $pstatus=($result -> paidStatus);
        $roomPrice = $rPrice + $pPrice + $iPrice;
        $total = $roomPrice + ($eUnit*55) + ($wUnit*30);
        }
    }
    ?>
            <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="welcome-wrap">
                            <div class="welcome-text">
                                <h2 class="section-title">Welcome to Housely <?php echo $custName; ?> <br></br> Customer ID: <?php echo  $custID; ?></h2>


                                <span class="underline left"></span>
                                <p class="lead">The house you didn't know you had</p>
                                <p>Now manage all your dorm related functions from one single place. </p>
                                <p>Pay your rent with a single click (assuming the bank account has already been linked). </p>
                                <p>Pay before 5th of every month to avoid a fine of 200 baht every day.</p>
                                
                                <form class="payment" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label>Payment Status</label>
                                        <div class="clear"></div>
                                        <td class="center">

                                                <?php if($pstatus==0)
                                                {?>
                                                    <button class="btn btn-danger" disabled> Waiting </button>
                                                <?php }
                                                else if($pstatus==1){?>

                                                <button class="btn btn-primary" disabled> Paid</button> 
                                                <?php } ?>
                                            </td>
                                            </div>  
                                            <div class="clear"></div>

                                            <div class="form-group">

                                        <label>Payment Receipt<span style="color:red;">*</span></label>
                                        <input class="form-control" type="file" name="paymentreceipt" value=""  required />
                                        
                                    </div>  
                                    <div class="clear"></div>                                                        
                                        <input type="submit" name="payment" class="button btn btn-default">
                                    <div class="clear"></div>
                                </form>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facts-counter">
                            <ul>
                                <li class="bg-light-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="ebook"></i>
                                        </div>
                                        <span>Rent<strong class="fact-counter"> <?php echo $roomPrice; ?></strong></span>
                                    </div>
                                </li>
                                <li class="bg-green">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="eaudio"></i>
                                        </div>
                                        <span>Electricty Bill<strong class="fact-counter"> <?php echo $eUnit*55; ?></strong></span>
                                    </div>
                                </li>
                                <li class="bg-red">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="magazine"></i>
                                        </div>
                                        <span>Water Bill<strong class="fact-counter"> <?php echo $wUnit*30; ?></strong></span>
                                    </div>
                                </li>
                                <li class="bg-blue">
                                    <div class="fact-item">
                                        <div class="fact-icon">
                                            <i class="videos"></i>
                                        </div>
                                        <span>Total<strong class="fact-counter"> <?php echo $total; ?></strong></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="welcome-image"></div>
        </section>
        <!-- End: Welcome Section -->

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
