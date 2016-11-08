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
echo "<div id='city' class='cols col-xs-12 col-lg-5'>".($details->city)."</div>";
echo "<div id='opis' class='cols col-xs-12 col-lg-3'>".($obj->currently->summary)."</div>";
echo "<div id='temp' class='cols col-xs-12 col-lg-2'>Aktualna<h5>".floatval($obj->currently->temperature)."&deg;C"."</div>";
echo "<div id='tempFeel' class='cols col-xs-12 col-lg-2'>Odczuwalna <h5>".floatval($obj->currently->apparentTemperature)."&deg;C</h5>"."</div>";
echo "<div id='pressure' class='cols col-xs-12 col-lg-2'>Ciśnienie <h5>".$obj->currently->pressure." hPa "."</h5></div>";
echo "<div id='rain' class='cols col-xs-12 col-lg-2'>Szansa na opady<h5>".($obj->currently->precipProbability*100)."%"."</h5></div>";
echo "<div id='rainInt' class='cols col-xs-12 col-lg-2'>Intensywność opadów<h5>".($obj->currently->precipIntensity*100)."mm/h"."</h5></div>";
echo "<div id='humidity' class='cols col-xs-12 col-lg-2'>Wilgotność <h5>".($obj->currently->humidity*100)."%"."</h5></div>";
echo "<div id='cloud' class='cols col-xs-12 col-lg-2'>Zachmurzenie<h5>".($obj->currently->cloudCover*100)."%"."</h5></div>";
echo "<div id='wind' class='cols col-xs-12 col-lg-2'>Wiatr <h5>".$obj->currently->windSpeed." m/s"."</h5></div>";
