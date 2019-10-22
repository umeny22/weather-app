<?php
if(isset($_GET["submit"])){

            if(isset($_GET["city"]) && !empty($GET["city"]) ){
$apiKey = "01388834847f43289d0aa5b05d35a6c9";
$cityId = "1273293";
$result = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . "apikey";

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $result);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
}
?>
<html lang="en">

<head>
<meta charset="utf-8">
<title>checkweather</title>

</head>

<body>
<form action="" method="get">
<input type="text" name="location">
<button type="submit">submit</button> 
</form>
</body>

</html>
