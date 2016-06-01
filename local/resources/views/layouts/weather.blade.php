<?php

$lat=
$lon=
$json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/51.77,0?lang=pl&units=si');
//    $json=file_get_contents();
$obj=json_decode($json);
echo "<p id='lokalizuj'>".$obj->latitude." ";
echo $obj->longitude." </p>";
date_default_timezone_set($obj->timezone);
echo "<div id='temp' class='cols col-xs-6 col-lg-2'>Aktualna / Odczuwalna <h5>".intval($obj->currently->temperature)."&deg;C / ".intval($obj->currently->apparentTemperature)."&deg;C</h5>"."</div>";
echo "<div id='wind' class='cols col-xs-6 col-lg-2'>Ciśnienie <h5>".$obj->currently->pressure." hPa "."</h5></div>";
echo "<div id='rain' class='cols col-xs-6 col-lg-2'>Szansa na opady / Wilgotność <h5>".$obj->currently->precipProbability." % / ".$obj->currently->humidity."</h5></div>";
echo "<div id='pressure' class='cols col-xs-6 col-lg-2'>Zachmurzenie / Wiatr <h5>".$obj->currently->cloudCover." % / ".$obj->currently->windSpeed." m/s"."</h5></div>";
//echo "<h4>Aktualnie: ".intval($obj->currently->temperature)."&deg;C / ";
//echo "T. odczuwalna: ".intval($obj->currently->apparentTemperature)."&deg;C</h4>";
//echo "Wilgotność: ".$obj->currently->humidity." % "."<br>";
//echo "Prawdopodobienstwo opadów: ".$obj->currently->precipProbability." %"."<br>";
//echo "Zachmurzenie: ".$obj->currently->cloudCover." % "."<br>";
//echo "Wiatr: ".$obj->currently->windSpeed." m/s"."<br>";
//echo "Ciśnienie: ".$obj->currently->pressure." hPa"."<br>";

//					    $address = 'olsztyn';
//					    $coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
//					    $coordinates = json_decode($coordinates);
//					    $lat = $coordinates->results[0]->geometry->location->lat;
//					    $lng = $coordinates->results[0]->geometry->location->lng;
?>

<div id="lokalizuj"></div>
