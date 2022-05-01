<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    date_default_timezone_set("Asia/Bangkok");
    $apiKey = "c5d46028a1213088e3cfb7d4f77a54a4";
    $cityId = "1607983";
    $googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    // echo "<pre>";
    // print_r($data);
    $currentTime = time();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> Weather Forecast Using OpenWeatherMap with PHP </title>

    <style>
        body {
            font-family: Arial;
            font-size: 0.95em;
            color: #929292;
        }
        
        .report-container {
            border: #E0E0E0 1px solid;
            padding: 20px 40px 40px 40px;
            border-radius: 2px;
            width: 550px;
            margin: 0 auto;
        }

        .weather-icon {
            vertical-align: middle;
            margin-right: 20px;
        }

        .weather-forecast{
            color: #212121;
            font-size: 1.2em;
            font-weight: bold
        }

        span.min-temperature{
            margin-left: 15px;
            color: #929292;
        }
        
        .time{
            line-height: 25px;
        }

    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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
                    <h2>Local Weather</h2>
                    <span class="underline center"></span>
                    <p class="lead"></p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li>Weather</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    </div>
  
    </br>
  
    <div class="report-container">
            <div class="timer">
                
                <div><h2><?php echo $data->name; ?></h2></div>
                <div><?php echo date("l g:i a", $currentTime); ?></div>
                <div><?php echo date("jS F, Y", $currentTime); ?></div>
                <div><?php echo ucwords($data->weather[0]->description); ?></div>
            </div>
            <div class="weather-forecast">
                <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                    class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C 
                    <span class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
            </div>
            <div class="time">
                <div>Humidity: <?php echo $data->main->humidity; ?>%</div>
                <div>Wind: <?php echo $data->wind->speed; ?>km/h</div>
            </div>
        </div>

        </br>
    
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

