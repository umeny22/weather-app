<html>
<!--Created by: Menyie Udofa
    Supervised by: Clara Udofa
    Date: 1st September 2019
    Name: Weather Forcast App
    
    ~This is a weather forcast app, with user friendly Interface that stores the information for any location that has been checked for 24 hours.
    To get started simply enter the name of the location you wish to know the weather and click search.-->
    
<head>
  <meta charset="utf-8">
  <title>Weather_Forcast_App</title>
  <meta name="Menyie Udofa" content="Weather forcast from open weather map">
  <link href=https://fonts.googleapis.com/css?family=Basic" rel="stylesheet">
<style>
body {
    background-image : url("https://images.pexels.com/photos/125510/pexels-photo-125510.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
    background-repeat: no-repeat;
}
h1 {
    margin-top : 140px ;
    font-size : 40px ;
    font-family: Handle cursive ;
    font-weight : 400 ;
    font-style : normal ;
    color : Green ;
}
input {
    width : 400px ;
    margin-top : 120px ;
}
button {
    cursor : pointer ;
    padding : 6px 15px ;
    background-color : #1222df ;
    background : -webkit-linear-gradient(#c96cff, #9222d3) ;
    font-size : 12px ;
    letter-spacing : 3px ;
    border-radius: 18px ;
    box-shadow: 0 6px 2px -2px rgba(0, 0, 0, 0.404), inset 0 2px -2px 10px #d341ff
    transition: ease .1s
}
.button:active {
    padding : 4px 10px ;
    font-size : 9px ;
    transition: ease .1s ;
}
#fieldset {
    vertical-align : center ;
}
#tab {
    visibility : hidden ;
}
</style>
</head>

<body>
<div class="container">
    <header>
    <h1><span>24 HOUR WEATHER FORCAST</span></h1>
    </header>
    <section>
        <form action="" method="get">
           <div class="fieldset">
            <input type="text" name="city" placeholder="Enter the name of a city"/>
            <button type="submit" value="check it!">search</button>
            </div>
        </form>
        
    </section>
    <section class="weatherfield">
    <?php
        if (isset($_GET["city"]) && !empty($_GET["city"])) {
            //build the url
            $apikey = "01388834847f43289d0aa5b05d35a6c9";
            $city = $_GET["city"];//"1273293";
            $report = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&lang=en&units=metric&appid=01388834847f43289d0aa5b05d35a6c9";
            //init cURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $report);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            //Execute
            $response = curl_exec($ch);
            //closing
            curl_close($ch);
            $data = json_decode($response);
            $currentTime = time();

            //echo $response;
            //echo '<pre>'; print_r($data);
            echo $data->name;
            echo '<table border="2">';
            echo '<tr><th>city</th><th>12am</th><th>6am</th><th>12pm</th><th>6pm</th></tr>';

            $name = $data->name;
            $temp = $data->main->temp;
            $dt = $data->dt;

            echo '<tr>';
            echo    '<td>';
            echo        $name;
            echo    '</td>';
            echo    '<td>';
            echo        $temp;
            echo    '</td>';
            echo    '<td>';
            echo    $dt;
            echo    '<td>';
            echo    $dt;
            echo    '</td>';
            echo '</tr>';
            echo '</table>';
        }
    ?>
    </section>

</body>
</html>
