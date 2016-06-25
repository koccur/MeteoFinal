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
                        var timeZone=parsed_json['offset'];
                        var currentTimeZone= new Date().getTimezoneOffset()/60;
                        var lat=parsed_json['latitude'];
                        var lon=parsed_json['longitude'];
                        var temp = parsed_json['currently']['temperature'];
                        var tempFeel = parsed_json['currently']['apparentTemperature'];
                        var pressure = parsed_json['currently']['pressure'];
                        var rain = parsed_json['currently']['precipProbability'];
                        var humidity =parsed_json['currently']['humidity'];
                        var cloud = parsed_json['currently']['cloudCover'];
                        var wind = parsed_json['currently']['windSpeed'];
                        var godz=parsed_json['hourly']['data'];
                        var dzien=parsed_json['daily']['data'];

                        $('#lat').html(lat);
                        $('#godz').html(godz);
                        $('#lon').html(lon);
                        $('#timeZone').html(timeZone);
                        $('#temp').html("Aktualna</br>"+"<h5>"+ temp + " <sup>º C</sup>"+"</h5>");
                        $('#tempFeel').html("Odczuwalna</br>"+"<h5>"+tempFeel+ " <sup>º C</sup>"+"</h5>");
                        $('#pressure').html("Ciśnienie</br>"+"<h5>"+ pressure+ "hPa</h5>");
                        $('#rain').html("Szansa na opady</br><h5>"+Math.round(rain*100)+"%</h5>");
                        $('#humidity').html("Wilgotność</br><h5>"+Math.round(humidity*100)+"%</h5>");
                        $('#cloud').html("Zachmurzenie</br><h5>"+Math.round(cloud*100)+"%</h5>");
                        $('#wind').html("Wiatr</br><h5>"+ wind+"m/s</h5>");
                        var y=0;
                        var i;
                        var td= document.getElementsByTagName("td");
                        for (i=0;i<48*4;i+=4,y++){
                            var date = new Date(godz[y]['time']*1000);
                            var day = date.getDate();
                            var month;
                            if (date.getMonth()+1<10){
                                month='0'+(date.getMonth()+1);
                            }
                            else{
                                month=date.getMonth()+1;
                            }
                            var hours = date.getHours()+timeZone-Math.abs(currentTimeZone);
                            if(hours>24){
                                hours=hours-24;
                                day++;
                            }
                            var formattedTime = day+'-'+ month+ ' '+hours + ':00';
                            document.getElementById(td[i].innerHTML=formattedTime);
                            document.getElementById(td[i+1].innerHTML=godz[y]['temperature']+'℃'+' / '+godz[y]['apparentTemperature']+'℃');
                            document.getElementById(td[i+2].innerHTML=Math.round(godz[y]['humidity']*100)+' %' + ' / '+Math.round(godz[y]['precipProbability']*100) +'%');
                            document.getElementById(td[i+3].innerHTML=godz[y]['windSpeed']+'m/s'+' / '+godz[y]['pressure']+'hPa');
                        }
                        y=0;
                        for(i=48*3;i<48*3+7*3;i+=3,y++){
                            document.getElementById(time[i].innerHTML=dzien[y]['time']);
                            document.getElementById(td[i].innerHTML=dzien[y]['temperatureMin']+'℃'+' / '+ dzien[y]['temperatureMax']+'℃');
                            document.getElementById(td[i+1].innerHTML=Math.round(dzien[y]['humidity']*100)+' %'+ ' / '+ Math.round(dzien[y]['precipProbability']*100) + '%');
                            document.getElementById(td[i+2].innerHTML=dzien[y]['windSpeed']+'m/s'+' / '+ dzien[y]['pressure']+'hPa');
                        }
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
            <div class="input-group">
                <input id="searchTextField" class="form-control form-control-costum" type="text" size="50" placeholder="Wpisz miejscowość" autocomplete="on" runat="server" />
            </div>
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
        echo "<p id='timeZone'></p>";
//    echo "<div id='lon'></div>";
//    echo "<div id='lat'></div>";
    date_default_timezone_set($obj->timezone);
    echo "<p id='godzinowa'>Pogoda na najbliższe 48 godzin </p>";
    echo "<table class='table table-weather'><thead><tr>";
    echo "<th>Data i godzina</th><th>Temperatura / Odczuwalna</th><th>Wilgotność / Zachmurzenie</th><th>Wiatr / Ciśnienie</th></tr></thead><tbody>";

        for ($i = 1; $i <= 48; $i++) {
        echo "<tr><td>";
        echo date('d-m H:i', $obj->hourly->data[$i]->time)."</th><td>";
        echo floatval($obj->hourly->data[$i]->temperature)."&deg;C / ";
        echo floatval($obj->hourly->data[$i]->apparentTemperature)."&deg;C</td>";
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
        echo "<div id='sunset'>Zachod ".date('H:i',$obj->daily->data[$i]->sunsetTime)."<br></div>";

        echo date('d-m', $obj->daily->data[$i]->time)."</th><td>";
        echo floatval($obj->daily->data[$i]->temperatureMin)."&deg;C / ";
        echo floatval($obj->daily->data[$i]->temperatureMax)."&deg;C</td>";
        echo "<td>".($obj->daily->data[$i]->humidity*100)."%"." / ".($obj->daily->data[$i]->cloudCover*100)."%"."</td>";
        echo "<td>".$obj->daily->data[$i]->windSpeed."m/s"." / ".$obj->daily->data[$i]->pressure."hPa"."</td>";
    }
    echo "</tbody></table>";
    ?>
       <?php echo "</div>";?>
    </div>
</div>



    @stop
