@extends('layouts.master')
@section('content')
    <script>
        var key="22d2bd3c5dab42a265e7c10415f821e3";
        var urlpath,lat,lng;
        var myArray;
        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
                lat=place.geometry.location.lat();
                lng=place.geometry.location.lng();
                urlpath= key +"/"+ lat+ "," + lng;
                $.ajax({
                    url: "https://api.forecast.io/forecast" + "/" + urlpath + "?lang=pl&units=si",
                    async: false,
                    type: "POST",
                    dataType: "jsonp",
                    timeout: 4000,
                    success: function (parsed_json) {
                        var lat=parsed_json['latitude'];
                        var lon=parsed_json['longitude'];
                        var temp = parsed_json['currently']['temperature'];
                        var tempFeel = parsed_json['currently']['apparentTemperature'];
                        var pressure = parsed_json['currently']['pressure'];
                        var rain = parsed_json['currently']['precipProbability']*100;
                        var humidity =parsed_json['currently']['humidity'];
                        var cloud = parsed_json['currently']['cloudCover'];
                        var wind = parsed_json['currently']['windSpeed'];
                        var godz=parsed_json['hourly']['data'];
                        var dzien=parsed_json['daily']['data'];

                        $('#lat').html(lat);
                        $('#godz').html(godz);
                        $('#lon').html(lon);
                        $('#temp').html("Aktualna</br>"+"<h5>"+ temp + " <sup>º C</sup>"+"</h5>");
                        $('#tempFeel').html("Odczuwalna</br>"+"<h5>"+tempFeel+ " <sup>º C</sup>"+"</h5>");
                        $('#pressure').html("Ciśnienie</br>"+"<h5>"+ pressure+ "hPa</h5>");
                        $('#rain').html("Szansa na opady</br><h5>"+(rain*100)+"%</h5>");
                        $('#humidity').html("Wilgotność</br><h5>"+(humidity*100)+"%</h5>");
                        $('#cloud').html("Zachmurzenie</br><h5>"+(cloud*100)+"%</h5>");
                        $('#wind').html("Wiatr</br><h5>"+ wind+"m/s</h5>");
                        @include('forecast.zmDzien');
                    },
                    error: function (request, status, err) {
                        if (status == "timeout") {
                            $('#errorZone').html("Error");
                            $('#details').html("Problem z Wczytaniem pogody");
                        }
                    }
                })
            });
            }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<div class="col-xs-12">
    <h1>Nazwa miejscowości</h1>
    <div class="content">
        <ul>
                <input id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on" runat="server" />
                <input type="hidden" id="city2" name="city2" />
                <input type="hidden" id="cityLat" name="cityLat" />
                <input type="hidden" id="cityLng" name="cityLng" />
        </ul>
<?php
    $json=file_get_contents('https://api.forecast.io/forecast/22d2bd3c5dab42a265e7c10415f821e3/53.7442,20.4557?lang=pl&units=si');
        $obj=json_decode($json);?>
        {{--@include('forecast.Hourly1')--}}
        {{--@include('forecast.Hourly2')--}}
        {{--@include('forecast.Daily')--}}
<?php
//    echo "<div id='lon'></div>";
//    echo "<div id='lat'></div>";
   echo "tylko pogoda dla danego miejsca";
    date_default_timezone_set($obj->timezone);
    echo "<p id='godzinowa'>Pogoda na najbliższe 48 godzin </p>";
    echo "<table class='table table-weather'><thead><tr>";
    echo "<th>Data i godzina</th><th>Temperatura / Odczuwalna</th><th>Wilgotność / Zachmurzenie</th><th>Wiatr / Ciśnienie</th></tr></thead><tbody>";

        for ($i = 1; $i <= 48; $i++) {
        echo "<tr><th scope='row'>";
        echo date('H:i d-m', $obj->hourly->data[$i]->time)."</th><td>";
        echo intval($obj->hourly->data[$i]->temperature)."&deg;C / ";
        echo intval($obj->hourly->data[$i]->apparentTemperature)."&deg;C</td>";

        echo "<td>".($obj->hourly->data[$i]->humidity*100)."%"." / ".($obj->hourly->data[$i]->cloudCover*100)."%"."</td>";
        echo "<td>".$obj->hourly->data[$i]->windSpeed."m/s"." / ".$obj->hourly->data[$i]->pressure."hPa"."</td>";
    }
    echo "</tbody></table> <br>";

    echo "<p id='tygodniowa'>Pogoda na najbliższe 7 dni </p>";
    echo "<table class='table table-weather'> <thead><tr>";
    echo "<th>Data i godzina</th><th>Min Temp / Max Temp</th><th>Wilgotność / Zachmurzenie</th><th>Wiatr / Ciśnienie</th></tr></thead><tbody>";
    for ($i = 1; $i <= 7; $i++) {
        echo "<tr><th scope='row'>";
        echo "<div id='sunrise'>Wschod ".date('H:i',$obj->daily->data[$i]->sunriseTime)."<br></div>";
        echo "Zachod ".date('H:i',$obj->daily->data[$i]->sunsetTime)."<br>";

        echo date('d-m', $obj->daily->data[$i]->time)."</th><td>";
        echo intval($obj->daily->data[$i]->temperatureMin)."&deg;C / ";
        echo intval($obj->daily->data[$i]->temperatureMax)."&deg;C</td>";
        echo "<td>".($obj->daily->data[$i]->humidity*100)."%"." / ".($obj->daily->data[$i]->cloudCover*100)."%"."</td>";
        echo "<td>".$obj->daily->data[$i]->windSpeed."m/s"." / ".$obj->daily->data[$i]->pressure."hPa"."</td>";
    }
    echo "</tbody></table>";
    ?>
        echo "</div>";
    </div>
</div>



    @stop
