@extends('layouts.master')
@section('content')
    <script>
        var address;
        var lng;
        var lon;

        function city(choice){
            if(choice=='london')
            {
                lng='50';
                lon='0';
            }
            if(choice=='olsztyn'){
                lng='53.77';
                lon='20.48';
            }
            address = 'https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/'+lng+','+lon+'?lang=pl&units=si';
        }

    </script>
<div class="col-xs-12">
    <h1>Nazwa miejscowości</h1>
    <div class="content">
        <ul>
            <ul>
                {{--<li><a id="olsztyn" onClick="city('olsztyn')">Olsztyn</a></li>--}}
                {{--<li><a id="london"  onClick="city('london')">Londyn</a></li>--}}
                {{--<li><a id="rzeszow" onClick="city('rzeszow')">Rzeszow</a></li>--}}

                <li><a class="city" data-name="olsztyn">Olsztyn</a></li>
                <li><a class="city" data-name="london">Londyn</a></li>
                <li><a class="city" data-name="rzeszow">Rzeszow</a></li>
                <button id="x">DEBUG</button>
            </ul>
        </ul>

<?php
    $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/51.77,0?lang=pl&units=si');
//    $json=file_get_contents();
    $obj=json_decode($json);
    echo $obj->latitude." ";
    echo $obj->longitude." ";
    date_default_timezone_set($obj->timezone);

    echo "<p id='godzinowa'>Pogoda na najbliższe 48 godzin </p>";

    echo "<table class='table table-weather'><thead><tr>";
    echo "<th>Data i godzina</th><th>Temperatura / Odczuwalna</th><th>Wilgotność / Zachmurzenie</th><th>Wiatr / Ciśnienie</th></tr></thead><tbody>";
    for ($i = 1; $i <= 48; $i++) {
        echo "<tr><th scope='row'>";
        echo date('H:i d-m', $obj->hourly->data[$i]->time)."</th><td>";
        echo intval($obj->hourly->data[$i]->temperature)."&deg;C / ";

        echo intval($obj->hourly->data[$i]->apparentTemperature)."&deg;C</td>";
//        echo "prawdopodobienśtwo opadów:".$obj->hourly->data[$i]->precipProbability."<br>";

        echo "<td>".$obj->hourly->data[$i]->humidity." / ".$obj->hourly->data[$i]->cloudCover."</td>";
        echo "<td>".$obj->hourly->data[$i]->windSpeed."m/s"." / ".$obj->hourly->data[$i]->pressure."hPa"."</td>";

    }
    echo "</tbody></table> <br>";

    echo "<p id='tygodniowa'>Pogoda na najbliższe 7 dni </p>";
    echo "<table class='table table-weather'> <thead><tr>";
    echo "<th>Data i godzina</th><th>Temperatura / Odczuwalna</th><th>Wilgotność / Zachmurzenie</th><th>Wiatr / Ciśnienie</th></tr></thead><tbody>";
    for ($i = 1; $i <= 7; $i++) {
        echo "<tr><th scope='row'>";
        echo "Wschod ".date('H:i:s',$obj->daily->data[$i]->sunriseTime)."<br>";
        echo "Zachod ".date('H:i:s',$obj->daily->data[$i]->sunsetTime)."<br>";

        echo date('d-m', $obj->daily->data[$i]->time)."</th><td>";
        echo intval($obj->daily->data[$i]->temperatureMin)."&deg;C / ";
        echo intval($obj->daily->data[$i]->temperatureMax)."&deg;C</td>";
        echo "<td>".$obj->daily->data[$i]->humidity." / ".$obj->daily->data[$i]->cloudCover."</td>";
//        echo "zachmurzenie".$obj->daily->data[$i]->cloudCover."<br>";
        echo "<td>".$obj->daily->data[$i]->windSpeed."m/s"." / ".$obj->daily->data[$i]->pressure."hPa"."</td>";
    }
    echo "</tbody></table>";

    $address = 'olsztyn';
    $coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true');
    $coordinates = json_decode($coordinates);
//    echo 'Latitude:' . $coordinates->results[0]->geometry->location->lat;
//    echo 'Longitude:' . $coordinates->results[0]->geometry->location->lng;
    $lat = $coordinates->results[0]->geometry->location->lat;
    $lng = $coordinates->results[0]->geometry->location->lng;
    ?>
    {{--<input id="pac-input" class="controls" type="text" placeholder="Search Box">--}}
    {{--<div id="mapka"></div>--}}
    </div>

</div>



    @stop
