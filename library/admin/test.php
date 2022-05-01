<?php
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

<!doctype html>
<html>
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

    </head>
    
    <body>
        <div class="report-container">
            <h2><?php echo $data->name; ?></h2>
            <div class="timer">
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
    </body>
</html>