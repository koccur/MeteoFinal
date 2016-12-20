<?php
$details = json_decode(file_get_contents("http://ipinfo.io/json"));
$longlat=$details->loc;
$json=file_get_contents("https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/{$longlat}?lang=pl&units=si");
$obj=json_decode($json);
//echo $obj->latitude." ";
//echo $obj->longitude." </p>";
date_default_timezone_set($obj->timezone);
echo "<div id='errorZone'>
<div id='details'></div>
</div>";
echo "<div class='col-md-6'><div id='city'><h2>".($details->city)."</h2></div>";
echo "<div id='opis'>".($obj->currently->summary)."<div id='temp'><br><h4>".floatval($obj->currently->temperature)."&deg;C"."</div></div></div>";
echo "<div class='col-md-6'><div class='weatherInfo' id='tempFeel'>Odczuwalna <br><h5>".floatval($obj->currently->apparentTemperature)."&deg;C</h5>"."</div>";
echo "<div class='weatherInfo' id='pressure'>Ciśnienie <br><h5>".$obj->currently->pressure." hPa "."</h5></div>";
//echo "<div id='rain' class='cols col-xs-12 col-lg-2'>Szansa na opady<br><h5>".($obj->currently->precipProbability*100)."%"."</h5></div>";
echo "<div class='weatherInfo' id='rainInt' >Opady<br><h5>".($obj->currently->precipIntensity*100)."mm/h"."</h5></div>";
echo "<div class='weatherInfo' id='humidity' >Wilgotność<br> <h5>".($obj->currently->humidity*100)."%"."</h5></div>";
echo "<div class='weatherInfo' id='cloud' >Zachmurzenie<br><h5>".($obj->currently->cloudCover*100)."%"."</h5></div>";
echo "<div class='weatherInfo' id='wind' >Wiatr <br><h5>".$obj->currently->windSpeed." m/s"."</h5></div></div>";
